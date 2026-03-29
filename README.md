<div align="center">

# 🧠 Tushun

**Sun'iy intellekt yordamida prezentatsiyalarni tushuntiruvchi platforma**

[![Live Demo](https://img.shields.io/badge/🌐_Live_Demo-tushun.great--site.net-4f46e5?style=for-the-badge)](https://tushun.great-site.net/)
[![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![Gemini AI](https://img.shields.io/badge/Gemini-AI-4285F4?style=for-the-badge&logo=google&logoColor=white)](https://ai.google.dev/)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)

<br/>

> **Tushun** — talabalarga prezentatsiyalarni tez va oson o'zlashtirishga yordam beruvchi AI-platforma.  
> PDF yoki PPTX faylni yuklang — Tushun uni tahlil qilib, sizga moslashtirilgan tushuntirish tayyorlaydi.

<br/>

![Tushun Banner](https://via.placeholder.com/900x300/0f172a/4f46e5?text=🧠+TUSHUN+—+AI+Prezentatsiya+Tahlilchisi)

</div>

---

## ✨ Imkoniyatlar

| # | Funksiya | Tavsif |
|---|----------|--------|
| 📄 | **Fayl yuklash** | PDF va PPTX formatlarini qo'llab-quvvatlaydi (32 MB gacha) |
| 🤖 | **AI Tahlil** | Google Gemini AI orqali uch xil rejimda tushuntirish |
| 👤 | **Shaxsiy kabinet** | Har bir foydalanuvchining tarixi alohida saqlanadi |
| 📱 | **Responsive dizayn** | Mobil va desktop qurilmalarda ishlaydi |
| 🔒 | **Xavfsizlik** | Autentifikatsiya, faqat o'z fayllaringizga kirish |

---

## 🎯 Tahlil Rejimlari

Tushun uchta kuchli rejimda ishlaydi — o'z ehtiyojingizga qarab tanlang:

<table>
<tr>
<td width="33%" align="center">

### ⚡ v0 — Tezkor
**Shporgalka Rejimi**

Eng muhim 5-7 tezis va qisqa xulosa. Imtihon oldidan ideal.

*Model: Gemini 2.5 Flash Lite*

</td>
<td width="33%" align="center">

### 💡 v1 — Sodda
**Do'stona Tushuntirish**

Murakkab atamalar yo'q — xuddi do'stingiz tushuntirgandek. Hayotiy misollar bilan.

*Model: Gemini 2.5 Flash*

</td>
<td width="33%" align="center">

### 🔬 v2 — Chuqur
**Ekspert Tahlil**

Professor darajasida: ilmiy asoslilik, zaifliklar, original insightlar va kelajak prognozi.

*Model: Gemini 3 Flash Preview*

</td>
</tr>
</table>

---

## 🛠️ Texnologiyalar

```
Backend       →  Laravel (PHP 8.2+)
AI Engine     →  Google Gemini API (multi-key rotation)
PDF Parser    →  smalot/pdfparser
PPTX Parser   →  ZipArchive (native PHP)
Frontend      →  Blade Templates
Auth          →  Laravel Auth
```

---

## 🚀 O'rnatish

### Talablar
- PHP >= 8.2
- Composer
- MySQL / MariaDB
- Google Gemini API kaliti

### Qadam-baqadam

**1. Reponi klonlash**
```bash
git clone https://github.com/username/tushun.git
cd tushun
```

**2. Kutubxonalarni o'rnatish**
```bash
composer install
npm install && npm run build
```

**3. Muhit faylini sozlash**
```bash
cp .env.example .env
php artisan key:generate
```

**4. `.env` faylini tahrirlash**
```env
APP_NAME=Tushun
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=tushun_db
DB_USERNAME=root
DB_PASSWORD=

# Gemini API kalitlarini vergul bilan ajrating
GEMINI_API_KEYS=AIzaSy...,AIzaSy...,AIzaSy...
```

**5. `config/services.php` ga qo'shish**
```php
'gemini' => [
    'api_keys' => array_map(
        'trim',
        explode(',', env('GEMINI_API_KEYS', ''))
    ),
],
```

**6. Ma'lumotlar bazasini yaratish**
```bash
php artisan migrate
```

**7. Yuklash papkasini yaratish**
```bash
mkdir -p public/uploads/presentations
chmod -R 775 public/uploads
```

**8. Serverni ishga tushirish**
```bash
php artisan serve
```

Brauzerda oching: **http://localhost:8000** 🎉

---

## 📁 Loyiha Tuzilmasi

```
tushun/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── HomeController.php          # Dashboard
│   │       └── PresentationController.php  # Yuklash va ko'rsatish
│   ├── Models/
│   │   └── Presentation.php
│   └── Services/
│       ├── FileParserService.php   # PDF/PPTX matnini ajratish
│       └── GeminiService.php       # AI bilan muloqot
├── resources/views/
│   ├── home2.blade.php             # Dashboard sahifasi
│   ├── explain.blade.php           # Tahlil natijasi
│   └── welcome.blade.php           # Bosh sahifa
├── routes/
│   └── web.php
└── public/
    └── uploads/presentations/      # Yuklangan fayllar
```

---

## 🗄️ Ma'lumotlar Bazasi

**`presentations` jadvali:**

| Ustun | Tur | Tavsif |
|-------|-----|--------|
| `id` | bigint | Asosiy kalit |
| `user_id` | bigint | Foydalanuvchi (FK) |
| `file_name` | string | Original fayl nomi |
| `file_path` | string | Serverda saqlangan yo'l |
| `title` | string | Tahlil sarlavhasi |
| `parsed_content` | longtext | Fayldan ajratilgan matn |
| `ai_explanation` | longtext | AI tahlili (Markdown) |
| `status` | enum | `processing` / `completed` / `failed` |
| `created_at` | timestamp | — |

---

## 🔌 API Endpointlar

| Metod | URL | Tavsif | Auth |
|-------|-----|--------|------|
| `GET` | `/` | Bosh sahifa | — |
| `GET` | `/home` | Dashboard | ✅ |
| `POST` | `/upload` | Fayl yuklash | ✅ |
| `GET` | `/presentation/{id}` | Tahlil natijasi | ✅ |
| `GET` | `/presentation/by-id/{id}` | ID bo'yicha tahlil | ✅ |

**Yuklash so'rovi:**
```json
POST /upload
Content-Type: multipart/form-data

{
  "file": "<PDF yoki PPTX fayl>",
  "mode": "v0" | "v1" | "v2"
}
```

**Javob:**
```json
{
  "success": true,
  "redirect_url": "/presentation/42",
  "message": "Tahlil muvaffaqiyatli yakunlandi!"
}
```

---

## ⚙️ Gemini API — Ko'p Kalit Tizimi

`GeminiService` bir nechta API kalitlarini aylantirib ishlatadi — bu rate limit muammolarini oldini oladi:

```php
// config/services.php
'gemini' => [
    'api_keys' => ['key1', 'key2', 'key3', ...]
]

// Har so'rovda tasodifiy kalit tanlanadi
$key = $this->apiKeys[array_rand($this->apiKeys)];
```

Qancha ko'p kalit — shuncha yuqori ish qobiliyati.

---

## 🌐 Demo

**Jonli versiya:** [https://tushun.great-site.net](https://tushun.great-site.net)

---

## 📬 Aloqa

Savollar, takliflar yoki hamkorlik uchun murojaat qiling:

| Kanal | Manzil |
|-------|--------|
| 💬 Telegram | [@ismlvmz](https://t.me/ismlvmz) |
| 📧 Email | [ismlvmz@yandex.com](mailto:ismlvmz@yandex.com) |

---

<div align="center">

**Tushun** — bilimni qulay qilish uchun yaratilgan 🇺🇿

*Agar loyiha foydali bo'lsa, ⭐ yulduz qo'yishni unutmang!*

</div>