<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita & Artikel - Pulau Intan Career</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }

        .beritacontainer {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        /* Main container padding */

        /* Header Section for News Page */
        .news-page-header {
            background-color: #DA251C;
            /* Blue background from image */
            color: white;
            padding: 60px 20px;
            text-align: center;
            margin-bottom: 40px;
            margin-top: 70px;
            position: relative;
            overflow: hidden;
            border-radius: 0 0 50% 50% / 0 0 20% 20%;
            /* Rounded bottom shape from image */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .news-page-header h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .news-page-header p {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        /* Decorative elements in header */
        .news-page-header::before,
        .news-page-header::after {
            content: '';
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            pointer-events: none;
        }

        .news-page-header::before {
            /* Large bubble bottom left */
            width: 200px;
            height: 200px;
            bottom: -100px;
            left: -50px;
        }

        .news-page-header::after {
            /* Smaller bubble top right */
            width: 100px;
            height: 100px;
            top: 20px;
            right: 20px;
        }

        /* Berita Grid Styles (adapted from beranda.landing.blade.php) */
        .beritaarticles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }

        .beritaarticle-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            /* To make content flex vertically */
        }

        .beritaarticle-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
        }

        .beritaarticle-image {
            width: 100%;
            height: 200px;
            /* Fixed height for image */
            position: relative;
            overflow: hidden;
            display: flex;
            /* For centering content or managing image */
            align-items: center;
            justify-content: center;
        }

        .beritaarticle-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Ensures image covers area without distortion */
        }

        /* Jika ada badge seperti WE ARE HIRING, stylenya */
        .beritahiring-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #e74c3c;
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            z-index: 2;
            /* Make sure badge is above image */
        }

        .beritaarticle-content {
            padding: 24px;
            flex-grow: 1;
            /* Allow content to grow and fill space */
            display: flex;
            flex-direction: column;
        }

        .beritaarticle-meta {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
            font-size: 0.875rem;
            color: #7f8c8d;
        }

        .beritaarticle-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 12px;
            line-height: 1.4;
        }

        .beritaarticle-excerpt {
            color: #7f8c8d;
            font-size: 0.95rem;
            line-height: 1.5;
            margin-bottom: auto;
            /* Pushes content to top, allowing tags/read more to align bottom */
        }

        /* Pagination Styling */
        .pagination-links {
            margin-top: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .pagination-links a,
        .pagination-links span {
            display: inline-block;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-decoration: none;
            color: #333;
            transition: all 0.3s ease;
        }

        .pagination-links a:hover {
            background-color: #eee;
        }

        .pagination-links .active span {
            background-color: #DA251C;
            color: white;
            border-color: #DA251C;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {

            .beritacontainer {
                padding: 20px 15px;
            }

            .news-page-header h1 {
                font-size: 2.5rem;
            }

            .news-page-header {
                padding: 40px 15px;
            }

            .beritaarticles-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .beritaarticle-content {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    @include('beranda.header_user') {{-- Asumsi header user Anda ada di sini --}}

    <div class="news-page-header">
        <h1>Berita & Artikel</h1>
        <p>Temukan informasi terbaru dan tips bermanfaat dari Pulau Intan Career.</p>
    </div>

    <div class="beritacontainer">
        <div class="beritaarticles-grid">
            @forelse($newsArticles as $news)
                <article class="beritaarticle-card" data-news-id="{{ $news->id }}">
                    <div class="beritaarticle-image">
                        @if ($news->image)
                            {{-- Gunakan asset() jika gambar disimpan di public/storage --}}
                            <img src="{{ Storage::url($news->image) }}" alt="{{ $news->title }}"
                                class="news-image-thumbnail">
                        @else
                            {{-- Placeholder jika tidak ada gambar --}}
                            <img src="https://via.placeholder.com/400x200?text=No+Image" alt="No Image Available">
                        @endif
                        {{-- Contoh badge jika ada data di DB untuk itu --}}
                        {{-- @if ($news->is_hiring_badge)
                            <div class="beritahiring-badge">WE ARE HIRING</div>
                        @endif --}}
                    </div>
                    <div class="beritaarticle-content">
                        <div class="beritaarticle-meta">
                            <span>{{ \Carbon\Carbon::parse($news->created_at)->format('d M Y') }}</span>
                            <span>•</span>
                            <span>{{ $news->category ?? 'Umum' }}</span> {{-- Asumsi kolom category ada di News --}}
                        </div>
                        <h3 class="beritaarticle-title">{{ $news->title }}</h3>
                        <p class="beritaarticle-excerpt">{{ $news->subtitle }}</p> {{-- Menggunakan subtitle sebagai excerpt --}}
                        {{-- Jika Anda memiliki kolom excerpt/summary di DB, gunakan itu --}}
                        {{-- <p class="beritaarticle-excerpt">{{ \Illuminate\Support\Str::limit($news->excerpt, 150) }}</p> --}}
                    </div>
                </article>
            @empty
                <p style="text-align: center; color: #777; padding: 20px; grid-column: 1 / -1;">Tidak ada berita yang
                    tersedia saat ini.</p>
            @endforelse
        </div>

        {{-- Pagination Links --}}
        <div class="pagination-links">
            {{ $newsArticles->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <script>
        // Add click functionality to article cards for navigation
        document.querySelectorAll('.beritaarticle-card').forEach(card => {
            card.addEventListener('click', function() {
                const newsId = this.dataset.newsId;
                if (newsId) {
                    // Redirect ke route detail berita
                    window.location.href = `/berita/${newsId}`; // URL harus sesuai dengan route di web.php
                } else {
                    console.warn('News ID not found for the clicked article card.');
                }
            });
        });
    </script>
</body>

</html>
