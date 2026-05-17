<!DOCTYPE html>

<html lang="uz">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('images/logo_without_bg.png') }}" type="image/x-icon">
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#0b3860",
                        "background-light": "#ffffff",
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
    <title>TUSHUN - Ro'yxatdan o'tish</title>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 overflow-x-hidden">
    <div class="relative flex min-h-screen flex-col items-center justify-center p-4 lg:p-8">
        <!-- Background Decoration (Subtle) -->
        <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-[10%] -left-[10%] w-[40%] h-[40%] bg-primary/5 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-[10%] -right-[10%] w-[40%] h-[40%] bg-primary/5 rounded-full blur-3xl"></div>
        </div>
        <div class="z-10 w-full max-w-5xl">
            <!-- Logo Section -->
            <div class="flex items-center justify-center gap-3 mb-8">
                <div class="text-primary dark:text-white">
                    <img src="{{ asset('images/logo_without_bg.png') }}" alt="Tushun Logo"
                        class="w-10 h-10 object-contain" />
                </div>
                <h1 class="text-2xl font-black tracking-tight text-primary dark:text-white uppercase">TUSHUN</h1>
            </div>
            <!-- Central Layout Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <!-- Main Form Card (6 columns on desktop) -->
                <div
                    class="lg:col-span-7 bg-white dark:bg-slate-900 p-8 lg:p-10 rounded-xl shadow-xl border border-slate-100 dark:border-slate-800">
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-2">Ro'yxatdan o'tish</h2>
                        <p class="text-slate-500 dark:text-slate-400">O'z sohangizga moslashtirilgan ta'limni boshlang
                        </p>
                    </div>
                    <form method="POST" action="{{ route('register') }}" class="space-y-5" x-data="{ showInfo: false }">
                        @csrf

                        <div class="space-y-2">
                            <label for="name" class="text-sm font-semibold text-slate-700 dark:text-slate-300">Ism
                                va familiya</label>
                            <div class="relative">
                                <span
                                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">person</span>
                                <input id="name" name="name" type="text" value="{{ old('name') }}" required
                                    autofocus
                                    class="w-full pl-10 pr-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all dark:text-white"
                                    placeholder="Ismingizni kiriting" />
                            </div>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="email" class="text-sm font-semibold text-slate-700 dark:text-slate-300">Email
                                manzili</label>
                            <div class="relative">
                                <span
                                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">mail</span>
                                <input id="email" name="email" type="email" value="{{ old('email') }}" required
                                    class="w-full pl-10 pr-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all dark:text-white"
                                    placeholder="example@mail.com" />
                            </div>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2 relative">
                            <label for="university"
                                class="text-sm font-semibold text-slate-700 dark:text-slate-300">Universitet (sohangizni
                                aniqlash uchun)</label>
                            <div class="relative">
                                <span
                                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">school</span>
                                <input id="university" name="university" type="text" value="{{ old('university') }}"
                                    required @focus="showInfo = true" @blur="showInfo = false"
                                    class="w-full pl-10 pr-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all dark:text-white"
                                    placeholder="Masalan: TATU yoki Iqtisodiyot Universiteti" />
                            </div>
                            @error('university')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="password"
                                class="text-sm font-semibold text-slate-700 dark:text-slate-300">Parol</label>
                            <div class="relative">
                                <span
                                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">lock</span>
                                <input id="password" name="password" type="password" required
                                    class="w-full pl-10 pr-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all dark:text-white"
                                    placeholder="••••••••" />
                            </div>
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="w-full py-4 bg-primary hover:bg-primary/90 text-white font-bold rounded-lg shadow-lg shadow-primary/20 transition-all flex items-center justify-center gap-2 mt-4">
                            <span>Ro'yxatdan o'tish</span>
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </button>

                        <div class="pt-6 border-t border-slate-100 dark:border-slate-800 text-center">
                            <p class="text-sm text-slate-500">
                                Akkauntingiz bormi?
                                <a class="text-primary font-bold hover:underline"
                                    href="{{ route('login') }}">Kirish</a>
                            </p>
                        </div>
                    </form>
                </div>
                <!-- Instruction Box (5 columns on desktop) -->
                <div class="lg:col-span-5 flex flex-col justify-center">
                    <div
                        class="bg-slate-50 dark:bg-slate-800 border-l-[6px] border-primary p-6 lg:p-8 rounded-r-xl shadow-sm relative overflow-hidden">
                        <div class="absolute -right-4 -bottom-4 opacity-5 dark:opacity-10 pointer-events-none">
                            <span class="material-symbols-outlined text-[120px]">school</span>
                        </div>
                        <div class="relative z-10">
                            <h3 class="flex items-center gap-2 text-xl font-bold text-primary dark:text-white mb-4">
                                <span class="material-symbols-outlined">
                                    question_mark
                                </span>
                                Nima uchun universitetingizni so'rayapmiz?
                            </h3>
                            <div class="space-y-4 text-slate-600 dark:text-slate-300 leading-relaxed text-base">
                                <p>
                                    Tushun sizga darsni shunchaki o'qib bermaydi. Agar siz iqtisodchi bo'lsangiz — bozor
                                    qonunlari bilan, agar IT mutaxassisi bo'lsangiz — texnik algoritmlar misolida
                                    tushuntiradi.
                                </p>
                                <p class="font-medium text-slate-800 dark:text-slate-200">
                                    Maqsadimiz — murakkab mavzuni aynan sizning sohangiz tilida soddalashtirish!
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Additional academic reassurance -->
                    <div class="mt-8 px-4">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-primary">history_edu</span>
                                <div>
                                    <p class="text-sm font-bold">Konspekt tayyorlash</p>
                                    <p class="text-xs text-slate-500">Mavzu bo'yicha tayyor qisqartmalar</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-primary">psychology</span>
                                <div>
                                    <p class="text-sm font-bold">Moslashuvchan</p>
                                    <p class="text-xs text-slate-500">Sohaga oid kontent</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Footer -->
            <footer class="mt-12 text-center text-slate-400 text-xs">
                <p>© 2026 TUSHUN Platformasi. Muhammadaziz tomonidan yaratilgan.</p>
                <div class="mt-2 flex justify-center gap-4">
                    <a class="hover:text-primary" href="{{ asset('docs/terms.pdf') }}">Foydalanish
                        shartlari</a>
                    <a class="hover:text-primary" href="{{ asset('docs/privacy.pdf') }}">Maxfiylik
                        siyosati</a>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
