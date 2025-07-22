<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
        .table-responsive {
            margin-top: 20px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        /* Hapus atau sesuaikan .btn-action jika tidak diperlukan lagi untuk tombol ini */
        /* .btn-action {
            margin-right: 5px;
        } */
        .news-image-thumbnail {
            width: 80px;
            height: 50px;
            object-fit: cover;
            border-radius: 4px;
        }
        .pagination {
            justify-content: center;
            margin-top: 20px;
        }
        /* Style tambahan untuk merapikan aksi vertikal */
        .action-buttons-vertical {
            display: flex;
            flex-direction: column; /* Membuat item menurun ke bawah */
            gap: 5px; /* Memberi jarak antar tombol */
            align-items: flex-start; /* Rata kiri */
        }
        .action-buttons-vertical .btn,
        .action-buttons-vertical form {
            width: 100%; /* Membuat tombol selebar wadahnya */
            display: block; /* Memastikan form mengambil baris penuh */
            margin-right: 0 !important; /* Menghapus margin-right dari .btn-action */
        }
        .action-buttons-vertical form button {
            width: 100%; /* Memastikan tombol submit di dalam form juga selebar wadahnya */
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Manajemen Berita & Artikel</h2>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
            <div class="container-fluid">
                <div class="block">
                    <div class="title">
                        <strong>Daftar Berita</strong>
                        <a href="{{ route('admin.news.create') }}" class="btn btn-primary btn-sm float-right">Tambah Berita Baru</a>
                    </div>
                    <div class="block-body">
                        @if(session('message'))
                            <div class="alert alert-success">{{ session('message') }}</div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Gambar</th>
                                        <th>Judul</th>
                                        <th>Sub Judul</th>
                                        <th>Category</th>
                                        <th>Deskripsi Singkat</th>
                                        <th>Tanggal Posting</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($newsArticles as $news)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration + ($newsArticles->currentPage() - 1) * $newsArticles->perPage() }}</th>
                                            <td>
                                                @if($news->image)
                                                   <img src="{{ Storage::url($news->image) }}" alt="{{ $news->title }}" class="news-image-thumbnail">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>{{ $news->title }}</td>
                                            <td>{{ $news->subtitle }}</td>
                                            <td>{{$news->category}}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($news->description, 50) }}</td>
                                            <td>{{ \Carbon\Carbon::parse($news->created_at)->format('d M Y') }}</td>
                                            <td>
                                                {{-- START: AKSI VERTIKAL --}}
                                                <div class="action-buttons-vertical">
                                                    <a href="{{ route('admin.news.show', $news->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                                    <a href="{{ route('admin.news.edit', $news->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('admin.news.destroy', $news->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">Hapus</button>
                                                    </form>
                                                </div>
                                                {{-- END: AKSI VERTIKAL --}}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada berita ditemukan.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $newsArticles->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('admin.js')
</body>
</html>