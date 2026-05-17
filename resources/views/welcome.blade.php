<!DOCTYPE html>
<html lang="uz" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Tushun - Prezentatsiyalarni oson tushuning</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />

    <!-- GSAP, ScrollTrigger va Lenis -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <script src="https://unpkg.com/lenis@1.1.20/dist/lenis.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/lenis@1.1.20/dist/lenis.css">

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#0B3961",
                        "secondary": "#122E51",
                        "accent": "#F6F7F8",
                    },
                    fontFamily: {
                        "sans": ["Plus Jakarta Sans", "sans-serif"]
                    },
                    animation: {
                        'shimmer': 'shimmer 2s linear infinite',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        shimmer: {
                            '0%': {
                                backgroundPosition: '-200% 0'
                            },
                            '100%': {
                                backgroundPosition: '200% 0'
                            },
                        },
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-20px)'
                            },
                        },
                    }
                },
            },
        }
    </script>
    <style type="text/tailwindcss">
        @layer base {
            body {
                @apply font-sans antialiased text-secondary selection:bg-primary/20 bg-white overflow-x-hidden;
            }

            html.lenis,
            html.lenis body {
                height: auto;
            }

            .lenis.lenis-smooth {
                scroll-behavior: auto !important;
            }

            .lenis.lenis-smooth [data-lenis-prevent] {
                overscroll-behavior: contain;
            }

            .lenis.lenis-stopped {
                overflow: hidden;
            }

            .lenis.lenis-scrolling iframe {
                pointer-events: none;
            }
        }


        /* Parallax Background Styles */
        .parallax-container {
            position: fixed;
            inset: 0;
            z-index: -20;
            overflow: hidden;
            pointer-events: none;
        }

        .parallax-layer {
            position: absolute;
            inset: -10%;
            width: 120%;
            height: 120%;
            will-change: transform;
        }

        .layer-grid {
            background-image:
                linear-gradient(rgba(11, 57, 97, 0.08) 1.5px, transparent 1.5px),
                linear-gradient(90deg, rgba(11, 57, 97, 0.08) 1.5px, transparent 1.5px);
            background-size: 100px 100px;
        }

        .layer-dots {
            background-image: radial-gradient(circle, #0B3961 1.5px, transparent 1.5px);
            background-size: 50px 50px;
            opacity: 0.12;
        }

        .layer-blobs {
            background:
                radial-gradient(circle at 20% 30%, rgba(11, 57, 97, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(18, 46, 81, 0.08) 0%, transparent 50%);
        }

        .layer-shapes {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .floating-shape {
            position: absolute;
            border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
            filter: blur(60px);
            opacity: 0.2;
            animation: shape-morph 15s infinite alternate ease-in-out;
        }

        .floating-icon {
            position: absolute;
            font-size: 5rem;
            color: rgba(11, 57, 97, 0.15);
            animation: icon-float 12s infinite alternate ease-in-out;
        }

        .spark {
            position: absolute;
            width: 6px;
            height: 6px;
            background: #4facfe;
            border-radius: 50%;
            opacity: 0.6;
            filter: blur(1px);
            box-shadow: 0 0 10px #4facfe;
            animation: spark-float 8s infinite linear;
        }

        @keyframes shape-morph {
            0% {
                border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
            }

            100% {
                border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            }
        }

        @keyframes icon-float {
            from {
                transform: translateY(0) rotate(0deg) scale(1);
            }

            to {
                transform: translateY(-50px) rotate(20deg) scale(1.1);
            }
        }

        @keyframes spark-float {
            0% {
                transform: translateY(0) translateX(0);
                opacity: 0;
            }

            50% {
                opacity: 0.3;
            }

            100% {
                transform: translateY(-100vh) translateX(50px);
                opacity: 0;
            }
        }

        /* Waves */
        .custom-shape-divider-bottom-1708250000 {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
            transform: rotate(180deg);
        }

        .custom-shape-divider-bottom-1708250000 svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 120px;
        }

        .custom-shape-divider-bottom-1708250000 .shape-fill {
            fill: #FFFFFF;
        }


        /* Noise Texture */
        .noise-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 9999;
            opacity: 0.05;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
        }

        .glass-nav {
            @apply bg-white/20 backdrop-blur-[40px] transition-all duration-700 border border-white/40 shadow-lg;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
        }

        .glass-nav.scrolled {
            @apply top-4 w-[calc(100%-2rem)] max-w-6xl py-3 rounded-full shadow-2xl bg-white/80;
        }

        .glass-card {
            @apply bg-white/60 backdrop-blur-lg border border-white/20 shadow-xl transition-all duration-500;
        }

        .flat-card {
            @apply bg-white border border-primary/5 rounded-[2rem] transition-all duration-500 hover:shadow-2xl hover:shadow-primary/10 hover:-translate-y-3 relative overflow-hidden;
        }

        .btn-modern {
            @apply px-8 py-4 rounded-2xl font-bold transition-all duration-300 active:scale-95 text-center relative overflow-hidden flex items-center justify-center gap-2;
        }

        .btn-primary {
            @apply bg-primary text-white hover:shadow-2xl hover:shadow-primary/40;
        }

        .btn-secondary {
            @apply bg-white text-primary border-2 border-primary/10 hover:bg-accent;
        }

        .section-padding {
            @apply py-20 md:py-32 px-6 max-w-7xl mx-auto;
        }

        /* Hero Background */
        .hero-bg {
            background: transparent;
            position: absolute;
            inset: 0;
            z-index: -1;
        }

        /* Custom Cursor Light */
        .cursor-glow {
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(11, 57, 97, 0.05) 0%, rgba(255, 255, 255, 0) 70%);
            pointer-events: none;
            position: fixed;
            transform: translate(-50%, -50%);
            z-index: 9998;
            display: none;
        }

        @media (min-width: 1024px) {
            .cursor-glow {
                display: block;
            }

            body {
                overflow: hidden;
            }

        }

        /* Shimmer Effect */
        .shimmer {
            background: linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.4) 50%, rgba(255, 255, 255, 0) 100%);
            background-size: 200% 100%;
            animation: shimmer 3s infinite;
        }

        /* Mobile Menu improvements */
        #mobile-menu {
            clip-path: circle(0% at 100% 0%);
            transition: clip-path 0.7s cubic-bezier(0.7, 0, 0.3, 1);
        }

        #mobile-menu-toggle:checked~#mobile-menu {
            clip-path: circle(141.4% at 100% 0%);
        }

        .gsap-reveal {
            opacity: 0;
            transform: translateY(30px);
        }

        .hero-title-wrap {
            @apply flex flex-col items-center justify-center;
        }

        .progress-line {
            @apply absolute left-[27px] top-0 bottom-0 w-1 bg-primary/10 hidden sm:block;
        }

        .progress-fill {
            @apply absolute left-0 top-0 w-full bg-primary origin-top scale-y-0 transition-transform duration-300;
        }
    </style>
</head>

<body>
    <!-- Parallax Background -->
    <div class="parallax-container">
        <!-- Layer 0: Grid (Static-ish) -->
        <div class="parallax-layer layer-grid" data-speed="0.05"></div>

        <!-- Layer 1: Back (Slowest) -->
        <div class="parallax-layer layer-dots" data-speed="0.1"></div>

        <!-- Layer 2: Middle -->
        <div class="parallax-layer layer-blobs" data-speed="0.3"></div>

        <!-- Layer 3: Front (Fastest) -->
        <div class="parallax-layer layer-shapes" data-speed="0.5">
            <div class="floating-shape w-96 h-96 bg-primary/20 top-1/4 left-1/4"></div>
            <div class="floating-shape w-80 h-80 bg-secondary/20 bottom-1/4 right-1/4"></div>

            <!-- Floating 3D-like Icons -->
            <span class="material-symbols-outlined floating-icon top-[15%] left-[10%]">lightbulb</span>
            <span class="material-symbols-outlined floating-icon top-[60%] left-[85%]">auto_stories</span>
            <span class="material-symbols-outlined floating-icon top-[80%] left-[20%]">psychology</span>
            <span class="material-symbols-outlined floating-icon top-[10%] left-[75%]">analytics</span>

            <!-- Sparks/Particles -->
            <div class="spark top-[20%] left-[30%]" style="animation-delay: 0s;"></div>
            <div class="spark top-[50%] left-[60%]" style="animation-delay: 2s;"></div>
            <div class="spark top-[80%] left-[40%]" style="animation-delay: 4s;"></div>
            <div class="spark top-[30%] left-[70%]" style="animation-delay: 6s;"></div>
            <div class="spark top-[70%] left-[10%]" style="animation-delay: 8s;"></div>
        </div>
    </div>

    <!-- Noise Overlay -->
    <div class="noise-overlay"></div>

    <!-- Cursor Glow -->
    <div class="cursor-glow" id="cursor-glow"></div>

    <!-- Navbar -->
    <nav id="navbar"
        class="fixed top-6 left-1/2 -translate-x-1/2 w-[calc(100%-3rem)] max-w-7xl z-50 glass-nav rounded-2xl md:rounded-3xl px-6 py-4 flex items-center justify-between transition-all duration-700">
        <a href="#" class="flex items-center gap-3 group">
            <div class="relative">
                <img src="{{ asset('images/logo_without_bg.png') }}" alt="Tushun Logo"
                    class="w-10 h-10 group-hover:rotate-12 transition-transform duration-300">
                <div
                    class="absolute inset-0 bg-primary/20 blur-lg rounded-full -z-10 opacity-0 group-hover:opacity-100 transition-opacity">
                </div>
            </div>
            <span class="text-2xl font-extrabold tracking-tighter text-primary uppercase italic">TUSHUN</span>
        </a>

        <div
            class="hidden lg:flex items-center gap-8 bg-white/50 backdrop-blur-md px-8 py-3 rounded-full border border-white/40">
            <a class="text-sm font-bold text-secondary/70 hover:text-primary transition-all relative group"
                href="#why">
                Nega?
                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all group-hover:w-full"></span>
            </a>
            <a class="text-sm font-bold text-secondary/70 hover:text-primary transition-all relative group"
                href="#how-it-works">
                Qanday ishlaydi?
                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all group-hover:w-full"></span>
            </a>
            <a class="text-sm font-bold text-secondary/70 hover:text-primary transition-all relative group"
                href="#about-me">
                Asoschi
                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all group-hover:w-full"></span>
            </a>
            <a class="text-sm font-bold text-secondary/70 hover:text-primary transition-all relative group"
                href="#contact">
                Bog'lanish
                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all group-hover:w-full"></span>
            </a>
        </div>

        <div class="hidden lg:flex items-center gap-4">
            <a href="{{ route('login') }}"
                class="btn-modern btn-secondary !py-2.5 !px-6 rounded-xl text-sm uppercase tracking-widest">Kirish</a>
            <a href="{{ route('register') }}"
                class="btn-modern btn-primary !py-2.5 !px-8 rounded-xl text-sm uppercase tracking-widest shadow-xl shadow-primary/20">Boshlash</a>
        </div>

        <input class="hidden" id="mobile-menu-toggle" type="checkbox" />
        <label class="lg:hidden cursor-pointer p-2 bg-primary/5 rounded-full" for="mobile-menu-toggle">
            <span class="material-symbols-outlined text-primary text-3xl">menu</span>
        </label>

        <!-- Mobile Menu -->
        <div class="fixed top-0 right-0 w-full h-screen bg-secondary/95 backdrop-blur-xl flex-col p-8 pt-24 gap-6 shadow-2xl lg:hidden flex"
            id="mobile-menu">
            <!-- Close Button Inside Mobile Menu -->
            <label
                class="absolute top-8 right-8 cursor-pointer p-2 bg-white/10 rounded-full hover:bg-white/20 transition-colors"
                for="mobile-menu-toggle">
                <span class="material-symbols-outlined text-white text-3xl">close</span>
            </label>

            <div class="flex flex-col items-center justify-center h-full gap-8">
                <a class="mobile-link text-3xl font-bold text-white hover:text-primary/50 transition-colors"
                    href="#why">Nega?</a>
                <a class="mobile-link text-3xl font-bold text-white hover:text-primary/50 transition-colors"
                    href="#how-it-works">Qanday ishlaydi?</a>
                <a class="mobile-link text-3xl font-bold text-white hover:text-primary/50 transition-colors"
                    href="#about-me">Asoschi haqida</a>
                <a class="mobile-link text-3xl font-bold text-white hover:text-primary/50 transition-colors"
                    href="#contact">Bog'lanish</a>
                <div class="mobile-link flex flex-col gap-4 pt-10 border-t border-white/10 w-full max-w-xs">
                    <a href="{{ route('login') }}"
                        class="btn-modern !bg-white !text-secondary w-full !rounded-2xl !text-base">Kirish</a>
                    <a href="{{ route('register') }}"
                        class="btn-modern btn-primary w-full !rounded-2xl !text-base">Boshlash</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <div class="hero-bg"></div>

        <div class="section-padding relative z-10 pt-36 lg:pt-48 w-full">
            <div class="grid lg:grid-cols-12 gap-10 lg:gap-20 items-center">
                <!-- Text Content -->
                <div class="lg:col-span-7 hero-text space-y-6 lg:space-y-8 text-center lg:text-left">
                    <div class="gsap-reveal flex justify-center lg:justify-start">
                        <div
                            class="inline-flex items-center gap-2 lg:gap-3 px-4 py-2 lg:px-5 lg:py-2.5 bg-primary/5 rounded-full border border-primary/10 glass-card">
                            <span class="relative flex h-2 w-2">
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                            </span>
                            <span
                                class="text-[10px] lg:text-xs font-bold uppercase tracking-[0.2em] text-primary">Soddalashtirilgan
                                bilim</span>
                        </div>
                    </div>

                    <h1 class="text-[clamp(1.5rem,7vw,3rem)] lg:text-[clamp(1.8rem,8vw,4rem)] font-black leading-[1.1] lg:leading-[1] tracking-tighter text-secondary uppercase italic gsap-reveal"
                        id="hero-title">
                        Prezentatsiyalarni TUSHUN orqali mukammal biling.
                    </h1>

                    <p
                        class="text-base lg:text-xl text-secondary/60 leading-relaxed max-w-xl mx-auto lg:mx-0 font-medium gsap-reveal">
                        Murakkab slaydlarni tushunarli ma'lumotlarga aylantiring. AI tahlili bilan eng kerakli
                        xulosalarni
                        oling.
                    </p>

                    <div
                        class="flex flex-col sm:flex-row gap-4 lg:gap-5 pt-3 lg:pt-4 justify-center lg:justify-start gsap-reveal">
                        <a href="{{ route('register') }}"
                            class="btn-modern btn-primary text-base lg:text-xl px-8 lg:px-10 py-4 lg:py-5 group btn-magnetic">
                            <span
                                class="material-symbols-outlined group-hover:rotate-12 transition-transform">rocket_launch</span>
                            Hozir boshlash
                            <div class="absolute inset-0 shimmer opacity-0 group-hover:opacity-100 transition-opacity">
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Visual Content -->
                <div class="lg:col-span-5 relative mt-16 lg:mt-0 gsap-reveal-visual hidden lg:block">
                    <div class="relative z-10">
                        <div
                            class="glass-card rounded-[3rem] md:rounded-[4rem] p-4 border-white/40 shadow-2xl overflow-hidden group">
                            <img alt="AI Teaching"
                                class="w-full h-auto rounded-[2.5rem] md:rounded-[3.5rem] transition-transform duration-700 group-hover:scale-105"
                                src="{{ asset('images/teach.png') }}" />
                        </div>

                        <!-- Floating Stats Card - Hide on mobile -->
                        {{-- <div
                            class="absolute -bottom-10 -right-5 md:-right-10 glass-card p-6 md:p-8 rounded-[2rem] md:rounded-[2.5rem] shadow-2xl border-white/50 animate-float hidden md:block z-20">
                            <div class="flex items-center gap-4 md:gap-5">
                                <div
                                    class="w-12 h-12 md:w-14 md:h-14 bg-green-500/10 rounded-xl md:rounded-2xl flex items-center justify-center">
                                    <span
                                        class="material-symbols-outlined text-green-600 text-2xl md:text-3xl">speed</span>
                                </div>
                                <div>
                                    <p
                                        class="text-[10px] md:text-xs font-bold text-secondary/50 uppercase tracking-widest mb-1">
                                        Tahlil tezligi
                                    </p>
                                    <p class="text-xl md:text-2xl font-black text-secondary">30s / 100 slayd</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

        <!-- Wave Divider -->
        <div class="custom-shape-divider-bottom-1708250000">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="shape-fill"></path>
            </svg>
        </div>
    </header>

    <!-- Why Section -->
    <section class="relative py-32 overflow-hidden bg-accent/20" id="why">
        <div class="section-padding relative z-10">
            <div class="text-center space-y-6 mb-20 md:mb-32 gsap-reveal">
                <div
                    class="inline-block px-5 py-2 bg-primary/5 rounded-full border border-primary/10 text-primary text-xs font-black uppercase tracking-[0.3em]">
                    Imkoniyatlar</div>
                <h2 class="text-4xl md:text-7xl font-black text-secondary tracking-tighter uppercase italic">Nega aynan
                    TUSHUN?</h2>
                <p class="text-secondary/60 max-w-2xl mx-auto text-lg md:text-xl font-medium">Vaqtingizni bilimga
                    aylantiruvchi
                    zamonaviy
                    platforma.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Card 01 -->
                <div class="why-card flat-card p-8 md:p-12 group relative">
                    <div
                        class="absolute top-8 right-10 text-8xl font-black text-primary/5 group-hover:text-primary/10 transition-colors pointer-events-none">
                        01</div>
                    <div
                        class="w-16 h-16 md:w-20 md:h-20 bg-primary/5 rounded-[1.5rem] md:rounded-[2rem] flex items-center justify-center mb-8 group-hover:bg-primary group-hover:scale-110 transition-all duration-700 group-hover:rotate-6">
                        <span
                            class="material-symbols-outlined text-primary text-3xl md:text-4xl group-hover:text-white transition-colors">analytics</span>
                    </div>
                    <h3
                        class="text-2xl md:text-3xl font-black mb-6 text-secondary tracking-tight group-hover:text-primary transition-colors">
                        Prezentatsiya Tahlili</h3>
                    <p class="text-secondary/60 leading-relaxed text-base md:text-lg font-medium">Sun'iy intellekt
                        prezentatsiyani
                        to'liq
                        o'rganib, eng muhim nuqtalarni ajratib beradi.</p>
                </div>

                <!-- Card 02 -->
                <div class="why-card flat-card p-8 md:p-12 group relative">
                    <div
                        class="absolute top-8 right-10 text-8xl font-black text-primary/5 group-hover:text-primary/10 transition-colors pointer-events-none">
                        02</div>
                    <div
                        class="w-16 h-16 md:w-20 md:h-20 bg-primary/5 rounded-[1.5rem] md:rounded-[2rem] flex items-center justify-center mb-8 group-hover:bg-primary group-hover:scale-110 transition-all duration-700 group-hover:-rotate-6">
                        <span
                            class="material-symbols-outlined text-primary text-3xl md:text-4xl group-hover:text-white transition-colors">lightbulb</span>
                    </div>
                    <h3
                        class="text-2xl md:text-3xl font-black mb-6 text-secondary tracking-tight group-hover:text-primary transition-colors">
                        Tayanch Iboralar</h3>
                    <p class="text-secondary/60 leading-relaxed text-base md:text-lg font-medium">Murakkab terminlar va
                        tushunchalar
                        endi oddiy
                        tilda. Har bir slaydning mag'zini chaqing.</p>
                </div>

                <!-- Card 03 -->
                <div class="why-card flat-card p-8 md:p-12 group relative">
                    <div
                        class="absolute top-8 right-10 text-8xl font-black text-primary/5 group-hover:text-primary/10 transition-colors pointer-events-none">
                        03</div>
                    <div
                        class="w-16 h-16 md:w-20 md:h-20 bg-primary/5 rounded-[1.5rem] md:rounded-[2rem] flex items-center justify-center mb-8 group-hover:bg-primary group-hover:scale-110 transition-all duration-700 group-hover:rotate-12">
                        <span
                            class="material-symbols-outlined text-primary text-3xl md:text-4xl group-hover:text-white transition-colors">history_edu</span>
                    </div>
                    <h3
                        class="text-2xl md:text-3xl font-black mb-6 text-secondary tracking-tight group-hover:text-primary transition-colors">
                        Tezkor Konspekt</h3>
                    <p class="text-secondary/60 leading-relaxed text-base md:text-lg font-medium">Soatlab o'qish shart
                        emas. Bir
                        necha sahifada
                        butun mavzuni qamrab oluvchi konspekt oling.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How it works Section (Horizontal Scroll on Desktop, Vertical on Mobile) -->
    <section id="how-it-works" class="relative overflow-hidden bg-secondary">
        <div class="horizontal-scroll-wrapper flex items-center overflow-hidden">
            <div class="horizontal-scroll-track flex flex-col lg:flex-row min-h-[100svh] lg:h-screen items-center will-change-transform"
                id="horizontal-track">

                <!-- Panel 0: Intro -->
                <div
                    class="horizontal-panel w-full lg:w-screen min-h-[100svh] lg:h-screen flex-shrink-0 flex items-center justify-center relative p-10 lg:p-20 bg-white">
                    <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-10 lg:gap-20 items-center relative z-10">
                        <div class="space-y-8 text-center lg:text-left">
                            <div
                                class="inline-block px-5 py-2 bg-primary/5 rounded-full border border-primary/10 text-primary text-xs font-black uppercase tracking-[0.3em]">
                                Metodologiya</div>
                            <h2
                                class="text-5xl md:text-7xl lg:text-9xl font-black text-secondary tracking-tighter uppercase italic leading-none">
                                3 ta oddiy qadam.</h2>
                            <p class="text-xl md:text-2xl text-secondary/60 font-medium max-w-md mx-auto lg:mx-0">
                                Murakkab
                                mavzularni o'zlashtirish hech qachon bunchalik oson bo'lmagan.</p>
                        </div>
                        <div class="relative group hidden lg:block">
                            <div class="glass-card rounded-[4rem] overflow-hidden border-white/50 shadow-2xl p-4">
                                <img alt="Process" class="w-full h-auto rounded-[3rem]"
                                    src="{{ asset('images/online_test.png') }}" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Panel 1: Step 1 -->
                <div
                    class="horizontal-panel w-full lg:w-screen min-h-[100svh] lg:h-screen flex-shrink-0 flex items-center justify-center relative p-10 lg:p-20 bg-accent/30">
                    <div
                        class="absolute top-10 left-10 text-[15rem] md:text-[30rem] font-black text-primary/[0.05] select-none pointer-events-none">
                        01</div>
                    <div class="max-w-4xl mx-auto text-center space-y-10 relative z-10">
                        <div
                            class="w-24 h-24 md:w-32 md:h-32 bg-primary text-white rounded-[2rem] md:rounded-[2.5rem] flex items-center justify-center mx-auto shadow-2xl shadow-primary/40 rotate-3">
                            <span class="material-symbols-outlined text-5xl md:text-6xl">upload_file</span>
                        </div>
                        <h3 class="text-4xl md:text-8xl font-black text-secondary tracking-tighter uppercase italic">
                            Materialni yuklang</h3>
                        <p class="text-xl md:text-3xl text-secondary/60 font-medium max-w-2xl mx-auto">PDF yoki PPTX
                            formatidagi prezentatsiyani bir necha soniyada platformaga joylashtiring.</p>
                    </div>
                </div>

                <!-- Panel 2: Step 2 -->
                <div
                    class="horizontal-panel w-full lg:w-screen min-h-[100svh] lg:h-screen flex-shrink-0 flex items-center justify-center relative p-10 lg:p-20 bg-white">
                    <div
                        class="absolute top-10 left-10 text-[15rem] md:text-[30rem] font-black text-primary/[0.05] select-none pointer-events-none">
                        02</div>
                    <div class="max-w-4xl mx-auto text-center space-y-10 relative z-10">
                        <div
                            class="w-24 h-24 md:w-32 md:h-32 bg-primary text-white rounded-[2rem] md:rounded-[2.5rem] flex items-center justify-center mx-auto shadow-2xl shadow-primary/40 -rotate-6">
                            <span class="material-symbols-outlined text-5xl md:text-6xl">psychology</span>
                        </div>
                        <h3 class="text-4xl md:text-8xl font-black text-secondary tracking-tighter uppercase italic">AI
                            Tahlili</h3>
                        <p class="text-xl md:text-3xl text-secondary/60 font-medium max-w-2xl mx-auto">Bizning aqlli
                            algoritmimiz ma'lumotlarni o'qiydi, saralaydi va eng muhimlarini belgilab oladi.</p>
                    </div>
                </div>

                <!-- Panel 3: Step 3 -->
                <div
                    class="horizontal-panel w-full lg:w-screen min-h-[100svh] lg:h-screen flex-shrink-0 flex items-center justify-center relative p-10 lg:p-20 bg-secondary">
                    <div
                        class="absolute top-10 left-10 text-[15rem] md:text-[30rem] font-black text-white/[0.03] select-none pointer-events-none">
                        03</div>
                    <div class="max-w-4xl mx-auto text-center space-y-10 relative z-10">
                        <div
                            class="w-24 h-24 md:w-32 md:h-32 bg-white text-primary rounded-[2rem] md:rounded-[2.5rem] flex items-center justify-center mx-auto shadow-2xl rotate-12">
                            <span class="material-symbols-outlined text-5xl md:text-6xl">auto_stories</span>
                        </div>
                        <h3 class="text-4xl md:text-8xl font-black text-white tracking-tighter uppercase italic">
                            Bilimni oling</h3>
                        <p class="text-xl md:text-3xl text-white/70 font-medium max-w-2xl mx-auto">Tayyor konspekt va
                            tushuntirishlarni o'qib, mavzuni 10 barobar tezroq o'zlashtiring.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-32 relative overflow-hidden bg-secondary min-h-[80vh] flex items-center" id="about-me">
        <div
            class="section-padding relative z-10 w-full max-w-5xl mx-auto flex flex-col items-center justify-center text-center">
            <div
                class="inline-block px-5 py-2 bg-white/5 rounded-full border border-white/10 text-white/50 text-xs font-black uppercase tracking-[0.3em] mb-12 gsap-reveal">
                Asoschi va Maqsad
            </div>

            <h2 class="text-[clamp(1.5rem,4vw,3rem)] text-white font-light leading-[1.4] mb-16 scroll-split-text italic"
                id="about-desc">
                "Prezentatsiyalar murakkab bo'lishi mumkin, lekin ularni tushunish oson bo'lishi kerak. Biz bilim
                olishdagi to'siqlarni AI yordamida olib tashlaymiz."
            </h2>

            <div class="flex flex-col md:flex-row items-center gap-8 gsap-reveal">
                <div
                    class="w-24 h-24 md:w-32 md:h-32 rounded-full overflow-hidden border-4 border-white/10 shadow-2xl relative group">
                    <img alt="Founder"
                        class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700 scale-110 group-hover:scale-100"
                        src="{{ asset('images/me.jpg') }}" />
                </div>
                <div class="text-center md:text-left">
                    <p class="text-white font-black text-2xl tracking-tighter uppercase italic">Muhammadaziz Ismoilov
                    </p>
                    <p class="text-white/50 text-xs font-bold uppercase tracking-widest mb-4">Loyiha Asoschisi</p>
                    <div class="flex gap-4 justify-center md:justify-start">
                        <a href="https://t.me/ismlvmz" target="_blank"
                            class="w-12 h-12 rounded-full bg-white text-primary flex items-center justify-center hover:scale-110 transition-transform btn-magnetic">
                            <span class="material-symbols-outlined text-xl">send</span>
                        </a>
                        <a href="mailto:ismlvmz@yandex.com"
                            class="w-12 h-12 rounded-full border border-white/20 text-white flex items-center justify-center hover:bg-white/10 transition-colors btn-magnetic">
                            <span class="material-symbols-outlined text-xl">mail</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section-padding relative overflow-hidden bg-accent/10" id="contact">
        <div class="max-w-4xl mx-auto text-center space-y-16">
            <div class="space-y-8 gsap-reveal-contact">
                <div
                    class="inline-block px-5 py-2 bg-primary/5 rounded-full border border-primary/10 text-primary text-xs font-black uppercase tracking-[0.3em]">
                    Bog'lanish</div>
                <h2
                    class="text-5xl md:text-8xl font-black text-secondary tracking-tighter uppercase italic leading-[0.85]">
                    Sizdan xabar kutamiz</h2>
                <p class="text-lg md:text-xl text-secondary/60 max-w-2xl mx-auto font-medium leading-relaxed">Savol va
                    takliflar
                    uchun biz doimo ochiqmiz. Birgalikda platformani yanada yaxshilaymiz.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 gsap-reveal-contact">
                <a href="mailto:apptushun@gmail.com"
                    class="glass-card p-8 md:p-12 rounded-[2rem] md:rounded-[2.5rem] group hover:bg-primary transition-all duration-700 relative overflow-hidden flex flex-col items-center gap-6">
                    <div class="absolute top-0 right-0 p-10 opacity-5 group-hover:opacity-10 transition-opacity">
                        <span class="material-symbols-outlined text-[10rem]">mail</span>
                    </div>
                    <div
                        class="w-16 h-16 md:w-20 md:h-20 bg-primary/5 rounded-2xl flex items-center justify-center group-hover:bg-white/20 transition-all duration-700 relative z-10">
                        <span
                            class="material-symbols-outlined text-primary text-3xl md:text-4xl group-hover:text-white">mail</span>
                    </div>
                    <div class="relative z-10">
                        <p
                            class="text-xs font-black text-secondary/40 uppercase tracking-[0.3em] mb-2 group-hover:text-white/60">
                            Email Manzil</p>
                        <p class="text-xl md:text-2xl font-black text-secondary group-hover:text-white tracking-tight">
                            apptushun@gmail.com</p>
                    </div>
                </a>

                <a href="https://t.me/apptushun" target="_blank"
                    class="glass-card p-8 md:p-12 rounded-[2rem] md:rounded-[2.5rem] group hover:bg-[#0088cc] transition-all duration-700 relative overflow-hidden flex flex-col items-center gap-6">
                    <div class="absolute top-0 right-0 p-10 opacity-5 group-hover:opacity-10 transition-opacity">
                        <span class="material-symbols-outlined text-[10rem]">send</span>
                    </div>
                    <div
                        class="w-16 h-16 md:w-20 md:h-20 bg-[#0088cc]/5 rounded-2xl flex items-center justify-center group-hover:bg-white/20 transition-all duration-700 relative z-10">
                        <span
                            class="material-symbols-outlined text-[#0088cc] text-3xl md:text-4xl group-hover:text-white">send</span>
                    </div>
                    <div class="relative z-10">
                        <p
                            class="text-xs font-black text-secondary/40 uppercase tracking-[0.3em] mb-2 group-hover:text-white/60">
                            Hamjamiyat</p>
                        <p class="text-xl md:text-2xl font-black text-secondary group-hover:text-white tracking-tight">
                            TUSHUN
                            Hamjamiyati</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer
        class="bg-secondary text-white pt-24 pb-10 relative overflow-hidden rounded-t-[3rem] md:rounded-t-[4rem] mt-10">
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 mb-20">
                <div class="lg:col-span-5 space-y-8">
                    <a href="#" class="flex items-center gap-4 group">
                        <img src="{{ asset('images/logo_without_bg.png') }}" alt="Tushun"
                            class="w-12 h-12 brightness-0 invert">
                        <span class="text-4xl font-black tracking-tighter text-white uppercase italic">TUSHUN</span>
                    </a>
                    <p class="text-white/50 font-medium leading-relaxed max-w-sm">
                        Prezentatsiyalarni tushunishning eng aqlli va tezkor yo'li. AI yordamida bilim olishni
                        soddalashtiramiz.
                    </p>
                </div>

                <div class="lg:col-span-7 grid grid-cols-2 md:grid-cols-3 gap-10">
                    <div class="space-y-6">
                        <p class="text-xs font-black uppercase tracking-[0.3em] text-white/30">Platforma</p>
                        <ul class="space-y-4">
                            <li><a href="#why"
                                    class="text-white/70 hover:text-white transition-colors font-bold text-sm">Nega
                                    biz?</a></li>
                            <li><a href="#how-it-works"
                                    class="text-white/70 hover:text-white transition-colors font-bold text-sm">Metodologiya</a>
                            </li>
                            <li><a href="{{ route('register') }}"
                                    class="text-white/70 hover:text-white transition-colors font-bold text-sm">Boshlash</a>
                            </li>
                        </ul>
                    </div>
                    <div class="space-y-6">
                        <p class="text-xs font-black uppercase tracking-[0.3em] text-white/30">Huquqiy</p>
                        <ul class="space-y-4">
                            <li><a href="{{ asset('docs/privacy.pdf') }}"
                                    class="text-white/70 hover:text-white transition-colors font-bold text-sm">Maxfiylik</a>
                            </li>
                            <li><a href="{{ asset('docs/terms.pdf') }}"
                                    class="text-white/70 hover:text-white transition-colors font-bold text-sm">Shartlar</a>
                            </li>
                        </ul>
                    </div>
                    <div class="space-y-6">
                        <p class="text-xs font-black uppercase tracking-[0.3em] text-white/30">Ijtimoiy</p>
                        <ul class="space-y-4">
                            <li><a href="https://t.me/apptushun"
                                    class="text-white/70 hover:text-white transition-colors font-bold text-sm">Telegram</a>
                            </li>
                            <li><a href="mailto:apptushun@gmail.com"
                                    class="text-white/70 hover:text-white transition-colors font-bold text-sm">Email</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Bottom Row -->
            <div
                class="w-full border-t border-white/10 pt-10 flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-white/30 text-[10px] font-bold uppercase tracking-[0.2em] text-center">© 2026 TUSHUN. M.
                    ISMOILOV
                    TOMONIDAN YARATILDI.</p>
                <div class="flex items-center gap-3 bg-white/5 px-6 py-3 rounded-full border border-white/10">
                    <span class="h-2 w-2 rounded-full bg-green-400 animate-pulse"></span>
                    <span class="text-[10px] uppercase font-black tracking-[0.2em] text-white/70">SYSTEM: ONLINE &
                        BETA</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top -->
    <button id="scroll-to-top"
        class="fixed bottom-10 right-10 w-16 h-16 bg-primary text-white rounded-3xl shadow-2xl flex items-center justify-center opacity-0 translate-y-10 pointer-events-none transition-all duration-500 z-50 hover:-translate-y-2 active:scale-90">
        <span class="material-symbols-outlined text-3xl">arrow_upward</span>
    </button>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            gsap.registerPlugin(ScrollTrigger);

            // 1. Initialize Lenis Smooth Scroll
            const lenis = new Lenis({
                duration: 1.2,
                easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
            });

            function raf(time) {
                lenis.raf(time);
                requestAnimationFrame(raf);
            }
            requestAnimationFrame(raf);

            lenis.on('scroll', ScrollTrigger.update);
            gsap.ticker.add((time) => {
                lenis.raf(time * 1000);
            });
            gsap.ticker.lagSmoothing(0);

            // 2. Mobile Menu Animation & Body Scroll Lock
            const menuToggle = document.getElementById('mobile-menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileLinks = gsap.utils.toArray('.mobile-link');

            const menuTl = gsap.timeline({
                paused: true
            });

            menuTl.fromTo(mobileLinks, {
                y: 30,
                opacity: 0
            }, {
                y: 0,
                opacity: 1,
                duration: 0.5,
                stagger: 0.1,
                ease: 'power2.out'
            });

            menuToggle.addEventListener('change', () => {
                if (menuToggle.checked) {
                    lenis.stop();
                    menuTl.timeScale(1).play();
                    document.body.style.overflow = 'hidden';
                } else {
                    lenis.start();
                    menuTl.timeScale(2).reverse();
                    document.body.style.overflow = '';
                }
            });

            mobileLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (menuToggle.checked) {
                        menuToggle.checked = false;
                        lenis.start();
                        menuTl.timeScale(2).reverse();
                        document.body.style.overflow = '';
                    }
                });
            });


            // 3. Navbar Scroll Effect
            const navbar = document.getElementById('navbar');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });


            // Scroll to top button
            const scrollBtn = document.getElementById('scroll-to-top');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 500) {
                    scrollBtn.classList.add('opacity-100', 'translate-y-0', 'pointer-events-auto');
                } else {
                    scrollBtn.classList.remove('opacity-100', 'translate-y-0', 'pointer-events-auto');
                }
            });

            document.getElementById('scroll-to-top').addEventListener('click', () => {
                lenis.scrollTo(0);
            });

            // 4. Initial Page Load Animations
            const tl = gsap.timeline();
            tl.to(".gsap-reveal", {
                opacity: 1,
                y: 0,
                duration: 1.5,
                stagger: 0.2,
                ease: "expo.out"
            }, "-=0.8");

            gsap.from(".gsap-reveal-visual", {
                opacity: 0,
                x: 100,
                duration: 2,
                delay: 0.5,
                ease: "expo.out"
            });

            gsap.utils.toArray('.why-card').forEach((card, i) => {
                gsap.from(card, {
                    scrollTrigger: {
                        trigger: card,
                        start: "top 90%",
                        toggleActions: "play none none reverse"
                    },
                    opacity: 0,
                    y: 50,
                    duration: 1,
                    delay: i * 0.1,
                    ease: "power3.out"
                });
            });

            const scrollSplitTexts = document.querySelectorAll('.scroll-split-text');
            scrollSplitTexts.forEach(el => {
                const text = el.innerText;
                const words = text.split(' ');
                el.innerHTML = words.map(word =>
                    `<span class="inline-block overflow-hidden"><span class="inline-block translate-y-full">${word}&nbsp;</span></span>`
                ).join('');

                gsap.to(el.querySelectorAll('span span'), {
                    scrollTrigger: {
                        trigger: el,
                        start: "top 80%",
                        toggleActions: "play none none reverse"
                    },
                    y: 0,
                    duration: 1,
                    stagger: 0.05,
                    ease: "power3.out"
                });
            });

            gsap.utils.toArray('.gsap-reveal-contact').forEach((el, i) => {
                gsap.from(el, {
                    scrollTrigger: {
                        trigger: el,
                        start: "top 90%",
                        toggleActions: "play none none reverse"
                    },
                    opacity: 0,
                    y: 50,
                    duration: 1.2,
                    delay: i * 0.2,
                    ease: "power4.out"
                });
            });


            // 5. Advanced Animations with MatchMedia for Responsiveness
            ScrollTrigger.matchMedia({

                // Desktop-only animations
                "(min-width: 1024px)": function() {

                    // -- Mouse Glow Effect
                    const cursorGlow = document.getElementById('cursor-glow');
                    window.addEventListener('mousemove', (e) => {
                        gsap.to(cursorGlow, {
                            left: e.clientX,
                            top: e.clientY,
                            duration: 0.5,
                            ease: 'power2.out'
                        });
                    });

                    // -- Magnetic Buttons
                    const magneticButtons = document.querySelectorAll('.btn-magnetic');
                    magneticButtons.forEach(btn => {
                        btn.addEventListener('mousemove', (e) => {
                            const rect = btn.getBoundingClientRect();
                            const x = e.clientX - rect.left - rect.width / 2;
                            const y = e.clientY - rect.top - rect.height / 2;
                            gsap.to(btn, {
                                x: x * 0.3,
                                y: y * 0.3,
                                duration: 0.5,
                                ease: 'power2.out'
                            });
                        });
                        btn.addEventListener('mouseleave', () => {
                            gsap.to(btn, {
                                x: 0,
                                y: 0,
                                duration: 0.5,
                                ease: 'elastic.out(1, 0.3)'
                            });
                        });
                    });

                    // -- Parallax Background Animation
                    const parallaxLayers = document.querySelectorAll('.parallax-layer');
                    // Scroll Parallax
                    parallaxLayers.forEach(layer => {
                        const speed = layer.getAttribute('data-speed');
                        gsap.to(layer, {
                            yPercent: -40 * speed,
                            ease: "none",
                            scrollTrigger: {
                                trigger: "body",
                                start: "top top",
                                end: "bottom bottom",
                                scrub: 1
                            }
                        });
                    });

                    // Mouse Move Parallax
                    window.addEventListener('mousemove', (e) => {
                        const {
                            clientX,
                            clientY
                        } = e;
                        const xPos = (clientX / window.innerWidth - 0.5) * 80;
                        const yPos = (clientY / window.innerHeight - 0.5) * 80;
                        parallaxLayers.forEach(layer => {
                            const speed = layer.getAttribute('data-speed');
                            gsap.to(layer, {
                                x: xPos * speed,
                                y: yPos * speed,
                                duration: 1.5,
                                ease: "power2.out",
                                overwrite: "auto"
                            });
                        });
                    });

                    // -- Horizontal Scroll Animation
                    const track = document.querySelector("#horizontal-track");
                    gsap.to(track, {
                        x: () => -(track.scrollWidth - window.innerWidth),
                        ease: "none",
                        scrollTrigger: {
                            trigger: "#how-it-works",
                            pin: true,
                            scrub: 1,
                            end: () => "+=" + (track.scrollWidth - window.innerWidth),
                            invalidateOnRefresh: true,
                        }
                    });

                },

                // Mobile-only adjustments
                "(max-width: 1023px)": function() {
                    // Disable heavy parallax on mobile, maybe just keep one layer
                    const parallaxLayers = document.querySelectorAll('.parallax-layer');
                    parallaxLayers.forEach(layer => {
                        const speed = layer.getAttribute('data-speed');
                        if (speed > 0.1) {
                            gsap.set(layer, {
                                display: 'none'
                            });
                        } else {
                            // Keep a very subtle scroll effect for the base layer
                            gsap.to(layer, {
                                yPercent: -10 * speed,
                                ease: "none",
                                scrollTrigger: {
                                    trigger: "body",
                                    start: "top top",
                                    end: "bottom bottom",
                                    scrub: true
                                }
                            });
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
