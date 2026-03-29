<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Tushun - Prezentatsiyalarni oson tushuning</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link rel="shortcut icon" href="{{ secure_asset('images/favicon.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />

    <!-- GSAP va ScrollTrigger CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

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
                },
            },
        }
    </script>
    <style type="text/tailwindcss">
        @layer base {
            body {
                @apply font-sans antialiased bg-white text-secondary overflow-x-hidden;
            }
        }

        .flat-card {
            @apply border-2 border-primary/10 rounded-2xl transition-all duration-300;
        }

        .flat-card:hover {
            @apply border-primary/30 bg-accent transform -translate-y-2;
        }

        .btn-flat {
            @apply px-6 py-3 rounded-xl font-bold transition-all active:scale-95 text-center;
        }

        .section-padding {
            @apply py-12 md:py-20 px-6 max-w-7xl mx-auto;
        }

        #mobile-menu-toggle:checked~#mobile-menu {
            @apply flex;
        }

        /* Animatsiya uchun boshlang'ich holat (flicker oldini olish uchun) */
        .gsap-reveal {
            opacity: 0;
            visibility: hidden;
        }
    </style>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav id="navbar" class="fixed top-0 left-0 w-full z-50 bg-white/80 backdrop-blur-md border-b-2 border-primary/5">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="flex items-center gap-3 logo-anim">
                <img src="{{ secure_asset('images/logo.png') }}" alt="Tushun Logo" class="w-10 h-10">
                <span class="text-2xl font-extrabold tracking-tight text-primary uppercase">TUSHUN</span>
            </div>
            <div class="hidden lg:flex items-center gap-10 nav-links">
                <a class="text-sm font-bold text-secondary/70 hover:text-primary transition-colors"
                    href="#why">Nega?</a>
                <a class="text-sm font-bold text-secondary/70 hover:text-primary transition-colors"
                    href="#how-it-works">Qanday ishlaydi?</a>
                <a class="text-sm font-bold text-secondary/70 hover:text-primary transition-colors"
                    href="#about-me">Asoschi</a>
                <a class="text-sm font-bold text-secondary/70 hover:text-primary transition-colors"
                    href="#contact">Bog'lanish</a>
            </div>
            <div class="hidden lg:flex items-center gap-4 auth-btns">
                <a href="{{ route('login') }}"
                    class="btn-flat text-primary border-2 border-primary/10 hover:bg-accent">Kirish</a>
                <a href="{{ route('register') }}"
                    class="btn-flat bg-primary text-white hover:bg-secondary shadow-lg shadow-primary/20">Boshlash</a>
            </div>

            <input class="hidden" id="mobile-menu-toggle" type="checkbox" />
            <label class="lg:hidden cursor-pointer p-2" for="mobile-menu-toggle">
                <span class="material-symbols-outlined text-primary text-3xl">menu</span>
            </label>

            <!-- Mobile Menu -->
            <div class="hidden absolute top-20 left-0 w-full bg-white border-b-2 border-primary/10 flex-col p-6 gap-6 shadow-xl lg:hidden"
                id="mobile-menu">
                <a class="text-lg font-bold text-secondary" href="#why">Nega?</a>
                <a class="text-lg font-bold text-secondary" href="#how-it-works">Qanday ishlaydi?</a>
                <a class="text-lg font-bold text-secondary" href="#about-me">Asoschi haqida</a>
                <a class="text-lg font-bold text-secondary" href="#contact">Bog'lanish</a>
                <div class="flex flex-col gap-3 pt-4 border-t border-primary/10">
                    <a href="{{ route('login') }}"
                        class="btn-flat text-primary border-2 border-primary/10 w-full text-center">Kirish</a>
                    <a href="{{ route('register') }}"
                        class="btn-flat bg-primary text-white w-full text-center">Boshlash</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="section-padding grid lg:grid-cols-2 gap-12 items-center min-h-screen pt-32">
        <div class="hero-text space-y-6 md:space-y-8 text-center lg:text-left order-2 lg:order-1 gsap-reveal">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-primary/5 rounded-full border border-primary/10">
                <span class="w-2 h-2 bg-primary rounded-full animate-pulse"></span>
                <span class="text-xs font-bold uppercase tracking-widest text-primary">Soddalashtirilgan bilim</span>
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-7xl font-extrabold leading-[1.1] text-secondary">
                Prezentatsiyalarni <span
                    class="text-primary underline decoration-primary/20 decoration-8 underline-offset-4">TUSHUN
                    orqali</span> mukammal tushunib oling.
            </h1>
            <p class="text-lg md:text-xl text-secondary/60 leading-relaxed max-w-xl mx-auto lg:mx-0">
                Murakkab slaydlarni tushunarli ma'lumotlarga aylantiring. Tushun slaydingizni tahlil qilib, eng kerakli
                xulosalarni taqdim etadi.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 pt-4 justify-center lg:justify-start">
                <a href="{{ route('register') }}"
                    class="btn-flat bg-primary text-white text-lg flex items-center justify-center gap-2 px-10 py-5 hover:scale-105 transition-transform duration-300 shadow-xl shadow-primary/30">
                    <span class="material-symbols-outlined">rocket_launch</span>
                    Prezentatsiyani tahlil qilish
                </a>
            </div>
        </div>
        <div class="hero-image relative order-1 lg:order-2 px-4 md:px-0 gsap-reveal">
            <div class="bg-accent rounded-[3rem] p-4 border-2 border-primary/5 shadow-2xl">
                <img alt="Student interacting with AI" class="w-full h-auto rounded-[2.5rem]"
                    src="{{ secure_asset('images/teach.png') }}" />
            </div>
            <!-- Dekorativ elementlar -->
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-primary/10 rounded-full blur-3xl -z-10 blob-anim"></div>
            <div
                class="absolute -bottom-10 -left-10 w-48 h-48 bg-primary/5 rounded-full blur-2xl -z-10 blob-anim-delay">
            </div>
        </div>
    </header>

    <!-- Why Section -->
    <section class="bg-accent/30 py-16 md:py-24 border-y border-primary/5" id="why">
        <div class="section-padding">
            <div class="why-header text-center space-y-4 mb-12 md:mb-20 gsap-reveal">
                <h2 class="text-3xl md:text-4xl font-extrabold text-secondary">Nega aynan TUSHUN?</h2>
                <div class="h-1.5 w-24 bg-primary mx-auto rounded-full"></div>
                <p class="text-secondary/60 max-w-2xl mx-auto">Talaba sifatida vaqtimiz eng qimmatli resurs ekanini
                    bilaman. TUSHUN — bu sizning vaqtingizni bilimga aylantiruvchi ko'prikdir.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                <div class="why-card flat-card bg-white p-8 gsap-reveal">
                    <div class="w-16 h-16 bg-primary/5 rounded-2xl flex items-center justify-center mb-6 card-icon">
                        <span class="material-symbols-outlined text-primary text-3xl">analytics</span>
                    </div>
                    <h3 class="text-xl font-extrabold mb-4 text-[#122E51]">Prezentatsiya Tahlili</h3>
                    <p class="text-secondary/60 leading-relaxed">Prezentatsiyani chuqur o'rganib, undagi asosiy mazmunni
                        sizga taqdim etamiz.</p>
                </div>

                <div class="why-card flat-card bg-white p-8 gsap-reveal">
                    <div class="w-16 h-16 bg-primary/5 rounded-2xl flex items-center justify-center mb-6 card-icon">
                        <span class="material-symbols-outlined text-primary text-3xl">lightbulb</span>
                    </div>
                    <h3 class="text-xl font-extrabold mb-4 text-[#122E51]">Tayanch Iboralar</h3>
                    <p class="text-secondary/60 leading-relaxed">Mavzuning eng murakkab va tushunilishi qiyin qismlarini
                        sodda tilda izohlaymiz.</p>
                </div>

                <div class="why-card flat-card bg-white p-8 gsap-reveal">
                    <div class="w-16 h-16 bg-primary/5 rounded-2xl flex items-center justify-center mb-6 card-icon">
                        <span class="material-symbols-outlined text-primary text-3xl">history_edu</span>
                    </div>
                    <h3 class="text-xl font-extrabold mb-4 text-[#122E51]">Tezkor Konspekt</h3>
                    <p class="text-secondary/60 leading-relaxed">Uzun taqdimotlarni bir necha daqiqada o'qib chiqish
                        uchun qisqa xulosalarga aylantiramiz.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How it works Section -->
    <section class="section-padding overflow-hidden" id="how-it-works">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 md:gap-20 items-center">
            <div class="how-image relative order-2 lg:order-1 gsap-reveal">
                <div
                    class="aspect-square bg-primary/5 rounded-[40px] flex items-center justify-center overflow-hidden border-2 border-primary/10 shadow-inner">
                    <img alt="Process illustration" class="w-full h-full object-cover scale-110 opacity-90"
                        src="{{ secure_asset('images/online_test.png') }}" />
                </div>
                <div
                    class="absolute -z-10 w-full h-full border-4 border-dashed border-primary/10 -top-6 -left-6 rounded-[40px]">
                </div>
            </div>
            <div class="how-content space-y-10 md:space-y-12 order-1 lg:order-2">
                <div class="space-y-4 text-center lg:text-left gsap-reveal">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-[#122E51]">Qanday ishlaydi?</h2>
                    <p class="text-secondary/60">Murakkab mavzularni o'zlashtirish uchun bor-yog'i 3 ta qadam.</p>
                </div>
                <div class="space-y-8 md:space-y-10">
                    <div
                        class="step-item flex flex-col sm:flex-row gap-6 items-center sm:items-start text-center sm:text-left gsap-reveal">
                        <div
                            class="flex-none w-14 h-14 bg-primary text-white rounded-2xl flex items-center justify-center font-bold text-2xl shadow-xl shadow-primary/20">
                            1</div>
                        <div>
                            <h4 class="text-xl font-bold mb-2 text-[#122E51]">Materialni yuklang</h4>
                            <p class="text-secondary/60">O'zingizga tushunarsiz bo'lgan istalgan PDF yoki PPTX
                                formatidagi faylni tizimga joylang.</p>
                        </div>
                    </div>

                    <div
                        class="step-item flex flex-col sm:flex-row gap-6 items-center sm:items-start text-center sm:text-left gsap-reveal">
                        <div
                            class="flex-none w-14 h-14 bg-primary text-white rounded-2xl flex items-center justify-center font-bold text-2xl shadow-xl shadow-primary/20">
                            2</div>
                        <div>
                            <h4 class="text-xl font-bold mb-2 text-[#122E51]">Ma'lumotlarni qayta ishlash</h4>
                            <p class="text-secondary/60">TUSHUN slaydlar mazmunini o'qib chiqadi va tushunishingiz
                                uchun ularni tartiblaydi.</p>
                        </div>
                    </div>

                    <div
                        class="step-item flex flex-col sm:flex-row gap-6 items-center sm:items-start text-center sm:text-left gsap-reveal">
                        <div
                            class="flex-none w-14 h-14 bg-primary text-white rounded-2xl flex items-center justify-center font-bold text-2xl shadow-xl shadow-primary/20">
                            3</div>
                        <div>
                            <h4 class="text-xl font-bold mb-2 text-[#122E51]">Bilimni o'zlashtiring</h4>
                            <p class="text-secondary/60">Soddalashtirilgan konspekt va tushuntirishlarni o'qib, mavzuni
                                mukammal darajada tushunib oling.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="bg-secondary text-white py-16 md:py-24 overflow-hidden" id="about-me">
        <div class="section-padding">
            <div
                class="about-container bg-primary/20 rounded-[30px] md:rounded-[40px] p-8 lg:p-20 border border-white/10 flex flex-col items-center gap-10 md:gap-16 gsap-reveal">
                <div
                    class="about-image w-48 h-48 md:w-64 md:h-64 lg:w-80 lg:h-80 rounded-[30px] md:rounded-[40px] overflow-hidden flex-none border-4 border-white/10">
                    <img alt="Founder Muhammadaziz" class="w-full h-full object-cover"
                        src="{{ secure_asset('images/me.jpg') }}" />
                </div>
                <div class="space-y-6 md:space-y-8 text-center max-w-3xl">
                    <div class="about-text-content">
                        <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold mb-4">Loyiha haqida va Men</h2>
                        <p class="text-xl text-white/70 font-medium">Asoschi: Muhammadaziz</p>
                    </div>
                    <p class="about-desc text-base md:text-lg text-white/60 leading-relaxed">
                        Salom! Men ismim Muhammadaziz, TUSHUN platformasining asoschisiman. Taqdimotlar qiyin bo'lishi
                        mumkin, lekin ularni tushunish oson bo'lishi kerak. Biz murakkab slaydlar va talaba o'rtasidagi
                        to'siqni olib tashlaymiz.
                    </p>
                    <div class="about-links flex flex-wrap gap-4 justify-center">
                        <a class="btn-flat bg-white text-primary flex items-center justify-center gap-2 hover:bg-accent"
                            href="https://t.me/ismlvmz" target="_blank">
                            <span class="material-symbols-outlined">send</span> Telegram
                        </a>
                        <a class="btn-flat border-2 border-white/20 hover:bg-white/10 flex items-center justify-center gap-2"
                            href="mailto:ismlvmz@yandex.com">
                            <span class="material-symbols-outlined">mail</span> Email
                        </a>
                        <a class="btn-flat border-2 border-white/20 hover:bg-white/10 flex items-center justify-center gap-2"
                            href="tel:+998911560910">
                            <span class="material-symbols-outlined">call</span> Telefon
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section-padding text-center" id="contact">
        <div class="max-w-3xl mx-auto space-y-10 md:space-y-12">
            <h2 class="contact-title text-4xl md:text-5xl font-extrabold gsap-reveal text-secondary">Biz bilan
                bog'laning</h2>
            <p class="contact-desc text-lg md:text-xl text-secondary/60 gsap-reveal">Savollaringiz yoki takliflaringiz
                bormi? Biz doim muloqotga tayyormiz.</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <a href="mailto:apptushun@gmail.com" target="_blank"
                    class="contact-card flat-card p-8 flex flex-col items-center gap-4 hover:bg-primary/5 gsap-reveal">
                    <span class="material-symbols-outlined text-primary text-4xl">mail</span>
                    <p class="font-bold text-[#122E51]">apptushun@gmail.com</p>
                </a>
                <a href="https://t.me/apptushun" target="_blank"
                    class="contact-card flat-card p-8 flex flex-col items-center gap-4 hover:bg-primary/5 gsap-reveal">
                    <span class="material-symbols-outlined text-primary text-4xl">send</span>
                    <p class="font-bold text-[#122E51]">Telegram kanal</p>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-accent/50 border-t-2 border-primary/5 py-12">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-8">
            <div class="flex items-center gap-3">
                <img src="{{ secure_asset('images/logo.png') }}" alt="Tushun" class="w-8 h-8">
                <span class="text-xl font-bold tracking-tight text-[#122E51]">TUSHUN</span>
            </div>
            <div class="flex flex-col items-center gap-1">
                <p class="text-secondary/60 text-sm">© 2026 TUSHUN. Muhammadaziz tomonidan yaratilgan.</p>
                <div class="flex items-center gap-2 opacity-50">
                    <span class="h-1.5 w-1.5 rounded-full bg-green-500 animate-pulse"></span>
                    <span class="text-[10px] uppercase font-bold tracking-widest">Beta Versiya</span>
                </div>
            </div>
            <div class="flex gap-6">
                <a class="text-secondary/60 hover:text-primary transition-colors text-sm font-medium underline-offset-4 hover:underline"
                    href="{{ secure_asset('docs/privacy.pdf') }}" target="_blank">Maxfiylik</a>
                <a class="text-secondary/60 hover:text-primary transition-colors text-sm font-medium underline-offset-4 hover:underline"
                    href="{{ secure_asset('docs/terms.pdf') }}" target="_blank">Shartlar</a>
            </div>
        </div>
    </footer>

    <!-- GSAP ANIMATSIYA SKRIPTI -->
    <script>
        // Plaginni ro'yxatdan o'tkazish
        gsap.registerPlugin(ScrollTrigger);

        // Sahifa yuklanganda bajariladigan animatsiyalar
        window.addEventListener('load', () => {
            const tl = gsap.timeline();

            // 1. Navbar animatsiyasi
            tl.from("#navbar", {
                y: -100,
                opacity: 0,
                duration: 1,
                ease: "power4.out"
            });

            // 2. Hero Text animatsiyasi
            tl.to(".hero-text", {
                visibility: "visible",
                opacity: 1,
                y: 0,
                duration: 1,
                ease: "power4.out"
            }, "-=0.5");

            // 3. Hero Image animatsiyasi
            tl.to(".hero-image", {
                visibility: "visible",
                opacity: 1,
                x: 0,
                scale: 1,
                duration: 1.2,
                ease: "elastic.out(1, 0.7)"
            }, "-=0.8");

            // Bloblarni suzib yurish effekti
            gsap.to(".blob-anim", {
                y: 30,
                duration: 3,
                repeat: -1,
                yoyo: true,
                ease: "sine.inOut"
            });
            gsap.to(".blob-anim-delay", {
                y: -30,
                duration: 4,
                repeat: -1,
                yoyo: true,
                ease: "sine.inOut",
                delay: 1
            });
        });

        // SKROLL ANIMATSIYALARI

        // Why Section: Kartochkalarni navbatma-navbat chiqarish
        gsap.to(".why-header", {
            scrollTrigger: {
                trigger: "#why",
                start: "top 80%"
            },
            visibility: "visible",
            opacity: 1,
            y: 0,
            duration: 1
        });

        gsap.to(".why-card", {
            scrollTrigger: {
                trigger: ".why-card",
                start: "top 85%"
            },
            visibility: "visible",
            opacity: 1,
            y: 0,
            stagger: 0.2,
            duration: 0.8,
            ease: "back.out(1.7)"
        });

        // How it works Section
        gsap.to(".how-image", {
            scrollTrigger: {
                trigger: ".how-image",
                start: "top 75%",
                scrub: 1
            },
            visibility: "visible",
            opacity: 1,
            scale: 1,
            rotate: 0
        });

        gsap.to(".how-content .gsap-reveal", {
            scrollTrigger: {
                trigger: ".how-content",
                start: "top 80%"
            },
            visibility: "visible",
            opacity: 1,
            x: 0,
            stagger: 0.2,
            duration: 1,
            ease: "power2.out"
        });

        // About Me Section
        gsap.to(".about-container", {
            scrollTrigger: {
                trigger: "#about-me",
                start: "top 70%"
            },
            visibility: "visible",
            opacity: 1,
            scale: 1,
            duration: 1.2,
            ease: "power4.out"
        });

        gsap.from(".about-image", {
            scrollTrigger: {
                trigger: ".about-container",
                start: "top 60%"
            },
            rotate: -15,
            scale: 0.8,
            duration: 1.5,
            ease: "elastic.out(1, 0.5)"
        });

        // Contact Section
        gsap.to(".contact-card", {
            scrollTrigger: {
                trigger: "#contact",
                start: "top 80%"
            },
            visibility: "visible",
            opacity: 1,
            y: 0,
            stagger: 0.2,
            duration: 0.8,
            ease: "power2.out"
        });

        gsap.to(".contact-title, .contact-desc, .cta-btn", {
            scrollTrigger: {
                trigger: "#contact",
                start: "top 85%"
            },
            visibility: "visible",
            opacity: 1,
            y: 0,
            stagger: 0.1,
            duration: 1
        });
    </script>
</body>

</html>
