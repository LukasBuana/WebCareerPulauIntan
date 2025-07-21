<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pekerjaan - {{ $job->title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f4f6f9;
            color: #333;
            line-height: 1.6;
        }

        .detail_lowongancontainer {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px;
            margin-top: 50px;
        }

        .job-detail-hero {
            background: white;
            border-radius: 8px;
            padding: 30px 40px;
            margin-top: 30px;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
            color: #333;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            display: flex;
            flex-direction: column;
            border-left: 3px solid #DA251C;
        }

        /* Adjusted .top-bar and .report-job for new breadcrumb integration */
        /* .top-bar is now effectively merged into .breadcrumb for layout */
        /* .top-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        } */

        .report-job {
            display: flex;
            align-items: center;
            color: #DA251C;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            margin-left: auto; /* Push to the right within flex container */
        }

        .report-job svg {
            margin-right: 5px;
            fill: #DA251C;
        }

        /* NEW CSS for breadcrumb, modified based on your new image */
        .breadcrumb {
            background-color: transparent; /* Changed to transparent as per image */
            color: #DA251C; /* Text color changed to red as per image */
            padding: 0 0px; /* Removed padding to let hero handle it, and removed negative margins */
            margin-bottom: 40px; /* Space between breadcrumb and company info */
            font-size: 15px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: flex-start; /* Align items to the left initially */
            gap: 10px; /* Gap between elements */
        }

        .breadcrumb a {
            color: #DA251C; /* Link color changed to red as per image */
            text-decoration: none;
            transition: opacity 0.3s ease;
        }

        .breadcrumb a:hover {
            opacity: 0.8;
        }

        .breadcrumb span {
            /* No margin needed if using flex gap, but keeping for separator '>' */
            color: #DA251C; /* Separator color changed to red as per image */
        }
        /* END NEW CSS for breadcrumb */


        .job-overview {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 20px;
            /* Removed negative margin-top as breadcrumb is now above it */
        }

        .company-logo {
            width: 150px;
            height: 150px;
            background-color: transparent;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .company-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .job-info-text {
            flex-grow: 1;
            margin-left: 30px;
        }

        .company-info {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .company-name {
            font-size: 16px;
            font-weight: 600;
            color: #555;
            margin-right: 8px;
        }

        .verified-badge {
            width: 18px;
            height: 18px;
            fill: #4285F4;
        }

        .job-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #222;
        }

        .job-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            font-size: 14px;
            color: #666;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 0;
            border-radius: 0;
            background: none;
            font-size: 14px;
            color: #666;
        }

        .meta-item:not(:last-child)::after {
            content: '•';
            margin-left: 10px;
            color: #ccc;
        }

        .meta-icon {
            width: 16px;
            height: 16px;
            fill: #666;
            display: none;
        }

        .job-actions {
            display: flex;
            gap: 15px;
            margin-top: 20px;
            align-items: center;
            justify-content: space-between;
            margin-left: 200px;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
        }

        .btn-apply {
            background: #6e6e6eff;
            color: white;
            font-weight: 600;
            padding: 12px 28px;
            border-radius: 6px;
            text-decoration: none;
            transition: 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            cursor: pointer;
        }

        .btn-apply:hover {
            background: #DA251C;
        }

        .btn-save {
            background: #e0e0e0;
            color: #555;
            font-weight: 600;
            padding: 12px 28px;
            border-radius: 6px;
            text-decoration: none;
            transition: 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            cursor: pointer;
        }

        .btn-save:hover {
            background: #d0d0d0;
        }

        .share-options {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .share-options span {
            font-size: 14px;
            color: #777;
        }

        .share-options a {
            color: #777;
            font-size: 20px;
            text-decoration: none;
            transition: 0.3s;
        }

        .share-options a:hover {
            color: #4285F4;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
        }

        .main-content,
        .sidebar {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            border-left: 3px solid #DA251C;
        }

        .section-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 15px;
            border-left: 4px solid #DA251C;
            padding-left: 10px;
            color: #222;
        }

        .requirements-list {
            padding-left: 0;
            list-style: none;
        }

        .requirements-list li {
            position: relative;
            padding-left: 25px;
            margin-bottom: 10px;
        }

        .requirements-list li::before {
            content: '\2713';
            position: absolute;
            left: 0;
            color: #DA251C;
            font-weight: bold;
        }

        .job-info-card {
            background: #DA251C;
            border-radius: 15px;
            color: white;
            text-align: center;
            padding: 30px 20px;
            margin-bottom: 30px;
        }

        .job-icon {
            background: rgba(255, 255, 255, 0.15);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
        }

        .job-category {
            background: rgba(255, 255, 255, 0.2);
            display: inline-block;
            padding: 6px 14px;
            border-radius: 20px;
            font-weight: 600;
            margin-top: 10px;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
            font-size: 14px;
        }

        .apply-button {
            display: block;
            width: 100%;
            text-align: center;
            background: #DA251C;
            color: white;
            padding: 15px;
            border-radius: 15px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
            margin-top: 15px;
        }

        /* --- New styles for job-pills section --- */
        .job-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
            background-color: transparent;
            padding: 0 0px;
            border-radius: 8px;
            justify-content: left;
        }

        .pill-item {
            display: flex;
            align-items: center;
            gap: 8px;
            background-color: rgba(240, 16, 16, 0.2);
            padding: 8px 15px;
            border-radius: 20px;
            color: black;
            font-size: 14px;
            font-weight: 600;
        }

        .pill-item svg {
            width: 18px;
            height: 18px;
            fill: black;
        }


        .apply-button:hover {
            background: #bf1f17;
        }

        @media (max-width: 768px) {
            .content-grid {
                grid-template-columns: 1fr;
            }

            .job-title {
                font-size: 28px;
            }

            .job-pills {
                flex-direction: column;
                align-items: center;
            }

            .pill-item {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <div class="detail_lowongancontainer">
        <div class="header">
            @include('beranda.header_user')
        </div>

        <div class="job-detail-hero">
            {{-- NEW BREADCRUMB SECTION --}}
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Beranda</a>
                <span>&gt;</span>
                <a href="{{ route('jobs.index') }}">Lowongan</a>
                <span>&gt;</span>
                {{-- Ensure $job->title is available from your backend --}}
                <span>{{ $job->title ?? 'Judul Pekerjaan' }}</span> 
                
                {{-- Move report-job inside breadcrumb for the specific layout --}}
                <a href="#" class="report-job">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                    </svg>
                    Report Job
                </a>
            </div>
            {{-- END NEW BREADCRUMB SECTION --}}

            {{-- The top-bar div is now empty or can be removed if not used elsewhere --}}
            <div class="top-bar">
                
            </div>

            <div class="job-overview">
                <div class="company-logo">
                    <img src="{{ asset('/images/ARCHITECT.png') }}" alt="Company Logo">
                </div>
                <div class="job-info-text">
                    <div class="company-info">
                        <span class="company-name">PT.PULAUINTAN BAJAPERKASA</span>
                        <svg class="verified-badge" viewBox="0 0 24 24">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                        </svg>
                    </div>
                    <h1 class="job-title">{{ $job->title ?? 'Senior UX &UI Designer' }}</h1>
                    <div class="job-pills">
                        <div class="pill-item">
                            <svg viewBox="0 0 24 24" width="24" height="24">
                                <path
                                    d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                            </svg>
                            <span>{{ $job->location->name ?? 'Yogyakarta' }}</span> {{-- Lokasi --}}
                        </div>
                        <div class="pill-item">
                            <svg viewBox="0 0 24 24" width="24" height="24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                            </svg>
                            <span>{{ $job->education_level ?? 'S1' }}</span> {{-- Tingkat Pendidikan --}}
                        </div>
                        <div class="pill-item">
                            <svg viewBox="0 0 24 24" width="24" height="24">
                                <path
                                    d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z" />
                            </svg>
                            <span>{{ $job->experience_level ?? 'Senior' }} -
                                {{ $job->type->name ?? 'Full-time' }}</span> {{-- Level & Tipe Pekerjaan --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="job-actions">
                <div class="action-buttons">
                    <a href="#" class="btn-apply">
                        Apply Now
                    </a>

                </div>
                <div class="share-options">
                    <span>Share on</span>
                    <a href="#"><img src="https://img.icons8.com/ios-filled/20/000000/linkedin.png" alt="LinkedIn"></a>
                    <a href="#"><img src="https://img.icons8.com/ios-filled/20/000000/twitter.png" alt="Twitter"></a>
                    <a href="#"><img src="https://img.icons8.com/ios-filled/20/000000/facebook-new.png"
                            alt="Facebook"></a>
                    <a href="#"><img src="https://img.icons8.com/ios-filled/20/000000/link--v1.png" alt="Copy Link"></a>
                </div>
            </div>
        </div>

        <div class="content-grid">
            <div class="main-content">
                <h2 class="section-title">Deskripsi Pekerjaan</h2>
                <p style="line-height: 1.6; margin-bottom: 20px;">
                    {{ $job->description ?? 'Deskripsi pekerjaan tidak tersedia.' }}
                </p>

                @if(isset($job->responsibilities) && $job->responsibilities)
                <h2 class="section-title">Tanggung Jawab</h2>
                <ul class="requirements-list">
                    @php
                    $responsibilities = preg_split("/\r\n|\n|\r/", $job->responsibilities);
                    @endphp
                    @foreach($responsibilities as $res)
                    @if(trim($res) !== '')
                    <li>{{ trim($res) }}</li>
                    @endif
                    @endforeach
                </ul>
                @endif

                @if(isset($job->qualifications) && $job->qualifications)
                <h2 class="section-title">Kualifikasi</h2>
                <ul class="requirements-list">
                    @php
                    $qualifications = preg_split("/\r\n|\n|\r/", $job->qualifications);
                    @endphp
                    @foreach($qualifications as $qual)
                    @if(trim($qual) !== '')
                    <li>{{ trim($qual) }}</li>
                    @endif
                    @endforeach
                </ul>
                @endif

                @if(isset($job->requirements) && $job->requirements->isNotEmpty())
                <h2 class="section-title">Persyaratan Pekerjaan</h2>
                <ul class="requirements-list">
                    @foreach($job->requirements as $requirement)
                    <li>{{ $requirement->description }}</li>
                    @endforeach
                </ul>
                @endif

                @if(isset($job->benefits) && $job->benefits->isNotEmpty())
                <h2 class="section-title">Manfaat Pekerjaan</h2>
                <ul class="requirements-list">
                    @foreach($job->benefits as $benefit)
                    <li>{{ $benefit->description }}</li>
                    @endforeach
                </ul>
                @endif

                @if(isset($job->skills) && $job->skills->isNotEmpty())
                <h2 class="section-title">Keterampilan yang Dibutuhkan</h2>
                <div style="display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 20px;">
                    @foreach($job->skills as $skill)
                    <span
                        style="background: #e0f2f7; color: #0288d1; padding: 5px 10px; border-radius: 15px; font-size: 0.85rem;">{{ $skill->name }}</span>
                    @endforeach
                </div>
                @endif
            </div>

            <div class="sidebar">
                <div class="job-info-card">
                    <div class="job-icon">
                        <svg width="30" height="30" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                        </svg>
                    </div>
                    <div class="job-function">Category</div>
                    <div class="job-category">{{ $job->category->name ?? 'N/A' }}</div>

                    <div class="job-details">
                        <div class="detail-item">
                            <span class="detail-label">Berlaku Hingga</span>
                            <span
                                class="detail-value">{{ $job->application_deadline ? Carbon\Carbon::parse($job->application_deadline)->format('d M Y') : 'Tidak ada' }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Jenis Pekerjaan</span>
                            <span class="detail-value">{{ $job->type->name ?? 'N/A' }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Level</span>
                            <span class="detail-value">{{ $job->experience_level ?? 'Tidak disebutkan' }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Gaji</span>
                            <span class="detail-value">
                                {{ ($job->min_salary ? number_format($job->min_salary, 0, ',', '.') : 'Negotiable') }}
                                -
                                {{ ($job->max_salary ? number_format($job->max_salary, 0, ',', '.') : 'Negotiable') }}
                                {{ $job->salary_currency }}
                            </span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Dilihat</span>
                            <span class="detail-value">{{ $job->views_count }} Kali</span>
                        </div>
                    </div>
                </div>

                <a href="#" class="apply-button">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="margin-right: 8px;">
                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                    </svg>
                    Lamar pekerjaan ini
                </a>

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