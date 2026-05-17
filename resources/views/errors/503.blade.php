<!DOCTYPE html>

<html class="light" lang="uz">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>TUSHUN | Katta yangilanish arafasidamiz</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <!-- Material Symbols -->
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
                        "secondary": "#122E51",
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

        .illustration-glow {
            filter: drop-shadow(0 0 20px rgba(11, 56, 96, 0.15));
        }
    </style>
</head>

<body class="bg-white dark:bg-background-dark text-slate-900 transition-colors duration-300">
    <div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
        <!-- Header / Logo Section -->
        <header class="flex items-center justify-between px-6 py-8 md:px-12 lg:px-24">
            <a href="/" class="flex items-center gap-2 group cursor-default">
                <div class="size-8 text-primary">
                    <img src="{{ asset('images/logo_without_bg.png') }}" alt="TUSHUN Logo"
                        class="w-8 h-8 object-contain" />
                </div>
                <h2 class="text-primary dark:text-white text-xl font-bold leading-tight tracking-tight uppercase">TUSHUN
                </h2>
            </a>
        </header>
        <!-- Main Content Area -->
        <main class="flex-1 flex flex-col items-center justify-center px-6 py-12 md:px-12">
            <!-- Central Illustration -->
            <div class="w-full max-w-2xl mb-12 relative flex justify-center items-center illustration-glow">
                <!-- Main Image Container -->
                <div
                    class="relative w-full aspect-[4/3] max-w-lg rounded-3xl overflow-hidden bg-slate-50 dark:bg-slate-900 flex items-center justify-center">
                    <img alt="Maintenance illustration" class="w-full h-full object-cover opacity-90"
                        data-alt="Futuristic robot polishing a giant glowing lightbulb in a laboratory"
                        src="{{ asset('images/503.png') }}" />
                    <!-- Floating Badge -->
                    <div
                        class="absolute top-6 right-6 bg-white/90 backdrop-blur-md px-4 py-2 rounded-full shadow-lg flex items-center gap-2 border border-slate-100">
                        <div class="flex gap-1 items-center h-2">
                            <div class="w-1 h-full bg-blue-500 rounded-full animate-bounce"
                                style="animation-delay: 0.1s"></div>
                            <div class="w-1 h-3 bg-blue-500 rounded-full animate-bounce" style="animation-delay: 0.2s">
                            </div>
                            <div class="w-1 h-full bg-blue-500 rounded-full animate-bounce"
                                style="animation-delay: 0.3s"></div>
                        </div>
                        <span class="text-xs font-bold text-primary">BIZ ISHLAYABMIZ</span>
                    </div>
                </div>
                <!-- Decorative Elements -->
                <div class="absolute -z-10 w-64 h-64 bg-primary/5 rounded-full blur-3xl -top-10 -left-10"></div>
                <div class="absolute -z-10 w-64 h-64 bg-secondary/5 rounded-full blur-3xl -bottom-10 -right-10"></div>
            </div>
            <!-- Typography & CTA -->
            <div class="max-w-[720px] text-center space-y-6">
                <h1
                    class="text-primary dark:text-white text-4xl md:text-5xl lg:text-6xl font-extrabold leading-[1.1] tracking-tight">
                    Keyingi darsga tayyorlanyapmiz!
                </h1>
                <p
                    class="text-slate-600 dark:text-slate-400 text-lg md:text-xl font-normal leading-relaxed max-w-2xl mx-auto">
                    Domla doskani artib, yangi mavzuga tayyorlanmoqda. Tushun jamoasi esa platformani yanada "aqlli"
                    qilish uchun
                    harakatda. Qo'ng'iroq chalinishi bilan (tez orada) qaytamiz.Sabringiz uchun rahmat❤️!
                </p>
                <div class="pt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a class="flex min-w-[240px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-14 px-8 bg-primary hover:bg-secondary text-white gap-3 transition-all duration-300 shadow-xl shadow-primary/20 group"
                        href="https://t.me/apptushun" target="_blank">
                        <svg class="w-6 h-6 transition-transform group-hover:scale-110" fill="currentColor"
                            viewbox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M236.88,26.19a9,9,0,0,0-9.16-1.57L25.06,103.93a14.22,14.22,0,0,0,2.43,27.21L80,141.45V200a15.92,15.92,0,0,0,10,14.83,15.91,15.91,0,0,0,17.51-3.73l25.32-26.26L173,220a15.88,15.88,0,0,0,10.51,4,16.3,16.3,0,0,0,5-.79,15.85,15.85,0,0,0,10.67-11.63L239.77,35A9,9,0,0,0,236.88,26.19Zm-61.14,36L86.15,126.35l-49.6-9.73ZM96,200V152.52l24.79,21.74Zm87.53,8L100.85,135.5l119-85.29Z">
                            </path>
                        </svg>
                        <span class="text-base font-bold tracking-wide">Telegramda bizni kuzatib boring</span>
                    </a>
                    <a href="tel:+998911560910" target="_blank"
                        class="flex items-center gap-2 px-6 py-3 text-primary dark:text-slate-300 font-semibold hover:bg-slate-100 dark:hover:bg-slate-800 rounded-xl transition-colors">
                        <span class="material-symbols-outlined">help_outline</span>
                        Yordam
                    </a>
                </div>
            </div>
        </main>
        <!-- Footer -->
        <footer
            class="w-full px-6 py-12 md:px-24 flex flex-col md:flex-row items-center justify-between border-t border-slate-100 dark:border-slate-800 gap-6 mt-12">
            <div class="flex items-center gap-8 text-slate-400 text-sm font-medium">
                <a class="hover:text-primary transition-colors" href="{{ asset('docs/privacy.pdf') }}">Maxfiylik
                    siyosati</a>
                <a class="hover:text-primary transition-colors" href="{{ asset('docs/terms.pdf') }}">Foydalanish
                    shartlari</a>
            </div>
            <div class="flex items-center gap-4">
                <p class="text-slate-400 text-sm">© 2026 TUSHUN. Muhammadaziz tomonidan yaratilgan.</p>
            </div>
        </footer>
    </div>
</body>

</html>
