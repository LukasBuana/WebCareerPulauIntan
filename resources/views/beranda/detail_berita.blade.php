<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Menggunakan title dari berita utama --}}
    <title>{{ $news->title }}</title>
    <style>
        /* CSS Anda yang sudah ada */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background: #f0f2f5;
            color: #333;
            line-height: 1.6;
            display: flex;
            justify-content: center;
            padding: 20px;
            margin-top: 67px;
        }

        .detailnews {
            display: flex;
            width: 100%;
            max-width: 1200px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-top-right-radius: 9px;
            border-bottom-right-radius: 9px;
        }

        .detailnews-main-content {
            flex: 2;
            padding: 40px;
            border-right: 1px solid transparent;
        }

        .detailnews-header {
            font-size: 14px;
            color: #777;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .detailnews-hero-section {
            margin-bottom: 40px;
        }

        .detailnews-hero-content {
            display: flex;
            gap: 30px;
            align-items: flex-start;
        }

        /* Perbaikan untuk membuat ukuran foto utama tetap */
        .detailnews-hero-illustration {
            width: 450px; /* Lebar tetap yang diinginkan */
            height: 300px; /* Tinggi tetap yang diinginkan */
            overflow: hidden; /* Penting untuk menyembunyikan bagian gambar yang terpotong */
            border-radius: 5px;
        }

        .detailnews-hero-illustration img {
            width: 100%; /* Pastikan gambar mengisi lebar kontainernya */
            height: 100%; /* Pastikan gambar mengisi tinggi kontainernya */
            object-fit: cover; /* Ini yang membuat gambar pas dalam ukuran tetap tanpa distorsi, dengan memotong jika perlu */
            display: block;
        }

        .detailnews-hero-text {
            flex: 1;
            color: #333;
        }

        .detailnews-hero-title {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
            line-height: 1.2;
            color: #333;
        }

        .detailnews-hero-subtitle {
            font-size: 16px;
            opacity: 0.9;
            margin-bottom: 15px;
            line-height: 1.6;
            color: #555;
        }

        .detailnews-author-date {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 14px;
            opacity: 0.8;
            color: #777;
        }

        .detailnews-content-section {
            max-width: 100%;
            margin: 0;
            padding: 0;
        }

        .detailnews-article-content {
            background: white;
            padding: 0;
            border-radius: 0;
            box-shadow: none;
            margin-bottom: 40px;
        }

        .detailnews-article-text {
            font-size: 16px;
            line-height: 1.8;
            color: #444;
            margin-bottom: 20px;
        }

        .detailnews-article-text p {
            margin-bottom: 20px;
            white-space: pre-line;
        }

        /* More News Section */
        .detailnews-more-news-section {
            flex: 1;
            padding: 40px;
            background-color: transparent;
            border-left: 2px solid #DA251C;
            border-radius: 9px;
            border-right: 2px solid #DA251C;
            color: transparent;
            /* Ini mungkin menyebabkan teks di dalam section tidak terlihat jika tidak ada elemen child yang menimpa color */
        }

        .detailnews-more-news-title {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 25px;
            color: #333;
            /* Pastikan judul terlihat */
        }

        .detailnews-news-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .detailnews-news-item {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .detailnews-news-item img {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
            margin-right: 15px;
        }

        .detailnews-news-item-content {
            flex: 1;
        }

        .detailnews-news-item-title {
            font-size: 16px;
            font-weight: 600;
            line-height: 1.3;
            margin-bottom: 5px;
            color: #333;
            /* Pastikan judul berita terlihat */
            cursor: pointer;
            text-decoration: none;
            /* Menghilangkan garis bawah pada link */
        }

        .detailnews-news-item-title:hover {
            color: #E54155;
        }

        .detailnews-news-item-author {
            font-size: 13px;
            color: #777;
            /* Pastikan nama penulis terlihat */
        }

        .detailberita-accent-bar1 {
            display: flex;
            /* color: #E54155; -- Ini tidak relevan untuk bar */
            background-color: #E54155;
            width: 280px;
            height: 2px;
            border-radius: 50px;
            margin: 0 auto;
            /* Tengah secara horizontal */
            margin-bottom: 20px;
        }

        /* Media Queries */
        @media (max-width: 1024px) {
            .detailnews {
                flex-direction: column;
            }

            .detailnews-main-content {
                border-right: none;
                border-bottom: 1px solid #eee;
            }

            .detailnews-more-news-section {
                padding-top: 20px;
            }

            .detailnews-hero-content {
                flex-direction: column;
                gap: 20px;
            }

            /* Sesuaikan ukuran foto utama untuk layar yang lebih kecil */
            .detailnews-hero-illustration {
                width: 100%; /* Lebar penuh */
                height: 250px; /* Tinggi yang sedikit lebih kecil */
            }

            .detailnews-hero-illustration img {
                max-width: 100%; /* Pastikan tetap responsif */
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            .detailnews-main-content,
            .detailnews-more-news-section {
                padding: 20px;
            }

            .detailnews-hero-title {
                font-size: 28px;
            }

            .detailnews-hero-subtitle {
                font-size: 15px;
            }

            .detailnews-news-item img {
                width: 60px;
                height: 45px;
            }

            .detailnews-news-item-title {
                font-size: 14px;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="detailnews">
        @include('beranda.header_user')

        <div class="detailnews-main-content">
            <div class="detailnews-header">News</div>
            <div class="detailnews-hero-section">
                <div class="detailnews-hero-content">
                    <div class="detailnews-hero-illustration">
                        @if($news->image)
                            <img src="{{ $news->image }}" alt="{{ $news->title }}">
                        @else
                            <img src="https://via.placeholder.com/450x300?text=News+Image" alt="Placeholder News Image">
                        @endif
                    </div>

                    <div class="detailnews-hero-text">
                        <h1 class="detailnews-hero-title">{{ $news->title }}</h1>
                        <p class="detailnews-hero-subtitle">{{ $news->subtitle }}</p>
                        <div class="detailnews-author-date">
                            {{-- MODIFIKASI INI: Akses nama penulis melalui relasi 'user' --}}
                            <span>By {{ $news->user->name ?? 'Unknown' }}</span>
                            <span>|</span>
                            <span>{{ \Carbon\Carbon::parse($news->created_at)->format('F d, Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="detailnews-content-section">
                <div class="detailnews-article-content">
                    <div class="detailnews-article-text">
                        <p>{{ $news->description }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detailnews-more-news-section">
            <h2 class="detailnews-more-news-title">More News</h2>
            <ul class="detailnews-news-list">
                @forelse($moreNews as $item)
                    <li class="detailnews-news-item">
                        @if($item->image)
                            <img src="{{ $item->image }}" alt="{{ $item->title }}">
                        @else
                            <img src="https://via.placeholder.com/80x60?text=News" alt="Placeholder News Image">
                        @endif
                        <div class="detailnews-news-item-content">
                            <a href="{{ route('news.show', $item->id) }}" class="detailnews-news-item-title">{{ $item->title }}</a>
                            {{-- MODIFIKASI INI: Akses nama penulis melalui relasi 'user' untuk setiap item --}}
                            <div class="detailnews-news-item-author">By {{ $item->user->name ?? 'Unknown' }}</div>
                        </div>
                    </li>
                    @if(!$loop->last)
                        <div class="detailberita-accent-bar1"></div>
                    @endif
                @empty
                    <p style="color: #555; font-size: 14px;">No other news available.</p>
                @endforelse
            </ul>
        </div>
    </div>
</body>

</html>