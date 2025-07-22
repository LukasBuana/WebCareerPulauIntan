<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita & Artikel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .berita-accent-bar1 {
            display: flex;
            color: #E54155;
            /* This applies to text content if any */
            background-color: #E54155;
            /* Use this to make the bar itself orange */
            width: 200px;
            /* Example width */
            height: 10px;
            /* Example height */
            margin-top: 0px;
            margin-left: 0px;
            margin-bottom: 20px;
            border-radius: 50px;

        }

        .beritabody {
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

        .beritaheader {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .beritaheader h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
        }

        .beritaheader::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, #f39c12, #e67e22);
        }

        .beritaview-all {
            color: #3498db;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: color 0.3s ease;
        }

        .beritaview-all:hover {
            color: #2980b9;
        }

        .beritaview-all::after {
            content: '›';
            font-size: 1.2rem;
        }

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
        }

        .beritaarticle-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
        }

        .beritaarticle-image {
            width: 100%;
            height: 200px;
            position: relative;
            overflow: hidden;
        }

        .beritaarticle-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .beritaarticle-content {
            padding: 24px;
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
        }

        /* Specific styling for each article based on the image */
        .article-1 .beritaarticle-image {
            background: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .article-1 .beritaarticle-image::before {
            content: '📹';
            font-size: 3rem;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .article-2 .beritaarticle-image {
            background: linear-gradient(135deg, #ffeaa7 0%, #fdcb6e 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .article-2 .beritaarticle-image::before {
            content: '🔍';
            font-size: 3rem;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .article-3 .beritaarticle-image {
            background: linear-gradient(135deg, #6c5ce7 0%, #5f3dc4 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .article-3 .beritaarticle-image::before {
            content: '💻';
            font-size: 3rem;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

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
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px 15px;
            }

            .beritaheader h1 {
                font-size: 2rem;
            }

            .beritaarticles-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .beritaarticle-content {
                padding: 20px;
            }
        }

        /* Animation for cards */
        .beritaarticle-card {
            animation: fadeInUp 0.6s ease forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        .beritaarticle-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .beritaarticle-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .beritaarticle-card:nth-child(3) {
            animation-delay: 0.3s;
        }

        .news-all-button {
            background: transparent;
            border: 2px solid #DA251C;
            color: #DA251C;
            padding: 12px 30px;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            align-content: center;
            margin-left: 500px;
        }

        .news-all-button:hover {
            background: #DA251C;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <div class="beritacontainer">

        <div class="berita-accent-bar1"></div>

        <div class="beritaheader">

            <h1>Berita & Artikel</h1>


        </div>

        <div class="beritaarticles-grid">
            {{-- Loop untuk menampilkan setiap berita dari database --}}
            @forelse($newsArticles as $news)
                <article class="beritaarticle-card" data-news-id="{{ $news->id }}"> {{-- <<< TAMBAHKAN INI --}} <div
                        class="beritaarticle-image">
                        <img src="{{ Storage::url($news->image) }}" alt="{{ $news->title }}"
                            class="news-image-thumbnail"> {{-- Jika ada badge seperti "WE ARE HIRING" yang disimpan di DB, Anda bisa menambahkannya di sini
                            --}}
                        {{-- @if ($news->has_hiring_badge)
                            <div class="beritahiring-badge">WE ARE HIRING</div>
                            @endif --}}
                    </div>
                    <div class="beritaarticle-content">
                        <div class="beritaarticle-meta">
                            <span>{{ \Carbon\Carbon::parse($news->created_at)->format('d M Y') }}</span>
                            {{-- Format tanggal --}}
                            <span>•</span>
                            <span>{{ $news->category }}</span> {{-- Subtitle digunakan sebagai kategori/tipe di sini --}}
                        </div>
                        <h3 class="beritaarticle-title">{{ $news->title }}</h3>
                        <p class="beritaarticle-excerpt">{{ $news->subtitle }}</p>
                    </div>
                </article>
            @empty
                <p style="text-align: center; color: #777; padding: 20px; grid-column: 1 / -1;">Tidak ada berita yang
                    tersedia
                    saat ini.</p>
            @endforelse

        </div>
        <a href="{{ route(name: 'news.index') }}" class="news-all-button">Lihat Semua</a>



        <script>
            // Add click functionality to article cards
            document.querySelectorAll('.beritaarticle-card').forEach(card => {
                card.addEventListener('click', function() {
                    // Anda mungkin ingin menavigasi ke halaman detail berita
                    console.log('Article clicked:', this.querySelector('.beritaarticle-title').textContent);
                    // Contoh: window.location.href = `/news/${this.dataset.id}`; // Jika Anda punya ID di data-attribute
                });
            });

            document.querySelector('.beritaview-all').addEventListener('click', function(e) {
                e.preventDefault();
                console.log('View all clicked');
            });
        </script>
</body>
