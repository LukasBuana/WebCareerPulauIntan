<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tips Wawancara Kerja secara Online</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }

        .hero-section {
            background: linear-gradient(135deg, #662b2bff 10%, #ed7129ff 100%);
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            margin-top: 85px;
        }

        .hero-content {
            max-width: 1200px;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
            padding: 0 40px;
           
        }

         .hero-illustration img {
            max-width: 100%;
            height: auto;
            display: block;
            border-radius: 15px; /* Sesuaikan dengan border-radius elemen hero */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        

        .status-indicator {
            width: 12px;
            height: 12px;
            background: #e74c3c;
            border-radius: 50%;
            position: absolute;
            top: 15px;
            right: 15px;
            animation: pulse 2s infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.2); opacity: 0.7; }
            100% { transform: scale(1); opacity: 1; }
        }

        .hero-text {
            color: white;
        }

        .hero-title {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 25px;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 18px;
            opacity: 0.9;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .hero-date {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 16px;
            opacity: 0.8;
        }

        .date-icon {
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .content-section {
            max-width: 800px;
            margin: 60px auto;
            padding: 0 40px;
        }

        .article-content {
            background: white;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        .article-text {
            font-size: 18px;
            line-height: 1.8;
            color: #444;
            margin-bottom: 30px;
                white-space: pre-wrap; /* <<< TAMBAHKAN INI */

        }

        .highlight {
            background: linear-gradient(120deg, #a8edea 0%, #fed6e3 100%);
            padding: 2px 6px;
            border-radius: 4px;
            font-weight: 600;
        }

        .tips-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .tip-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            border-left: 5px solid #E54155;
            transition: transform 0.3s ease;
            width: 130%;
        }

        .tip-card:hover {
            transform: translateY(-5px);
        }

        .tip-card:nth-child(2) {
            border-left-color: #e74c3c;
        }

        .tip-card:nth-child(3) {
            border-left-color: #f39c12;
        }

        .tip-card:nth-child(4) {
            border-left-color: #27ae60;
        }

        .tip-number {
            width: 40px;
            height: 40px;
            background: #3498db;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .tip-card:nth-child(2) .tip-number {
            background: #e74c3c;
        }

        .tip-card:nth-child(3) .tip-number {
            background: #f39c12;
        }

        .tip-card:nth-child(4) .tip-number {
            background: #27ae60;
        }

        .tip-title {
            font-size: 20px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .tip-description {
            color: #666;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .hero-content {
                grid-template-columns: 1fr;
                gap: 40px;
                padding: 0 20px;
            }
            
            .hero-title {
                font-size: 32px;
            }
            
            .content-section {
                padding: 0 20px;
            }
            
            .article-content {
                padding: 30px;
            }
            
            .tips-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="hero-section">
          @include('beranda.header_user')
        <div class="hero-content">
            <div class="hero-illustration">
                @if($news->image)
                    <img src="{{ $news->image }}" alt="{{ $news->title }}">
                @else
                    {{-- Tampilkan ilustrasi default jika tidak ada gambar --}}
                    <div class="office-scene">
                        <div class="desk"></div>
                        <div class="person">
                            <div class="person-body">
                                <div class="person-head">
                                    <div class="person-hair"></div>
                                    <div class="person-face">
                                        <div class="eye"></div>
                                        <div class="eye"></div>
                                        <div class="smile"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="laptop">
                            <div class="laptop-screen"></div>
                        </div>
                        <div class="lamp">
                            <div class="lamp-base"></div>
                            <div class="lamp-arm"></div>
                            <div class="lamp-head"></div>
                        </div>
                        <div class="plant">
                            <div class="pot"></div>
                            <div class="leaf"></div>
                            <div class="leaf"></div>
                        </div>
                        <div class="interview-bubble">
                            <div class="status-indicator"></div>
                            <div class="bubble-header">
                                🟢 ONLINE JOB INTERVIEW
                            </div>
                            <div class="interviewer-profile">
                                <div class="interviewer-avatar"></div>
                                <div class="interviewer-info">
                                    <div class="interviewer-name">HR Manager</div>
                                    <div class="rating-stars">
                                        <div class="star"></div><div class="star"></div><div class="star"></div><div class="star"></div><div class="star"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            
            <div class="hero-text">
                <h1 class="hero-title">{{ $news->title }}</h1>
                <p class="hero-subtitle">{{ $news->subtitle }}</p>
                <div class="hero-date">
                    <div class="date-icon">📅</div>
                    <span>{{ \Carbon\Carbon::parse($news->created_at)->format('d M Y') }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="content-section">
        <div class="article-content">
            <h2 class="section-title">Deskripsi Berita</h2>
            <div class="article-text">
                <p>{{ $news->description }}</p>
                {{-- Jika ada kolom content_full atau body untuk teks artikel lengkap --}}
                {{-- <p>{{ $news->body_content_full }}</p> --}}
            </div>
        </div>
        
        {{-- Jika Anda memiliki "Tips" atau sub-bagian yang disimpan di database, Anda bisa menampilkan di sini --}}
        {{-- Saat ini, elemen .tip-card statis, jadi ini tidak dinamis --}}
        {{-- <div class="tips-grid">
            <div class="tip-card">
                <div class="tip-number">1</div>
                <h3 class="tip-title">Atur Lingkungan</h3>
                <p class="tip-description">Pilih tempat yang tenang dengan pencahayaan yang baik. Pastikan background terlihat profesional dan tidak mengganggu fokus pewawancara.</p>
            </div>
            </div> --}}
    </div>
</body>
</html>