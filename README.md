# Tushun - Laravel & Google Gemini API Integratsiyasi 🚀

**Tushun** — bu Laravel frameworki asosida ishlab chiqilgan zamonaviy web-ilova bo'lib, uning asosiy maqsadi Google kompaniyasining eng so'nggi va kuchli sun'iy intellekt modeli bo'lgan **Gemini API** bilan to'liq integratsiya qilishni namoyish etishdir. Bu ilova orqali foydalanuvchilar sun'iy intellektga turli xil savollar berishi va uning imkoniyatlaridan to'g'ridan-to'g'ri web-interfeys orqali foydalanishlari mumkin.

---

## 🎯 Loyihaning Asosiy Maqsadi va Vazifasi

Tushun bu prezentatsiyalarni tushuntirib beradigan loyiha.

## 🧠 Ushbu Loyiha Orqali Nimalar O'rganildi?

Ushbu loyihani yaratish davomida quyidagi muhim bilim va ko'nikmalar amaliyotda sinab ko'rildi va o'zlashtirildi:

1. **Google Gemini API bilan ishlash:** 
   - Google AI Studio orqali API kalitlarini to'g'ri sozlash.
   - REST API orqali Gemini modeliga to'g'ri formatdagi so'rovlarni (prompts) yuborish.
   - API'dan qaytgan JSON formatdagi murakkab javoblarni o'qish, parchalash (parsing) va frontendga tushunarli tarzda uzatish.
2. **Laravel HTTP Client (Guzzle):**
   - Tashqi xizmatlar bilan ishlashda Laravel'ning o'rnatilgan HTTP fasadidan (Facades\Http) foydalanish.
   - Xatoliklarni ushlash (Error handling) va API limitlariga e'tibor berish.
3. **Arxitektura va Xavfsizlik:**
   - API kalitlarini koddagi ochiq joylarda emas, balki `.env` muhit o'zgaruvchilari faylida xavfsiz saqlash.
   - MVC (Model-View-Controller) arxitekturasiga rioya qilgan holda kodni toza va tushunarli yozish.

---

## ⚙️ Asosiy Funksiyalar (Features)

- **Interaktiv Muloqot:** Foydalanuvchilar matnli xabarlar va savollarni to'g'ridan-to'g'ri kiritishlari mumkin.
- **Sun'iy Intellekt Javoblari:** Gemini LLM (Large Language Model) yordamida savollarga aqlli, mantiqiy va tezkor javoblar generatsiya qilinadi.
- **Qulay Interfeys:** Foydalanuvchi va AI o'rtasidagi muloqotni osonlashtiruvchi sodda va qulay web-sahifa.

---

## 🛠 Texnologik Stek

- **Backend:** PHP 8.x, Laravel 10/11
- **API:** Google Gemini API (REST)
- **Frontend:** Laravel Blade, HTML, CSS, JavaScript (ehtiyojga qarab)

---

## 💻 O'rnatish va Ishga Tushirish Bo'yicha Qo'llanma

Loyihani o'z kompyuteringizda ishga tushirish uchun quyidagi qadamlarni ketma-ket bajaring:

### 1. Loyihani yuklab olish
Terminalni oching va loyihani GitHub'dan o'z kompyuteringizga klonlang:
```bash
git clone https://github.com/SizningUsername/tushun.git
cd tushun
```

### 2. Kutubxonalarni o'rnatish
Laravel ishlashi uchun kerakli barcha PHP paketlarni o'rnating:
```bash
composer install
```

### 3. Muhit o'zgaruvchilarini sozlash
Loyihaning asosiy papkasida joylashgan `.env.example` faylidan nusxa olib, yangi `.env` faylini yarating:
```bash
cp .env.example .env
```

### 4. Gemini API kalitini kiritish
O'zingizning shaxsiy API kalitingizni oling (Buning uchun [Google AI Studio](https://aistudio.google.com/) saytiga kirib, yangi kalit yarating). So'ngra `.env` faylini ochib, eng pastiga quyidagi qatorni qo'shing:
```env
GEMINI_API_KEY=bu_yerga_o'zingizning_api_kalitingizni_yozing
```

### 5. Dastur kalitini generatsiya qilish
Laravel xavfsizlik uchun ishlatadigan maxfiy kalitni yarating:
```bash
php artisan key:generate
```

### 6. Local serverni ishga tushirish
Barcha sozlamalar tayyor bo'lgach, loyihani ishga tushiring:
```bash
php artisan serve
```
Endi brauzeringizda `http://localhost:8000` manziliga o'tib, ilovadan foydalanishingiz mumkin!

---

## 📬 Muallif va Aloqa

Ushbu loyiha shaxsiy qiziqish va izlanishlar natijasida yaratildi. Agar loyiha kodi bo'yicha savollaringiz bo'lsa, xatoliklar topsangiz yoki hamkorlik qilmoqchi bo'lsangiz, men bilan quyidagi tarmoqlar orqali bemalol bog'lanishingiz mumkin:

- **Telegram:** [@ismlvmz](https://t.me/ismlvmz)
- **Elektron pochta:** [ismlvmz@yandex.com](mailto:ismlvmz@yandex.com)

**⭐ Agar ushbu loyiha sizga manzur kelgan bo'lsa yoki o'rganishingizda yordam bergan bo'lsa, yuqorida yulduzcha (Star) bosib qo'yishni unutmang!**