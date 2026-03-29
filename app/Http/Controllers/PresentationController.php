<?php

namespace App\Http\Controllers;

use App\Models\Presentation;
use App\Services\FileParserService;
use App\Services\GeminiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PresentationController extends Controller
{
    protected $fileParser;
    protected $aiService;

    public function __construct(FileParserService $fileParser, GeminiService $aiService)
    {
        $this->fileParser = $fileParser;
        $this->aiService = $aiService;
    }

    public function upload(Request $request)
    {
        set_time_limit(0); // Uzun ishlov berish uchun vaqt chegarasini olib tashlaymiz
        $request->validate([
            'file' => 'required|file|mimes:pdf,pptx,ppt|max:32768', // 32MB max
        ]);

        try {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();

            // Fayl uchun unikal nom yaratamiz
            $fileName = time() . '_' . uniqid() . '.' . $extension;

            // Public papkasi ichida 'uploads/presentations' joyiga yuklaymiz
            $file->move(public_path('uploads/presentations'), $fileName);

            // Bazaga saqlash uchun nisbiy yo'l
            $dbPath = 'uploads/presentations/' . $fileName;
            $fullPath = public_path($dbPath);

            // 1. Faylni bazaga saqlash
            $presentation = Presentation::create([
                'user_id' => Auth::id(),
                'file_name' => $file->getClientOriginalName(),
                'file_path' => $dbPath,
                'status' => 'processing'
            ]);

            // 2. Faylni parse qilish
            // FileParserService'da parseContent yoki parseFile borligini tekshiring
            $parsedContent = $this->fileParser->parseContent($fullPath, $extension);

            $presentation->update(['parsed_content' => $parsedContent]);

            // 3. AI ga so'rov yuborish
            $user = Auth::user();
            // $explanation = $this->aiService->explainPresentation(
            //     $user->name,
            //     $user->university ?? 'Universitet',
            //     $parsedContent
            // );
            $explanation = $this->aiService->explainPresentation(
                $user->name,
                $user->university ?? 'Universitet',
                $parsedContent,
                $version = $request->filled('mode') ? $request->input('mode') : 'v0' // mode ni ham yuborish
            );

            // Shuni qo'shib tekshiring:
            if (!$explanation) {
                $explanation = "Kechirasiz, Server bilan bog'lanishda xatolik yuz berdi, lekin matn muvaffaqiyatli o'qildi.";
            }

            // 4. Natijani saqlash va yakunlash
            $presentation->update([
                'ai_explanation' => $explanation,
                'status' => 'completed',
                'title' => 'Tahlil #' . $presentation->id
            ]);

            return response()->json([
                'success' => true,
                'redirect_url' => route('presentation.show', $presentation->id),
                'message' => 'Tahlil muvaffaqiyatli yakunlandi!'
            ]);
        } catch (\Exception $e) {
            // Xatolik bo'lsa statusni yangilash (agar presentation yaratilgan bo'lsa)
            if (isset($presentation)) {
                $presentation->update(['status' => 'failed']);
            }

            return response()->json([
                'success' => false,
                'message' => 'Xatolik yuz berdi: ' . $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $presentation = Presentation::where('user_id', Auth::id())->findOrFail($id);
        return view('explain', compact('presentation'));
    }
    public function showPresentationById($id)
    {
        $presentation = Presentation::where('user_id', Auth::id())->findOrFail($id);
        // dd($presentation);
        return view('explain', compact('presentation'));
    }
}
