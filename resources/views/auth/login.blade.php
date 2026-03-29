<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>TUSHUN - Kirish</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    <link rel="shortcut icon" href="{{ secure_asset('images/favicon.png') }}" type="image/x-icon">
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#0a3461",
                        "secondary": "#122E51",
                        "background-light": "#f6f7f8",
                        "background-dark": "#111921",
                    },
                    fontFamily: {
                        "display": ["Lexend", "sans-serif"]
                    },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Lexend', sans-serif;
            scroll-behavior: smooth;
        }
    </style>
</head>

<body
    class="bg-background-light dark:bg-background-dark min-h-screen flex items-center justify-center p-4 font-display">

    <main class="w-full max-w-[400px] flex flex-col items-center">
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-primary dark:text-white mb-2">TUSHUN</h1>
            <p class="text-secondary/60 dark:text-gray-400 text-sm">Soddalashtirilgan intellektual ta'lim</p>
        </div>

        <div
            class="bg-white dark:bg-gray-900 w-full rounded-xl shadow-sm border border-primary/10 dark:border-white/5 p-8">

            <div class="text-center mb-8">
                <h2 class="text-2xl font-semibold text-secondary dark:text-white">Kirish</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Davom etish uchun hisobingizga kiring</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-secondary/80 dark:text-gray-300 mb-1.5"
                        for="email">Email manzili</label>
                    <div class="relative">
                        <span
                            class="material-icons absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg">alternate_email</span>
                        <input
                            class="w-full pl-10 pr-4 py-3 bg-background-light dark:bg-background-dark border-transparent focus:border-primary focus:ring-2 focus:ring-primary/20 rounded-lg text-secondary dark:text-white transition-all outline-none @error('email') border-red-500 @enderror"
                            id="email" name="email" value="{{ old('email') }}" placeholder="example@mail.com"
                            required autofocus type="email" />
                    </div>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <div class="flex justify-between items-center mb-1.5">
                        <label class="text-sm font-medium text-secondary/80 dark:text-gray-300"
                            for="password">Parol</label>
                        @if (Route::has('password.request'))
                            <a class="text-xs text-primary font-medium hover:underline"
                                href="{{ route('password.request') }}">Parolni unutdingizmi?</a>
                        @endif
                    </div>
                    <div class="relative">
                        <span
                            class="material-icons absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg">lock_outline</span>
                        <input
                            class="w-full pl-10 pr-12 py-3 bg-background-light dark:bg-background-dark border-transparent focus:border-primary focus:ring-2 focus:ring-primary/20 rounded-lg text-secondary dark:text-white transition-all outline-none @error('password') border-red-500 @enderror"
                            id="password" name="password" placeholder="••••••••" required type="password" />
                    </div>
                </div>

                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember"
                        class="rounded border-gray-300 text-primary shadow-sm focus:ring-primary/20">
                    <label for="remember_me" class="ml-2 text-sm text-gray-600 dark:text-gray-400">Eslab qolish</label>
                </div>

                <button
                    class="w-full bg-primary hover:bg-primary/90 text-white font-semibold py-3.5 rounded-lg shadow-md transition-all active:scale-[0.98] mt-2"
                    type="submit">
                    Kirish
                </button>
            </form>

            <div class="mt-8 text-center border-t border-gray-100 dark:border-gray-800 pt-6">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Hisobingiz yo'qmi?
                    <a class="text-primary font-bold hover:underline ml-1" href="{{ route('register') }}">Ro'yxatdan
                        o'tish</a>
                </p>
            </div>
        </div>

        <footer class="mt-8 flex justify-between gap-2 text-xs text-gray-400 dark:text-gray-600 w-full">
            <a class="hover:text-primary" href="https://t.me/ismlvmz" target="_blank">Yordam</a>
            <div class="flex gap-4">
                <a class="hover:text-primary" href="{{ secure_asset('docs/privacy.pdf') }}"
                    target="_blank">Maxfiylik</a>
                <a class="hover:text-primary" href="{{ secure_asset('docs/terms.pdf') }}" target="_blank">Shartlar</a>
            </div>
        </footer>
    </main>

</body>

</html>
