<!DOCTYPE html>

<html lang="uz">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>404 - Sahifa topilmadi | TUSHUN</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&amp;display=swap"
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
                        "navy-deep": "#122E51",
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

        .glass-effect {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(11, 56, 96, 0.1);
        }

        .floating {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }
    </style>
</head>

<body class="bg-white text-primary antialiased overflow-x-hidden">
    <!-- Navigation Header -->
    <header
        class="fixed top-0 left-0 right-0 z-50 px-6 py-4 md:px-20 lg:px-40 flex items-center justify-between glass-effect">
        <a href="/" class="flex items-center gap-2 group cursor-pointer">
            <div class="text-white p-1.5 rounded-lg flex items-center justify-center w-8 h-8">
                <img src="{{ asset('images/logo_without_bg.png') }}" alt="TUSHUN Logo" srcset="">
            </div>
            <h2 class="text-primary text-xl font-bold leading-tight tracking-tight uppercase">TUSHUN</h2>
        </a>
        <nav class="hidden md:flex items-center gap-10">
            <a class="text-navy-deep/70 hover:text-primary text-sm font-medium transition-colors"
                href="https://t.me/ismlvmz" target="_blank">Yordam</a>
        </nav>
        <a href="{{ route('login') }}"
            class="bg-primary hover:bg-navy-deep text-white px-6 py-2 rounded-lg text-sm font-semibold transition-all shadow-md shadow-primary/20">
            Kirish
        </a>
    </header>
    <main class="relative min-h-screen flex flex-col items-center justify-center px-4 pt-20 pb-12">
        <!-- Background Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-1/4 -left-20 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 -right-20 w-96 h-96 bg-navy-deep/5 rounded-full blur-3xl"></div>
        </div>
        <div class="relative z-10 max-w-4xl w-full flex flex-col items-center text-center">
            <!-- Central 3D Illustration Area -->
            <div class="relative w-full max-w-md aspect-square flex items-center justify-center mb-8">
                <!-- Large 404 Text Integrated -->
                <span
                    class="absolute text-[180px] md:text-[240px] font-black text-primary/[0.03] select-none tracking-tighter">404</span>
                <!-- Main Floating Graphic -->
                <div class="floating relative z-20 w-64 h-80 md:w-72 md:h-96">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-primary to-navy-deep rounded-2xl shadow-2xl transform rotate-3 flex items-center justify-center overflow-hidden">
                        <!-- Book Stylization -->
                        <div class="absolute left-0 top-0 bottom-0 w-8 bg-black/10 border-r border-white/10"></div>
                        <div class="w-full h-full p-8 flex flex-col items-center justify-center text-white/90">
                            <span class="material-symbols-outlined text-8xl mb-4 opacity-80">menu_book</span>
                            <div class="w-3/4 h-2 bg-white/20 rounded-full mb-3"></div>
                            <div class="w-1/2 h-2 bg-white/20 rounded-full mb-3"></div>
                            <div class="w-2/3 h-2 bg-white/20 rounded-full"></div>
                        </div>
                        <!-- Missing Piece / Ghost Effect -->
                        <div
                            class="absolute -top-4 -right-4 w-24 h-24 bg-white/30 backdrop-blur-md rounded-full border-4 border-white flex items-center justify-center animate-pulse">
                            <span class="material-symbols-outlined text-primary text-4xl">search_off</span>
                        </div>
                    </div>
                    <!-- Shadow -->
                    <div
                        class="absolute -bottom-12 left-1/2 -translate-x-1/2 w-48 h-6 bg-navy-deep/10 blur-xl rounded-[100%]">
                    </div>
                </div>
            </div>
            <!-- Content -->
            <div class="space-y-4 max-w-2xl px-4">
                <h1 class="text-primary text-3xl md:text-5xl font-bold tracking-tight">
                    404 Bu darsga kirmagan edingiz shekilli?
                </h1>
                <p class="text-navy-deep/70 text-lg md:text-xl font-light leading-relaxed">
                    Biz barcha varaqlarni tekshirdik, lekin bu sahifa bo'm-bo'sh. Balki domla bu mavzuni
                    tushuntirayotganida siz boshqa narsa bilan band bo'lgandirsiz?
                </p>
            </div>
            <!-- Action Buttons -->
            <div class="mt-12 flex flex-col sm:flex-row gap-4 w-full justify-center px-4">
                <a class="inline-flex items-center justify-center px-8 py-4 bg-primary hover:bg-navy-deep text-white text-lg font-bold rounded-xl transition-all shadow-lg shadow-primary/25 group"
                    href="/">
                    <span
                        class="material-symbols-outlined mr-2 group-hover:-translate-x-1 transition-transform">arrow_back</span>
                    Bosh sahifaga qaytish
                </a>
                <a href="https://t.me/ismlvmz" target="_blank"
                    class="inline-flex items-center justify-center px-8 py-4 border-2 border-primary/10 hover:border-primary/30 text-primary text-lg font-semibold rounded-xl transition-all">
                    <span class="material-symbols-outlined mr-2">contact_support</span>
                    Yordam olish
                </a>
            </div>
        </div>
    </main>
</body>

</html>
