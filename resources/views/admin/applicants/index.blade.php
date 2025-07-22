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

        /* Style for profile image in table */
        .table-profile-image {
            width: 50px; /* Adjust size as needed */
            height: 50px; /* Adjust size as needed */
            border-radius: 50%;
            object-fit: cover;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Manajemen Pelamar</h2>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
            <div class="container-fluid">
                <div class="block">
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
                                        <th>Foto Profil</th>
                                        <th>Nama Pelamar</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat Email</th>
                                        <th>No. Telepon</th>
                                        <th>Status Pernikahan</th>
                                        <th>Sumber Lowongan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Change $jobs to $applicants --}}`
                                    @forelse($applicants as $applicant)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration + ($applicants->currentPage() - 1) * $applicants->perPage() }}</th>
                                            <td>
                                                <img src={{ Storage::url($applicant->profile_image) }}
                                                     alt="Foto Profil" class="table-profile-image">
                                            </td>
                                            <td>{{ $applicant->full_name }}</td>
                                            <td>{{ $applicant->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                            <td>{{ $applicant->email_address }}</td>
                                            <td>{{ $applicant->mobile_phone_number }}</td>
                                            <td>{{ $applicant->marital_status }}</td>
                                            <td>{{ $applicant->job_vacancy_source }}</td>
                                            <td>
                                                {{-- START: AKSI VERTIKAL --}}
                                                <div class="action-buttons-vertical">
                                                    {{-- Link to view applicant details --}}
                                                    <a href="{{ route('admin.applicants.show', $applicant->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                                    {{-- Link to edit applicant --}}
                                                    <a href="{{ route('admin.applicants.edit', $applicant->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    {{-- Form to delete applicant --}}
                                                    <form action="{{ route('admin.applicants.destroy', $applicant->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pelamar ini?')">Hapus</button>
                                                    </form>
                                                </div>
                                                {{-- END: AKSI VERTIKAL --}}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">Tidak ada data pelamar ditemukan.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{-- Ensure pagination links use $applicants --}}
                            {{ $applicants->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('admin.js')
</body>
</html>
