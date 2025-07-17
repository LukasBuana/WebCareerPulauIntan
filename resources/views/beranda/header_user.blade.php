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
            margin-left: 0px;
            color: red;
        }

        .logo-subtitle {
            font-size: 0.7rem;
            color:red;
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
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-content">
 @if(Request::is('/')) 
                <a href="" class="logo">
                    <div>
                        <div class="logo-text">Pulau</div>
                        <div class="logo-subtitle">INTAN</div>
                    </div>
                </a>
                @else {{-- Jika rute saat ini BUKAN halaman landing --}}
                               <a href="{{route("home")}}" class="logo">
                    <div>
                        <div class="logo-text">Pulau</div>
                        <div class="logo-subtitle">INTAN</div>
                    </div>
                </a>
                            @endif  

                <nav>
                    <ul class="nav-menu" id="navMenu">
                        <li class="nav-item">
                        @if(Request::is('/')) {{-- Jika rute saat ini adalah halaman landing (home) --}}
                                <a href="#beranda" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Beranda</a>
                            @else {{-- Jika rute saat ini BUKAN halaman landing --}}
                                <a href="{{ route('home') }}" class="nav-link">Beranda</a>
                            @endif                        </li>
                        <li class="nav-item">
                            @if(Request::is(patterns: '/'))
                            <a href="#tentang" class="nav-link">Tentang</a>
                             @else {{-- Jika rute saat ini BUKAN halaman landing --}}
                                <a href="{{ route('home') }}" class="nav-link">Tentang</a>
                            @endif  
                        </li>
                        <li class="nav-item">
                            @if(Request::is('/'))
                            <a href="#berita" class="nav-link">Berita</a>
                             @else {{-- Jika rute saat ini BUKAN halaman landing --}}
                                <a href="{{ route('home') }}" class="nav-link">Berita</a>
                            @endif  
                        </li>
                        <li class="nav-item">
                         @if(Request::is('/'))
                            <a href="#lowongan" class="nav-link">Lowongan</a>
                             @else {{-- Jika rute saat ini BUKAN halaman landing --}}
                                <a href="{{ route('home') }}" class="nav-link">Lowongan</a>
                            @endif  
                        </li>
                        <li class="nav-item">
                            @if(Request::is('/'))

                            <a href="#bursa-kerja" class="nav-link">Bursa Kerja</a>
                             @else {{-- Jika rute saat ini BUKAN halaman landing --}}
                                <a href="{{ route('home') }}" class="nav-link">Bursa Kerja</a>
                            @endif  
                        </li>
                        <li class="nav-item">
                             @if(Request::is('/'))
                            <a href="#faq" class="nav-link">Tanya Jawab</a>
                             @else {{-- Jika rute saat ini BUKAN halaman landing --}}
                                <a href="{{ route('home') }}" class="nav-link">Tanya Jawab</a>
                            @endif  
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