<?php

namespace App\Services;

use Exception;
use Smalot\PdfParser\Parser as PdfParser;
use ZipArchive;

class FileParserService
{
    /**
     * Fayl kengaytmasiga qarab tegishli parserni chaqiradi
     */
    public function parseContent(string $filePath, string $extension): string
    {
        if (!file_exists($filePath)) {
            throw new Exception("Fayl topilmadi");
        }

        $text = match (strtolower($extension)) {
            'pdf' => $this->parsePdf($filePath),
            'pptx' => $this->parsePptx($filePath),
            default => throw new Exception("Ushbu fayl formati qo'llab quvvatlanmaydi"),
        };

        // MUHIM: Matnni tozalash va UTF-8 ga o'tkazish
        // Bu JSON xatoligini oldini oladi
        return mb_convert_encoding($text, 'UTF-8', 'UTF-8');
    }

    private function parsePdf(string $path): string
    {
        try {
            $parser = new PdfParser();
            $pdf = $parser->parseFile($path);
            return $pdf->getText();
        } catch (Exception $e) {
            // Agar parser o'qiy olmasa bo'sh qaytaradi yoki log yozish mumkin
            return "PDF matnini o'qishda xatolik: " . $e->getMessage();
        }
    }

    private function parsePptx(string $path): string
    {
        // PPTX aslida ZIP arxiv bo'lgani uchun uni ZipArchive bilan ochamiz
        // Bu usul yengil va hostingda binary talab qilmaydi
        $zip = new ZipArchive;
        $content = '';

        if ($zip->open($path) === true) {
            // Slaydlar 'ppt/slides/slide1.xml', 'slide2.xml' va h.k. nomda bo'ladi
            for ($i = 1; $i < 100; $i++) {
                $slideName = "ppt/slides/slide{$i}.xml";
                if ($zip->locateName($slideName) !== false) {
                    $xmlContent = $zip->getFromName($slideName);
                    // XML teglarni olib tashlab toza matnni olamiz
                    $slideText = strip_tags($xmlContent);
                    $content .= " " . $slideText;
                } else {
                    break; // Slaydlar tugadi
                }
            }
            $zip->close();
        }

        return trim($content);
    }
}
