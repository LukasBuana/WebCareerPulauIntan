<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Pulau Intan Career' }}</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Base Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles */
        .header {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 1.8rem;
            font-weight: 700;
            color: #2563eb;
            text-decoration: none;
        }

        .logo-text {
            margin-left: 5px;
        }

        .logo-subtitle {
            font-size: 0.7rem;
            color: #64748b;
            font-weight: 400;
            letter-spacing: 2px;
            margin-top: -5px;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 40px;
            align-items: center;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            text-decoration: none;
            color: #374151;
            font-weight: 500;
            font-size: 1rem;
            transition: color 0.3s ease;
            padding: 10px 0;
        }

        .nav-link:hover {
            color: #2563eb;
        }

        .nav-link.active {
            color: #dc2626;
            font-weight: 600;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .btn-masuk {
            background: transparent;
            border: 2px solid #2563eb;
            color: #2563eb;
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-masuk:hover {
            background: #2563eb;
            color: white;
        }

        .language-selector {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #374151;
            font-weight: 500;
            cursor: pointer;
        }

        .flag-icon {
            width: 20px;
            height: 15px;
            background: linear-gradient(to bottom, #dc2626 0%, #dc2626 50%, white 50%, white 100%);
            border-radius: 2px;
            position: relative;
        }

        .dropdown-arrow {
            font-size: 0.8rem;
            color: #9ca3af;
        }

        /* Mobile Menu */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #374151;
            cursor: pointer;
        }

        /* Responsive Header */
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: white;
                flex-direction: column;
                gap: 0;
                box-shadow: 0 4px 20px rgba(0,0,0,0.1);
                padding: 20px;
            }

            .nav-menu.active {
                display: flex;
            }

            .nav-item {
                width: 100%;
                text-align: center;
                padding: 10px 0;
                border-bottom: 1px solid #f1f5f9;
            }

            .nav-item:last-child {
                border-bottom: none;
            }

            .mobile-menu-toggle {
                display: block;
            }

            .header-actions {
                gap: 15px;
            }

            .btn-masuk {
                padding: 6px 15px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .logo {
                font-size: 1.5rem;
            }

            .nav-menu {
                gap: 30px;
            }

            .language-selector {
                font-size: 0.9rem;
            }
        }

        /* Hero Section Styles */
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 160px 0 80px;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .hero-text {
            color: white;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 30px;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 40px;
            opacity: 0.9;
            line-height: 1.6;
        }

        .hero-image {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .team-huddle {
            width: 450px;
            height: 400px;
            position: relative;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            overflow: hidden;
        }

        .team-members {
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .team-member {
            position: absolute;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(45deg, #ffdbae, #f4c2a1);
            border: 3px solid rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            animation: float 3s ease-in-out infinite;
        }

        .team-member::before {
            content: '';
            width: 30px;
            height: 30px;
            background: #333;
            border-radius: 50%;
            position: absolute;
            top: 20px;
        }

        .team-member::after {
            content: '';
            width: 20px;
            height: 15px;
            background: #d4a574;
            border-radius: 50%;
            position: absolute;
            top: 45px;
        }

        .team-member.member-1 {
            top: 30px;
            left: 50px;
            animation-delay: 0s;
        }

        .team-member.member-2 {
            top: 30px;
            right: 50px;
            animation-delay: 0.5s;
        }

        .team-member.member-3 {
            top: 120px;
            left: 20px;
            animation-delay: 1s;
        }

        .team-member.member-4 {
            top: 120px;
            right: 20px;
            animation-delay: 1.5s;
        }

        .team-member.member-5 {
            bottom: 30px;
            left: 50px;
            animation-delay: 2s;
        }

        .team-member.member-6 {
            bottom: 30px;
            right: 50px;
            animation-delay: 2.5s;
        }

        .hands-center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            z-index: 10;
        }

        .hands-illustration {
            width: 80px;
            height: 80px;
            /* Placeholder for an actual SVG icon of hands */
            background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iODAiIGhlaWdodD0iODAiIHZpZXdCb3g9IjAgMCA4MCA4MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGNpcmNsZSBjeD0iNDAiIGN5PSI0MCIgcj0iMzAiIGZpbGw9IiNmZmRiYWUiLz4KPHN2ZyB4PSIyNSIgeT0iMjUiIHdpZHRoPSIzMCIgaGVpZ2h0PSIzMCI+CjxwYXRoIGQ9Ik0xNSA1TDI1IDE1TDE1IDI1TDUgMTVMMTUgNVoiIGZpbGw9IiNmZmZmZmYiLz4KPC9zdmc+Cjwvc3ZnPg==') center/cover no-repeat;
            /* Consider replacing with a proper SVG file or icon font */
        }

        .connecting-lines {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .line {
            position: absolute;
            background: rgba(255, 255, 255, 0.4);
            height: 2px;
            transform-origin: left center;
        }

        .line-1 {
            top: 70px;
            left: 130px;
            width: 100px;
            transform: rotate(25deg);
        }

        .line-2 {
            top: 70px;
            right: 130px;
            width: 100px;
            transform: rotate(-25deg);
        }

        .line-3 {
            top: 160px;
            left: 100px;
            width: 80px;
            transform: rotate(45deg);
        }

        .line-4 {
            top: 160px;
            right: 100px;
            width: 80px;
            transform: rotate(-45deg);
        }

        .line-5 {
            bottom: 70px;
            left: 130px;
            width: 100px;
            transform: rotate(-25deg);
        }

        .line-6 {
            bottom: 70px;
            right: 130px;
            width: 100px;
            transform: rotate(25deg);
        }

        .decorative-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
        
        }

        .dot {
            position: absolute;
            border-radius: 50%;
        }

        .dot-1 {
            width: 20px;
            height: 20px;
            background: #ffd700;
            top: 20%;
            left: 10%;
            animation: float 3s ease-in-out infinite;
        }

        .dot-2 {
            width: 15px;
            height: 15px;
            background: #4169e1;
            top: 40%;
            right: 15%;
            animation: float 4s ease-in-out infinite reverse;
        }

        .dot-3 {
            width: 25px;
            height: 25px;
            background: #ffd700;
            bottom: 30%;
            left: 20%;
            animation: float 5s ease-in-out infinite;
        }

        .dot-4 {
            width: 18px;
            height: 18px;
            background: #4169e1;
            bottom: 20%;
            right: 25%;
            animation: float 3.5s ease-in-out infinite reverse;
        }

        /* Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Stats Section Styles */
        .stats-section {
            background: white;
            padding: 60px 0;
            box-shadow: 0 -5px 20px rgba(0,0,0,0.1);
        }

        .stats-content {
            text-align: center;
        }

        .stats-number {
            font-size: 3rem;
            font-weight: 700;
            color: #4169e1;
            margin-bottom: 10px;
        }

        .stats-text {
            font-size: 1.2rem;
            color: #666;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .plus-sign {
            color: #ffd700;
            font-weight: 700;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-content {
                grid-template-columns: 1fr;
                gap: 40px;
                text-align: center;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .team-huddle {
                width: 350px;
                height: 320px;
            }

            .team-member {
                width: 60px;
                height: 60px;
            }

            .hands-center {
                width: 90px;
                height: 90px;
            }

            .hands-illustration {
                width: 60px;
                height: 60px;
            }

            .stats-number {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 480px) {
            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .team-huddle {
                width: 280px;
                height: 250px;
            }

            .team-member {
                width: 50px;
                height: 50px;
            }

            .hands-center {
                width: 70px;
                height: 70px;
            }

            .hands-illustration {
                width: 50px;
                height: 50px;
            }

            .stats-number {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-content">
                <a href="#" class="logo">
                    <div>
                        <div class="logo-text">Pulau</div>
                        <div class="logo-subtitle">INTAN</div>
                    </div>
                </a>

                <nav>
                    <ul class="nav-menu" id="navMenu">
                        <li class="nav-item">
                            <a href="#beranda" class="nav-link active">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a href="#tentang" class="nav-link">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a href="#berita" class="nav-link">Berita</a>
                        </li>
                        <li class="nav-item">
                            <a href="#lowongan" class="nav-link">Lowongan</a>
                        </li>
                        <li class="nav-item">
                            <a href="#bursa-kerja" class="nav-link">Bursa Kerja</a>
                        </li>
                        <li class="nav-item">
                            <a href="#faq" class="nav-link">Tanya Jawab</a>
                        </li>
                    </ul>
                </nav>

                <div class="header-actions">
                    <a href="login" class="btn-masuk">Masuk</a>
                    <div class="language-selector">
                        <div class="flag-icon"></div>
                        <span>Indonesia</span>
                        <span class="dropdown-arrow">▼</span>
                    </div>
                    <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">
                        ☰
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="hero-section" id="beranda">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-text">
                        <h1 class="hero-title">{{ $heroTitle ?? 'Bersama Kita Tumbuh untuk Masa Depan yang Lebih Baik' }}</h1>
                        <p class="hero-subtitle">{{ $heroSubtitle ?? 'Bersama-sama kita berusaha menghadirkan kebahagiaan dan kenyamanan untuk setiap keluarga melalui produk berkualitas tinggi dan inovasi.' }}</p>
                    </div>
                    <div class="hero-image">
                        <div class="team-huddle">
                            <div class="team-members">
                                <div class="team-member member-1"></div>
                                <div class="team-member member-2"></div>
                                <div class="team-member member-3"></div>
                                <div class="team-member member-4"></div>
                                <div class="team-member member-5"></div>
                                <div class="team-member member-6"></div>
                            </div>
                            
                            <div class="connecting-lines">
                                <div class="line line-1"></div>
                                <div class="line line-2"></div>
                                <div class="line line-3"></div>
                                <div class="line line-4"></div>
                                <div class="line line-5"></div>
                                <div class="line line-6"></div>
                            </div>
                            
                            <div class="hands-center">
                                <div class="hands-illustration"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="decorative-elements">
                <div class="dot dot-1"></div>
                <div class="dot dot-2"></div>
                <div class="dot dot-3"></div>
                <div class="dot dot-4"></div>

            </div>
            
        </section>

        


        <section id="lowongan">
            @include('beranda.lowongan')
        </section>
      

        <section id="berita">
            <!-- <h2 style="font-size: 2.5rem; color: #2563eb; text-align: center; margin-bottom: 40px;">Berita Terbaru</h2> -->
            <!-- <p style="text-align: center; font-size: 1.1rem; color: #666;">Di sini akan muncul berita dan pembaruan terbaru dari Pulau Intan. Tetap ikuti kami untuk informasi menarik!</p> -->
            @include('beranda.berita')
        </section>

        

        <section id="bursa-kerja" class="container" style="padding: 80px 0; background-color: #f8f9fa; margin-top: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); border-radius: 8px;">
            <h2 style="font-size: 2.5rem; color: #2563eb; text-align: center; margin-bottom: 40px;">Bursa Kerja & Acara</h2>
            <p style="text-align: center; font-size: 1.1rem; color: #666;">Temukan kami di bursa kerja dan acara rekrutmen mendatang. Ini adalah kesempatan sempurna untuk mengenal kami!</p>
            {{-- Anda bisa menambahkan kalender acara atau daftar bursa kerja dinamis di sini --}}
        </section>

        <section id = "tentang">
              @include('beranda.tentang')

        </section>

         <section id="faq">
            <!-- <h2 style="font-size: 2.5rem; color: #2563eb; text-align: center; margin-bottom: 40px;">Pertanyaan yang Sering Diajukan</h2> -->
            @include('beranda.faq')

            {{-- Anda bisa menambahkan konten dinamis untuk berita di sini --}}
        </section>




       

        <section class="stats-section">
            <div class="container">
                <div class="stats-content">
                    <div class="stats-number">{{ $statsNumber ?? '90.000' }}<span class="plus-sign">+</span></div>
                    <div class="stats-text">{{ $statsText ?? 'Pegawai Telah Bergabung Bersama Kami' }}</div>
                </div>
            </div>
        </section>
    </main>

    <script>
        // Mobile menu toggle
        function toggleMobileMenu() {
            const navMenu = document.getElementById('navMenu');
            navMenu.classList.toggle('active');
        }

        // Smooth scrolling for navigation links
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                
                if (targetElement) {
                    // Adjust scroll position to account for fixed header
                    const headerHeight = document.querySelector('.header').offsetHeight;
                    const targetPosition = targetElement.offsetTop - headerHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
                
                // Close mobile menu if open
                document.getElementById('navMenu').classList.remove('active');
                
                // Update active link (optional: add logic to set 'active' based on scroll position)
                document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(e) {
            const navMenu = document.getElementById('navMenu');
            const mobileToggle = document.querySelector('.mobile-menu-toggle');
            
            // Check if click is outside nav menu and not on the toggle button
            if (!navMenu.contains(e.target) && !mobileToggle.contains(e.target)) {
                navMenu.classList.remove('active');
            }
        });

        // Header background change on scroll for subtle effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header');
            if (window.scrollY > 50) {
                header.style.background = 'rgba(255, 255, 255, 0.95)';
                header.style.backdropFilter = 'blur(10px)';
            } else {
                header.style.background = 'white';
                header.style.backdropFilter = 'none';
            }
        });
    </script>
</body>
</html>