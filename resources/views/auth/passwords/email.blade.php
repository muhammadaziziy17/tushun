<!DOCTYPE html>

<html lang="uz">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>TUSHUN - Parolni tiklash</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&amp;display=swap"
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
                        "primary-focus": "#122E51",
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

        .illustration-container {
            background: linear-gradient(135deg, #0b3860 0%, #082a4a 100%);
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark min-h-screen flex items-center justify-center">
    <div class="flex w-full min-h-screen overflow-hidden">
        <!-- Left Side: Visual Illustration (Hidden on mobile) -->
        <div class="hidden lg:flex lg:w-1/2 illustration-container flex-col justify-between p-12 text-white relative">
            <div class="flex items-center gap-3 z-10">
                <div class="size-10 bg-white backdrop-blur-md rounded-lg flex items-center justify-center">
                    <img src="{{ asset('images/logo_without_bg.png') }}" alt="Tushun Logo" srcset=""
                        class="size-6">
                </div>
                <h2 class="text-2xl font-bold tracking-tight">TUSHUN</h2>
            </div>
            <div class="relative flex flex-col items-center justify-center grow">
                <!-- Abstract Illustration Representation -->
                <div class="w-full max-w-md aspect-square relative">
                    <div class="absolute inset-0 bg-primary-focus/30 rounded-full blur-3xl"></div>
                    <div class="relative z-10 w-full h-full flex items-center justify-center">
                        <!-- Mock 2D Illustration: Student and Security -->
                        <div
                            class="relative w-64 h-64 bg-white/5 border border-white/10 rounded-3xl flex items-center justify-center overflow-hidden backdrop-blur-sm">
                            <span
                                class="material-symbols-outlined text-[120px] text-white/20 absolute -top-10 -right-10">lock</span>
                            <span class="material-symbols-outlined text-[120px] text-white absolute">
                                passkey
                            </span>
                            <div
                                class="absolute bottom-4 left-4 right-4 bg-white/10 p-4 rounded-xl border border-white/10">
                                <div class="h-2 w-24 bg-white/40 rounded mb-2"></div>
                                <div class="h-2 w-16 bg-white/20 rounded"></div>
                            </div>
                        </div>
                        <div
                            class="absolute -bottom-8 -right-8 w-32 h-32 bg-primary-focus border border-white/20 rounded-2xl flex items-center justify-center shadow-2xl">
                            <span class="material-symbols-outlined text-5xl text-white">verified_user</span>
                        </div>
                    </div>
                </div>
                <div class="mt-12 text-center max-w-sm">
                    <p class="text-white/70 leading-relaxed">Sizning ma'lumotlaringiz xavfsizligi biz uchun ustuvor
                        vazifa. Parolingizni osongina tiklang.</p>
                </div>
            </div>
            <div class="z-10 text-sm text-white/50">
                © 2026 TUSHUN. Muhammadaziz tomonidan yaratilgan.
            </div>
            <!-- Background Decoration -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-primary-focus/40 rounded-full -ml-48 -mb-48 blur-3xl">
            </div>
        </div>
        <!-- Right Side: Recovery Form -->
        <div
            class="w-full lg:w-1/2 flex flex-col items-center justify-center px-6 md:px-12 lg:px-24 bg-white dark:bg-background-dark">
            <!-- Mobile Logo -->
            <div class="lg:hidden absolute top-8 left-8 flex items-center gap-2">
                <img src="{{ asset('images/logo_without_bg.png') }}" alt="TUSHUN Logo" class="size-10"
                    srcset="">
                <span class="font-bold text-xl text-primary">TUSHUN</span>
            </div>
            <div class="w-full max-w-md space-y-8">
                <div class="space-y-3">
                    <h1 class="text-3xl font-extrabold text-[#0e151b] dark:text-white tracking-tight">Parolni
                        unutdingizmi?</h1>
                    <p class="text-[#4e7597] dark:text-slate-400 text-base leading-relaxed">
                        Xavotir olmang, biz sizga yordam beramiz. Emailingizni kiriting, biz sizga tiklash havolasini
                        yuboramiz.
                    </p>
                    @if (session('status'))
                        <div
                            class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm flex items-center gap-3">
                            <span class="material-symbols-outlined">check_circle</span>
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <form action="{{ route('password.email') }}" method="POST" class="flex flex-col gap-6">
                    @csrf <div class="flex flex-col gap-2">
                        <label class="text-slate-700 dark:text-slate-300 text-sm font-semibold ml-1">
                            Email manzilingiz
                        </label>
                        <div class="relative group">
                            <span
                                class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors">
                                mail
                            </span>
                            <input name="email" value="{{ old('email') }}" required type="email"
                                placeholder="misol@gmail.com"
                                class="w-full pl-12 pr-4 py-4 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all dark:text-white" />
                        </div>

                        @error('email')
                            <span class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <button
                        class="w-full flex items-center justify-center gap-2 bg-primary hover:bg-[#082a4a] text-white font-bold py-4 px-6 rounded-xl transition-all shadow-lg shadow-primary/20 active:scale-[0.98]"
                        type="submit">
                        <span>Havolani yuborish</span>
                        <span class="material-symbols-outlined text-xl">arrow_forward</span>
                    </button>
                </form>
                <div class="pt-6 border-t border-slate-100 dark:border-slate-800">
                    <a class="flex items-center justify-center gap-2 text-primary dark:text-primary/80 font-semibold hover:underline group"
                        href="{{ route('login') }}">
                        <span
                            class="material-symbols-outlined text-xl group-hover:-translate-x-1 transition-transform">arrow_back</span>
                        Tizimga qaytish
                    </a>
                </div>
            </div>
            <!-- Simple Footer Info -->
            <div class="absolute bottom-8 text-slate-400 text-xs hidden lg:block">
                Yordam kerakmi? <a class="text-primary font-medium hover:underline" href="https://t.me/ismlvmz"
                    target="_blank">Qo'llab-quvvatlash</a>
            </div>
        </div>
    </div>
</body>

</html>
