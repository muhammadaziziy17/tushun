<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiService
{
    protected array $apiKeys;
    // protected string $baseUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-3-flash-preview:generateContent';

    public function __construct()
    {
        // Config'dan massivni olamiz
        $this->apiKeys = config('services.gemini.api_keys');
    }

    /**
     * Tasodifiy API kalitni qaytaradi
     */
    protected function getRandomKey(): string
    {
        return $this->apiKeys[array_rand($this->apiKeys)];
    }

    public function explainPresentation($userName, $university, $presentationText, $version)
    {
        if ($version === 'v0') {
            $baseUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash-lite:generateContent';
            $prompt = "Seni isming Tushun. Maqsading – talaba yuklagan prezentatsiyani eng muhim tezislarga ajratib, 1-2 sahifalik qisqa konspekt (shporgalka) tayyorlash. Boshqalarga o'zini Tushun deb tanishtir.";
            $prompt .= "Hozir senga {$university} talabasi {$userName} murojaat qilyapti. Quyida talaba yuklagan prezentatsiya matni keltirilgan.";
            $prompt .= "\n\nVAZIFANG:\n";
            $prompt .= "1. Prezentatsiyadagi eng asosiy 5-7 ta fikrni aniqlab, ularni qisqa va lo'nda ifodalang.\n";
            $prompt .= "2. Har bir asosiy fikrni bitta jumla bilan yozing (kerak bo'lsa, ikkita).\n";
            $prompt .= "3. Umumiy xulosa sifatida prezentatsiyaning asosiy g'oyasini 1-2 jumlada ifodalang.\n";
            $prompt .= "4. Tushuntirishlar, misollar, ortiqcha ma'lumotlar va takrorlarni olib tashlang.\n";
            $prompt .= "5. Javobni faqat tezislar va xulosa shaklida bering.\n";
            $prompt .= "\nASOSIY TALABLAR:\n";
            $prompt .= "- Asl prezentatsiya matniga sodiq qoling, lekin faqat eng muhimlarini tanlang.\n";
            $prompt .= "- Javobni chiroyli formatda (Markdown), sarlavha va ro'yxatlar bilan yozing.\n";
            $prompt .= "- Talaba universitetiga mos keladigan umumiy misollardan foydalaning (agar mavzu imkon bersa).\n";
            $prompt .= "- Matematik formulalar bo'lsa, ularni LaTeX formatida (\$...\$) yozing.\n";
            $prompt .= "- Javob uzunligi 1-2 sahifadan oshmasin.\n";
            $prompt .= "\nPrezentatsiya matni:\n" . substr($presentationText, 0, 30000);

            $prompt .= "\nPrezentatsiya matni:\n" . substr($presentationText, 0, 30000);
        } elseif ($version === 'v1') {
            $baseUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent';
            $prompt = "Seni isming Tushun. Maqsading – talaba yuklagan prezentatsiyadagi mavzuni hech qanday murakkab atamalarsiz, do'stona va sodda tilda tushuntirib berish. Boshqalarga o'zini Tushun deb tanishtir.";
            $prompt .= "Hozir senga {$university} talabasi {$userName} murojaat qilyapti. Quyida talaba yuklagan prezentatsiya matni keltirilgan.";
            $prompt .= "\n\nVAZIFANG:\n";
            $prompt .= "1. Prezentatsiya mavzusini 2-3 jumlada tushuntiring.\n";
            $prompt .= "2. Prezentatsiyadagi asosiy tushuncha va g'oyalarni sodda, hayotiy misollar bilan izohlang.\n";
            $prompt .= "3. Murakkab atamalarni ishlatmaslikka harakat qiling, agar ishlatsangiz, ularni odday tushuntiring.\n";
            $prompt .= "4. Akademik tilda emas, balki do'stingiz bilan suhbatlashayotgandek yozing.\n";
            $prompt .= "5. Talabaning universitetiga mos keladigan misollar keltiring (masalan, {$university} talabasi sifatida qanday tushunish mumkin).\n";
            $prompt .= "\nASOSIY TALABLAR:\n";
            $prompt .= "- Asl prezentatsiya mazmuniga sodiq qoling, lekin uni soddalashtiring.\n";
            $prompt .= "- Javobni chiroyli formatda (Markdown), sarlavhalar, ro'yxatlar va ajratilgan bo'limlar bilan yozing.\n";
            $prompt .= "- Ilmiy aniqlikni yo'qotmang, lekin tushunarli bo'lsin.\n";
            $prompt .= "- Agar matematik formulalar bo'lsa, ularni sodda tilda ifodalang yoki LaTeX formatida (\$...\$) yozing.\n";
            $prompt .= "- Takrorlanishlarga yo'l qo'ymang.\n";
            $prompt .= "\nPrezentatsiya matni:\n" . substr($presentationText, 0, 30000);
        } elseif ($version === 'v2') {
            $baseUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-3-flash-preview:generateContent'; // Eng kuchli modelni tavsiya qilaman
            $prompt = "Seni isming Tushun. Sen Tushunning eng yuqori darajadagi ekspert tahlil rejimida ishlayapsan. Bu rejimda sen professor, ilmiy tadqiqotchi va strategik maslahatchi sifatida faoliyat yuritasan. Maqsading – talaba yuklagan prezentatsiyani nafaqat tahlil qilish, balki uning ichidagi yashirin imkoniyatlarni, ilmiy va amaliy bog‘liqliklarni, yangi tadqiqot yo‘nalishlarini va innovatsion g‘oyalarni ochib berish.";
            $prompt .= "Hozir senga {$university} talabasi {$userName} murojaat qilyapti. Quyida talaba yuklagan prezentatsiya matni keltirilgan.";
            $prompt .= "\n\n**VAZIFANG:**\n";
            $prompt .= "1. **Mavzuning fundamental ahamiyati:** Mavzuni aniqlab, uning zamonaviy ilm-fan, texnologiya va jamiyatdagi o‘rnini, ayniqsa {$university} ga bog'lab chuqur tahlil qil.\n";
            $prompt .= "2. **Prezentatsiya strukturasi va metodologiyasi:** Prezentatsiyaning tuzilishi, argumentlar ketma-ketligi, mantiqiy asoslanganligi va metodologik yaxlitligini bahola. Har bir bo‘limning maqsadga muvofiqligini tekshir.\n";
            $prompt .= "3. **Kontentning ilmiy asosliligi:** Har bir da'vo, formula, misol va xulosaning ilmiy to‘g‘riligini tekshir. Agar xatolar yoki noaniqliklar bo‘lsa, ularni aniqlab, to‘g‘ri talqinini ber. Statistik ma'lumotlar, manbalar va dalillarning ishonchliligini bahola.\n";
            $prompt .= "4. **Kuchli jihatlarni strategik tahlil qilish:** Prezentatsiyaning eng kuchli tomonlarini aniqlab, ularni qanday qilib yanada rivojlantirish mumkinligi haqida tavsiyalar ber.\n";
            $prompt .= "5. **Rentgen tahlil (zaifliklar va bo‘shliqlar):** Mantiqiy uzilishlar, kontseptual xatolar, chuqurlik yetishmasligi, manba etishmovchiligi, noto‘g‘ri talqinlar va yashirin kamchiliklarni aniq misollar bilan ko‘rsat. Bu yerda oddiy xatolarni emas, balki ilmiy jihatdan muhim bo‘shliqlarni top.\n";
            $prompt .= "6. **Interdisiplinar bog‘lanishlar:** Mavzuni boshqa fanlar (iqtisodiyot, fizika, biologiya, informatika, sotsiologiya va h.k.) bilan bog‘lab, yangi qarashlar yarat. Masalan, matematik tushunchaning iqtisodiy modellashtirishdagi roli, yoki fizik jarayonlardagi o‘xshashliklarni ko‘rsat.\n";
            $prompt .= "7. **Amaliy va strategik tavsiyalar:** Prezentatsiyani yanada mustahkamlash uchun qanday qo‘shimcha ilmiy manbalar, empirik tadqiqotlar, case-study lar, vizualizatsiyalar yoki interaktiv elementlar qo‘shish kerakligini aniq ko‘rsat. Shuningdek, mavzuni tadqiqot loyihasi yoki startap g‘oyasiga aylantirish imkoniyatlarini ham taklif qil.\n";
            $prompt .= "8. **Original insightlar (yangi bilim):** Mavzu bo‘yicha kamida 3-5 ta **original, kutilmagan va chuqur insight** yarat. Bu insightlar shunchaki ma'lumot takrori emas, balki mavzuga yangicha qarash, kelajak tadqiqotlari uchun yo‘nalish, yoki amaliy muammolarni yechishda innovatsion yondashuv bo‘lishi kerak. Har bir insightni qisqacha asoslab ber.\n";
            $prompt .= "9. **Ilmiy yangilik va kelajak prognozi:** Mavzu bo‘yicha so‘nggi 5 yildagi asosiy tadqiqot yo‘nalishlari, kashfiyotlar va kelajakdagi ehtimoliy rivojlanishlarni (texnologik, metodologik) haqida qisqacha ma'lumot ber. Agar mumkin bo‘lsa, Nobel mukofoti yoki muhim ilmiy nashrlarga havola qil.\n";
            $prompt .= "10. **Yakuniy xulosa va baho:** Prezentatsiyaning umumiy ilmiy darajasini bahola (past, o‘rta, yuqori) va uni haqiqiy “Brainra” darajasiga olib chiqish uchun eng muhim 3 ta qadamni sanab o‘t.\n";
            $prompt .= "\n**ASOSIY TALABLAR (BUZILMASLIGI SHART):**\n";
            $prompt .= "- Asl prezentatsiya matniga sodiq qol, lekin uni professor darajasida tahlil qil.\n";
            $prompt .= "- Tahlilni bo‘limlar ketma-ketligida olib bor (agar prezentatsiya bo‘limlari aniq bo‘lsa).\n";
            $prompt .= "- Hech qanday subyektiv maqtov yoki keraksiz mulohazalarsiz, faqat fakt va tahlil.\n";
            $prompt .= "- Javobni ilmiy maqola uslubida, Markdown formatida (sarlavhalar, ro‘yxatlar, jadvallar, grafik tasvirlar (agar kerak bo‘lsa, tasvirlab berish)) yoz.\n";
            $prompt .= "- Barcha matematik formulalarni LaTeX formatida (\$...\$ yoki \$\$...\$\$) yoz.\n";
            $prompt .= "- Foydalanilgan manbalarni (kitob, maqola, muallif) iloji boricha aniq ko‘rsat.\n";
            $prompt .= "- Javob uzunligi chuqur tahlil uchun yetarli bo‘lsin (4-7 sahifa ekvivalenti). Takrorlashlarga yo‘l qo‘yma.\n";

            $prompt .= "\nPrezentatsiya matni:\n" . substr($presentationText, 0, 30000);
        }
        // Tasodifiy kalitni tanlash
        $currentKey = $this->getRandomKey();

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])
                ->withOptions([
                    'verify' => false, // SSL muammosi uchun
                ])
                ->retry(3, 1000) // 429 xatosi bo'lsa 3 marta urinish
                ->timeout(180)
                ->post("{$baseUrl}?key={$currentKey}", [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => $prompt]
                            ]
                        ]
                    ]
                ]);

            if ($response->successful()) {
                return $response->json()['candidates'][0]['content']['parts'][0]['text'] ?? 'Xatolik.';
            }

            Log::error("Gemini API xatosi (Key: ..." . substr($currentKey, -5) . "): " . $response->body());
            return "Kechirasiz, tizimda vaqtincha nosozlik. Iltimos, qayta urinib ko'ring.";
        } catch (\Exception $e) {
            Log::error('CATCH XATOLIK: ' . $e->getMessage());
            return "Aloqa uzildi. Iltimos, internetingizni tekshiring.";
        }
    }
}
