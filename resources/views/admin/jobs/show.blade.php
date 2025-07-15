<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
        .detail-card {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .detail-item {
            margin-bottom: 15px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }
        .detail-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }
        .detail-item strong {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .detail-item p {
            margin-bottom: 0;
            color: #333;
        }
        .section-header {
            margin-top: 30px;
            margin-bottom: 15px;
            color: #2c3e50;
            font-size: 1.5rem;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }
        .list-unstyled {
            padding-left: 0;
            list-style: none;
        }
        .list-unstyled li {
            margin-bottom: 5px;
        }
        .btn-group {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Detail Lowongan Pekerjaan</h2>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
            <div class="container-fluid">
                <div class="block">
                    <div class="title"><strong>{{ $job->title }}</strong></div>
                    <div class="block-body">
                        <div class="detail-card">
                            <div class="detail-item">
                                <strong>Judul Lowongan:</strong>
                                <p>{{ $job->title }}</p>
                            </div>
                            <div class="detail-item">
                                <strong>Kategori:</strong>
                                <p>{{ $job->category->name ?? 'N/A' }}</p>
                            </div>
                            <div class="detail-item">
                                <strong>Lokasi:</strong>
                                <p>{{ $job->location->name ?? 'N/A' }}</p>
                            </div>
                            <div class="detail-item">
                                <strong>Tipe Pekerjaan:</strong>
                                <p>{{ $job->type->name ?? 'N/A' }}</p>
                            </div>
                            <div class="detail-item">
                                <strong>Deskripsi:</strong>
                                <p>{{ $job->description }}</p>
                            </div>
                            <div class="detail-item">
                                <strong>Tanggung Jawab:</strong>
                                <p>{{ $job->responsibilities ?? '-' }}</p>
                            </div>
                            <div class="detail-item">
                                <strong>Kualifikasi:</strong>
                                <p>{{ $job->qualifications ?? '-' }}</p>
                            </div>
                            <div class="detail-item">
                                <strong>Gaji:</strong>
                                <p>{{ ($job->min_salary ? number_format($job->min_salary, 0, ',', '.') : 'Negotiable') }} - {{ ($job->max_salary ? number_format($job->max_salary, 0, ',', '.') : 'Negotiable') }} {{ $job->salary_currency }}</p>
                            </div>
                             <div class="detail-item">
                                <strong>Level Pengalaman:</strong>
                                <p>{{ $job->experience_level ?? '-' }}</p>
                            </div>
                            <div class="detail-item">
                                <strong>Tingkat Pendidikan:</strong>
                                <p>{{ $job->education_level ?? '-' }}</p>
                            </div>
                            <div class="detail-item">
                                <strong>Batas Akhir Lamaran:</strong>
                                <p>{{ $job->application_deadline ? \Carbon\Carbon::parse($job->application_deadline)->format('d M Y') : '-' }}</p>
                            </div>
                            <div class="detail-item">
                                <strong>Status:</strong>
                                <p>
                                    <span class="badge badge-{{ $job->status == 'Published' ? 'success' : ($job->status == 'Draft' ? 'secondary' : 'danger') }}">
                                        {{ $job->status }}
                                    </span>
                                </p>
                            </div>
                            <div class="detail-item">
                                <strong>Unggulan:</strong>
                                <p>{{ $job->is_featured ? 'Ya' : 'Tidak' }}</p>
                            </div>
                             <div class="detail-item">
                                <strong>Dilihat:</strong>
                                <p>{{ $job->views_count }} kali</p>
                            </div>
                            <div class="detail-item">
                                <strong>Diposting Oleh:</strong>
                                <p>{{ $job->poster->name ?? 'N/A' }}</p>
                            </div>
                            <div class="detail-item">
                                <strong>Tanggal Posting:</strong>
                                <p>{{ \Carbon\Carbon::parse($job->created_at)->format('d M Y H:i:s') }}</p>
                            </div>

                            <h3 class="section-header">Keterampilan Dibutuhkan</h3>
                            @if($job->skills->isNotEmpty())
                                <ul class="list-unstyled">
                                    @foreach($job->skills as $skill)
                                        <li><span class="badge badge-info">{{ $skill->name }}</span></li>
                                    @endforeach
                                </ul>
                            @else
                                <p>Tidak ada keterampilan spesifik yang dicantumkan.</p>
                            @endif

                            <h3 class="section-header">Manfaat Pekerjaan</h3>
                            @if($job->benefits->isNotEmpty())
                                <ul class="list-unstyled">
                                    @foreach($job->benefits as $benefit)
                                        <li>- {{ $benefit->description }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p>Tidak ada manfaat pekerjaan yang dicantumkan.</p>
                            @endif

                            <h3 class="section-header">Persyaratan Pekerjaan</h3>
                            @if($job->requirements->isNotEmpty())
                                <ul class="list-unstyled">
                                    @foreach($job->requirements as $req)
                                        <li>- {{ $req->description }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p>Tidak ada persyaratan pekerjaan yang dicantumkan.</p>
                            @endif

                            <div class="btn-group">
                                <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus lowongan ini?')">Hapus</button>
                                </form>
                                <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary btn-sm">Kembali ke Daftar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
            @include('admin.js')

</body>
</html>