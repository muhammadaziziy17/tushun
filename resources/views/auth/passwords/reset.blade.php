<!DOCTYPE html>

<html lang="uz">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>TUSHUN - Yangi parol o'rnatish</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
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

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .strength-bar {
            transition: width 0.3s ease, background-color 0.3s ease;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark min-h-screen flex flex-col font-display">

    <!-- Top Navigation Bar -->
    <header
        class="w-full px-6 py-4 flex items-center justify-between border-b border-primary/10 bg-white dark:bg-background-dark">
        <div class="flex items-center gap-2 text-primary dark:text-white">
            <div class="size-8 flex items-center justify-center bg-primary rounded-lg text-white">
                <span class="material-symbols-outlined text-xl">security</span>
            </div>
            <h2 class="text-xl font-bold leading-tight tracking-tight uppercase">TUSHUN</h2>
        </div>
        <div class="flex items-center gap-4">
            <a class="text-sm font-medium text-primary/70 hover:text-primary dark:text-white/70 dark:hover:text-white transition-colors"
                href="#">Yordam</a>
        </div>
    </header>

    <main class="flex-1 flex items-center justify-center p-4">
        <div
            class="w-full max-w-[480px] bg-white dark:bg-slate-900 border border-primary/20 rounded-xl shadow-xl shadow-primary/5 overflow-hidden">
            <div class="p-8 md:p-10">

                <!-- Header -->
                <div class="text-center mb-8">
                    <h1 class="text-primary dark:text-white text-3xl font-bold leading-tight mb-3">
                        Yangi parol o'rnatish
                    </h1>
                    <p class="text-slate-500 dark:text-slate-400 text-base font-normal">
                        Hisobingiz xavfsizligi uchun kuchli paroldan foydalaning
                    </p>
                </div>

                <!-- Laravel Form -->
                <form method="POST" action="{{ route('password.update') }}" id="resetForm" class="space-y-6">
                    @csrf

                    {{-- Hidden token --}}
                    <input type="hidden" name="token" value="{{ $token }}">

                    {{-- Email (readonly) --}}
                    <div class="flex flex-col gap-2">
                        <label for="email" class="text-primary dark:text-white text-sm font-semibold leading-normal">
                            Email manzil
                        </label>
                        <div class="relative">
                            <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}"
                                readonly
                                class="block w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-slate-100 dark:bg-slate-800/60 text-slate-500 dark:text-slate-400 h-12 px-4 pr-12 cursor-not-allowed select-none @error('email') border-red-400 @enderror"
                                autocomplete="email" />
                            <span
                                class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">lock</span>
                        </div>
                        @error('email')
                            <p class="text-red-500 text-xs flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">error</span>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- New Password --}}
                    <div class="flex flex-col gap-2">
                        <label for="password" class="text-primary dark:text-white text-sm font-semibold leading-normal">
                            Yangi parol
                        </label>
                        <div class="relative group">
                            <input id="password" type="password" name="password" required autocomplete="new-password"
                                oninput="checkStrength(this.value)"
                                class="form-input block w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-primary dark:text-white h-12 px-4 pr-12 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-slate-400 @error('password') border-red-400 focus:ring-red-200 @enderror"
                                placeholder="••••••••" />
                            <button type="button" onclick="toggleVisibility('password', 'eye1')"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-primary dark:hover:text-white transition-colors">
                                <span id="eye1" class="material-symbols-outlined">visibility</span>
                            </button>
                        </div>

                        {{-- Strength bar --}}
                        <div class="flex gap-1.5 mt-1" id="strengthBars">
                            <div class="h-1 flex-1 rounded-full bg-slate-200 dark:bg-slate-700" id="bar1"></div>
                            <div class="h-1 flex-1 rounded-full bg-slate-200 dark:bg-slate-700" id="bar2"></div>
                            <div class="h-1 flex-1 rounded-full bg-slate-200 dark:bg-slate-700" id="bar3"></div>
                            <div class="h-1 flex-1 rounded-full bg-slate-200 dark:bg-slate-700" id="bar4"></div>
                        </div>
                        <p id="strengthText" class="text-[11px] text-slate-400 italic">Parol kamida 8 ta belgidan iborat
                            bo'lishi kerak</p>

                        @error('password')
                            <p class="text-red-500 text-xs flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">error</span>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div class="flex flex-col gap-2">
                        <label for="password_confirmation"
                            class="text-primary dark:text-white text-sm font-semibold leading-normal">
                            Parolni tasdiqlang
                        </label>
                        <div class="relative group">
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                autocomplete="new-password" oninput="checkMatch()"
                                class="form-input block w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-primary dark:text-white h-12 px-4 pr-12 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-slate-400"
                                placeholder="••••••••" />
                            <button type="button" onclick="toggleVisibility('password_confirmation', 'eye2')"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-primary dark:hover:text-white transition-colors">
                                <span id="eye2" class="material-symbols-outlined">visibility</span>
                            </button>
                        </div>
                        <p id="matchText" class="text-[11px] hidden"></p>
                    </div>

                    {{-- Submit --}}
                    <div class="pt-2">
                        <button type="submit" id="submitBtn"
                            class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-4 rounded-lg shadow-lg shadow-primary/20 transition-all flex items-center justify-center gap-2 group disabled:opacity-50 disabled:cursor-not-allowed">
                            <span>Parolni yangilash</span>
                            <span
                                class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </button>
                    </div>
                </form>

                <!-- Back to login -->
                <div class="mt-8 text-center">
                    <a class="text-sm font-medium text-primary/60 hover:text-primary dark:text-white/60 dark:hover:text-white transition-colors"
                        href="{{ route('login') }}">
                        ← Tizimga qaytish
                    </a>
                </div>
            </div>

            <!-- Bottom accent -->
            <div class="h-1.5 w-full bg-gradient-to-r from-primary via-primary/80 to-primary"></div>
        </div>
    </main>

    <footer class="w-full p-6 text-center text-slate-400 text-sm">
        <p>© 2026 TUSHUN. Muhammadaziz tomonidan yaratilgan.</p>
    </footer>

    <script>
        // ─── Eye toggle ───────────────────────────────────────────────
        function toggleVisibility(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.textContent = 'visibility_off';
            } else {
                input.type = 'password';
                icon.textContent = 'visibility';
            }
        }

        // ─── Strength checker ─────────────────────────────────────────
        function checkStrength(value) {
            let score = 0;
            if (value.length >= 8) score++;
            if (/[A-Z]/.test(value)) score++;
            if (/[0-9]/.test(value)) score++;
            if (/[^A-Za-z0-9]/.test(value)) score++;

            const bars = ['bar1', 'bar2', 'bar3', 'bar4'];
            const colors = ['bg-red-500', 'bg-orange-400', 'bg-yellow-400', 'bg-green-500'];
            const labels = ['Juda kuchsiz', 'Kuchsiz', 'O\'rtacha', 'Kuchli 💪'];
            const textColors = ['text-red-500', 'text-orange-400', 'text-yellow-500', 'text-green-500'];

            bars.forEach((id, i) => {
                const el = document.getElementById(id);
                el.className = 'h-1 flex-1 rounded-full transition-all duration-300 ';
                if (i < score) {
                    el.className += colors[score - 1];
                } else {
                    el.className += 'bg-slate-200 dark:bg-slate-700';
                }
            });

            const textEl = document.getElementById('strengthText');
            if (value.length === 0) {
                textEl.textContent = "Parol kamida 8 ta belgidan iborat bo'lishi kerak";
                textEl.className = 'text-[11px] text-slate-400 italic';
            } else {
                textEl.textContent = labels[score - 1] || labels[0];
                textEl.className = `text-[11px] font-medium ${textColors[score - 1] || textColors[0]}`;
            }

            checkMatch();
        }

        // ─── Match checker ────────────────────────────────────────────
        function checkMatch() {
            const pass = document.getElementById('password').value;
            const confirm = document.getElementById('password_confirmation').value;
            const matchEl = document.getElementById('matchText');

            if (confirm.length === 0) {
                matchEl.classList.add('hidden');
                return;
            }

            matchEl.classList.remove('hidden');
            if (pass === confirm) {
                matchEl.textContent = '✓ Parollar mos keldi';
                matchEl.className = 'text-[11px] font-medium text-green-500';
            } else {
                matchEl.textContent = '✕ Parollar mos kelmadi';
                matchEl.className = 'text-[11px] font-medium text-red-500';
            }
        }
    </script>

</body>

</html>
