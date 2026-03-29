<!DOCTYPE html>

<html class="light" lang="uz">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>500 - Xatolik yuz berdi | TUSHUN</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link rel="shortcut icon" href="{{ secure_asset('images/logo_without_bg.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#0b3860",
                        "background-light": "#f6f7f8",
                        "background-dark": "#111921",
                    },
                    fontFamily: {
                        "display": ["Lexend", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Lexend', sans-serif;
        }

        .glitch-effect {
            position: relative;
            display: inline-block;
        }

        .sweat-drop {
            position: absolute;
            right: -8px;
            top: 5px;
            font-size: 24px !important;
            color: #60a5fa;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 min-h-screen flex flex-col">
    <header
        class="w-full px-6 py-4 md:px-12 flex items-center justify-between border-b border-primary/5 bg-white/50 dark:bg-background-dark/50 backdrop-blur-sm">
        <div class="flex items-center gap-2">
            <a href="/" class="flex items-center gap-2">
                <div class="w-8 h-8 flex items-center justify-center text-white">
                    <img src="{{ secure_asset('images/logo_without_bg.png') }}" alt="TUSHUN Logo" srcset="">
                </div>
                <span class="text-xl font-bold tracking-tight text-primary dark:text-white uppercase">TUSHUN</span>
            </a>
        </div>
        <nav class="hidden md:flex items-center gap-6">
            <a class="text-sm font-medium hover:text-primary transition-colors" href="/">Asosiy</a>
            <a class="text-sm font-medium hover:text-primary transition-colors" href="https://t.me/ismlvmz"
                target="_blank">Yordam</a>
            <a class="text-sm font-medium hover:text-primary transition-colors" href="tel:+998911560910"
                target="_blank">Aloqa</a>
        </nav>
    </header>
    <main class="flex-grow flex items-center justify-center p-6">
        <div class="max-w-2xl w-full text-center space-y-8">
            <div class="relative inline-block">
                <span
                    class="text-[120px] md:text-[180px] font-black text-primary/5 dark:text-white/5 leading-none select-none">500</span>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="glitch-effect">
                        <span class="material-symbols-outlined text-[80px] md:text-[100px] text-primary"
                            style="font-variation-settings: 'FILL' 1">
                            psychology
                        </span>
                        <span class="material-symbols-outlined sweat-drop">
                            water_drop
                        </span>
                    </div>
                </div>
            </div>
            <div class="space-y-4 max-w-lg mx-auto">
                <h1 class="text-3xl md:text-4xl font-bold text-primary dark:text-white tracking-tight">
                    Miyyamiz qizib ketdi shekilli...
                </h1>
                <p class="text-slate-600 dark:text-slate-400 text-base md:text-lg leading-relaxed">
                    Kutilmagan texnik xato yuz berdi. "Tushun" jamoasi allaqachon muammoni bartaraf etish uchun
                    ishlamoqda. Iltimos, birozdan keyin qayta urinib ko'ring.
                </p>
            </div>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
                <a href=""
                    class="w-full sm:w-auto px-8 py-3.5 bg-primary hover:bg-primary/90 text-white font-bold rounded-lg transition-all shadow-lg shadow-primary/20 flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-[20px]">refresh</span>
                    Qaytadan urinish
                </a>
                <a href="/"
                    class="w-full sm:w-auto px-8 py-3.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 font-semibold rounded-lg transition-all">
                    Bosh sahifaga qaytish
                </a>
            </div>
        </div>
    </main>
    <footer class="w-full px-6 py-8 border-t border-primary/5 bg-white/30 dark:bg-background-dark/30 backdrop-blur-sm">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row justify-between items-center gap-6">
            <p class="text-slate-500 dark:text-slate-400 text-sm">
                © 2026 TUSHUN. Muhammadaziz Ismoilov tomonidan ishlab chiqilgan.
            </p>
            <div class="flex gap-8">
                <a class="text-slate-500 hover:text-primary text-sm transition-colors"
                    href="{{ secure_asset('docs/privacy.pdf') }}">Maxfiylik
                    siyosati</a>
                <a class="text-slate-500 hover:text-primary text-sm transition-colors"
                    href="{{ secure_asset('docs/terms.pdf') }}">Shartlar</a>
            </div>
        </div>
    </footer>
</body>

</html>
