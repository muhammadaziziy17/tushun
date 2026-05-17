<!DOCTYPE html>
<html lang="uz">

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
    <link rel="shortcut icon" href="{{ asset('images/logo_without_bg.png') }}" type="image/x-icon">
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
            --glass-white: rgba(255, 255, 255, 0.65);
            --glass-border: rgba(255, 255, 255, 0.45);
            --glass-shadow: 0 8px 32px rgba(11, 57, 97, 0.12);
            --glass-blur: blur(18px);
        }

        /* ===== BACKGROUND ===== */
        body {
            min-height: 100vh;
            background-color: #edf3f5;
            background-image: url("data:image/svg+xml,%3Csvg width='240' height='240' viewBox='0 0 240 240' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' stroke='%230B3961' stroke-opacity='.12' stroke-width='1'%3E%3Cpath d='M28 40h54v34H28zM152 28h48v62h-48zM38 154h70v38H38zM150 154h54v42h-54z'/%3E%3Cpath d='M82 57h38v70h48M73 154v-32h62M176 90v34h-41M108 173h42'/%3E%3Ccircle cx='120' cy='127' r='4' fill='%230B3961' fill-opacity='.13'/%3E%3Ccircle cx='135' cy='122' r='3' fill='%230B3961' fill-opacity='.13'/%3E%3Ccircle cx='168' cy='124' r='3' fill='%230B3961' fill-opacity='.13'/%3E%3C/g%3E%3Cg fill='%230B3961' fill-opacity='.08'%3E%3Ccircle cx='20' cy='220' r='2'/%3E%3Ccircle cx='220' cy='20' r='2'/%3E%3Ccircle cx='220' cy='220' r='2'/%3E%3C/g%3E%3C/svg%3E");
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background:
                repeating-linear-gradient(0deg, rgba(11, 57, 97, 0.05) 0 1px, transparent 1px 42px),
                repeating-linear-gradient(90deg, rgba(11, 57, 97, 0.04) 0 1px, transparent 1px 42px);
            background-size: 42px 42px;
            animation: grid-drift 22s linear infinite;
            pointer-events: none;
            z-index: 0;
        }

        body::after {
            content: '';
            position: fixed;
            inset: 0;
            background:
                repeating-linear-gradient(90deg, transparent 0 118px, rgba(11, 57, 97, 0.06) 118px 120px),
                repeating-linear-gradient(0deg, transparent 0 118px, rgba(11, 57, 97, 0.045) 118px 120px);
            mask-image: radial-gradient(circle at 50% 42%, black 0 42%, transparent 74%);
            animation: blueprint-sweep 9s steps(2, end) infinite;
            pointer-events: none;
            z-index: 0;
        }

        @keyframes grid-drift {
            from {
                background-position: 0 0, 0 0, 0 0;
            }

            to {
                background-position: 42px 42px, 42px 42px;
            }
        }

        @keyframes blueprint-sweep {
            0% {
                opacity: 0.22;
                transform: translate(0, 0);
            }

            50% {
                opacity: 0.42;
                transform: translate(18px, -12px);
            }

            100% {
                opacity: 0.28;
                transform: translate(-12px, 10px);
            }
        }

        /* ===== BACKGROUND MARKERS ===== */
        .blob {
            position: fixed;
            border-radius: 6px;
            opacity: 0.5;
            pointer-events: none;
            z-index: 0;
            border: 1px solid rgba(11, 57, 97, 0.12);
            background: rgba(255, 255, 255, 0.34);
            box-shadow: 0 20px 50px rgba(11, 57, 97, 0.1);
        }

        .blob::before,
        .blob::after {
            content: '';
            position: absolute;
            left: 18px;
            right: 18px;
            height: 2px;
            background: rgba(11, 57, 97, 0.14);
            box-shadow:
                0 16px 0 rgba(11, 57, 97, 0.1),
                0 32px 0 rgba(11, 57, 97, 0.08),
                0 48px 0 rgba(11, 57, 97, 0.06);
        }

        .blob::before {
            top: 26px;
        }

        .blob::after {
            bottom: 34px;
            width: 44%;
        }

        .blob-1 {
            width: 260px;
            height: 180px;
            top: 72px;
            left: 360px;
            transform: rotate(-8deg);
            animation: panelFloat1 10s ease-in-out infinite;
        }

        .blob-2 {
            width: 220px;
            height: 220px;
            bottom: 72px;
            right: 78px;
            transform: rotate(12deg);
            animation: panelFloat2 13s ease-in-out infinite;
        }

        .blob-3 {
            width: 160px;
            height: 120px;
            top: 46%;
            right: 18%;
            border-radius: 999px;
            animation: panelFloat3 9s ease-in-out infinite;
        }

        @keyframes panelFloat1 {
            0%,
            100% {
                transform: translate(0, 0) rotate(-8deg);
            }

            50% {
                transform: translate(18px, 12px) rotate(-4deg);
            }
        }

        @keyframes panelFloat2 {
            0%,
            100% {
                transform: translate(0, 0) rotate(12deg);
            }

            50% {
                transform: translate(-18px, -14px) rotate(8deg);
            }
        }

        @keyframes panelFloat3 {
            0%,
            100% {
                transform: translate(0, 0);
            }

            50% {
                transform: translate(-12px, 16px);
            }
        }

        /* ===== GLASS MIXIN ===== */
        .glass {
            background: var(--glass-white);
            backdrop-filter: var(--glass-blur);
            -webkit-backdrop-filter: var(--glass-blur);
            border: 1px solid var(--glass-border);
            box-shadow: var(--glass-shadow);
        }

        .glass-dark {
            background: rgba(11, 57, 97, 0.55);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 8px 32px rgba(11, 57, 97, 0.25);
        }

        /* ===== DRAWER ===== */
        .drawer-content {
            position: relative;
            z-index: 1;
        }

        @media (min-width: 1024px) {
            .drawer.lg\:drawer-open>.drawer-side {
                position: fixed;
                inset: 0 auto 0 0;
                width: 330px;
                height: 100vh;
                overflow: visible;
            }

            .drawer.lg\:drawer-open>.drawer-content {
                margin-left: 330px;
                min-height: 100vh;
            }
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
            background: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
        }

        .scrollbar-custom::-webkit-scrollbar-thumb {
            background: rgba(11, 57, 97, 0.25);
            border-radius: 10px;
        }

        .scrollbar-custom::-webkit-scrollbar-thumb:hover {
            background: #0B3961;
        }

        /* ===== SIDEBAR ===== */
        .drawer-side>div {
            background: rgba(255, 255, 255, 0.85) !important;
            backdrop-filter: blur(24px) !important;
            -webkit-backdrop-filter: blur(24px) !important;
            margin: 18px 0 18px 26px;
            min-height: calc(100vh - 36px) !important;
            height: calc(100vh - 36px);
            border-radius: 28px;
            box-shadow: 0 18px 50px rgba(11, 57, 97, 0.14);
            border: 1px solid rgba(255, 255, 255, 0.65);
            border-right: none !important;
            overflow: hidden;
        }

        @media (max-width: 1023px) {
            .drawer-side>div {
                margin: 12px;
                min-height: calc(100vh - 24px) !important;
                height: calc(100vh - 24px);
                border-radius: 24px;
            }
        }

        .dashboard-main {
            width: 100%;
            max-width: 1120px;
            margin: 0 auto;
            padding: 28px 22px 48px;
        }

        @media (min-width: 768px) {
            .dashboard-main {
                padding: 38px 34px 56px;
            }
        }

        @media (min-width: 1280px) {
            .dashboard-main {
                max-width: 1180px;
                padding-left: 46px;
                padding-right: 46px;
            }
        }

        .dashboard-top-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.45fr) minmax(260px, 0.65fr);
            gap: 18px;
            align-items: stretch;
            margin-bottom: 20px;
        }

        .profile-banner {
            min-height: 220px;
            margin-bottom: 0 !important;
        }

        @media (max-width: 900px) {
            .dashboard-top-grid {
                grid-template-columns: 1fr;
            }

            .profile-banner {
                min-height: auto;
            }
        }

        .sidebar-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 16px;
            text-decoration: none;
            transition: all 0.2s;
            border: 1px solid transparent;
        }

        .sidebar-item:hover {
            background: rgba(11, 57, 97, 0.07);
            border-color: rgba(11, 57, 97, 0.12);
        }

        /* ===== UPLOADS CARD ===== */
        .uploads-card {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.76), rgba(255, 255, 255, 0.58));
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.72);
            border-radius: 30px;
            box-shadow: 0 16px 46px rgba(11, 57, 97, 0.1);
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        .uploads-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                linear-gradient(90deg, rgba(11, 57, 97, 0.08) 1px, transparent 1px),
                linear-gradient(rgba(11, 57, 97, 0.06) 1px, transparent 1px);
            background-size: 44px 44px;
            mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.4), transparent 46%);
            pointer-events: none;
        }

        .uploads-inner {
            position: relative;
            z-index: 1;
        }

        .upload-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 18px;
        }

        .upload-kicker {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 6px 10px;
            background: rgba(11, 57, 97, 0.08);
            border: 1px solid rgba(11, 57, 97, 0.1);
            border-radius: 999px;
            color: #0B3961;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.4px;
            text-transform: uppercase;
        }

        .upload-meta-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 10px;
            margin-bottom: 18px;
        }

        .upload-meta-item {
            display: flex;
            align-items: center;
            gap: 9px;
            min-height: 54px;
            padding: 10px 12px;
            background: rgba(255, 255, 255, 0.58);
            border: 1px solid rgba(255, 255, 255, 0.72);
            border-radius: 18px;
            box-shadow: 0 6px 18px rgba(11, 57, 97, 0.05);
        }

        .upload-meta-icon {
            width: 32px;
            height: 32px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #0B3961;
            background: rgba(11, 57, 97, 0.09);
            flex-shrink: 0;
        }

        @media (max-width: 767px) {
            .upload-header {
                flex-direction: column;
            }

            .upload-meta-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 480px) {
            .upload-meta-grid {
                grid-template-columns: 1fr;
            }
        }

        /* ===== UNI PILL ===== */
        .uni-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            background: rgba(255, 255, 255, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.7);
            border-radius: 999px;
            box-shadow: 0 6px 18px rgba(11, 57, 97, 0.05);
        }

        .student-strip {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: space-between;
            gap: 18px;
            margin: 0;
            padding: 18px;
            background: rgba(255, 255, 255, 0.56);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.62);
            border-radius: 28px;
            box-shadow: 0 8px 26px rgba(11, 57, 97, 0.07);
        }

        .student-strip-icon {
            width: 42px;
            height: 42px;
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #0B3961;
            background: rgba(11, 57, 97, 0.1);
            flex-shrink: 0;
        }

        /* ===== MOBILE NAVBAR ===== */
        .mobile-navbar {
            background: rgba(255, 255, 255, 0.72) !important;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.5) !important;
        }

        /* ===== HEADER CARD ===== */
        .header-card {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 24px;
            box-shadow: 0 4px 24px rgba(11, 57, 97, 0.08);
            padding: 24px 28px;
            margin-bottom: 28px;
        }

        /* ===== MODE SELECTOR ROW ===== */
        .mode-row-glass {
            background: rgba(255, 255, 255, 0.55);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.45);
            border-radius: 20px;
            padding: 12px 16px;
            box-shadow: 0 4px 16px rgba(11, 57, 97, 0.07);
        }

        /* ===== SELECT DROPDOWN ===== */
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
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(8px);
            border: 1.5px solid rgba(11, 57, 97, 0.18);
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
            box-shadow: 0 0 0 3px rgba(11, 57, 97, 0.12);
        }

        /* ===== UPLOAD ZONE SHARED ===== */
        .upload-zone {
            display: none;
        }

        .upload-zone.active {
            display: block;
        }

        .state-panel {
            display: none;
        }

        .state-panel.active {
            display: flex;
        }

        /* ===== UPLOAD ZONE V0: BRIEF ===== */
        #upload-zone-v0 {
            background:
                linear-gradient(90deg, rgba(146, 64, 14, 0.08) 1px, transparent 1px),
                repeating-linear-gradient(0deg, transparent 0 30px, rgba(146, 64, 14, 0.12) 31px, transparent 32px),
                #fffaf0;
            background-size: 34px 34px, 100% 32px, 100% 100%;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(146, 64, 14, 0.24);
            border-left: 8px solid #d97706;
            border-radius: 10px 28px 28px 10px;
            box-shadow: 0 18px 38px rgba(146, 64, 14, 0.14), inset 0 1px 0 rgba(255, 255, 255, 0.7);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        #upload-zone-v0::before {
            content: '';
            position: absolute;
            inset: 0 auto 0 78px;
            width: 1px;
            background: rgba(239, 68, 68, 0.28);
            pointer-events: none;
        }

        #upload-zone-v0 .state-panel {
            position: relative;
            z-index: 1;
        }

        #upload-zone-v0:hover,
        #upload-zone-v0.drag-active {
            border-color: rgba(146, 64, 14, 0.38);
            border-left-color: #b45309;
            box-shadow: 0 24px 48px rgba(146, 64, 14, 0.2), inset 0 1px 0 rgba(255, 255, 255, 0.8);
            transform: translateY(-2px);
        }

        .v0-badge {
            background: #fff7ed;
            color: #92400e;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 5px 12px;
            border-radius: 100px;
            border: 1px solid rgba(146, 64, 14, 0.22);
            box-shadow: 0 4px 12px rgba(146, 64, 14, 0.08);
        }

        .v0-icon-wrap {
            width: 72px;
            height: 72px;
            background: #ffffff;
            backdrop-filter: blur(8px);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(146, 64, 14, 0.18);
            box-shadow: 0 10px 22px rgba(146, 64, 14, 0.12);
            transform: rotate(-2deg);
        }

        .v0-btn {
            background: #92400e;
            backdrop-filter: blur(8px);
            color: white;
            border: 1px solid rgba(146, 64, 14, 0.35);
            border-radius: 12px;
            font-weight: 700;
            padding: 12px 32px;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 8px 18px rgba(146, 64, 14, 0.22);
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .v0-btn:hover {
            transform: translateY(-2px);
            background: #78350f;
            box-shadow: 0 12px 24px rgba(146, 64, 14, 0.3);
        }

        /* ===== UPLOAD ZONE V1: SWIFT ===== */
        #upload-zone-v1 {
            background:
                linear-gradient(90deg, rgba(8, 145, 178, 0.12) 1px, transparent 1px),
                linear-gradient(rgba(8, 145, 178, 0.1) 1px, transparent 1px),
                #ecfeff;
            background-size: 22px 22px;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(8, 145, 178, 0.28);
            border-radius: 28px;
            box-shadow: 0 18px 40px rgba(8, 145, 178, 0.14), inset 0 1px 0 rgba(255, 255, 255, 0.72);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        #upload-zone-v1::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                linear-gradient(115deg, transparent 0 34%, rgba(255, 255, 255, 0.62) 45%, transparent 56%),
                linear-gradient(135deg, rgba(8, 145, 178, 0.16), transparent 44%);
            transform: translateX(-38%);
            animation: upload-scan 3.8s ease-in-out infinite;
            pointer-events: none;
        }

        #upload-zone-v1:hover,
        #upload-zone-v1.drag-active {
            border-color: rgba(8, 145, 178, 0.55);
            box-shadow: 0 24px 48px rgba(8, 145, 178, 0.22), inset 0 1px 0 rgba(255, 255, 255, 0.82);
            transform: translateY(-2px);
        }

        .v1-grid-bg {
            position: absolute;
            inset: 0;
            pointer-events: none;
            opacity: 0.22;
            background-image:
                linear-gradient(90deg, transparent 0 46%, rgba(8, 145, 178, 0.28) 48% 52%, transparent 54%),
                linear-gradient(0deg, transparent 0 46%, rgba(8, 145, 178, 0.24) 48% 52%, transparent 54%);
            background-size: 64px 64px;
        }

        .v1-badge {
            background: #083344;
            color: #a5f3fc;
            font-size: 10px;
            font-weight: 900;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 5px 12px;
            border-radius: 100px;
            border: 1px solid rgba(8, 145, 178, 0.35);
            box-shadow: 0 8px 18px rgba(8, 145, 178, 0.18);
        }

        .v1-icon-wrap {
            width: 80px;
            height: 80px;
            border: 1.5px solid rgba(8, 145, 178, 0.38);
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.68);
            backdrop-filter: blur(8px);
            position: relative;
            box-shadow: inset 0 0 0 8px rgba(8, 145, 178, 0.05), 0 10px 24px rgba(8, 145, 178, 0.16);
        }

        .v1-icon-wrap::after {
            content: '';
            position: absolute;
            inset: -8px;
            border-radius: 28px;
            border: 1px solid rgba(8, 145, 178, 0.2);
            animation: pulse-ring 2s ease-out infinite;
        }

        .v1-btn {
            background: #083344;
            backdrop-filter: blur(8px);
            color: #cffafe;
            border: 1.5px solid rgba(8, 145, 178, 0.5);
            border-radius: 999px;
            font-weight: 700;
            font-size: 14px;
            padding: 11px 28px;
            cursor: pointer;
            transition: all 0.2s;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .v1-btn:hover {
            background: #0e7490;
            backdrop-filter: blur(12px);
            color: white;
            border-color: transparent;
            box-shadow: 0 10px 24px rgba(8, 145, 178, 0.32);
        }

        /* ===== UPLOAD ZONE V2: BRAINRA ===== */
        #upload-zone-v2 {
            background:
                radial-gradient(circle at 50% 44%, rgba(20, 184, 166, 0.16) 0 2px, transparent 3px),
                linear-gradient(90deg, rgba(20, 184, 166, 0.08) 1px, transparent 1px),
                linear-gradient(rgba(20, 184, 166, 0.06) 1px, transparent 1px),
                #08111f;
            background-size: 46px 46px, 34px 34px, 34px 34px, 100% 100%;
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(20, 184, 166, 0.34);
            border-radius: 28px;
            box-shadow: 0 24px 56px rgba(8, 17, 31, 0.28), inset 0 1px 0 rgba(255, 255, 255, 0.07);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        #upload-zone-v2::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                conic-gradient(from 0deg at 50% 50%, transparent 0 74%, rgba(20, 184, 166, 0.16) 78%, transparent 84%),
                linear-gradient(120deg, transparent 0 42%, rgba(20, 184, 166, 0.08) 50%, transparent 58%);
            animation: lab-rotate 8s linear infinite;
            pointer-events: none;
        }

        #upload-zone-v2:hover,
        #upload-zone-v2.drag-active {
            border-color: rgba(20, 184, 166, 0.6);
            box-shadow: 0 28px 68px rgba(8, 17, 31, 0.34), inset 0 0 60px rgba(20, 184, 166, 0.06);
            transform: translateY(-2px);
        }

        .v2-badge {
            background: rgba(20, 184, 166, 0.12);
            backdrop-filter: blur(8px);
            color: #99f6e4;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 4px 12px;
            border-radius: 100px;
            border: 1px solid rgba(20, 184, 166, 0.32);
            box-shadow: 0 2px 14px rgba(20, 184, 166, 0.18);
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
            border: 1px solid rgba(20, 184, 166, 0.34);
            border-radius: 50%;
            border-top-color: rgba(94, 234, 212, 0.86);
        }

        .v2-orbit-ring:nth-child(2) {
            inset: 12px;
            border-color: rgba(20, 184, 166, 0.18);
            border-top-color: rgba(45, 212, 191, 0.72);
            animation-duration: 5s;
            animation-direction: reverse;
        }

        .v2-core {
            width: 52px;
            height: 52px;
            z-index: 1;
            background: rgba(20, 184, 166, 0.14);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(20, 184, 166, 0.44);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 28px rgba(20, 184, 166, 0.18), inset 0 0 18px rgba(20, 184, 166, 0.08);
        }

        .v2-btn {
            background: rgba(20, 184, 166, 0.16);
            backdrop-filter: blur(8px);
            color: #ccfbf1;
            border: 1px solid rgba(20, 184, 166, 0.48);
            border-radius: 14px;
            font-weight: 700;
            font-size: 14px;
            padding: 13px 30px;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 8px 24px rgba(20, 184, 166, 0.16);
            position: relative;
            overflow: hidden;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .v2-btn::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, transparent, rgba(153, 246, 228, 0.16), transparent);
            background-size: 200% 100%;
            animation: shimmer 2.5s infinite;
        }

        .v2-btn:hover {
            transform: translateY(-2px);
            background: rgba(20, 184, 166, 0.24);
            box-shadow: 0 12px 30px rgba(20, 184, 166, 0.24);
        }

        /* ===== DISTINCT VERSION LAYOUTS ===== */
        #v0-state-initial.active {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 180px;
            grid-template-rows: repeat(6, auto);
            align-items: center;
            gap: 6px 24px;
            text-align: left;
            min-height: 280px;
        }

        #v0-state-initial>div:first-child,
        #v0-state-initial>h3,
        #v0-state-initial>p,
        #v0-state-initial>div:nth-child(6) {
            grid-column: 1;
        }

        #v0-state-initial .v0-icon-wrap {
            grid-column: 2;
            grid-row: 1 / 6;
            justify-self: center;
            align-self: center;
            width: 126px;
            height: 150px;
            border-radius: 6px;
            transform: rotate(3deg);
        }

        #v0-state-initial>div:nth-child(7) {
            grid-column: 1 / -1;
            justify-self: start;
        }

        #v1-state-initial.active {
            display: grid;
            grid-template-columns: 132px minmax(0, 1fr);
            grid-template-rows: repeat(6, auto);
            align-items: center;
            gap: 8px 24px;
            text-align: left;
            min-height: 280px;
        }

        #v1-state-initial .v1-icon-wrap {
            grid-column: 1;
            grid-row: 1 / 7;
            justify-self: center;
            align-self: center;
            width: 112px;
            height: 112px;
            border-radius: 32px;
        }

        #v1-state-initial>div:first-child,
        #v1-state-initial>h3,
        #v1-state-initial>p,
        #v1-state-initial>div:nth-child(6),
        #v1-state-initial>div:nth-child(7) {
            grid-column: 2;
        }

        #v2-state-initial.active {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 190px;
            grid-template-rows: repeat(6, auto);
            align-items: center;
            gap: 8px 26px;
            text-align: left;
            min-height: 300px;
        }

        #v2-state-initial .v2-orbit {
            grid-column: 2;
            grid-row: 1 / 6;
            justify-self: center;
            align-self: center;
            width: 150px;
            height: 150px;
        }

        #v2-state-initial>div:first-child,
        #v2-state-initial>h3,
        #v2-state-initial>p,
        #v2-state-initial>div:nth-child(6) {
            grid-column: 1;
        }

        #v2-state-initial>div:nth-child(7) {
            grid-column: 1 / -1;
            justify-content: flex-start;
        }

        @media (max-width: 720px) {
            #v0-state-initial.active,
            #v1-state-initial.active,
            #v2-state-initial.active {
                display: flex;
                text-align: center;
                min-height: auto;
            }

            #v0-state-initial>div:nth-child(7),
            #v1-state-initial>div:nth-child(7),
            #v2-state-initial>div:nth-child(7) {
                justify-self: center;
                justify-content: center;
            }

            #v0-state-initial .v0-icon-wrap,
            #v1-state-initial .v1-icon-wrap,
            #v2-state-initial .v2-orbit {
                width: revert;
                height: revert;
            }
        }

        /* ===== UNIVERSITY INFO TAG ===== */
        .uni-tag {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(11, 57, 97, 0.08);
        }

        /* ===== MODE DESC PILL ===== */
        .mode-desc-pill {
            background: rgba(255, 255, 255, 0.55);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 16px;
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

        @keyframes upload-scan {
            0% {
                transform: translateX(-46%);
                opacity: 0.2;
            }

            45% {
                opacity: 0.78;
            }

            100% {
                transform: translateX(46%);
                opacity: 0.2;
            }
        }

        @keyframes lab-rotate {
            from {
                transform: rotate(0deg) scale(1.12);
            }

            to {
                transform: rotate(360deg) scale(1.12);
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

        @keyframes progress-pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.6;
            }
        }

        /* ===== EDITORIAL OS OVERRIDES ===== */
        :root {
            --paper: #fbfaf6;
            --paper-deep: #f1ecdf;
            --paper-line: rgba(41, 47, 54, 0.12);
            --ink: #18212c;
            --ink-muted: #647076;
            --editorial-blue: #0B3961;
            --editorial-cyan: #0891b2;
            --editorial-amber: #b7791f;
            --editorial-teal: #0f766e;
            --paper-shadow: 0 24px 70px rgba(31, 38, 45, 0.12);
        }

        body {
            background-color: var(--paper);
            background-image:
                radial-gradient(circle at 18% 22%, rgba(24, 33, 44, 0.045) 0 1px, transparent 1.8px),
                radial-gradient(circle at 78% 18%, rgba(183, 121, 31, 0.08) 0 1px, transparent 1.8px),
                radial-gradient(circle at 62% 74%, rgba(11, 57, 97, 0.045) 0 1px, transparent 1.8px);
            background-size: 22px 22px, 31px 31px, 27px 27px;
            color: var(--ink);
        }

        body::before {
            background:
                linear-gradient(115deg, transparent 0 62%, rgba(24, 33, 44, 0.035) 62% 62.6%, transparent 62.6%),
                linear-gradient(0deg, rgba(255, 255, 255, 0.65), rgba(255, 255, 255, 0.22));
            animation: paper-breathe 16s ease-in-out infinite;
            z-index: 0;
        }

        body::after {
            inset: auto 4vw 5vh auto;
            width: min(36vw, 420px);
            height: min(42vw, 520px);
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.92), rgba(247, 244, 236, 0.92)),
                repeating-linear-gradient(0deg, transparent 0 31px, rgba(24, 33, 44, 0.08) 32px);
            border: 1px solid rgba(24, 33, 44, 0.08);
            border-radius: 8px;
            box-shadow: var(--paper-shadow);
            mask-image: none;
            transform: rotate(4deg);
            animation: sheet-drift 13s ease-in-out infinite;
        }

        .blob {
            display: block;
            border-radius: 8px;
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.86), rgba(244, 239, 228, 0.8)),
                repeating-linear-gradient(0deg, transparent 0 27px, rgba(24, 33, 44, 0.08) 28px);
            border: 1px solid rgba(24, 33, 44, 0.08);
            box-shadow: 0 22px 55px rgba(31, 38, 45, 0.1);
            opacity: 0.72;
        }

        .blob-1 {
            top: 74px;
            left: 370px;
            width: 210px;
            height: 148px;
            animation: editorialFloat1 14s ease-in-out infinite;
        }

        .blob-2 {
            right: 6vw;
            bottom: 72px;
            width: 245px;
            height: 180px;
            animation: editorialFloat2 17s ease-in-out infinite;
        }

        .blob-3 {
            top: 46%;
            right: 22%;
            width: 150px;
            height: 105px;
            border-radius: 8px;
            animation: editorialFloat3 12s ease-in-out infinite;
        }

        .drawer-side>div,
        .mobile-navbar,
        .profile-banner,
        .student-strip,
        .uploads-card {
            background: rgba(255, 253, 248, 0.86) !important;
            border-color: rgba(24, 33, 44, 0.1) !important;
            box-shadow: var(--paper-shadow) !important;
            backdrop-filter: blur(18px) !important;
            -webkit-backdrop-filter: blur(18px) !important;
        }

        .drawer-side>div {
            border-radius: 22px;
            border-right: 1px solid rgba(24, 33, 44, 0.1) !important;
        }

        .dashboard-top-grid {
            grid-template-columns: minmax(0, 1fr);
        }

        .profile-banner {
            min-height: 260px;
            border-radius: 18px !important;
            isolation: isolate;
        }

        .profile-banner::before {
            content: '';
            position: absolute;
            inset: 18px 22px auto auto;
            width: 150px;
            height: 96px;
            background: rgba(255, 255, 255, 0.68);
            border: 1px solid rgba(24, 33, 44, 0.1);
            border-radius: 8px;
            box-shadow: 0 14px 32px rgba(31, 38, 45, 0.09);
            transform: rotate(5deg);
            z-index: 0;
        }

        .student-strip {
            display: none;
        }

        #selectedText {
            display: inline-block;
            min-height: 2.1rem;
            color: var(--ink-muted);
            transform: translateY(0);
        }

        #selectedText.phrase-out {
            animation: phraseOut 0.28s ease forwards;
        }

        #selectedText.phrase-in {
            animation: phraseIn 0.46s ease forwards;
        }

        .uploads-card {
            border-radius: 18px;
            padding: 18px;
        }

        .uploads-card::before {
            background:
                radial-gradient(circle at 18% 20%, rgba(183, 121, 31, 0.12) 0 1px, transparent 2px),
                linear-gradient(90deg, rgba(24, 33, 44, 0.055) 1px, transparent 1px);
            background-size: 24px 24px, 72px 100%;
            mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.28), transparent 58%);
        }

        .upload-kicker,
        .mode-desc-pill,
        .upload-meta-item,
        .mode-row-glass {
            background: rgba(255, 255, 255, 0.62);
            border-color: rgba(24, 33, 44, 0.1);
            border-radius: 12px;
        }

        #upload-zone-v0,
        #upload-zone-v1,
        #upload-zone-v2 {
            color: var(--ink);
            min-height: 316px;
            border-radius: 16px;
            box-shadow: 0 20px 46px rgba(31, 38, 45, 0.1);
            overflow: hidden;
        }

        #upload-zone-v0 {
            background:
                linear-gradient(90deg, rgba(183, 121, 31, 0.16) 1px, transparent 1px),
                repeating-linear-gradient(0deg, transparent 0 29px, rgba(183, 121, 31, 0.16) 30px, transparent 31px),
                #fff8e9;
            border: 1px solid rgba(183, 121, 31, 0.26);
            border-left: 11px solid var(--editorial-amber);
        }

        #upload-zone-v1 {
            background:
                linear-gradient(90deg, rgba(8, 145, 178, 0.16) 0 1px, transparent 1px),
                linear-gradient(0deg, rgba(8, 145, 178, 0.08) 0 1px, transparent 1px),
                #f8fdff;
            background-size: 36px 36px;
            border: 1px solid rgba(8, 145, 178, 0.24);
        }

        #upload-zone-v1::before {
            background:
                linear-gradient(90deg, transparent 0 18%, rgba(8, 145, 178, 0.12) 18% 19%, transparent 19% 100%),
                linear-gradient(180deg, rgba(255, 255, 255, 0.58), transparent);
            animation: lane-pass 5s ease-in-out infinite;
        }

        #upload-zone-v2 {
            background:
                linear-gradient(90deg, rgba(15, 118, 110, 0.1) 1px, transparent 1px),
                linear-gradient(0deg, rgba(15, 118, 110, 0.08) 1px, transparent 1px),
                #f3fbf8;
            background-size: 38px 38px;
            border: 1px solid rgba(15, 118, 110, 0.24);
        }

        #upload-zone-v2::before {
            background:
                linear-gradient(90deg, rgba(255,255,255,0.74), transparent 44%),
                radial-gradient(circle at 78% 26%, rgba(15, 118, 110, 0.12) 0 2px, transparent 2.6px);
            animation: research-scan 10s ease-in-out infinite;
        }

        .v2-badge {
            background: #e7f6f1;
            color: #0f766e;
            border-color: rgba(15, 118, 110, 0.24);
            box-shadow: none;
        }

        .v2-core {
            background: #ffffff;
            border-color: rgba(15, 118, 110, 0.28);
            box-shadow: 0 12px 32px rgba(15, 118, 110, 0.13);
        }

        .v2-orbit-ring {
            border-color: rgba(15, 118, 110, 0.26);
            border-top-color: rgba(15, 118, 110, 0.72);
        }

        #upload-zone-v2 h3,
        #upload-zone-v2 .text-white {
            color: var(--ink) !important;
        }

        #upload-zone-v2 p,
        #upload-zone-v2 .text-slate-400,
        #upload-zone-v2 .text-slate-500,
        #upload-zone-v2 .text-teal-100\/80,
        #upload-zone-v2 .text-teal-200\/70 {
            color: #56656a !important;
        }

        #upload-zone-v2 .text-teal-200,
        #upload-zone-v2 .text-teal-300 {
            color: var(--editorial-teal) !important;
        }

        .v2-btn {
            background: var(--ink);
            color: #f6fffc;
            border-color: var(--ink);
            box-shadow: 0 10px 24px rgba(24, 33, 44, 0.18);
        }

        .v2-btn:hover {
            background: #0f766e;
        }

        .account-tile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            margin: -22px 0 22px;
            background: rgba(255, 255, 255, 0.7);
            border: 1px solid rgba(24, 33, 44, 0.1);
            border-radius: 16px;
            box-shadow: 0 12px 26px rgba(31, 38, 45, 0.07);
        }

        .account-avatar {
            width: 42px;
            height: 42px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--editorial-blue);
            font-weight: 900;
            background: #eef3f5;
            border: 1px solid rgba(11, 57, 97, 0.14);
            flex-shrink: 0;
        }

        .account-logout {
            width: 34px;
            height: 34px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #8f3f36;
            background: #fff2ed;
            border: 1px solid rgba(143, 63, 54, 0.16);
            transition: transform 0.18s ease, background 0.18s ease;
        }

        .account-logout:hover {
            transform: translateY(-1px);
            background: #ffe4da;
        }

        @keyframes paper-breathe {
            0%, 100% { opacity: 0.78; transform: translateY(0); }
            50% { opacity: 1; transform: translateY(-10px); }
        }

        @keyframes sheet-drift {
            0%, 100% { transform: translate(0, 0) rotate(4deg); }
            50% { transform: translate(-14px, -10px) rotate(2deg); }
        }

        @keyframes editorialFloat1 {
            0%, 100% { transform: translate(0, 0) rotate(-7deg); }
            50% { transform: translate(14px, 9px) rotate(-4deg); }
        }

        @keyframes editorialFloat2 {
            0%, 100% { transform: translate(0, 0) rotate(7deg); }
            50% { transform: translate(-12px, -14px) rotate(4deg); }
        }

        @keyframes editorialFloat3 {
            0%, 100% { transform: translate(0, 0) rotate(2deg); }
            50% { transform: translate(10px, -8px) rotate(-2deg); }
        }

        @keyframes phraseIn {
            from { opacity: 0; transform: translateY(12px); filter: blur(3px); }
            to { opacity: 1; transform: translateY(0); filter: blur(0); }
        }

        @keyframes phraseOut {
            from { opacity: 1; transform: translateY(0); filter: blur(0); }
            to { opacity: 0; transform: translateY(-10px); filter: blur(3px); }
        }

        @keyframes lane-pass {
            0%, 100% { transform: translateX(-10%); opacity: 0.42; }
            50% { transform: translateX(10%); opacity: 0.78; }
        }

        @keyframes research-scan {
            0%, 100% { transform: translateX(0); opacity: 0.8; }
            50% { transform: translateX(18px); opacity: 1; }
        }
    </style>
</head>

<body class="min-h-screen font-sans text-slate-900">

    <!-- Decorative blobs -->
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>

    <div class="drawer lg:drawer-open" style="position:relative;z-index:1;">
        <input id="dashboard-drawer" type="checkbox" class="drawer-toggle" />

        <!-- ======== DRAWER CONTENT ======== -->
        <div class="drawer-content flex flex-col min-h-screen">

            <!-- Mobile Navbar -->
            <div class="lg:hidden mobile-navbar flex items-center justify-between px-4 py-3 sticky top-0 z-10">
                <label for="dashboard-drawer" class="btn btn-ghost btn-sm btn-square drawer-button">
                    <span class="material-symbols-outlined text-primary" style="font-size:22px">menu</span>
                </label>
                <div class="flex items-center gap-2">
                    <img src="{{ asset('images/logo_without_bg.png') }}" alt="Tushun" class="h-7 w-auto">
                    <span class="font-black text-primary tracking-tighter text-lg">TUSHUN</span>
                </div>
                <div class="size-8 rounded-full flex items-center justify-center text-primary font-bold text-sm"
                    style="background:rgba(11,57,97,0.12);border:1px solid rgba(11,57,97,0.18);">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
            </div>

            <!-- ======= MAIN CONTENT ======= -->
            <main class="dashboard-main flex-1">

                <div class="dashboard-top-grid">
                    <!-- USER PROFILE BANNER -->
                    <div
                        class="profile-banner flex flex-col justify-between bg-white/50 backdrop-blur-xl border border-white/60 rounded-3xl p-6 md:p-8 shadow-[0_8px_30px_rgb(11,57,97,0.06)] relative overflow-hidden">
                        <div class="absolute right-8 top-8 w-40 h-28 rounded-lg border border-slate-900/10 bg-white/50 rotate-3"></div>
                        <div class="absolute left-8 bottom-8 w-32 h-20 rounded-lg border border-slate-900/10 bg-[#f7f1e4]/70 -rotate-6"></div>

                        <div class="relative z-10">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="inline-flex size-11 rounded-2xl items-center justify-center text-primary"
                                    style="background:rgba(11,57,97,0.1);border:1px solid rgba(11,57,97,0.12);">
                                    <span class="material-symbols-outlined" style="font-size:24px">waving_hand</span>
                                </span>
                                <h1 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-primary tracking-tight">
                                    Salom, {{ auth()->user()->name }}!
                                </h1>
                            </div>
                            <p class="text-slate-600 mt-1.5 text-base md:text-lg min-h-7 font-medium"
                                id="selectedText"></p>
                        </div>

                        <div class="relative z-10 mt-7 flex flex-wrap gap-2">
                            <span class="rounded-2xl px-3 py-2 text-xs font-bold text-primary"
                                style="background:rgba(255,255,255,0.58);border:1px solid rgba(255,255,255,0.7);">
                                PDF va PPTX tahlili
                            </span>
                            <span class="rounded-2xl px-3 py-2 text-xs font-bold text-slate-600"
                                style="background:rgba(255,255,255,0.48);border:1px solid rgba(255,255,255,0.62);">
                                3 xil tushuntirish rejimi
                            </span>
                        </div>
                    </div>

                    <div class="student-strip">
                        <div class="flex items-center gap-3 min-w-0">
                            <span class="student-strip-icon">
                                <span class="material-symbols-outlined" style="font-size:22px">school</span>
                            </span>
                            <div class="min-w-0">
                                <p class="text-[10px] font-black text-slate-500 uppercase tracking-[1.8px]">Universitet
                                </p>
                                <p class="text-sm md:text-base font-bold text-primary">
                                    {{ auth()->user()->university }}</p>
                            </div>
                        </div>
                        <div class="w-full rounded-2xl p-4"
                            style="background:rgba(11,57,97,0.08);border:1px solid rgba(11,57,97,0.1);">
                            <div class="flex items-center gap-2 text-xs font-semibold text-slate-600">
                                <span class="material-symbols-outlined text-primary" style="font-size:18px">history</span>
                                Yuklangan ishlar kutubxonada saqlanadi
                            </div>
                            <div class="mt-4 grid grid-cols-2 gap-2">
                                <div class="rounded-2xl p-3 text-center"
                                    style="background:rgba(255,255,255,0.55);border:1px solid rgba(255,255,255,0.65);">
                                    <p class="text-lg font-black text-primary">{{ $presentations->count() }}</p>
                                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wide">Fayl</p>
                                </div>
                                <div class="rounded-2xl p-3 text-center"
                                    style="background:rgba(255,255,255,0.55);border:1px solid rgba(255,255,255,0.65);">
                                    <p class="text-lg font-black text-primary">AI</p>
                                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wide">Tahlil</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ====== UPLOAD SECTION ====== -->
                <section>
                    <div class="uploads-card">
                        <div class="uploads-inner">

                            <div class="upload-header">
                                <div>
                                    <span class="upload-kicker">
                                        <span class="material-symbols-outlined" style="font-size:16px">cloud_upload</span>
                                        Yangi tahlil
                                    </span>
                                    <h2 class="text-2xl md:text-3xl font-black text-primary tracking-tight mt-3">
                                        Prezentatsiyani tashlang, tushunarli konspekt oling
                                    </h2>
                                    <p class="text-sm text-slate-600 mt-2 max-w-xl">
                                        Rejimni tanlang, PDF yoki PPTX faylni yuklang. Tayyor tahlil avtomatik ochiladi.
                                    </p>
                                </div>
                                <div class="hidden md:flex items-center gap-2 rounded-2xl px-4 py-3"
                                    style="background:rgba(11,57,97,0.08);border:1px solid rgba(11,57,97,0.1);">
                                    <span class="material-symbols-outlined text-primary"
                                        style="font-size:22px">auto_awesome</span>
                                    <span class="text-xs font-bold text-primary">AI bilan tahlil</span>
                                </div>
                            </div>

                            <div class="upload-meta-grid">
                                <div class="upload-meta-item">
                                    <span class="upload-meta-icon">
                                        <span class="material-symbols-outlined" style="font-size:18px">picture_as_pdf</span>
                                    </span>
                                    <div>
                                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Format
                                        </p>
                                        <p class="text-xs font-bold text-slate-700">PDF, PPTX</p>
                                    </div>
                                </div>
                                <div class="upload-meta-item">
                                    <span class="upload-meta-icon">
                                        <span class="material-symbols-outlined" style="font-size:18px">hard_drive</span>
                                    </span>
                                    <div>
                                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Hajm
                                        </p>
                                        <p class="text-xs font-bold text-slate-700">32 MB gacha</p>
                                    </div>
                                </div>
                                <div class="upload-meta-item">
                                    <span class="upload-meta-icon">
                                        <span class="material-symbols-outlined" style="font-size:18px">switch_access_shortcut</span>
                                    </span>
                                    <div>
                                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Rejim
                                        </p>
                                        <p class="text-xs font-bold text-slate-700">3 xil tahlil</p>
                                    </div>
                                </div>
                                <div class="upload-meta-item">
                                    <span class="upload-meta-icon">
                                        <span class="material-symbols-outlined" style="font-size:18px">library_books</span>
                                    </span>
                                    <div>
                                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Tarix
                                        </p>
                                        <p class="text-xs font-bold text-slate-700">Kutubxonada</p>
                                    </div>
                                </div>
                            </div>

                        <!-- Mode Selector Row -->
                        <div class="mode-row-glass flex items-center gap-3 mb-5 flex-wrap">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary" style="font-size:18px">tune</span>
                                <span class="text-xs font-bold text-slate-500 uppercase tracking-widest">Rejim</span>
                            </div>
                            <div class="mode-select-wrap flex-1 min-w-[220px] max-w-xs">
                                <select class="mode-select w-full" id="modeSelect">
                                    <option value="v0" data-icon="📄">📄 V0: Brief — Qisqa konspekt</option>
                                    <option value="v1" data-icon="⚡">⚡ V1: Swift — Tez va sodda</option>
                                    <option value="v2" data-icon="🧠">🧠 v2: Brainra — Bilim aurasi</option>
                                </select>
                            </div>
                            <div id="modeDescPill"
                                class="mode-desc-pill text-xs text-slate-600 px-3 py-2 hidden md:block max-w-xs leading-snug">
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
                                        <span class="text-xs text-amber-700 font-medium">Vaqtim oltin</span>
                                    </div>
                                    <div class="v0-icon-wrap mb-5">
                                        <span class="material-symbols-outlined text-amber-600"
                                            style="font-size:34px;font-variation-settings:'FILL' 1">article</span>
                                    </div>
                                    <h3 class="text-xl font-extrabold text-slate-800 mb-2">Prezentatsiyani yuklang</h3>
                                    <p class="text-slate-600 text-sm mb-1">Tushun eng asosiy qismlarni <strong
                                            class="text-amber-700">1–2 sahifaga</strong> sig'diradi</p>
                                    <p class="text-slate-500 text-xs mb-7">PDF yoki PPTX • Ko'pi bilan 32 MB</p>
                                    <div class="flex flex-col sm:flex-row items-center gap-3">
                                        <input type="file" id="v0-file-input" class="hidden" accept=".pdf,.pptx">
                                        <label for="v0-file-input" class="v0-btn">📎 Fayl tanlash</label>
                                        <span class="text-xs text-slate-500">yoki shu yerga tashlang</span>
                                    </div>
                                    <div class="mt-7 flex items-start gap-3 rounded-2xl px-4 py-3 text-left max-w-sm"
                                        style="background:rgba(251,191,36,0.12);border:1px solid rgba(251,191,36,0.3);backdrop-filter:blur(8px);">
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
                                        style="background:rgba(209,250,229,0.7);border-color:rgba(52,211,153,0.4);">
                                        <span class="material-symbols-outlined text-green-600"
                                            style="font-size:32px;font-variation-settings:'FILL' 1">check_circle</span>
                                    </div>
                                    <h3 class="text-lg font-bold text-slate-800 mb-1">Fayl tayyor!</h3>
                                    <p class="text-sm text-slate-500 mb-6" id="v0-filename"></p>
                                    <div class="flex gap-3">
                                        <button class="btn btn-ghost btn-sm rounded-2xl"
                                            id="v0-btn-cancel">Boshqasi</button>
                                        <button class="v0-btn" id="v0-btn-submit">📄 Brief qilish</button>
                                    </div>
                                </div>

                                <!-- Uploading State -->
                                <div class="state-panel flex-col items-center text-center w-full"
                                    id="v0-state-uploading">
                                    <div class="relative mb-5">
                                        <div class="v0-icon-wrap animate-float" style="width:72px;height:72px">
                                            <span class="material-symbols-outlined text-amber-600"
                                                style="font-size:34px;font-variation-settings:'FILL' 0">description</span>
                                        </div>
                                        <div class="absolute -bottom-2 -right-2 size-9 rounded-xl bg-amber-500 animate-ai-pulse flex items-center justify-center"
                                            style="backdrop-filter:blur(8px);">
                                            <span class="material-symbols-outlined text-white"
                                                style="font-size:18px;font-variation-settings:'FILL' 1">auto_awesome</span>
                                        </div>
                                    </div>
                                    <p class="text-sm font-bold text-slate-700 mb-1">Brief tayyorlanmoqda...</p>
                                    <p class="text-xs text-slate-500 mb-4" id="v0-uploading-name"></p>
                                    <div class="w-full max-w-xs rounded-full h-2"
                                        style="background:rgba(251,191,36,0.2);border:1px solid rgba(251,191,36,0.3);">
                                        <div id="v0-progress-bar"
                                            class="bg-amber-500 h-2 rounded-full transition-all duration-300"
                                            style="width:0%"></div>
                                    </div>
                                    <span class="text-xs font-bold mt-2 text-amber-600"
                                        id="v0-progress-text">0%</span>
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
                                        <span class="text-xs text-cyan-700 font-medium">Tez va sodda</span>
                                    </div>
                                    <div class="v1-icon-wrap mb-5">
                                        <span class="material-symbols-outlined text-cyan-600"
                                            style="font-size:36px;font-variation-settings:'FILL' 1">bolt</span>
                                    </div>
                                    <h3 class="text-xl font-extrabold text-slate-800 mb-2">Prezentatsiyani yuklang</h3>
                                    <p class="text-slate-600 text-sm mb-1">Do'stingiz tushuntirib bergandek <strong
                                            class="text-cyan-600">lo'nda tahlil</strong></p>
                                    <p class="text-slate-500 text-xs mb-7">PDF yoki PPTX • Ko'pi bilan 32 MB</p>
                                    <div class="flex flex-col sm:flex-row items-center gap-3">
                                        <input type="file" id="v1-file-input" class="hidden" accept=".pdf,.pptx">
                                        <label for="v1-file-input" class="v1-btn">⚡ Fayl tanlash</label>
                                        <span class="text-xs text-slate-500">yoki shu yerga tashlang</span>
                                    </div>
                                    <div class="mt-7 flex items-start gap-3 rounded-2xl px-4 py-3 text-left max-w-sm"
                                        style="background:rgba(6,182,212,0.08);border:1px solid rgba(6,182,212,0.25);backdrop-filter:blur(8px);">
                                        <span class="text-cyan-500 text-lg mt-0.5">💬</span>
                                        <div>
                                            <p class="text-xs font-bold text-cyan-700">Natija: Oddiy tushuntirish</p>
                                            <p class="text-xs text-cyan-600 mt-0.5">Murakkab atamalarsiz, qulay va
                                                tushunarli tahlil</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Ready State -->
                                <div class="state-panel flex-col items-center text-center relative z-10"
                                    id="v1-state-ready">
                                    <div class="size-16 rounded-full border-2 border-cyan-400 flex items-center justify-center mb-4"
                                        style="background:rgba(6,182,212,0.1);backdrop-filter:blur(8px);">
                                        <span class="material-symbols-outlined text-cyan-600"
                                            style="font-size:30px;font-variation-settings:'FILL' 1">check</span>
                                    </div>
                                    <h3 class="text-lg font-bold text-slate-800 mb-1">Fayl tayyor!</h3>
                                    <p class="text-sm text-cyan-600 mb-6" id="v1-filename"></p>
                                    <div class="flex gap-3">
                                        <button class="btn btn-ghost btn-sm rounded-2xl text-slate-500"
                                            id="v1-btn-cancel">Boshqasi</button>
                                        <button class="v1-btn" id="v1-btn-submit">⚡ Swift tahlil</button>
                                    </div>
                                </div>

                                <!-- Uploading State -->
                                <div class="state-panel flex-col items-center text-center w-full relative z-10"
                                    id="v1-state-uploading">
                                    <div class="relative mb-5">
                                        <div class="size-16 rounded-full border-2 border-cyan-400 animate-spin-slow flex items-center justify-center"
                                            style="background:rgba(6,182,212,0.1);backdrop-filter:blur(8px);">
                                            <span class="material-symbols-outlined text-cyan-600"
                                                style="font-size:28px">bolt</span>
                                        </div>
                                    </div>
                                    <p class="text-sm font-bold text-cyan-700 mb-1">Tezkor tahlil...</p>
                                    <p class="text-xs text-slate-500 mb-4" id="v1-uploading-name"></p>
                                    <div class="w-full max-w-xs rounded-full h-1.5"
                                        style="background:rgba(6,182,212,0.1);border:1px solid rgba(6,182,212,0.25);">
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
                                    <span class="text-xs text-teal-700 font-medium">Research Desk</span>
                                    </div>
                                    <div class="v2-orbit mb-5">
                                        <div class="v2-orbit-ring animate-spin-slow"></div>
                                        <div class="v2-orbit-ring animate-spin-slow"></div>
                                        <div class="v2-core">
                                            <span class="material-symbols-outlined text-teal-200"
                                                style="font-size:24px;font-variation-settings:'FILL' 1">psychology</span>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-extrabold text-white mb-2">Research Desk tahlili</h3>
                                    <p class="text-teal-100/80 text-sm mb-1">AI slaydlarni dalil, mantiq va xulosa bo'yicha
                                        <strong class="text-teal-200">tartiblaydi</strong></p>
                                    <p class="text-slate-400 text-xs mb-7">PDF yoki PPTX • Ko'pi bilan 32 MB</p>
                                    <div class="flex flex-col sm:flex-row items-center gap-3">
                                        <input type="file" id="v2-file-input" class="hidden" accept=".pdf,.pptx">
                                        <label for="v2-file-input" class="v2-btn"
                                            style="display:inline-block;position:relative;overflow:hidden">🧠 Fayl
                                            tanlash</label>
                                        <span class="text-xs text-slate-500">yoki shu yerga tashlang</span>
                                    </div>
                                    <div class="mt-7 flex flex-wrap gap-2 justify-center">
                                        <span class="text-xs rounded-xl px-3 py-1.5 text-teal-200"
                                            style="background:rgba(20,184,166,0.12);border:1px solid rgba(20,184,166,0.3);backdrop-filter:blur(8px);">🔎
                                            Kamchilik tahlili</span>
                                        <span class="text-xs rounded-xl px-3 py-1.5 text-teal-200"
                                            style="background:rgba(20,184,166,0.12);border:1px solid rgba(20,184,166,0.3);backdrop-filter:blur(8px);">📊
                                            Iqtisodiy bog'liqlik</span>
                                        <span class="text-xs rounded-xl px-3 py-1.5 text-teal-200"
                                            style="background:rgba(20,184,166,0.12);border:1px solid rgba(20,184,166,0.3);backdrop-filter:blur(8px);">💡
                                            Chuqur insight</span>
                                        <span class="text-xs rounded-xl px-3 py-1.5 text-teal-200"
                                            style="background:rgba(20,184,166,0.12);border:1px solid rgba(20,184,166,0.3);backdrop-filter:blur(8px);">⚡
                                            Ekspertiza</span>
                                    </div>
                                </div>

                                <!-- Ready State -->
                                <div class="state-panel flex-col items-center text-center relative z-10"
                                    id="v2-state-ready">
                                    <div class="size-16 rounded-full mb-4 flex items-center justify-center"
                                        style="background:rgba(20,184,166,0.14);border:1px solid rgba(20,184,166,0.4);backdrop-filter:blur(8px);">
                                        <span class="material-symbols-outlined text-teal-200"
                                            style="font-size:28px;font-variation-settings:'FILL' 1">verified</span>
                                    </div>
                                    <h3 class="text-lg font-bold text-white mb-1">Fayl tayyor!</h3>
                                    <p class="text-sm text-teal-200/70 mb-6" id="v2-filename"></p>
                                    <div class="flex gap-3">
                                        <button class="btn btn-ghost btn-sm rounded-2xl text-slate-400"
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
                                            <span class="material-symbols-outlined text-teal-200"
                                                style="font-size:22px;font-variation-settings:'FILL' 1">psychology</span>
                                        </div>
                                    </div>
                                    <p class="text-sm font-bold text-teal-200 mb-1">Chuqur tahlil amalga
                                        oshirilmoqda...
                                    </p>
                                    <p class="text-xs text-slate-500 mb-5" id="v2-uploading-name"></p>
                                    <div class="w-full max-w-xs relative">
                                        <div class="rounded-full h-1.5"
                                            style="background:rgba(20,184,166,0.12);border:1px solid rgba(20,184,166,0.3);">
                                            <div id="v2-progress-bar"
                                                class="h-1.5 rounded-full transition-all duration-300"
                                                style="width:0%;background:linear-gradient(90deg,#14b8a6,#5eead4)">
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-xs font-bold mt-2 text-teal-300"
                                        id="v2-progress-text">0%</span>
                                </div>

                            </div>
                        </div>
                        </div>
                    </div>

                </section>
            </main>
        </div>

        <!-- ======== SIDEBAR ======== -->
        <aside class="drawer-side z-20">
            <label for="dashboard-drawer" class="drawer-overlay"></label>
            <div class="w-72 min-h-full p-5 flex flex-col">

                <!-- Logo -->
                <div class="flex items-center gap-3 mb-10">
                    <div class="size-9 rounded-2xl flex items-center justify-center"
                        style="background:rgba(255,255,255,0.7);border:1px solid rgba(255,255,255,0.6);box-shadow:0 2px 8px rgba(11,57,97,0.1);">
                        <img src="{{ asset('images/logo_without_bg.png') }}" alt="Tushun Logo"
                            class="h-6 w-auto">
                    </div>
                    <span class="text-xl font-black text-primary tracking-tighter uppercase">TUSHUN</span>
                </div>

                <div class="account-tile">
                    <div class="account-avatar">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-black text-slate-800 truncate">{{ auth()->user()->name }}</p>
                        <p class="text-[10px] text-slate-500 truncate">{{ auth()->user()->university }} talabasi</p>
                    </div>
                    <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="account-logout" title="Chiqish">
                        <span class="material-symbols-outlined" style="font-size:19px">logout</span>
                    </button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf
                    </form>
                </div>

                <!-- Library -->
                <div class="flex-1 overflow-y-auto">
                    <h3 class="text-[10px] font-bold text-slate-500 uppercase tracking-[2px] mb-3 px-1">Kutubxonangiz
                    </h3>
                    <nav class="space-y-0.5 scrollbar-custom" id="user_library">
                        @foreach ($presentations as $p)
                            <a href="{{ route('presentation.show_by_id', $p->id) }}" class="sidebar-item"
                                target="_blank">
                                <span class="material-symbols-outlined text-slate-400 mt-0.5 flex-shrink-0"
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

            </div>
        </aside>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {

            // ======= PHRASE REVEAL GREETING =======
            const greetings = [
                'Bugungi mavzuni tartiblaymiz',
                'Slaydlardan konspekt yasaymiz',
                'Murakkab joylarni oddiy tilda ochamiz',
                'Imtihonga kerakli fikrlarni ajratamiz',
                'Prezentatsiyani o\'qish rejasiga aylantiramiz'
            ];
            let greetIdx = 0;
            const $gt = $('#selectedText');

            function cycleGreetings() {
                $gt.removeClass('phrase-in').addClass('phrase-out');
                setTimeout(function() {
                    $gt.text(greetings[greetIdx % greetings.length]);
                    $gt.removeClass('phrase-out').addClass('phrase-in');
                    greetIdx++;
                }, greetIdx === 0 ? 0 : 260);
                setTimeout(cycleGreetings, 3200);
            }

            if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                $gt.text(greetings[0]);
            } else {
                cycleGreetings();
            }

            // ======= MODE SELECTOR =======
            const modeDescriptions = {
                v0: 'Vaqtim oltin deydiganlar uchun qisqa konspekt',
                v1: 'Do\'stingiz tushuntirgandek sodda tahlil',
                v2: 'Prezentatsiyadagi barcha kamchiliklarni chuqur tahlil qiladi'
            };

            $('#modeSelect').on('change', function() {
                const val = $(this).val();
                $('.upload-zone').removeClass('active');
                $('#zone-' + val).addClass('active');
                $('#modeDescPill').text(modeDescriptions[val]);
            });

            // ======= FILE INPUT & DRAG/DROP (V0) =======
            function setupZone(prefix) {
                const $zone = $('#upload-zone-' + prefix);
                const $input = $('#' + prefix + '-file-input');
                const $stateInit = $('#' + prefix + '-state-initial');
                const $stateReady = $('#' + prefix + '-state-ready');
                const $stateUploading = $('#' + prefix + '-state-uploading');
                const $filename = $('#' + prefix + '-filename');
                const $uploadingName = $('#' + prefix + '-uploading-name');
                const $progressBar = $('#' + prefix + '-progress-bar');
                const $progressText = $('#' + prefix + '-progress-text');
                let selectedFile = null;

                function showState(state) {
                    $stateInit.removeClass('active');
                    $stateReady.removeClass('active');
                    $stateUploading.removeClass('active');
                    if (state === 'initial') $stateInit.addClass('active');
                    if (state === 'ready') $stateReady.addClass('active');
                    if (state === 'uploading') $stateUploading.addClass('active');
                }

                $input.on('change', function() {
                    const file = this.files[0];
                    if (!file) return;
                    selectedFile = file;
                    $filename.text(file.name);
                    showState('ready');
                });

                $zone.on('dragover dragenter', function(e) {
                    e.preventDefault();
                    $zone.addClass('drag-active');
                }).on('dragleave drop', function(e) {
                    e.preventDefault();
                    $zone.removeClass('drag-active');
                    if (e.type === 'drop') {
                        const file = e.originalEvent.dataTransfer.files[0];
                        if (file) {
                            selectedFile = file;
                            $filename.text(file.name);
                            showState('ready');
                        }
                    }
                });

                $('#' + prefix + '-btn-cancel').on('click', function() {
                    selectedFile = null;
                    $input.val('');
                    showState('initial');
                });

                $('#' + prefix + '-btn-submit').on('click', function() {
                    if (!selectedFile) return;
                    showState('uploading');
                    $uploadingName.text(selectedFile.name);

                    const formData = new FormData();
                    formData.append('file', selectedFile);
                    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                    formData.append('mode', prefix);

                    let progress = 0;
                    const interval = setInterval(function() {
                        progress = Math.min(progress + Math.random() * 12, 90);
                        $progressBar.css('width', progress + '%');
                        $progressText.text(Math.round(progress) + '%');
                    }, 300);

                    $.ajax({
                        url: "{{ route('presentation.upload') }}",
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(res) {
                            clearInterval(interval);
                            $progressBar.css('width', '100%');
                            $progressText.text('100%');
                            setTimeout(function() {
                                const redirectTo = res.redirect_url || res.redirect;
                                if (redirectTo) window.location.href = redirectTo;
                            }, 400);
                        },
                        error: function() {
                            clearInterval(interval);
                            showState('ready');
                            alert("Xatolik yuz berdi. Qayta urinib ko'ring.");
                        }
                    });
                });
            }

            setupZone('v0');
            setupZone('v1');
            setupZone('v2');
        });
    </script>
</body>

</html>
