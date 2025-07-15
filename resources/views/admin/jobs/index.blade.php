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
        .pagination {
            justify-content: center;
            margin-top: 20px;
        }

        /* --- Style Baru untuk Aksi Vertikal dan Responsif --- */
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

        /* Opsi: Ubah menjadi vertikal hanya pada layar kecil */
        /* @media (max-width: 768px) {
            .action-buttons {
                display: flex;
                flex-direction: column;
                gap: 5px;
                align-items: flex-start;
            }
            .action-buttons .btn,
            .action-buttons form {
                width: 100%;
                margin-right: 0 !important;
            }
            .action-buttons form button {
                width: 100%;
            }
        } */
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Manajemen Lowongan Pekerjaan</h2>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
            <div class="container-fluid">
                <div class="block">
                    <div class="title">
                        <strong>Daftar Lowongan</strong>
                        <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary btn-sm float-right">Tambah Lowongan Baru</a>
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
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th>Lokasi</th>
                                        <th>Tipe</th>
                                        <th>Status</th>
                                        <th>Dibuat Oleh</th>
                                        <th>Tanggal Posting</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($jobs as $job)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration + ($jobs->currentPage() - 1) * $jobs->perPage() }}</th>
                                            <td>{{ $job->title }}</td>
                                            <td>{{ $job->category->name ?? 'N/A' }}</td>
                                            <td>{{ $job->location->name ?? 'N/A' }}</td>
                                            <td>{{ $job->type->name ?? 'N/A' }}</td>
                                            <td>
                                                <span class="badge badge-{{ $job->status == 'Published' ? 'success' : ($job->status == 'Draft' ? 'secondary' : 'danger') }}">
                                                    {{ $job->status }}
                                                </span>
                                            </td>
                                            <td>{{ $job->poster->name ?? 'N/A' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($job->created_at)->format('d M Y') }}</td>
                                            <td>
                                                {{-- START: AKSI VERTIKAL --}}
                                                <div class="action-buttons-vertical">
                                                    <a href="{{ route('admin.jobs.show', $job->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                                    <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus lowongan ini?')">Hapus</button>
                                                    </form>
                                                </div>
                                                {{-- END: AKSI VERTIKAL --}}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">Tidak ada lowongan pekerjaan ditemukan.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $jobs->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('admin.js')
</body>
</html>