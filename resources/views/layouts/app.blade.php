<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EAE Elektrik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .navbar-nav .nav-link { color: #333; padding: 1rem; }
        .navbar-nav .nav-link:hover { color: #dc3545; }
        .navbar { padding: 0; box-shadow: 0 2px 4px rgba(0,0,0,.1); }
        .navbar-brand img { height: 50px; }
        
        .hero-section { 
            height: 320px;
            position: relative;
            overflow: hidden;
            border-radius: 0.375rem;
            width: 95%;
            margin: 0 auto;
            padding: 0;
        }

        @media (min-width: 1024px) {
            .hero-section {
                height: 55vh;
            }
        }

        .hero-content {
            position: relative;
            width: 95%;
            margin: 0 auto;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            z-index: 2;
            padding-left: 20px;
        }

        @media (max-width: 768px) {
            .hero-content {
                padding-left: 15px;
                width: 95%;
            }
        }

        .hero-content h1 {
            font-size: 1.875rem;
            font-weight: 600;
            color: white;
            margin: 0;
            padding-left: 15px;
        }

        .hero-content .subtitle {
            font-size: 1rem;
            color: white;
            padding-top: 0.5rem;
            padding-left: 15px;
        }

        .hero-content .d-flex {
            padding-left: 15px;
        }

        @media (min-width: 1024px) {
            .hero-content h1 {
                font-size: 2.25rem;
            }
        }

        .hero-section video, .hero-section img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.7);
            z-index: 1;
            border-radius: 0.375rem;
        }

        .btn-standard-secondary {
            background-color: white;
            color: #333;
            padding: 0.5rem 1.5rem;
            border: none;
            border-radius: 0.375rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-standard-primary {
            background-color: #ff0000;
            color: white;
            padding: 0.5rem 1.5rem;
            border: none;
            border-radius: 0.375rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-standard-primary:hover {
            background-color: #cc0000;
        }

        .dot-indicators {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 2;
        }

        .dot {
            width: 11px;
            height: 11px;
            background: white;
            border-radius: 50%;
            display: inline-block;
            margin: 0 6px;
            opacity: 0.5;
            cursor: pointer;
            transition: opacity 0.3s ease;
        }

        .dot.active {
            opacity: 1;
            width: 11px;
            height: 11px;
        }

        .slider-arrows {
            position: absolute;
            width: 100%;
            top: 50%;
            transform: translateY(-50%);
            z-index: 2;
            pointer-events: none;
        }

        .slider-arrow {
            position: absolute;
            background: rgba(255,255,255,0.2);
            color: white;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 20px;
            border-radius: 50%;
            transition: background 0.3s ease;
            pointer-events: auto;
        }

        .slider-arrow:hover {
            background: rgba(255,255,255,0.4);
        }

        .slider-arrow.prev { left: 10px; }
        .slider-arrow.next { right: 15px; }

        @media (min-width: 1536px) {
            .hero-content {
                max-width: 1536px;
                padding-left: 20px;
                padding-right: 2rem;
            }
        }

        header {
            position: sticky;
            top: 0;
            width: 100%;
            border-bottom: 1px solid #e5e7eb;
            z-index: 1001;
            background: white;
        }

        .header-container {
            padding: 0.7rem 1rem;
            background: white;
            position: relative;
            margin-top: 0;
            min-height: 60px;
            z-index: 1001;
        }

        .nav-container {
            max-width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.35rem 0;
            position: relative;
            z-index: 1001;
        }

        .logo-container {
            display: flex;
            gap: 2rem;
            align-items: center;
            padding: 0.35rem 0;
            position: relative;
        }

        .logo {
            height: 5.5rem;
            width: auto;
            position: absolute;
            top: -5px;
            bottom: -35px;
            left: 0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            border: 1px solid #e5e7eb;
            background: white;
            padding: 2px;
            z-index: 10;
        }

        .nav-links {
            display: none;
            padding-left: 90px;
            z-index: 1001;
            position: relative;
        }

        @media (min-width: 1024px) {
            .nav-links {
                display: flex;
                gap: 1.75rem;
            }
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: #000000;
            text-decoration: none;
            height: 30px;
            line-height: 30px;
            position: relative;
            z-index: 1001;
            padding: 1rem 0;
        }

        .nav-link i {
            display: flex;
            align-items: center;
            height: 100%;
            margin-top: 1px;
        }

        .nav-link:hover {
            color: #dc3545;
        }

        .nav-link .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: -1rem;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 1rem;
            min-width: 250px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            z-index: 1001;
            margin-top: 0.5rem;
        }

        .nav-link:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu-item {
            padding: 0.5rem 1rem;
            color: #374151;
            text-decoration: none;
            display: block;
            font-size: 0.875rem;
            transition: all 0.2s;
            white-space: nowrap;
        }

        .dropdown-menu-item:hover {
            background: #f3f4f6;
            color: #dc3545;
        }

        .dropdown-menu-title {
            font-weight: 600;
            color: #dc3545;
            padding: 0.5rem 1rem;
            margin-bottom: 0.5rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .chevron-icon {
            width: 18px;
            height: 18px;
            stroke: #000000;
            transition: transform 0.3s;
            margin-top: 2px;
        }

        .right-buttons {
            display: none;
            align-items: center;
            gap: 1rem;
        }

        @media (min-width: 1024px) {
            .right-buttons {
                display: flex;
            }
        }

        .lang-button {
            padding: 0.5rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.125rem;
            background: white;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .lang-flag {
            width: 1.5rem;
            height: 1.5rem;
        }

        .icon-button {
            width: 24px;
            height: 24px;
            stroke: #374151;
            cursor: pointer;
        }

        .icon-button:hover {
            stroke: #6b7280;
        }

        .mobile-buttons {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        @media (min-width: 1024px) {
            .mobile-buttons {
                display: none;
            }
        }

        .grid {
            display: grid;
            height: 100%;
        }

        @media (min-width: 1280px) {
            .grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 1279px) {
            .grid {
                grid-template-columns: 1fr;
            }
        }

        .space-y-6 {
            padding: 1.5rem;
        }

        @media (min-width: 1024px) {
            .space-y-6 {
                padding: 2.5rem 2rem;
            }
        }

        .space-y-3 {
            margin-bottom: 0.75rem;
        }

        @media (min-width: 1024px) {
            .space-y-3 {
                margin-bottom: 1rem;
            }
        }

        .text-xl {
            font-size: 1.25rem;
            font-weight: 600;
            color: #374151;
        }

        @media (min-width: 1024px) {
            .text-xl {
                font-size: 1.5rem;
            }
        }

        .text-base {
            font-size: 1rem;
            color: #4B5563;
            line-height: 1.5;
        }

        .btn-standard-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #374151;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .btn-standard-link:hover {
            color: #dc3545;
        }

        .btn-standard-link-colored {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #dc3545;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .btn-standard-link-colored:hover {
            color: #bb2d3b;
        }

        .button-icon {
            width: 1.25rem;
            height: 1.25rem;
        }

        .object-cover {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

        @media (min-width: 1024px) {
            .object-cover {
                object-fit: contain;
            }
        }

        @media (max-width: 768px) {
            .object-cover {
                max-height: 200px;
            }
        }

        .backdrop {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.2s ease-in-out;
        }

        .show-backdrop {
            display: block;
            opacity: 1;
        }

        .dropdown-menu {
            pointer-events: auto;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/react-toastify@9.1.3/dist/ReactToastify.min.css">
</head>
<body>
    <div class="backdrop"></div>
    <div class="Toastify"></div>
    <header>
        <div class="header-container">
            <nav class="nav-container">
                <div class="logo-container">
                    <a href="/" class="z-20">
                        <img src="https://www.eae.com.tr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Feae-elektrik-logo.c571e196.webp&w=640&q=75" 
                             alt="EAE Elektrik" 
                             class="logo">
                    </a>
                    <div class="nav-links">
                        <a href="#" class="nav-link" onmouseenter="showBackdrop(this)" onmouseleave="hideBackdrop(this)">
                            Ürünler
                            <i class="fas fa-chevron-down chevron-icon"></i>
                            <div class="dropdown-menu">
                                <div class="dropdown-menu-title">Ürünlerimiz</div>
                                <a href="/urunler/busbar-sistemleri" class="dropdown-menu-item">Busbar Sistemleri</a>
                                <a href="/urunler/kablo-kanali-sistemleri" class="dropdown-menu-item">Kablo Kanalı Sistemleri</a>
                                <a href="/urunler/aski-sistemleri" class="dropdown-menu-item">Askı Sistemleri</a>
                                <a href="/urunler/ic-tesisat-cozumleri" class="dropdown-menu-item">İç Tesisat Çözümleri</a>
                            </div>
                        </a>
                        <a href="#" class="nav-link" onmouseenter="showBackdrop(this)" onmouseleave="hideBackdrop(this)">
                            Çözümler
                            <i class="fas fa-chevron-down chevron-icon"></i>
                            <div class="dropdown-menu">
                                <div class="dropdown-menu-title">Çözümlerimiz</div>
                                <a href="/cozumler/veri-merkezi" class="dropdown-menu-item">Veri Merkezi Çözümleri</a>
                                <a href="/cozumler/saglik" class="dropdown-menu-item">Sağlık Kompleksleri</a>
                                <a href="/cozumler/atolye" class="dropdown-menu-item">Küçük Atölye Çözümleri</a>
                            </div>
                        </a>
                        <a href="#" class="nav-link" onmouseenter="showBackdrop(this)" onmouseleave="hideBackdrop(this)">
                            Tasarım Araçları
                            <i class="fas fa-chevron-down chevron-icon"></i>
                            <div class="dropdown-menu">
                                <div class="dropdown-menu-title">Tasarım Araçları</div>
                                <a href="/tasarim/bim" class="dropdown-menu-item">BIM</a>
                                <a href="/tasarim/cad" class="dropdown-menu-item">CAD</a>
                                <a href="/tasarim/revit" class="dropdown-menu-item">Revit</a>
                            </div>
                        </a>
                        <a href="/sss" class="nav-link">SSS</a>
                        <a href="#" class="nav-link" onmouseenter="showBackdrop(this)" onmouseleave="hideBackdrop(this)">
                            Kariyer
                            <i class="fas fa-chevron-down chevron-icon"></i>
                            <div class="dropdown-menu">
                                <div class="dropdown-menu-title">Kariyer Fırsatları</div>
                                <a href="/kariyer/acik-pozisyonlar" class="dropdown-menu-item">Açık Pozisyonlar</a>
                                <a href="/kariyer/staj" class="dropdown-menu-item">Staj Programı</a>
                            </div>
                        </a>
                        <a href="#" class="nav-link" onmouseenter="showBackdrop(this)" onmouseleave="hideBackdrop(this)">
                            Kurumsal
                            <i class="fas fa-chevron-down chevron-icon"></i>
                            <div class="dropdown-menu">
                                <div class="dropdown-menu-title">Kurumsal</div>
                                <a href="/kurumsal/hakkimizda" class="dropdown-menu-item">Hakkımızda</a>
                                <a href="/kurumsal/tarihce" class="dropdown-menu-item">Tarihçe</a>
                                <a href="/kurumsal/vizyon-misyon" class="dropdown-menu-item">Vizyon & Misyon</a>
                            </div>
                        </a>
                        <a href="#" class="nav-link" onmouseenter="showBackdrop(this)" onmouseleave="hideBackdrop(this)">
                            İndirme Merkezi
                            <i class="fas fa-chevron-down chevron-icon"></i>
                            <div class="dropdown-menu">
                                <div class="dropdown-menu-title">İndirme Merkezi</div>
                                <a href="/indirme/kataloglar" class="dropdown-menu-item">Kataloglar</a>
                                <a href="/indirme/brosurler" class="dropdown-menu-item">Broşürler</a>
                                <a href="/indirme/sertifikalar" class="dropdown-menu-item">Sertifikalar</a>
                            </div>
                        </a>
                        <a href="#" class="nav-link" onmouseenter="showBackdrop(this)" onmouseleave="hideBackdrop(this)">
                            İletişim
                            <i class="fas fa-chevron-down chevron-icon"></i>
                            <div class="dropdown-menu">
                                <div class="dropdown-menu-title">İletişim</div>
                                <a href="/iletisim/iletisim-bilgileri" class="dropdown-menu-item">İletişim Bilgileri</a>
                                <a href="/iletisim/bayi-agi" class="dropdown-menu-item">Bayi Ağı</a>
                                <a href="/iletisim/servis-noktalari" class="dropdown-menu-item">Servis Noktaları</a>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="mobile-buttons">
                    <button class="lang-button">
                        <img src="https://flagcdn.com/tr.svg" alt="Türkçe" class="lang-flag">
                        <span>TR</span>
                    </button>
                    <i class="fas fa-search icon-button"></i>
                    <i class="fas fa-bars icon-button"></i>
                </div>

                <div class="right-buttons">
                    <button class="lang-button">
                        <img src="https://flagcdn.com/tr.svg" alt="Türkçe" class="lang-flag">
                        <span>TR</span>
                    </button>
                    <i class="fas fa-search icon-button"></i>
                    <a href="/istek-listesi" class="relative">
                        <i class="fas fa-list icon-button"></i>
                    </a>
                </div>
            </nav>
        </div>
    </header>

    @yield('content')

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/slider.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/react-toastify@9.1.3/dist/ReactToastify.min.js"></script>
    <script>
    let backdropTimeout;
    let currentDropdown = null;

    function showBackdrop(element) {
        clearTimeout(backdropTimeout);
        const backdrop = document.querySelector('.backdrop');
        const dropdownMenu = element.querySelector('.dropdown-menu');
        
        if (backdrop) backdrop.classList.add('show-backdrop');
        
        // Hide previous dropdown if exists
        if (currentDropdown && currentDropdown !== element) {
            const prevDropdown = currentDropdown.querySelector('.dropdown-menu');
            if (prevDropdown) prevDropdown.style.display = 'none';
        }
        
        // Show current dropdown
        if (dropdownMenu) {
            dropdownMenu.style.display = 'block';
            currentDropdown = element;
        }
    }

    function hideBackdrop(element) {
        backdropTimeout = setTimeout(() => {
            const backdrop = document.querySelector('.backdrop');
            const dropdownMenu = element.querySelector('.dropdown-menu');
            const isHovering = element.matches(':hover') || (dropdownMenu && dropdownMenu.matches(':hover'));
            
            if (!isHovering) {
                if (backdrop) backdrop.classList.remove('show-backdrop');
                if (dropdownMenu) dropdownMenu.style.display = 'none';
                if (currentDropdown === element) currentDropdown = null;
            }
        }, 100);
    }

    // Remove event listeners since we're using inline onmouseenter/onmouseleave
    </script>
</body>
</html> 