<!DOCTYPE html>
<html lang="uz" class="bg-white">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kabinet | TUSHUN</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap"
        rel="stylesheet" />
    <link rel="shortcut icon" href="{{ secure_asset('images/logo_without_bg.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        "primary": "#0B3961",
                        "primary-hover": "#082a4a",
                        "accent-bg": "#F8FAFC"
                    },
                    fontFamily: {
                        "sans": ["'Plus Jakarta Sans'", "sans-serif"]
                    }
                }
            }
        }
    </script>

    <style>
        :root {
            --primary: #0B3961;
            --primary-hover: #082a4a;
        }

        /* ===== SCROLLBAR ===== */
        #user_library {
            height: 65vh;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
        }

        .scrollbar-custom::-webkit-scrollbar {
            width: 4px;
        }

        .scrollbar-custom::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }

        .scrollbar-custom::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .scrollbar-custom::-webkit-scrollbar-thumb:hover {
            background: #0B3961;
        }

        /* ===== TYPING CURSOR ===== */
        #selectedText::after {
            content: '|';
            animation: blink 1s infinite;
            margin-left: 2px;
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }
        }

        /* ===== ANIMATIONS ===== */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-10px) rotate(-2deg);
            }
        }

        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        @keyframes samsung-ai {

            0%,
            100% {
                transform: scale(1) rotate(0deg);
                box-shadow: 0 0 20px rgba(11, 57, 97, 0.4);
            }

            50% {
                transform: scale(1.15) rotate(15deg);
                box-shadow: 0 0 35px rgba(11, 57, 97, 0.7);
            }
        }

        .animate-ai-pulse {
            animation: samsung-ai 2s ease-in-out infinite;
        }

        @keyframes pulse-ring {
            0% {
                transform: scale(0.8);
                opacity: 1;
            }

            100% {
                transform: scale(2);
                opacity: 0;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeinup {
            animation: fadeInUp 0.4s ease forwards;
        }

        @keyframes shimmer {
            0% {
                background-position: -200% center;
            }

            100% {
                background-position: 200% center;
            }
        }

        @keyframes spin-slow {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .animate-spin-slow {
            animation: spin-slow 8s linear infinite;
        }

        @keyframes dash-move {
            from {
                stroke-dashoffset: 100;
            }

            to {
                stroke-dashoffset: 0;
            }
        }

        /* ===== UPLOAD ZONE THEMES ===== */

        /* --- V0: BRIEF — Sodda va toza havorang --- */
        #upload-zone-v0 {
            background: linear-gradient(135deg, #f0f7ff 0%, #e0f2fe 100%);
            border: 2px dashed #3b82f6;
            border-radius: 2rem;
            transition: all 0.3s ease;
        }

        #upload-zone-v0:hover,
        #upload-zone-v0.drag-active {
            border-color: #2563eb;
            background: linear-gradient(135deg, #e0f2fe 0%, #dbeafe 100%);
            box-shadow: 0 8px 32px rgba(59, 130, 246, 0.12);
        }

        .v0-badge {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 3px 10px;
            border-radius: 100px;
        }

        .v0-icon-wrap {
            width: 72px;
            height: 72px;
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
            border-radius: 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 16px rgba(59, 130, 246, 0.15);
        }

        .v0-btn {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            border: none;
            border-radius: 14px;
            font-weight: 700;
            padding: 12px 32px;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 4px 16px rgba(37, 99, 235, 0.22);
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .v0-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.32);
        }

        /* --- V1: SWIFT — Tezkor, firuza/cyan energiyasi --- */
        #upload-zone-v1 {
            background: #ffffff;
            border: 1.5px solid #06b6d4;
            border-radius: 1.5rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        #upload-zone-v1::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 50% 0%, rgba(6, 182, 212, 0.08) 0%, transparent 75%);
            pointer-events: none;
        }

        #upload-zone-v1:hover,
        #upload-zone-v1.drag-active {
            border-color: #0891b2;
            box-shadow: 0 0 30px rgba(6, 182, 212, 0.15);
        }

        .v1-grid-bg {
            position: absolute;
            inset: 0;
            pointer-events: none;
            opacity: 0.03;
            background-image: linear-gradient(#06b6d4 5px, transparent 15px), linear-gradient(90deg, #06b6d4 3px, transparent 10px);
            background-size: 24px 24px;
        }

        .v1-badge {
            background: #06b6d4;
            color: white;
            font-size: 10px;
            font-weight: 900;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 3px 10px;
            border-radius: 100px;
        }

        .v1-icon-wrap {
            width: 80px;
            height: 80px;
            border: 2px solid rgba(6, 182, 212, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(6, 182, 212, 0.06);
            position: relative;
        }

        .v1-icon-wrap::after {
            content: '';
            position: absolute;
            inset: -8px;
            border-radius: 50%;
            border: 1px solid rgba(6, 182, 212, 0.2);
            animation: pulse-ring 2s ease-out infinite;
        }

        .v1-btn {
            background: transparent;
            color: #0891b2;
            border: 1.5px solid #0891b2;
            border-radius: 12px;
            font-weight: 700;
            font-size: 14px;
            padding: 11px 28px;
            cursor: pointer;
            transition: all 0.2s;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .v1-btn:hover {
            background: #0891b2;
            color: white;
            box-shadow: 0 0 20px rgba(6, 182, 212, 0.3);
        }

        /* --- V2: PROLYZE — Brendning asosiy to'q ko'k rangi --- */
        #upload-zone-v2 {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 1.5rem;
            box-shadow: 0 4px 24px rgba(11, 57, 97, 0.08), 0 1px 4px rgba(0, 0, 0, 0.03);
            transition: all 0.3s ease;
        }

        #upload-zone-v2:hover,
        #upload-zone-v2.drag-active {
            border-color: #0B3961;
            box-shadow: 0 8px 32px rgba(11, 57, 97, 0.15);
        }

        .v2-badge {
            background: #f1f5f9;
            color: #0B3961;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 4px 12px;
            border-radius: 6px;
            border: 1px solid #cbd5e1;
        }

        .v2-header-bar {
            background: linear-gradient(135deg, #0B3961, #1e4d7b);
            border-radius: 1.25rem 1.25rem 0 0;
            padding: 16px 24px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .v2-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }

        .v2-metrics {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin: 16px 0;
        }

        .v2-metric-card {
            background: #F8FAFC;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 10px 14px;
            text-align: center;
        }

        .v2-btn {
            background: #0B3961;
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            font-size: 14px;
            padding: 12px 28px;
            cursor: pointer;
            transition: all 0.2s;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .v2-btn:hover {
            background: #082a4a;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(11, 57, 97, 0.22);
        }

        /* --- v2: BRAINRA — Premium aqlli indigo, "Thinking Model" --- */
        #upload-zone-v2 {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%);
            border: 1px solid rgba(99, 102, 241, 0.3);
            border-radius: 2rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        #upload-zone-v2::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 20% 30%, rgba(99, 102, 241, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(79, 70, 229, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        #upload-zone-v2:hover,
        #upload-zone-v2.drag-active {
            border-color: rgba(99, 102, 241, 0.6);
            box-shadow: 0 0 60px rgba(99, 102, 241, 0.12), inset 0 0 60px rgba(99, 102, 241, 0.03);
        }

        .v2-badge {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: white;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 4px 12px;
            border-radius: 100px;
            box-shadow: 0 2px 12px rgba(99, 102, 241, 0.35);
        }

        .v2-orbit {
            width: 100px;
            height: 100px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .v2-orbit-ring {
            position: absolute;
            inset: 0;
            border: 1px solid rgba(99, 102, 241, 0.3);
            border-radius: 50%;
            border-top-color: rgba(99, 102, 241, 0.8);
        }

        .v2-orbit-ring:nth-child(2) {
            inset: 12px;
            border-color: rgba(79, 70, 229, 0.2);
            border-top-color: rgba(79, 70, 229, 0.7);
            animation-duration: 5s;
            animation-direction: reverse;
        }

        .v2-core {
            width: 52px;
            height: 52px;
            z-index: 1;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.25), rgba(79, 70, 229, 0.2));
            border: 1px solid rgba(99, 102, 241, 0.45);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(4px);
        }

        .v2-btn {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: white;
            border: none;
            border-radius: 14px;
            font-weight: 700;
            font-size: 14px;
            padding: 13px 30px;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 20px rgba(79, 70, 229, 0.32);
            position: relative;
            overflow: hidden;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .v2-btn::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.08), transparent);
            background-size: 200% 100%;
            animation: shimmer 2.5s infinite;
        }

        .v2-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(79, 70, 229, 0.44);
        }

        /* ===== UPLOAD ZONE TRANSITION ===== */
        .upload-zone {
            display: none;
        }

        .upload-zone.active {
            display: block;
        }

        /* ===== PROGRESS STATES ===== */
        .state-panel {
            display: none;
        }

        .state-panel.active {
            display: flex;
        }

        /* ===== SELECT DROPDOWN CUSTOM ===== */
        .mode-select-wrap {
            position: relative;
        }

        .mode-select-wrap::after {
            content: 'expand_more';
            font-family: 'Material Symbols Outlined';
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #0B3961;
            pointer-events: none;
            font-size: 20px;
        }

        select.mode-select {
            appearance: none;
            -webkit-appearance: none;
            padding-right: 42px;
            background: white;
            border: 1.5px solid #e2e8f0;
            border-radius: 14px;
            font-weight: 600;
            color: #0B3961;
            padding: 10px 42px 10px 16px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        select.mode-select:focus {
            border-color: #0B3961;
            outline: none;
            box-shadow: 0 0 0 3px rgba(11, 57, 97, 0.1);
        }

        /* ===== SIDEBAR ===== */
        .sidebar-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 14px;
            text-decoration: none;
            transition: all 0.2s;
            border: 1px solid transparent;
        }

        .sidebar-item:hover {
            background: #F8FAFC;
            border-color: #e2e8f0;
        }

        /* ===== UPLOADING STATE ===== */
        @keyframes progress-pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.6;
            }
        }
    </style>
</head>

<body class="min-h-screen bg-white font-sans text-slate-900">

    <div class="drawer lg:drawer-open">
        <input id="dashboard-drawer" type="checkbox" class="drawer-toggle" />

        <!-- ======== DRAWER CONTENT ======== -->
        <div class="drawer-content flex flex-col bg-accent-bg min-h-screen">

            <!-- Mobile Navbar -->
            <div
                class="lg:hidden flex items-center justify-between px-4 py-3 bg-white border-b border-slate-100 sticky top-0 z-10">
                <label for="dashboard-drawer" class="btn btn-ghost btn-sm btn-square drawer-button">
                    <span class="material-symbols-outlined text-primary" style="font-size:22px">menu</span>
                </label>
                <div class="flex items-center gap-2">
                    <img src="{{ secure_asset('images/logo_without_bg.png') }}" alt="Tushun" class="h-7 w-auto">
                    <span class="font-black text-primary tracking-tighter text-lg">TUSHUN</span>
                </div>
                <div
                    class="size-8 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-sm">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
            </div>

            <!-- ======= MAIN CONTENT ======= -->
            <main class="p-5 md:p-8 lg:p-10 max-w-4xl mx-auto w-full flex-1">

                <!-- HEADER -->
                <header class="mb-8">
                    <h1 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-primary tracking-tight">
                        Salom, {{ auth()->user()->name }}! 👋
                    </h1>
                    <p class="text-slate-500 mt-1.5 text-base md:text-lg h-7" id="selectedText"></p>
                </header>

                <!-- ====== UPLOAD SECTION ====== -->
                <section>

                    <!-- Mode Selector Row -->
                    <div class="flex items-center gap-3 mb-5 flex-wrap">
                        <div
                            class="flex items-center gap-2 bg-white border border-slate-100 rounded-2xl px-4 py-2 shadow-sm">
                            <span class="material-symbols-outlined text-primary" style="font-size:18px">tune</span>
                            <span class="text-xs font-bold text-slate-500 uppercase tracking-widest">Rejim</span>
                        </div>
                        <div class="mode-select-wrap flex-1 min-w-[220px] max-w-xs">
                            <select class="mode-select w-full shadow-sm" id="modeSelect">
                                <option value="v0" data-icon="📄">📄 V0: Brief — Qisqa konspekt</option>
                                <option value="v1" data-icon="⚡">⚡ V1: Swift — Tez va sodda</option>
                                <option value="v2" data-icon="🧠">🧠 v2: Brainra — Bilim aurasi</option>
                            </select>
                        </div>
                        <!-- Mode Description Pill -->
                        <div id="modeDescPill"
                            class="text-xs text-slate-500 bg-white border border-slate-100 rounded-2xl px-3 py-2 hidden md:block max-w-xs leading-snug shadow-sm">
                            Vaqtim oltin deydiganlar uchun qisqa konspekt
                        </div>
                    </div>

                    <!-- =================== V0: BRIEF =================== -->
                    <div class="upload-zone active animate-fadeinup" id="zone-v0">
                        <div id="upload-zone-v0" class="p-6 md:p-8">

                            <!-- Initial State -->
                            <div class="state-panel active flex-col items-center text-center" id="v0-state-initial">
                                <div class="flex items-center gap-2 mb-6">
                                    <span class="v0-badge">V0 • Brief</span>
                                    <span class="text-xs text-amber-600 font-medium">Vaqtim oltin</span>
                                </div>
                                <div class="v0-icon-wrap mb-5">
                                    <span class="material-symbols-outlined text-amber-600"
                                        style="font-size:34px;font-variation-settings:'FILL' 1">article</span>
                                </div>
                                <h3 class="text-xl font-extrabold text-slate-800 mb-2">Prezentatsiyani yuklang</h3>
                                <p class="text-slate-500 text-sm mb-1">Tushun eng asosiy qismlarni <strong
                                        class="text-amber-700">1–2 sahifaga</strong> sig'diradi</p>
                                <p class="text-slate-400 text-xs mb-7">PDF yoki PPTX • Ko'pi bilan 32 MB</p>
                                <div class="flex flex-col sm:flex-row items-center gap-3">
                                    <input type="file" id="v0-file-input" class="hidden" accept=".pdf,.pptx">
                                    <label for="v0-file-input" class="v0-btn">📎 Fayl tanlash</label>
                                    <span class="text-xs text-slate-400">yoki shu yerga tashlang</span>
                                </div>
                                <!-- Mini shporgalka preview -->
                                <div
                                    class="mt-7 flex items-start gap-3 bg-amber-50 border border-amber-200 rounded-2xl px-4 py-3 text-left max-w-sm">
                                    <span class="text-amber-500 text-lg mt-0.5">📋</span>
                                    <div>
                                        <p class="text-xs font-bold text-amber-800">Natija: Qisqa</p>
                                        <p class="text-xs text-amber-700 mt-0.5">Barcha asosiy g'oyalar, sanalar va
                                            xulosalar.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Ready State -->
                            <div class="state-panel flex-col items-center text-center" id="v0-state-ready">
                                <div class="v0-icon-wrap mb-4"
                                    style="background:linear-gradient(135deg,#d1fae5,#a7f3d0)">
                                    <span class="material-symbols-outlined text-green-600"
                                        style="font-size:32px;font-variation-settings:'FILL' 1">check_circle</span>
                                </div>
                                <h3 class="text-lg font-bold text-slate-800 mb-1">Fayl tayyor!</h3>
                                <p class="text-sm text-slate-500 mb-6" id="v0-filename"></p>
                                <div class="flex gap-3">
                                    <button class="btn btn-ghost btn-sm rounded-xl" id="v0-btn-cancel">Boshqasi</button>
                                    <button class="v0-btn" id="v0-btn-submit">📄 Brief qilish</button>
                                </div>
                            </div>

                            <!-- Uploading State -->
                            <div class="state-panel flex-col items-center text-center w-full" id="v0-state-uploading">
                                <div class="relative mb-5">
                                    <div class="v0-icon-wrap animate-float" style="width:72px;height:72px">
                                        <span class="material-symbols-outlined text-amber-600"
                                            style="font-size:34px;font-variation-settings:'FILL' 0">description</span>
                                    </div>
                                    <div
                                        class="absolute -bottom-2 -right-2 size-9 rounded-xl bg-amber-500 animate-ai-pulse flex items-center justify-center">
                                        <span class="material-symbols-outlined text-white"
                                            style="font-size:18px;font-variation-settings:'FILL' 1">auto_awesome</span>
                                    </div>
                                </div>
                                <p class="text-sm font-bold text-slate-700 mb-1">Brief tayyorlanmoqda...</p>
                                <p class="text-xs text-slate-400 mb-4" id="v0-uploading-name"></p>
                                <div class="w-full max-w-xs bg-amber-100 rounded-full h-2">
                                    <div id="v0-progress-bar"
                                        class="bg-amber-500 h-2 rounded-full transition-all duration-300"
                                        style="width:0%"></div>
                                </div>
                                <span class="text-xs font-bold mt-2 text-amber-600" id="v0-progress-text">0%</span>
                            </div>
                        </div>
                    </div>

                    <!-- =================== V1: SWIFT =================== -->
                    <div class="upload-zone animate-fadeinup" id="zone-v1">
                        <div id="upload-zone-v1" class="p-6 md:p-8 relative">
                            <div class="v1-grid-bg"></div>

                            <!-- Initial State -->
                            <div class="state-panel active flex-col items-center text-center relative z-10"
                                id="v1-state-initial">
                                <div class="flex items-center gap-2 mb-6">
                                    <span class="v1-badge">V1 • Swift</span>
                                    <span class="text-xs text-green-400 font-medium">Tez va sodda</span>
                                </div>
                                <div class="v1-icon-wrap mb-5">
                                    <span class="material-symbols-outlined text-green-400"
                                        style="font-size:36px;font-variation-settings:'FILL' 1">bolt</span>
                                </div>
                                <h3 class="text-xl font-extrabold text-slate-800 mb-2">Prezentatsiyani yuklang</h3>
                                <p class="text-slate-500 text-sm mb-1">Do'stingiz tushuntirib bergandek <strong
                                        class="text-cyan-600">lo'nda tahlil</strong></p>
                                <p class="text-slate-400 text-xs mb-7">PDF yoki PPTX • Ko'pi bilan 32 MB</p>
                                <div class="flex flex-col sm:flex-row items-center gap-3">
                                    <input type="file" id="v1-file-input" class="hidden" accept=".pdf,.pptx">
                                    <label for="v1-file-input" class="v1-btn">⚡ Fayl tanlash</label>
                                    <span class="text-xs text-slate-400">yoki shu yerga tashlang</span>
                                </div>
                                <div
                                    class="mt-7 flex items-start gap-3 border border-cyan-100 bg-cyan-50 rounded-2xl px-4 py-3 text-left max-w-sm">
                                    <span class="text-cyan-500 text-lg mt-0.5">💬</span>
                                    <div>
                                        <p class="text-xs font-bold text-cyan-700">Natija: Oddiy tushuntirish</p>
                                        <p class="text-xs text-cyan-600/80 mt-0.5">Murakkab atamalarsiz, qulay va
                                            tushunarli tahlil</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Ready State -->
                            <div class="state-panel flex-col items-center text-center relative z-10"
                                id="v1-state-ready">
                                <div
                                    class="size-16 rounded-full border-2 border-cyan-400 flex items-center justify-center mb-4 bg-cyan-50">
                                    <span class="material-symbols-outlined text-cyan-600"
                                        style="font-size:30px;font-variation-settings:'FILL' 1">check</span>
                                </div>
                                <h3 class="text-lg font-bold text-slate-800 mb-1">Fayl tayyor!</h3>
                                <p class="text-sm text-cyan-600/80 mb-6" id="v1-filename"></p>
                                <div class="flex gap-3">
                                    <button class="btn btn-ghost btn-sm rounded-xl text-slate-500"
                                        id="v1-btn-cancel">Boshqasi</button>
                                    <button class="v1-btn" id="v1-btn-submit">⚡ Swift tahlil</button>
                                </div>
                            </div>

                            <!-- Uploading State -->
                            <div class="state-panel flex-col items-center text-center w-full relative z-10"
                                id="v1-state-uploading">
                                <div class="relative mb-5">
                                    <div
                                        class="size-16 rounded-full border-2 border-cyan-400 animate-spin-slow flex items-center justify-center bg-cyan-50">
                                        <span class="material-symbols-outlined text-cyan-600"
                                            style="font-size:28px">bolt</span>
                                    </div>
                                </div>
                                <p class="text-sm font-bold text-cyan-700 mb-1">Tezkor tahlil...</p>
                                <p class="text-xs text-slate-400 mb-4" id="v1-uploading-name"></p>
                                <div class="w-full max-w-xs bg-cyan-50 rounded-full h-1.5"
                                    style="border:1px solid rgba(6,182,212,0.3)">
                                    <div id="v1-progress-bar"
                                        class="bg-cyan-500 h-1.5 rounded-full transition-all duration-300"
                                        style="width:0%"></div>
                                </div>
                                <span class="text-xs font-bold mt-2 text-cyan-600" id="v1-progress-text">0%</span>
                            </div>
                        </div>
                    </div>


                    <!-- =================== v2: BRAINRA =================== -->
                    <div class="upload-zone animate-fadeinup" id="zone-v2">
                        <div id="upload-zone-v2" class="p-6 md:p-8 relative">

                            <!-- Initial State -->
                            <div class="state-panel active flex-col items-center text-center relative z-10"
                                id="v2-state-initial">
                                <div class="flex items-center gap-2 mb-6">
                                    <span class="v2-badge">v2 • Brainra</span>
                                    <span class="text-xs text-purple-400 font-medium">Bilim aurasi</span>
                                </div>

                                <!-- Orbit Animation -->
                                <div class="v2-orbit mb-5">
                                    <div class="v2-orbit-ring animate-spin-slow"></div>
                                    <div class="v2-orbit-ring animate-spin-slow"></div>
                                    <div class="v2-core">
                                        <span class="material-symbols-outlined text-indigo-300"
                                            style="font-size:24px;font-variation-settings:'FILL' 1">psychology</span>
                                    </div>
                                </div>

                                <h3 class="text-xl font-extrabold text-white mb-2">Chuqur Ekspertiza</h3>
                                <p class="text-indigo-300/80 text-sm mb-1">AI prezentatsiyadagi kamchiliklarni <strong
                                        class="text-indigo-300">rentgen qiladi</strong></p>
                                <p class="text-slate-500 text-xs mb-7">PDF yoki PPTX • Ko'pi bilan 32 MB</p>

                                <div class="flex flex-col sm:flex-row items-center gap-3">
                                    <input type="file" id="v2-file-input" class="hidden" accept=".pdf,.pptx">
                                    <label for="v2-file-input" class="v2-btn"
                                        style="display:inline-block;position:relative;overflow:hidden">🧠 Fayl
                                        tanlash</label>
                                    <span class="text-xs text-slate-600">yoki shu yerga tashlang</span>
                                </div>

                                <!-- Feature Tags -->
                                <div class="mt-7 flex flex-wrap gap-2 justify-center">
                                    <span
                                        class="text-xs bg-indigo-950/70 border border-indigo-700/40 text-indigo-300 rounded-lg px-3 py-1.5">🔍
                                        Kamchilik tahlili</span>
                                    <span
                                        class="text-xs bg-indigo-950/70 border border-indigo-700/40 text-indigo-300 rounded-lg px-3 py-1.5">📊
                                        Iqtisodiy bog'liqlik</span>
                                    <span
                                        class="text-xs bg-indigo-950/70 border border-indigo-700/40 text-indigo-300 rounded-lg px-3 py-1.5">💡
                                        Chuqur insight</span>
                                    <span
                                        class="text-xs bg-indigo-950/70 border border-indigo-700/40 text-indigo-300 rounded-lg px-3 py-1.5">⚡
                                        Ekspertiza</span>
                                </div>
                            </div>

                            <!-- Ready State -->
                            <div class="state-panel flex-col items-center text-center relative z-10"
                                id="v2-state-ready">
                                <div class="size-16 rounded-full mb-4 flex items-center justify-center"
                                    style="background:linear-gradient(135deg,rgba(99,102,241,0.2),rgba(79,70,229,0.15));border:1px solid rgba(99,102,241,0.4)">
                                    <span class="material-symbols-outlined text-indigo-300"
                                        style="font-size:28px;font-variation-settings:'FILL' 1">verified</span>
                                </div>
                                <h3 class="text-lg font-bold text-white mb-1">Fayl tayyor!</h3>
                                <p class="text-sm text-indigo-300/70 mb-6" id="v2-filename"></p>
                                <div class="flex gap-3">
                                    <button class="btn btn-ghost btn-sm rounded-xl text-slate-400"
                                        id="v2-btn-cancel">Boshqasi</button>
                                    <button class="v2-btn" id="v2-btn-submit">🧠 Brainra ishga tushirish</button>
                                </div>
                            </div>

                            <!-- Uploading State -->
                            <div class="state-panel flex-col items-center text-center w-full relative z-10"
                                id="v2-state-uploading">
                                <div class="v2-orbit mb-5">
                                    <div class="v2-orbit-ring animate-spin-slow"></div>
                                    <div class="v2-orbit-ring animate-spin-slow"></div>
                                    <div class="v2-core animate-ai-pulse">
                                        <span class="material-symbols-outlined text-indigo-300"
                                            style="font-size:22px;font-variation-settings:'FILL' 1">psychology</span>
                                    </div>
                                </div>
                                <p class="text-sm font-bold text-indigo-300 mb-1">Chuqur tahlil amalga oshirilmoqda...
                                </p>
                                <p class="text-xs text-slate-500 mb-5" id="v2-uploading-name"></p>
                                <div class="w-full max-w-xs relative">
                                    <div class="bg-slate-800 rounded-full h-1.5"
                                        style="border:1px solid rgba(99,102,241,0.3)">
                                        <div id="v2-progress-bar"
                                            class="h-1.5 rounded-full transition-all duration-300"
                                            style="width:0%;background:linear-gradient(90deg,#6366f1,#4f46e5)"></div>
                                    </div>
                                </div>
                                <span class="text-xs font-bold mt-2 text-indigo-400" id="v2-progress-text">0%</span>
                            </div>
                        </div>
                    </div>

                    <!-- University info tag -->
                    <div
                        class="mt-5 flex items-center gap-3 p-4 bg-white border border-slate-100 rounded-2xl shadow-sm">
                        <div class="size-9 rounded-xl bg-primary/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary"
                                style="font-size:18px;font-variation-settings:'FILL' 1">auto_awesome</span>
                        </div>
                        <p class="text-sm text-slate-600">
                            "Tushun" <span class="font-bold text-primary">{{ auth()->user()->university }}</span>
                            yo'nalishi bo'yicha tushuntirishga sozlangan.
                        </p>
                    </div>
                </section>

            </main>
        </div>

        <!-- ======== SIDEBAR ======== -->
        <aside class="drawer-side z-20">
            <label for="dashboard-drawer" class="drawer-overlay"></label>
            <div class="w-72 min-h-full bg-white border-r border-slate-100 p-5 flex flex-col">

                <!-- Logo -->
                <div class="flex items-center gap-3 mb-10">
                    <div
                        class="size-9 bg-white rounded-xl flex items-center justify-center shadow-sm border border-slate-100">
                        <img src="{{ secure_asset('images/logo_without_bg.png') }}" alt="Tushun Logo"
                            class="h-6 w-auto">
                    </div>
                    <span class="text-xl font-black text-primary tracking-tighter uppercase">TUSHUN</span>
                </div>

                <!-- Library -->
                <div class="flex-1 overflow-y-auto">
                    <h3 class="text-[10px] font-bold text-slate-400 uppercase tracking-[2px] mb-3 px-1">Kutubxonangiz
                    </h3>
                    <nav class="space-y-0.5 scrollbar-custom" id="user_library">
                        @foreach ($presentations as $p)
                            <a href="{{ route('presentation.show_by_id', $p->id) }}" class="sidebar-item"
                                target="_blank">
                                <span
                                    class="material-symbols-outlined text-slate-400 mt-0.5 group-hover:text-primary flex-shrink-0"
                                    style="font-size:18px">description</span>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-semibold text-slate-700 truncate">{{ $p->file_name }}</p>
                                    <p class="text-[10px] text-slate-400 uppercase mt-0.5">
                                        {{ $p->created_at->format('d M Y') }}</p>
                                </div>
                            </a>
                        @endforeach
                        @if ($presentations->isEmpty())
                            <div class="text-center py-8">
                                <span class="material-symbols-outlined text-slate-300"
                                    style="font-size:36px">folder_open</span>
                                <p class="text-xs text-slate-400 mt-2">Hali prezentatsiya yuklalmagan</p>
                            </div>
                        @endif
                    </nav>
                </div>

                <!-- User Info + Logout -->
                <div class="mt-auto pt-5 border-t border-slate-100 flex items-center gap-3">
                    <div
                        class="size-9 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-sm flex-shrink-0">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-slate-800 truncate">{{ auth()->user()->name }}</p>
                        <p class="text-[10px] text-slate-400 truncate">{{ auth()->user()->university }} talabasi</p>
                    </div>
                    <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="btn btn-ghost btn-sm btn-circle text-slate-400 hover:text-red-500 transition-colors flex-shrink-0"
                        title="Chiqish">
                        <span class="material-symbols-outlined" style="font-size:20px">logout</span>
                    </button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf
                    </form>
                </div>
            </div>
        </aside>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {

            // ======= TYPING GREETING =======
            const greetings = [
                'Bugun qaysi mavzuni tushunishimiz kerak?',
                'Bilim olishga tayyormisiz? Qaysi prezentatsiyadan boshlaymiz?',
                'Yangi bilimlar sari bir qadam! Prezentatsiyangizni yuklang.',
                "Sizga qaysi mavzu qiyinchilik tug'diryapti? Birgalikda <b>tushunamiz!</b>",
                'Bugun qaysi darsni osonlashtirib beray?',
                "Keling, bugun murakkab narsalarni oddiy tilda tushunib olamiz!"
            ];
            let greetIdx = 0;
            const $gt = $('#selectedText');

            function typeGreeting(text) {
                let i = 0;
                $gt.html('');
                const t = setInterval(() => {
                    if (i < text.length) {
                        if (text.substr(i, 3) === '<b>') {
                            $gt.append('<b>tushunamiz!</b>');
                            i += 18;
                        } else {
                            $gt.append(text.charAt(i));
                            i++;
                        }
                    } else {
                        clearInterval(t);
                        setTimeout(nextGreeting, 3000);
                    }
                }, 50);
            }

            function nextGreeting() {
                greetIdx = (greetIdx + 1) % greetings.length;
                typeGreeting(greetings[greetIdx]);
            }
            typeGreeting(greetings[0]);

            // ======= MODE DESCRIPTIONS =======
            const modeDescs = {
                v0: 'Vaqtim oltin — barcha asosiy tushunchalar 1–2 sahifaga',
                v1: 'Tez va sodda — do\'stingiz tushuntirib bergandek',
                v2: 'Professional tahlil — akademik baho va maslahatlar',
                v2: 'Bilim aurasi — chuqur ekspertiza va insight\'lar'
            };

            // ======= MODE SWITCH =======
            $('#modeSelect').on('change', function() {
                const mode = $(this).val();
                $('.upload-zone').removeClass('active');
                $('#zone-' + mode).addClass('active');
                $('#modeDescPill').text(modeDescs[mode]);
                // Reset all states to initial when switching
                resetAllStates();
            });
            // Set initial desc
            $('#modeDescPill').text(modeDescs['v0']);

            function resetAllStates() {
                ['v0', 'v1', 'v2'].forEach(m => {
                    showModeState(m, 'initial');
                });
            }

            function showModeState(mode, state) {
                $(`#${mode}-state-initial, #${mode}-state-ready, #${mode}-state-uploading`).removeClass('active');
                $(`#${mode}-state-${state}`).addClass('active');
            }

            // ======= DRAG & DROP per zone =======
            ['v0', 'v1', 'v2', 'v2'].forEach(mode => {
                const $zone = $(`#upload-zone-${mode}`);

                $zone.on('dragover', function(e) {
                    e.preventDefault();
                    $(this).addClass('drag-active');
                }).on('dragleave drop', function(e) {
                    e.preventDefault();
                    $(this).removeClass('drag-active');
                    if (e.type === 'drop') {
                        const file = e.originalEvent.dataTransfer.files[0];
                        handleFile(mode, file);
                    }
                });

                // File input change
                $(`#${mode}-file-input`).on('change', function(e) {
                    handleFile(mode, e.target.files[0]);
                });

                // Cancel
                $(`#${mode}-btn-cancel`).on('click', function() {
                    $(`#${mode}-file-input`).val('');
                    showModeState(mode, 'initial');
                    selectedFiles[mode] = null;
                });

                // Submit
                $(`#${mode}-btn-submit`).on('click', function() {
                    uploadFile(mode);
                });
            });

            const selectedFiles = {
                v0: null,
                v1: null,
                v2: null,
                v2: null
            };

            function handleFile(mode, file) {
                if (!file) return;
                const ext = file.name.split('.').pop().toLowerCase();
                if (!['pdf', 'pptx'].includes(ext)) {
                    alert('Faqat PDF yoki PPTX fayllarini yuklash mumkin!');
                    return;
                }
                selectedFiles[mode] = file;
                $(`#${mode}-filename`).text(file.name);
                showModeState(mode, 'ready');
            }

            function uploadFile(mode) {
                const file = selectedFiles[mode];
                if (!file) return;

                showModeState(mode, 'uploading');
                $(`#${mode}-uploading-name`).text(file.name);

                // Get the currently selected mode value for the API
                const modeValue = $('#modeSelect').val();

                let progress = 5;
                updateModeProgress(mode, progress);
                const interval = setInterval(() => {
                    if (progress < 90) {
                        progress += Math.floor(Math.random() * 5) + 1;
                        updateModeProgress(mode, Math.min(progress, 90));
                    }
                }, 500);

                let formData = new FormData();
                formData.append('file', file);
                formData.append('mode', modeValue);
                console.log(modeValue);


                $.ajax({
                    url: "{{ route('presentation.upload') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        clearInterval(interval);
                        if (response.success) {
                            updateModeProgress(mode, 100);
                            setTimeout(() => {
                                window.location.href = response.redirect_url;
                            }, 500);
                        }
                    },
                    error: function(xhr) {
                        clearInterval(interval);
                        let msg = "Serverda xatolik yuz berdi";
                        try {
                            msg = JSON.parse(xhr.responseText).message || msg;
                        } catch (e) {}
                        alert('Xatolik: ' + msg);
                        showModeState(mode, 'ready');
                    }
                });
            }

            function updateModeProgress(mode, val) {
                val = Math.min(val, 100);
                $(`#${mode}-progress-bar`).css('width', val + '%');
                $(`#${mode}-progress-text`).text(val + '%');
            }

        });
    </script>
</body>

</html>
