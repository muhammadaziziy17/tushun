<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tahlil Natijasi | TUSHUN</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Lora:ital,wght@0,400;0,600;1,400&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- MathJax -->
    <script>
        window.MathJax = {
            tex: {
                inlineMath: [
                    ['$', '$'],
                    ['\\(', '\\)']
                ],
                displayMath: [
                    ['$$', '$$'],
                    ['\\[', '\\]']
                ],
                processEscapes: true
            },
            options: {
                skipHtmlTags: ['script', 'noscript', 'style', 'textarea', 'pre']
            },
            startup: {
                typeset: true
            }
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js" async></script>

    <style>
        /* ═══════════════════════════════════════════
           THEME VARIABLES
        ═══════════════════════════════════════════ */
        :root {
            --bg-main: #F0F4F8;
            --bg-card: #FFFFFF;
            --bg-sidebar: #FFFFFF;
            --text-primary: #1E293B;
            --text-secondary: #64748B;
            --accent: #0B3860;
            --accent-light: #E8F0F9;
            --border: #E2E8F0;
            --progress-bg: #0B3860;
            --highlight: #FEF08A;
            --ruler-bg: rgba(11, 56, 96, 0.08);
            --ruler-border: rgba(11, 56, 96, 0.25);
            --scrollbar: #CBD5E1;
        }

        body.theme-dark {
            --bg-main: #0F172A;
            --bg-card: #1E293B;
            --bg-sidebar: #1E293B;
            --text-primary: #E2E8F0;
            --text-secondary: #94A3B8;
            --accent: #38BDF8;
            --accent-light: rgba(56, 189, 248, 0.1);
            --border: #334155;
            --progress-bg: #1e293b;
            --highlight: rgba(250, 204, 21, 0.25);
            --ruler-bg: rgba(56, 189, 248, 0.08);
            --ruler-border: rgba(56, 189, 248, 0.3);
            --scrollbar: #334155;
        }

        body.theme-warm {
            --bg-main: #FAF3E8;
            --bg-card: #FFFDF6;
            --bg-sidebar: #FFFDF6;
            --text-primary: #2D2520;
            --text-secondary: #7C6F63;
            --accent: #B45309;
            --accent-light: #FEF3C7;
            --border: #EAD9C2;
            --progress-bg: #2D2520;
            --highlight: #FDE68A;
            --ruler-bg: rgba(180, 83, 9, 0.07);
            --ruler-border: rgba(180, 83, 9, 0.25);
            --scrollbar: #D6C4AE;
        }

        body.theme-forest {
            --bg-main: #1A2B1F;
            --bg-card: #243329;
            --bg-sidebar: #1E2E23;
            --text-primary: #D4EDDA;
            --text-secondary: #8EAF96;
            --accent: #4ADE80;
            --accent-light: rgba(74, 222, 128, 0.1);
            --border: #2E4335;
            --progress-bg: #1A2B1F;
            --highlight: rgba(74, 222, 128, 0.2);
            --ruler-bg: rgba(74, 222, 128, 0.07);
            --ruler-border: rgba(74, 222, 128, 0.25);
            --scrollbar: #2E4335;
        }

        body.theme-sepia {
            --bg-main: #E8D9C5;
            --bg-card: #F5EBD8;
            --bg-sidebar: #EEE0CA;
            --text-primary: #3B2F20;
            --text-secondary: #7A6248;
            --accent: #8B4513;
            --accent-light: #F3E0C8;
            --border: #D4B896;
            --progress-bg: #3B2F20;
            --highlight: #F6D860;
            --ruler-bg: rgba(139, 69, 19, 0.08);
            --ruler-border: rgba(139, 69, 19, 0.3);
            --scrollbar: #C4A07A;
        }

        /* ═══════════════════════════════════════════
           GLOBAL
        ═══════════════════════════════════════════ */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-main);
            color: var(--text-primary);
            transition: background-color 0.4s ease, color 0.4s ease;
            min-height: 100vh;
            overflow-x: hidden;
        }

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--scrollbar);
            border-radius: 10px;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        /* ═══════════════════════════════════════════
           LAYOUT: FIXED SIDEBAR + SCROLLABLE CONTENT
        ═══════════════════════════════════════════ */
        #app-layout {
            display: flex;
            min-height: 100vh;
            padding-top: 56px;
            /* header height */
        }

        #sidebar {
            position: fixed;
            top: 56px;
            left: 0;
            width: 280px;
            height: calc(100vh - 56px);
            overflow-y: auto;
            background-color: var(--bg-sidebar);
            border-right: 1px solid var(--border);
            transition: transform 0.3s ease, background-color 0.4s ease;
            z-index: 40;
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        #content-area {
            margin-left: 280px;
            flex: 1;
            min-width: 0;
            padding: 2rem 2rem 8rem;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        #content-inner {
            width: 100%;
            max-width: 820px;
        }

        @media (max-width: 1024px) {
            #sidebar {
                transform: translateX(-100%);
                width: 260px;
            }

            #sidebar.open {
                transform: translateX(0);
                box-shadow: 4px 0 30px rgba(0, 0, 0, 0.15);
            }

            #content-area {
                margin-left: 0;
                padding: 1.25rem 1rem 8rem;
            }
        }

        /* ═══════════════════════════════════════════
           HEADER
        ═══════════════════════════════════════════ */
        #topbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 56px;
            background-color: var(--bg-card);
            border-bottom: 1px solid var(--border);
            z-index: 50;
            display: flex;
            align-items: center;
            padding: 0 1.25rem;
            gap: 1rem;
            transition: background-color 0.4s ease, border-color 0.4s ease;
        }

        #top-progress {
            position: fixed;
            top: 0;
            left: 0;
            height: 4px;
            background: linear-gradient(to right, var(--accent), #a78bfa);
            z-index: 100;
            width: 0%;
            transition: width 0.15s ease;
        }

        /* ═══════════════════════════════════════════
           SIDEBAR ELEMENTS
        ═══════════════════════════════════════════ */
        .sidebar-section {
            padding: 1.25rem;
            border-bottom: 1px solid var(--border);
        }

        .sidebar-label {
            font-size: 9px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            color: var(--text-secondary);
            margin-bottom: 0.75rem;
        }

        #progress-ring-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
        }

        .progress-ring-track {
            fill: none;
            stroke: var(--border);
            stroke-width: 6;
        }

        .progress-ring-fill {
            fill: none;
            stroke: var(--accent);
            stroke-width: 6;
            stroke-linecap: round;
            stroke-dasharray: 283;
            stroke-dashoffset: 283;
            transform: rotate(-90deg);
            transform-origin: center;
            transition: stroke-dashoffset 0.4s ease;
        }

        /* ═══════════════════════════════════════════
           CONTENT / PROSE
        ═══════════════════════════════════════════ */
        #ai-card {
            background-color: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 1.5rem;
            overflow: hidden;
            transition: background-color 0.4s ease, border-color 0.4s ease;
        }

        .ai-prose {
            line-height: 1.85;
            color: var(--text-primary);
            font-size: 1.05rem;
            transition: font-size 0.25s ease, color 0.4s ease;
        }

        .ai-prose h1 {
            font-size: 1.6em;
            font-weight: 800;
            color: var(--text-primary);
            margin: 2rem 0 1rem;
            line-height: 1.3;
            border-bottom: 2px solid var(--border);
            padding-bottom: 0.5rem;
            scroll-margin-top: 80px;
        }

        .ai-prose h2 {
            font-size: 1.3em;
            font-weight: 700;
            color: var(--text-primary);
            margin: 1.75rem 0 0.75rem;
            scroll-margin-top: 80px;
        }

        .ai-prose h3 {
            font-size: 1.1em;
            font-weight: 600;
            color: var(--text-primary);
            margin: 1.25rem 0 0.5rem;
        }

        .ai-prose p {
            margin: 0 0 1.1em;
        }

        .ai-prose ul,
        .ai-prose ol {
            margin: 0.75em 0 1em;
            padding-left: 1.5rem;
        }

        .ai-prose ul li {
            list-style: none;
            position: relative;
            padding-left: 1.25rem;
            margin-bottom: 0.4em;
        }

        .ai-prose ul li::before {
            content: "•";
            color: var(--accent);
            font-weight: 900;
            position: absolute;
            left: 0;
            font-size: 1.1rem;
            line-height: 1.85;
        }

        .ai-prose ol li {
            margin-bottom: 0.4em;
        }

        .ai-prose blockquote {
            border-left: 3px solid var(--accent);
            background: var(--accent-light);
            padding: 1rem 1.5rem;
            border-radius: 0 0.75rem 0.75rem 0;
            margin: 1.5rem 0;
            color: var(--text-secondary);
            font-style: italic;
        }

        /* ── Tables ──────────────────────────────── */
        .ai-prose .table-wrap {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            border-radius: 0.75rem;
            margin: 1.75rem 0;
            border: 1px solid var(--border);
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.05);
        }

        .ai-prose table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875em;
            display: table;
            margin: 0;
            min-width: 500px;
            /* force scroll on mobile, not page break */
        }

        .ai-prose thead {
            background-color: var(--accent);
            color: var(--bg-card);
        }

        .ai-prose thead th {
            padding: 0.7rem 1rem;
            font-weight: 700;
            font-size: 0.78em;
            text-transform: uppercase;
            letter-spacing: 0.07em;
            text-align: left;
            white-space: nowrap;
            border: none;
        }

        .ai-prose tbody tr {
            border-top: 1px solid var(--border);
            transition: background 0.15s;
        }

        .ai-prose tbody tr:nth-child(even) {
            background-color: var(--accent-light);
        }

        .ai-prose tbody tr:hover {
            filter: brightness(0.96);
        }

        .ai-prose tbody td {
            padding: 0.6rem 1rem;
            vertical-align: top;
            line-height: 1.6;
            color: var(--text-primary);
            border: none;
            border-right: 1px solid var(--border);
            word-break: break-word;
        }

        .ai-prose tbody td:last-child {
            border-right: none;
        }

        .ai-prose code {
            background: var(--accent-light);
            color: var(--accent);
            padding: 0.15em 0.4em;
            border-radius: 4px;
            font-size: 0.9em;
            font-family: 'Courier New', monospace;
        }

        .ai-prose pre {
            background: var(--bg-main);
            border: 1px solid var(--border);
            border-radius: 0.75rem;
            padding: 1.25rem;
            overflow-x: auto;
            margin: 1.25rem 0;
        }

        .ai-prose pre code {
            background: none;
            padding: 0;
            font-size: 0.875em;
            color: var(--text-primary);
        }

        /* Math formula beautiful display */
        .ai-prose .MathJax {
            color: var(--text-primary);
        }

        .mjx-container {
            overflow-x: auto;
            margin: 1rem 0;
            padding: 0.75rem;
            background: var(--accent-light);
            border-radius: 0.5rem;
            border: 1px solid var(--border);
        }

        /* Section dividers */
        .section-divider {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin: 2.5rem 0;
            opacity: 0.4;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--text-secondary);
        }

        .section-divider::before,
        .section-divider::after {
            content: '';
            height: 1px;
            width: 48px;
            background-color: var(--border);
        }

        /* ═══════════════════════════════════════════
           HIGHLIGHT
        ═══════════════════════════════════════════ */
        .highlight-marker {
            background-color: var(--highlight);
            border-radius: 3px;
            padding: 1px 2px;
            cursor: pointer;
        }

        .word-marked {
            background: var(--accent);
            color: var(--bg-card);
            border-radius: 3px;
            padding: 1px 3px;
            cursor: pointer;
        }

        /* ═══════════════════════════════════════════
           FOCUS MODE
        ═══════════════════════════════════════════ */
        body.focus-mode .ai-prose p,
        body.focus-mode .ai-prose li {
            opacity: 0.18;
            filter: blur(0.6px);
            transition: opacity 0.4s, filter 0.4s;
        }

        body.focus-mode .ai-prose p.active-focus,
        body.focus-mode .ai-prose li.active-focus {
            opacity: 1;
            filter: blur(0);
        }

        /* ═══════════════════════════════════════════
           BOOK / PAGE MODE
        ═══════════════════════════════════════════ */
        body.book-mode #ai-card {
            font-family: 'Lora', serif;
            background: var(--bg-card);
        }

        body.book-mode .ai-prose {
            font-family: 'Lora', serif;
            text-align: justify;
            hyphens: auto;
            column-count: 2;
            column-gap: 3rem;
            column-rule: 1px solid var(--border);
        }

        body.book-mode .ai-prose h1,
        body.book-mode .ai-prose h2,
        body.book-mode .ai-prose h3 {
            column-span: all;
        }

        @media (max-width: 768px) {
            body.book-mode .ai-prose {
                column-count: 1;
            }
        }

        /* ═══════════════════════════════════════════
           READING RULER
        ═══════════════════════════════════════════ */
        #reading-ruler {
            position: fixed;
            left: 0;
            right: 0;
            height: 44px;
            background: var(--ruler-bg);
            border-top: 1.5px solid var(--ruler-border);
            border-bottom: 1.5px solid var(--ruler-border);
            pointer-events: none;
            z-index: 45;
            display: none;
            transition: top 0.06s linear;
        }

        /* ═══════════════════════════════════════════
           TOOL PANEL (floating bottom)
        ═══════════════════════════════════════════ */
        #tool-panel {
            position: fixed;
            bottom: 1.25rem;
            left: 50%;
            transform: translateX(-50%);
            z-index: 50;
            transition: all 0.3s ease;
        }

        .tool-panel-inner {
            background-color: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 2rem;
            padding: 0.375rem 0.625rem;
            display: flex;
            align-items: center;
            gap: 0.375rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12), 0 2px 8px rgba(0, 0, 0, 0.06);
            flex-wrap: wrap;
            justify-content: center;
            backdrop-filter: blur(12px);
            transition: background-color 0.4s ease, border-color 0.4s ease;
        }

        .tool-sep {
            width: 1px;
            height: 24px;
            background: var(--border);
            margin: 0 0.125rem;
        }

        .tool-btn {
            padding: 0.4rem;
            border-radius: 0.625rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
            color: var(--text-primary);
            border: 1px solid transparent;
            background: transparent;
        }

        .tool-btn:hover {
            background-color: var(--accent-light);
            color: var(--accent);
        }

        .tool-btn.active {
            background-color: var(--accent);
            color: var(--bg-card);
            border-color: transparent;
        }

        .tool-btn.active:hover {
            background-color: var(--accent);
            opacity: 0.9;
        }

        .speed-btn {
            padding: 0.2rem 0.5rem;
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: all 0.2s;
            color: var(--text-secondary);
            border: 1px solid transparent;
            background: transparent;
            letter-spacing: 0.04em;
        }

        .speed-btn:hover {
            background-color: var(--accent-light);
            color: var(--accent);
        }

        .speed-btn.active {
            background-color: var(--accent-light);
            color: var(--accent);
            border-color: var(--accent);
        }

        /* ═══════════════════════════════════════════
           THEME PICKER POPUP
        ═══════════════════════════════════════════ */
        #theme-popup {
            position: absolute;
            bottom: calc(100% + 0.75rem);
            right: 0;
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 1rem;
            padding: 0.5rem;
            display: none;
            flex-direction: column;
            gap: 0.25rem;
            min-width: 170px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
            z-index: 60;
        }

        #theme-popup.open {
            display: flex;
        }

        .theme-opt {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.5rem 0.75rem;
            border-radius: 0.625rem;
            cursor: pointer;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-primary);
            transition: background 0.15s;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
        }

        .theme-opt:hover {
            background: var(--accent-light);
        }

        .theme-swatch {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            border: 2px solid var(--border);
            flex-shrink: 0;
        }

        /* ═══════════════════════════════════════════
           SCROLL SPEED INDICATOR
        ═══════════════════════════════════════════ */
        #scroll-play {
            position: relative;
        }

        #scroll-play::after {
            content: '';
            position: absolute;
            top: -2px;
            right: -2px;
            width: 8px;
            height: 8px;
            background: #22c55e;
            border-radius: 50%;
            border: 2px solid var(--bg-card);
            display: none;
        }

        #scroll-play.scrolling::after {
            display: block;
        }

        /* ═══════════════════════════════════════════
           SIDEBAR TOGGLE (mobile)
        ═══════════════════════════════════════════ */
        #sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.35);
            z-index: 39;
        }

        #sidebar-overlay.open {
            display: block;
        }

        /* ═══════════════════════════════════════════
           PRINT STYLES
        ═══════════════════════════════════════════ */
        @media print {
            .no-print {
                display: none !important;
            }

            #topbar,
            #sidebar,
            #tool-panel,
            #reading-ruler,
            #top-progress {
                display: none !important;
            }

            #app-layout {
                padding-top: 0 !important;
            }

            #content-area {
                margin: 0 !important;
                padding: 1rem !important;
                max-width: 100% !important;
            }

            body {
                background: white !important;
                color: black !important;
            }

            #ai-card {
                background: white !important;
                border: none !important;
                box-shadow: none !important;
                border-radius: 0 !important;
            }

            .ai-prose {
                font-size: 11pt !important;
                color: black !important;
            }

            .ai-prose h1,
            .ai-prose h2,
            .ai-prose h3 {
                color: black !important;
            }

            .ai-prose blockquote {
                border-color: #333 !important;
                background: #f5f5f5 !important;
                color: #333 !important;
            }

            .ai-prose code {
                background: #f0f0f0 !important;
                color: #333 !important;
            }

            /* Table: remove scroll wrapper, scale to fit page */
            .ai-prose .table-wrap {
                overflow: visible !important;
                border: 1px solid #ccc !important;
                box-shadow: none !important;
            }

            .ai-prose table {
                width: 100% !important;
                min-width: 0 !important;
                font-size: 8.5pt !important;
                page-break-inside: auto;
                border-collapse: collapse !important;
            }

            .ai-prose tr {
                page-break-inside: avoid;
            }

            .ai-prose thead {
                background-color: #0B3860 !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .ai-prose thead th {
                color: white !important;
                padding: 5pt 8pt !important;
                white-space: normal !important;
            }

            .ai-prose tbody td {
                padding: 5pt 8pt !important;
                border: 0.5pt solid #ccc !important;
                word-break: break-word !important;
            }

            .ai-prose tbody tr:nth-child(even) {
                background-color: #f5f5f5 !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .highlight-marker {
                background: #fff176 !important;
            }

            body.book-mode .ai-prose {
                column-count: 1 !important;
            }

            @page {
                margin: 2cm;
            }
        }
    </style>
</head>

<body>

    <!-- Progress bar top -->
    <div id="top-progress" class="no-print"></div>

    <!-- Reading ruler -->
    <div id="reading-ruler" class="no-print"></div>

    <!-- Mobile sidebar overlay -->
    <div id="sidebar-overlay" class="no-print" onclick="closeSidebar()"></div>

    <!-- ═══════════════════════════════ HEADER ═══════════════════════════════ -->
    <header id="topbar" class="no-print">
        <!-- Mobile sidebar toggle -->
        <button onclick="toggleSidebar()" class="tool-btn lg:hidden" title="Menyu">
            <span class="material-symbols-outlined" style="font-size:20px">menu</span>
        </button>

        <!-- Back button -->
        <a href="{{ route('home') }}" class="tool-btn" title="Orqaga" style="text-decoration:none">
            <span class="material-symbols-outlined" style="font-size:20px">arrow_back</span>
        </a>

        <!-- Separator -->
        <div class="tool-sep"></div>

        <!-- TUSHUN Logo -->
        <div style="display:flex;align-items:center;gap:0.5rem">
            <div
                style="width:28px;height:28px;background:var(--accent);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0">
                <img src="{{ secure_asset('images/logo_without_bg.png') }}"
                    style="width:18px;height:18px;object-fit:contain" alt="T">
            </div>
            <span
                style="font-weight:800;font-size:0.95rem;letter-spacing:0.08em;color:var(--text-primary)">TUSHUN</span>
        </div>

        <!-- Spacer -->
        <div style="flex:1"></div>

        <!-- File name (desktop) -->
        <span class="hidden md:block"
            style="font-size:0.78rem;font-weight:600;color:var(--text-secondary);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:300px">
            {{ $presentation->file_name }}
        </span>

        <!-- Mobile progress -->
        <span class="md:hidden" style="font-size:0.7rem;font-weight:800;color:var(--accent)" id="mobile-pct">0%</span>
    </header>

    <!-- ═══════════════════════════════ LAYOUT ═══════════════════════════════ -->
    <div id="app-layout">

        <!-- ──────────── FIXED SIDEBAR ──────────── -->
        <aside id="sidebar" class="no-print">

            <!-- Logo block -->
            <div class="sidebar-section" style="text-align:center;padding:1.5rem 1.25rem">
                <div style="display:inline-flex;flex-direction:column;align-items:center;gap:0.6rem">
                    <div
                        style="width:64px;height:64px;background:var(--accent-light);border-radius:1.25rem;display:flex;align-items:center;justify-content:center;border:2px solid var(--border)">
                        <img src="{{ secure_asset('images/logo_without_bg.png') }}"
                            style="width:38px;height:38px;object-fit:contain" alt="Tushun">
                    </div>
                    <div>
                        <div style="font-weight:800;font-size:1rem;color:var(--text-primary);letter-spacing:0.05em">
                            TUSHUN</div>
                        <div
                            style="font-size:9px;font-weight:700;text-transform:uppercase;letter-spacing:0.15em;color:var(--accent);margin-top:2px">
                            Sizning yordamchingiz</div>
                    </div>
                    <div
                        style="display:flex;align-items:center;gap:6px;padding:5px 12px;background:var(--accent-light);border-radius:999px;border:1px solid var(--border)">
                        <span style="width:7px;height:7px;background:#22c55e;border-radius:50%;flex-shrink:0"></span>
                        <span
                            style="font-size:9px;font-weight:700;text-transform:uppercase;letter-spacing:0.12em;color:var(--text-secondary)">Tahlil
                            tayyor</span>
                    </div>
                </div>
            </div>

            <!-- Reading progress ring -->
            <div class="sidebar-section">
                <div class="sidebar-label">O'qish progressi</div>
                <div id="progress-ring-container">
                    <svg width="90" height="90" viewBox="0 0 100 100">
                        <circle class="progress-ring-track" cx="50" cy="50" r="45" />
                        <circle class="progress-ring-fill" id="ring-fill" cx="50" cy="50" r="45" />
                        <text x="50" y="55" text-anchor="middle" fill="var(--text-primary)"
                            style="font-family:'Plus Jakarta Sans',sans-serif;font-size:18px;font-weight:900"
                            id="ring-text">0%</text>
                    </svg>
                </div>
            </div>

            <!-- Reading info -->
            <div class="sidebar-section">
                <div class="sidebar-label">Ma'lumot</div>
                <div style="display:flex;flex-direction:column;gap:0.6rem">
                    <div style="display:flex;align-items:center;gap:0.5rem;font-size:0.78rem">
                        <span class="material-symbols-outlined"
                            style="font-size:16px;color:var(--accent)">schedule</span>
                        <span style="color:var(--text-secondary)" id="read-time-sidebar">Hisoblanyapti...</span>
                    </div>
                    <div style="display:flex;align-items:center;gap:0.5rem;font-size:0.78rem">
                        <span class="material-symbols-outlined" style="font-size:16px;color:var(--accent)">timer</span>
                        <span style="color:var(--text-secondary)">Sessiya: <strong style="color:var(--text-primary)"
                                id="session-timer-sb">00:00</strong></span>
                    </div>
                    <div style="display:flex;align-items:center;gap:0.5rem;font-size:0.78rem">
                        <span class="material-symbols-outlined"
                            style="font-size:16px;color:var(--accent)">article</span>
                        <span style="color:var(--text-secondary)" id="word-count-sidebar">— so&#x02BC;z</span>
                    </div>
                </div>
            </div>

            <!-- PDF Print -->
            <div class="sidebar-section">
                <div class="sidebar-label">Eksport</div>
                <button onclick="window.print()"
                    style="width:100%;display:flex;align-items:center;justify-content:center;gap:0.5rem;padding:0.625rem 1rem;background:var(--accent);color:var(--bg-card);border:none;border-radius:0.75rem;font-size:0.82rem;font-weight:700;cursor:pointer;transition:opacity 0.2s;letter-spacing:0.03em"
                    onmouseover="this.style.opacity='0.85'" onmouseout="this.style.opacity='1'">
                    <span class="material-symbols-outlined" style="font-size:17px">print</span>
                    PDF sifatida saqlash
                </button>
            </div>

            <!-- Table of contents (auto-generated) -->
            <div class="sidebar-section" id="toc-section" style="flex:1;overflow-y:auto">
                <div class="sidebar-label">Mundarija</div>
                <nav id="toc-nav" style="display:flex;flex-direction:column;gap:0.25rem"></nav>
            </div>
        </aside>

        <!-- ──────────── MAIN CONTENT ──────────── -->
        <main id="content-area">
            <div id="content-inner">
                <div id="ai-card">
                    <!-- Card header -->
                    <div
                        style="padding:1rem 2rem;border-bottom:1px solid var(--border);background:var(--bg-main);display:flex;align-items:center;gap:0.6rem;transition:background 0.4s,border-color 0.4s">
                        <span class="material-symbols-outlined"
                            style="font-size:18px;color:var(--accent)">auto_awesome</span>
                        <span
                            style="font-size:9px;font-weight:800;text-transform:uppercase;letter-spacing:0.18em;color:var(--text-secondary)">Tushun
                            tahlili</span>
                        <div style="flex:1"></div>
                        <span
                            style="font-size:9px;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;color:var(--text-secondary)"
                            id="read-time-card">...</span>
                    </div>

                    <!-- Prose content -->
                    <div class="ai-prose" id="ai-content-main" style="padding:2.5rem 2.5rem 2rem">
                        @php
                            use League\CommonMark\Environment\Environment;
                            use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
                            use League\CommonMark\Extension\Table\TableExtension;
                            use League\CommonMark\MarkdownConverter;

                            $environment = new Environment([
                                'html_input' => 'strip',
                                'allow_unsafe_links' => false,
                            ]);
                            $environment->addExtension(new CommonMarkCoreExtension());
                            $environment->addExtension(new TableExtension());

                            $converter = new MarkdownConverter($environment);
                            $htmlContent = $converter->convert($presentation->ai_explanation);
                        @endphp
                        {!! $htmlContent !!}
                    </div>

                    <!-- Card footer -->
                    <div
                        style="padding:2rem;border-top:1px solid var(--border);background:var(--bg-main);display:flex;flex-direction:column;align-items:center;gap:0.5rem;text-align:center;transition:background 0.4s,border-color 0.4s">
                        <div
                            style="width:36px;height:36px;background:var(--bg-card);border:1px solid var(--border);border-radius:0.75rem;display:flex;align-items:center;justify-content:center">
                            <span class="material-symbols-outlined"
                                style="font-size:18px;color:var(--accent)">verified</span>
                        </div>
                        <p
                            style="font-size:9px;font-weight:700;text-transform:uppercase;letter-spacing:0.14em;color:var(--text-secondary);opacity:0.5;margin:0">
                            Tahlil yakunlandi</p>
                    </div>
                </div><!-- /#ai-card -->
            </div><!-- /#content-inner -->
        </main>
    </div>

    <!-- ═══════════════════════════════ FLOATING TOOL PANEL ═══════════════════════════════ -->
    <div id="tool-panel" class="no-print">
        <div class="tool-panel-inner">

            <!-- Font size -->
            <button class="tool-btn" id="btn-font-down" title="Shriftni kichraytirish">
                <span class="material-symbols-outlined" style="font-size:18px">text_decrease</span>
            </button>
            <button class="tool-btn" id="btn-font-up" title="Shriftni kattalashtirish">
                <span class="material-symbols-outlined" style="font-size:18px">text_increase</span>
            </button>

            <div class="tool-sep"></div>

            <!-- Book mode -->
            <button class="tool-btn" id="btn-book" title="Kitob rejimi (ikki ustun)">
                <span class="material-symbols-outlined" style="font-size:18px">auto_stories</span>
            </button>

            <!-- Focus mode -->
            <button class="tool-btn" id="btn-focus" title="Fokus rejimi">
                <span class="material-symbols-outlined" style="font-size:18px">center_focus_strong</span>
            </button>

            <!-- Ruler -->
            <button class="tool-btn" id="btn-ruler" title="O'qish chizg'ichi">
                <span class="material-symbols-outlined" style="font-size:18px">straighten</span>
            </button>

            <!-- Clear highlights -->
            <button class="tool-btn" id="btn-clear-hl" title="Belgilashlarni tozalash" style="color:#f87171">
                <span class="material-symbols-outlined" style="font-size:18px">ink_eraser</span>
            </button>

            <div class="tool-sep"></div>

            <!-- Auto scroll: play/pause -->
            <button class="tool-btn" id="scroll-play" title="Avtomatik o'qish">
                <span class="material-symbols-outlined" style="font-size:18px" id="scroll-icon">play_arrow</span>
            </button>

            <!-- Speed buttons -->
            <button class="speed-btn" data-speed="0.3">Sekin</button>
            <button class="speed-btn active" data-speed="0.8">O'rta</button>
            <button class="speed-btn" data-speed="1.8">Tez</button>

            <div class="tool-sep"></div>

            <!-- Theme picker -->
            <div style="position:relative">
                <button class="tool-btn" id="btn-theme" title="Mavzu">
                    <span class="material-symbols-outlined" style="font-size:18px">palette</span>
                </button>
                <div id="theme-popup">
                    <button class="theme-opt" data-theme="">
                        <span class="theme-swatch" style="background:#F0F4F8;border-color:#0B3860"></span>
                        Soft Light
                    </button>
                    <button class="theme-opt" data-theme="theme-dark">
                        <span class="theme-swatch" style="background:#0F172A;border-color:#38BDF8"></span>
                        Dark
                    </button>
                    <button class="theme-opt" data-theme="theme-warm">
                        <span class="theme-swatch" style="background:#FAF3E8;border-color:#B45309"></span>
                        Warm Paper
                    </button>
                    <button class="theme-opt" data-theme="theme-forest">
                        <span class="theme-swatch" style="background:#1A2B1F;border-color:#4ADE80"></span>
                        Forest Dark
                    </button>
                    <button class="theme-opt" data-theme="theme-sepia">
                        <span class="theme-swatch" style="background:#E8D9C5;border-color:#8B4513"></span>
                        Sepia
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ═══════════════════════════════ JAVASCRIPT ═══════════════════════════════ -->

    <script>
        $(function() {
            /* ─── State ─────────────────────────────── */
            let maxReadPct = 0;
            let fontSize = 1.05;
            let scrollSpeed = 0.8;
            let isScrolling = false;
            let scrollAcc = 0;
            let scrollRaf;
            let isRuler = false;
            let isFocus = false;
            let isBook = false;
            let focusObserver;
            let sessionSecs = 0;

            const $body = $('body');
            const $content = $('#ai-content-main');
            const $ruler = $('#reading-ruler');

            /* ─── Word count & Reading time ─────────── */
            const words = $content.text().trim().split(/\s+/).length;
            const readMins = Math.max(1, Math.ceil(words / 180));
            const timeText = `${readMins} daqiqa o'qish`;
            $('#read-time-sidebar, #read-time-card').text(timeText);
            $('#word-count-sidebar').text(words.toLocaleString() + " so\u02BCz");

            /* ─── Session timer ─────────────────────── */
            setInterval(() => {
                sessionSecs++;
                const m = String(Math.floor(sessionSecs / 60)).padStart(2, '0');
                const s = String(sessionSecs % 60).padStart(2, '0');
                $('#session-timer-sb').text(m + ':' + s);
            }, 1000);

            /* ─── Wrap tables for mobile scroll ─────── */
            $content.find('table').each(function() {
                $(this).wrap('<div class="table-wrap"></div>');
            });

            /* ─── Section dividers ──────────────────── */
            $content.find('h1, h2').not(':first').before(
                '<div class="section-divider"><span class="material-symbols-outlined" style="font-size:14px">check_circle</span>Bo\'lim yakunlandi</div>'
            );

            /* ─── Auto-generate TOC ─────────────────── */
            const $toc = $('#toc-nav');
            let hIdx = 0;
            $content.find('h1, h2, h3').each(function() {
                const id = 'heading-' + (hIdx++);
                $(this).attr('id', id);
                const level = this.tagName.toLowerCase();
                const indent = level === 'h1' ? 0 : level === 'h2' ? 12 : 22;
                const fsize = level === 'h1' ? '0.8rem' : '0.75rem';
                const fw = level === 'h1' ? '700' : '500';
                $toc.append(
                    `<a href="#${id}" onclick="smoothScrollTo('${id}');return false;"
                    style="display:block;padding:4px 8px;padding-left:${8+indent}px;font-size:${fsize};font-weight:${fw};
                    color:var(--text-secondary);border-radius:6px;text-decoration:none;
                    overflow:hidden;text-overflow:ellipsis;white-space:nowrap;
                    transition:background 0.15s,color 0.15s;border:none"
                    class="toc-link"
                    onmouseover="this.style.background='var(--accent-light)';this.style.color='var(--accent)'"
                    onmouseout="this.style.background='transparent';this.style.color='var(--text-secondary)'"
                >${$(this).text()}</a>`
                );
            });

            window.smoothScrollTo = (id) => {
                const el = document.getElementById(id);
                if (el) el.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
                if (window.innerWidth < 1024) closeSidebar();
            };

            /* ─── Progress ring ─────────────────────── */
            const ringFill = document.getElementById('ring-fill');
            const circumference = 2 * Math.PI * 45; // 283

            function updateProgress() {
                const winScroll = document.documentElement.scrollTop;
                const totalH = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                const pct = totalH > 0 ? Math.round((winScroll / totalH) * 100) : 0;

                if (pct > maxReadPct) {
                    maxReadPct = pct;
                    const offset = circumference - (maxReadPct / 100) * circumference;
                    ringFill.style.strokeDashoffset = offset;
                    $('#ring-text').text(maxReadPct + '%');
                    $('#top-progress').css('width', maxReadPct + '%');
                    $('#mobile-pct').text(maxReadPct + '%');
                }
            }

            $(window).on('scroll', updateProgress);

            /* ─── Highlight on text selection ──────── */
            $content.on('mouseup', function() {
                const sel = window.getSelection();
                if (!sel || sel.isCollapsed) return;
                const range = sel.getRangeAt(0);
                if (!$(sel.anchorNode).closest('#ai-content-main').length) return;
                try {
                    const span = document.createElement('span');
                    span.className = 'highlight-marker';
                    range.surroundContents(span);
                    sel.removeAllRanges();
                } catch (e) {}
            });

            /* Word-click mark */
            $content.on('click', '.highlight-marker', function(e) {
                e.stopPropagation();
                const txt = $(this).text();
                $(this).contents().unwrap();
            });

            /* ─── Clear highlights ──────────────────── */
            $('#btn-clear-hl').on('click', () => {
                $('.highlight-marker').contents().unwrap();
            });

            /* ─── Font size ─────────────────────────── */
            $('#btn-font-up').on('click', () => {
                if (fontSize < 1.8) {
                    fontSize = +(fontSize + 0.075).toFixed(3);
                    $content.css('font-size', fontSize + 'rem');
                }
            });
            $('#btn-font-down').on('click', () => {
                if (fontSize > 0.8) {
                    fontSize = +(fontSize - 0.075).toFixed(3);
                    $content.css('font-size', fontSize + 'rem');
                }
            });

            /* ─── Book mode ─────────────────────────── */
            $('#btn-book').on('click', function() {
                isBook = !isBook;
                $body.toggleClass('book-mode', isBook);
                $(this).toggleClass('active', isBook);
            });

            /* ─── Focus mode ────────────────────────── */
            $('#btn-focus').on('click', function() {
                isFocus = !isFocus;
                $(this).toggleClass('active', isFocus);
                if (isFocus) {
                    $body.addClass('focus-mode');
                    const opts = {
                        root: null,
                        rootMargin: '-38% 0px -38% 0px',
                        threshold: 0
                    };
                    focusObserver = new IntersectionObserver(entries => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                $('.active-focus').removeClass('active-focus');
                                $(entry.target).addClass('active-focus');
                            }
                        });
                    }, opts);
                    $content.find('p, li').each(function() {
                        focusObserver.observe(this);
                    });
                } else {
                    $body.removeClass('focus-mode');
                    $('.active-focus').removeClass('active-focus');
                    if (focusObserver) focusObserver.disconnect();
                }
            });

            /* ─── Reading ruler ─────────────────────── */
            $('#btn-ruler').on('click', function() {
                isRuler = !isRuler;
                $(this).toggleClass('active', isRuler);
                $ruler.toggle(isRuler);
            });

            $(document).on('mousemove', e => {
                if (isRuler) $ruler.css('top', (e.clientY - 22) + 'px');
            });

            /* ─── Auto scroll ───────────────────────── */
            function stopScroll() {
                isScrolling = false;
                cancelAnimationFrame(scrollRaf);
                scrollAcc = 0;
                $('#scroll-icon').text('play_arrow');
                $('#scroll-play').removeClass('scrolling active');
            }

            function startScroll() {
                if (isScrolling) return;
                isScrolling = true;
                $('#scroll-icon').text('pause');
                $('#scroll-play').addClass('scrolling active');

                function step() {
                    if (!isScrolling) return;
                    scrollAcc += scrollSpeed;
                    if (scrollAcc >= 1) {
                        const px = Math.floor(scrollAcc);
                        window.scrollBy(0, px);
                        scrollAcc -= px;
                    }
                    const atBottom = (window.innerHeight + window.scrollY) >= (document.body.offsetHeight - 2);
                    if (atBottom) stopScroll();
                    else scrollRaf = requestAnimationFrame(step);
                }
                scrollRaf = requestAnimationFrame(step);
            }

            $('#scroll-play').on('click', () => {
                if (isScrolling) stopScroll();
                else startScroll();
            });

            /* Speed buttons */
            $('.speed-btn').on('click', function() {
                $('.speed-btn').removeClass('active');
                $(this).addClass('active');
                scrollSpeed = parseFloat($(this).data('speed'));
            });

            /* Stop auto-scroll when user manually scrolls */
            let userScrollTimeout;
            $(window).on('wheel touchstart', function() {
                if (isScrolling) {
                    stopScroll();
                }
            });

            /* ─── Theme picker ──────────────────────── */
            $('#btn-theme').on('click', e => {
                e.stopPropagation();
                $('#theme-popup').toggleClass('open');
            });
            $(document).on('click', () => $('#theme-popup').removeClass('open'));
            $('#theme-popup').on('click', e => e.stopPropagation());

            const allThemes = ['theme-dark', 'theme-warm', 'theme-forest', 'theme-sepia'];
            $('.theme-opt').on('click', function() {
                $body.removeClass(allThemes.join(' '));
                const t = $(this).data('theme');
                if (t) $body.addClass(t);
                $('#theme-popup').removeClass('open');
            });

            /* ─── Mobile sidebar ────────────────────── */
            window.toggleSidebar = () => {
                $('#sidebar').toggleClass('open');
                $('#sidebar-overlay').toggleClass('open');
            };
            window.closeSidebar = () => {
                $('#sidebar').removeClass('open');
                $('#sidebar-overlay').removeClass('open');
            };
        });
    </script>
</body>

</html>
