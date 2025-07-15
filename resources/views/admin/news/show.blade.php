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
        .news-detail-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
            border-radius: 8px;
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
                <h2 class="h5 no-margin-bottom">Detail Berita</h2>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
            <div class="container-fluid">
                <div class="block">
                    <div class="title"><strong>{{ $news->title }}</strong></div>
                    <div class="block-body">
                        <div class="detail-card">
                            @if($news->image)
                                <img src="{{ $news->image }}" alt="{{ $news->title }}" class="news-detail-image">
                            @endif
                            <div class="detail-item">
                                <strong>Judul Berita:</strong>
                                <p>{{ $news->title }}</p>
                            </div>
                            <div class="detail-item">
                                <strong>Sub Judul:</strong>
                                <p>{{ $news->subtitle }}</p>
                            </div>
                            <div class="detail-item">
                                <strong>Category:</strong>
                                <p>{{ $news->category }}</p>
                            </div>
                            <div class="detail-item">
                                <strong>Deskripsi:</strong>
                                <p>{{ $news->description }}</p>
                            </div>
                            <div class="detail-item">
                                <strong>Tanggal Posting:</strong>
                                <p>{{ \Carbon\Carbon::parse($news->created_at)->format('d M Y H:i:s') }}</p>
                            </div>

                            <div class="btn-group">
                                <a href="{{ route('admin.news.edit', $news->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.news.destroy', $news->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">Hapus</button>
                                </form>
                                <a href="{{ route('admin.news.index') }}" class="btn btn-secondary btn-sm">Kembali ke Daftar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>