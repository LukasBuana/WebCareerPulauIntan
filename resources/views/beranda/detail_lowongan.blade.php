<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pekerjaan - Production Section Head</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .breadcrumb {
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            margin-bottom: 20px;
        }

        .breadcrumb a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
        }

        .breadcrumb a:hover {
            color: white;
        }

        .job-title {
            color: white;
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 25px;
        }

        .job-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
            color: white;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, 0.1);
            padding: 10px 15px;
            border-radius: 25px;
            font-size: 14px;
        }

        .meta-icon {
            width: 20px;
            height: 20px;
            fill: currentColor;
        }

        .btn-apply {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
            padding: 12px 24px;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 20px;
        }

        .btn-apply:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
            margin-top: 30px;
        }

        .main-content {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .sidebar {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            height: fit-content;
        }

        .section-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #333;
            border-bottom: 3px solid #667eea;
            padding-bottom: 10px;
        }

        .requirements-list {
            list-style: none;
            margin-bottom: 30px;
        }

        .requirements-list li {
            padding: 8px 0;
            position: relative;
            padding-left: 25px;
        }

        .requirements-list li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #667eea;
            font-weight: bold;
        }

        .job-info-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            padding: 25px;
            text-align: center;
            margin-bottom: 25px;
            color: white;
        }

        .job-icon {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .job-function {
            font-size: 14px;
            opacity: 0.8;
            margin-bottom: 10px;
        }

        .job-category {
            background: rgba(255, 255, 255, 0.2);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }

        .job-details {
            margin-top: 20px;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-size: 14px;
            opacity: 0.8;
        }

        .detail-value {
            font-weight: 600;
        }

        .apply-button {
            width: 100%;
            background: #667eea;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 15px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .apply-button:hover {
            background: #5a6fd8;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
            
            .job-meta {
                flex-direction: column;
                gap: 15px;
            }
            
            .job-title {
                font-size: 28px;
            }
            
            .container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <div class="breadcrumb">
                <a href="#">Lowongan</a> > Production Section Head
            </div>
            
            <h1 class="job-title">Production Section Head</h1>
            
            <div class="job-meta">
                <div class="meta-item">
                    <svg class="meta-icon" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                    ICBP - Nutrition and Special Food
                </div>
                <div class="meta-item">
                    <svg class="meta-icon" viewBox="0 0 24 24">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                    </svg>
                    Padalarang - Bandung Barat
                </div>
                <div class="meta-item">
                    <svg class="meta-icon" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                    S1
                </div>
                <div class="meta-item">
                    <svg class="meta-icon" viewBox="0 0 24 24">
                        <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/>
                    </svg>
                    Lulusan Baru - Tetap
                </div>
            </div>
            
            <a href="#" class="btn-apply">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                </svg>
                Daftar Sekarang
            </a>
        </div>

        <!-- Content Grid -->
        <div class="content-grid">
            <!-- Main Content -->
            <div class="main-content">
                <h2 class="section-title">Persyaratan Pekerjaan</h2>
                <ul class="requirements-list">
                    <li>Sarjana (S1) Minimal IPK 3.00</li>
                    <li>Jurusan Teknologi Pangan atau Teknik Industri</li>
                    <li>Baik dalam analisa</li>
                    <li>Baik dalam kemampuan komunikasi</li>
                    <li>Memiliki kemampuan presentasi</li>
                    <li>Memiliki kepemimpinan yang baik dan kerjasama tim</li>
                    <li>Bersedia ditempatkan di Padalarang, Kabupaten Bandung Barat</li>
                </ul>

                <h2 class="section-title">Deskripsi Pekerjaan</h2>
                <p style="line-height: 1.6; margin-bottom: 20px;">
                    Sebagai Production Section Head, Anda akan bertanggung jawab untuk memimpin dan mengawasi operasional produksi di departemen Nutrition and Special Food. Posisi ini membutuhkan kemampuan analisis yang kuat, leadership yang baik, dan kemampuan untuk bekerja dalam tim yang dinamis.
                </p>
                
                <p style="line-height: 1.6; margin-bottom: 20px;">
                    Kandidat yang ideal adalah lulusan baru dengan latar belakang pendidikan Teknologi Pangan atau Teknik Industri yang memiliki motivasi tinggi untuk berkembang dalam industri makanan dan nutrisi. Kami mencari individu yang dapat berkomunikasi dengan baik dan mampu melakukan presentasi dengan efektif.
                </p>

                <h2 class="section-title">Tanggung Jawab</h2>
                <ul class="requirements-list">
                    <li>Memimpin dan mengawasi tim produksi</li>
                    <li>Menganalisis proses produksi untuk optimalisasi</li>
                    <li>Melakukan presentasi laporan kepada manajemen</li>
                    <li>Memastikan standar kualitas produk terpenuhi</li>
                    <li>Koordinasi dengan departemen lain</li>
                    <li>Mengembangkan dan mengimplementasikan SOP</li>
                </ul>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <div class="job-info-card">
                    <div class="job-icon">
                        <svg width="30" height="30" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                    <div class="job-function">Fungsi</div>
                    <div class="job-category">Manufacturing</div>
                    
                    <div class="job-details">
                        <div class="detail-item">
                            <span class="detail-label">Berlaku Hingga</span>
                            <span class="detail-value">13 Sep 2025</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Jenis Pekerjaan</span>
                            <span class="detail-value">Full Time</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Level</span>
                            <span class="detail-value">Fresh Graduate</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Pengalaman</span>
                            <span class="detail-value">0-1 Tahun</span>
                        </div>
                    </div>
                </div>

                <button class="apply-button">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="margin-right: 8px;">
                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                    </svg>
                    Lamar pekerjaan ini
                </button>

                <div style="margin-top: 25px; padding: 20px; background: #f8f9fa; border-radius: 15px;">
                    <h3 style="font-size: 16px; margin-bottom: 15px; color: #333;">Tips Melamar</h3>
                    <ul style="font-size: 14px; color: #666; line-height: 1.5;">
                        <li>Pastikan CV Anda update dan relevan</li>
                        <li>Sertakan portofolio jika ada</li>
                        <li>Tulis cover letter yang personal</li>
                        <li>Persiapkan diri untuk interview</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>