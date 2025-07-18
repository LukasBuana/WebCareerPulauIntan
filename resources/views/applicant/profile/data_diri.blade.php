<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pribadi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Card Styles */
        .card {
            border: none; /* Menghilangkan garis tepi (border) */
            box-shadow: none; /* Menghilangkan bayangan (shadow) */
            border-radius: 8px; /* Memberikan sudut membulat pada seluruh card */
        }

        /* Card Header Styles - Warna default saat tertutup */
        .card-header {
            background-color: #fbf5f5ff; /* Warna default saat tertutup (putih/abu-abu sangat terang) */
            color: #000000; /* Warna teks saat tertutup (hitam agar terbaca) */
            /* Mengatur border-radius agar hanya sudut atas yang membulat */
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
            border-bottom: none; /* Menghilangkan border bawah dari header agar menyatu dengan body */
            cursor: pointer; /* Menandakan bahwa elemen ini bisa diklik */
            transition: background-color 0.3s ease, color 0.3s ease; /* Transisi halus untuk perubahan warna */
        }

        /* Card Header Active State - Warna saat konten terbuka */
        .card-header.active {
            background-color: #DA251C; /* Warna merah saat aktif/terbuka */
            color: white; /* Warna teks saat aktif/terbuka (putih) */
        }

        /* Card Body Styles */
        .card-body {
            border-top: none; /* Menghilangkan border atas dari body agar menyatu dengan header */
        }

        /* Collapse Icon Animation */
        .collapse-icon {
            transition: transform 0.3s ease;
        }

        /* Collapse Icon when collapsed (default Bootstrap behavior adds .collapsed) */
        .collapsed .collapse-icon {
            transform: rotate(180deg);
        }

        /* Form Control Focus State */
        .form-control:focus {
            border-color: #4a6cf7;
            box-shadow: 0 0 0 0.2rem rgba(74, 108, 247, 0.25);
        }

        /* Primary Button Styles */
        .btn-primary {
            background-color: #4a6cf7;
            border-color: #4a6cf7;
        }

        .btn-primary:hover {
            background-color: #3b5ce6;
            border-color: #3b5ce6;
        }

        /* Upload Area Styles */
        .upload-area {
            border: 2px dashed #dee2e6;
            border-radius: 50%; /* Keep it circular */
            padding: 20px;
            text-align: center;
            background-color: #f8f9fa;
            cursor: pointer;
            transition: border-color 0.3s ease;
            display: flex; /* Make it a flex container */
            flex-direction: column; /* Stack items vertically */
            justify-content: center; /* Center vertically */
            align-items: center; /* Center horizontally */
            width: 80px; /* Match profile image width */
            height: 80px; /* Match profile image height */
            flex-shrink: 0; /* Prevent shrinking when content is long */
        }

        .upload-area:hover {
            border-color: #4a6cf7;
        }

        .upload-area i {
            font-size: 2rem;
            color: #6c757d;
            margin-bottom: 5px; /* Reduced margin */
        }
        .upload-area .text-overlay {
            font-size: 0.8em;
            color: #6c757d;
        }

        /* Required Field Indicator */
        .required {
            color: #dc3545;
        }

        /* Error Message Styles */
        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: none; /* Hidden by default, shown by JS */
        }

        /* Profile Image Styles */
        .profile-image {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #dee2e6;
            display: none; /* Hidden by default, shown by JS when image is uploaded */
        }

        /* Container for image/upload area to manage their display */
        .image-display-container {
            width: 80px; /* Same as image/upload area */
            height: 80px; /* Same as image/upload area */
            position: relative; /* If you still want overlay behavior for fancier effects */
            flex-shrink: 0;
        }

        /* File Information Text */
        .file-info {
            font-size: 0.8rem;
            color: #6c757d;
            margin-top: 5px;
        }

        /* Style for inputs with errors (red border) */
        .form-control.is-invalid {
            border-color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse"
                        data-bs-target="#dataPribadiCollapse"
                        aria-expanded="true"
                        style="cursor: pointer;">
                        <h5 class="mb-0">
                            <i class="fas fa-user me-2"></i>Data Pribadi<span class="required">*</span>
                        </h5>
                        <i class="fas fa-chevron-up collapse-icon"></i>
                    </div>

                    <div class="collapse show" id="dataPribadiCollapse">
                        <div class="card-body">
                            <form id="dataPribadiForm" method="POST" enctype="multipart/form-data">
                                <div class="accordion" id="accordionInformasiUtama">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingInformasiUtama">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInformasiUtama" aria-expanded="true" aria-controls="collapseInformasiUtama">
                                                Informasi Utama
                                            </button>
                                        </h2>
                                        <div id="collapseInformasiUtama" class="accordion-collapse collapse show" aria-labelledby="headingInformasiUtama" data-bs-parent="#accordionInformasiUtama">
                                            <div class="accordion-body">
                                                <div class="row mb-4">
                                                    <div class="col-md-6">
                                                        <div class="mb-3 d-flex align-items-start">
                                                            <div class="image-display-container me-3">
                                                                <div class="upload-area" id="uploadAreaContainer" onclick="document.getElementById('profileImage').click();">
                                                                    <i class="fas fa-upload"></i>
                                                                    <div class="text-overlay">.jpg</div>
                                                                </div>
                                                                <img id="profilePreview"
                                                                    src="https://via.placeholder.com/80x80?text=?"
                                                                    alt="Profile"
                                                                    class="profile-image">
                                                            </div>
                                                            <input type="file"
                                                                class="form-control d-none"
                                                                id="profileImage"
                                                                name="profile_image"
                                                                accept="image/jpeg, image/png"
                                                                onchange="previewImage(this)">
                                                            <div>
                                                                <label class="form-label">Foto Profil</label>
                                                                <div class="file-info">
                                                                    Syarat: format jpg / png maks. 1 MB<br>
                                                                    Jika Anda ingin mengganti dokumen yg telah diunggah, silakan hapus dokumen yg telah diunggah sebelumnya
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="namaLengkap" class="form-label">
                                                                Nama Lengkap <span class="required">*</span>
                                                            </label>
                                                            <input type="text"
                                                                class="form-control"
                                                                id="namaLengkap"
                                                                name="nama_lengkap"
                                                                value="Haikal Gibran"
                                                                required>
                                                            <div class="error-message"></div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="alamatEmail" class="form-label">
                                                                Alamat Email <span class="required">*</span>
                                                            </label>
                                                            <input type="email"
                                                                class="form-control"
                                                                id="alamatEmail"
                                                                name="alamat_email"
                                                                value="haikal.gibran.gunawan@gmail.com"
                                                                required>
                                                            <div class="error-message"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="noTelepon" class="form-label">
                                                                No. Telepon <span class="required">*</span>
                                                            </label>
                                                            <input type="tel"
                                                                class="form-control"
                                                                id="noTelepon"
                                                                name="no_telepon"
                                                                placeholder="Contoh: 628123924843"
                                                                required>
                                                            <div class="error-message"></div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="tempatLahir" class="form-label">
                                                                Tempat Lahir <span class="required">*</span>
                                                            </label>
                                                            <input type="text"
                                                                class="form-control"
                                                                id="tempatLahir"
                                                                name="tempat_lahir"
                                                                placeholder="Masukkan Tempat lahir"
                                                                required>
                                                            <div class="error-message"></div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="tanggalLahir" class="form-label">
                                                                Tanggal Lahir <span class="required">*</span>
                                                            </label>
                                                            <input type="date"
                                                                class="form-control"
                                                                id="tanggalLahir"
                                                                name="tanggal_lahir"
                                                                required>
                                                            <div class="error-message"></div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="goldar" class="form-label">
                                                                Golongan Darah <span class="required">*</span>
                                                            </label>
                                                            <select class="form-select"
                                                                id="goldar"
                                                                name="goldar"
                                                                required>
                                                                <option value="">Pilih Golongan Darah</option>
                                                                <option value="O">O</option>
                                                                <option value="A">A</option>
                                                                <option value="B">B</option>
                                                                <option value="AB">AB</option>
                                                            </select>
                                                            <div class="error-message"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-md-12 text-end">
                                                        <button type="button" class="btn btn-primary px-4 save-section-btn" data-section="informasiUtama">
                                                            <i class="fas fa-save me-2"></i>Simpan Informasi Utama
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion mt-3" id="accordionInformasiAlamat">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingInformasiAlamat">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInformasiAlamat" aria-expanded="false" aria-controls="collapseInformasiAlamat">
                                                Informasi Alamat
                                            </button>
                                        </h2>
                                        <div id="collapseInformasiAlamat" class="accordion-collapse collapse" aria-labelledby="headingInformasiAlamat" data-bs-parent="#accordionInformasiAlamat">
                                            <div class="accordion-body">
                                                <div class="row mb-4">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="alamatktp" class="form-label">
                                                                Alamat KTP <span class="required">*</span>
                                                            </label>
                                                            <textarea class="form-control"
                                                                id="alamatktp"
                                                                name="alamatktp"
                                                                rows="4"
                                                                placeholder="Masukkan Alamat sesuai dengan KTP"
                                                                required></textarea>
                                                            <div class="error-message"></div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="alamatnow" class="form-label">
                                                                Alamat Sekarang <span class="required">*</span>
                                                            </label>
                                                            <textarea class="form-control"
                                                                id="alamatnow"
                                                                name="alamatnow"
                                                                rows="4"
                                                                placeholder="Masukkan Alamat sesuai dengan tempat tinggal sekarang"
                                                                required></textarea>
                                                            <div class="error-message"></div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="alamatortu" class="form-label">
                                                                Alamat Orangtua <span class="required">*</span>
                                                            </label>
                                                            <textarea class="form-control"
                                                                id="alamatortu"
                                                                name="alamatortu"
                                                                rows="4"
                                                                placeholder="Masukkan Alamat orangtua"
                                                                required></textarea>
                                                            <div class="error-message"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="kodePosKTP" class="form-label">
                                                                Kode Pos sesuai Alamat KTP <span class="required">*</span>
                                                            </label>
                                                            <input type="text"
                                                                class="form-control"
                                                                id="kodePosKTP"
                                                                name="kode_pos_KTP"
                                                                placeholder="Masukkan Kode Pos sesuai Alamat KTP"
                                                                required>
                                                            <div class="error-message"></div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="kodePos_now" class="form-label">
                                                                Kode Pos Alamat Sekarang<span class="required">*</span>
                                                            </label>
                                                            <input type="text"
                                                                class="form-control"
                                                                id="kodePos_now"
                                                                name="kode_pos_now"
                                                                placeholder="Masukkan Kode Pos sesuai Alamat Sekarang"
                                                                required>
                                                            <div class="error-message"></div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="kodePos_ortu" class="form-label">
                                                                Kode Pos sesuai Alamat Orangtua <span class="required">*</span>
                                                            </label>
                                                            <input type="text"
                                                                class="form-control"
                                                                id="kodePos_ortu"
                                                                name="kode_pos_ortu"
                                                                placeholder="Masukkan Kode Pos sesuai Alamat Orangtua"
                                                                required>
                                                            <div class="error-message"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-md-12 text-end">
                                                        <button type="button" class="btn btn-primary px-4 save-section-btn" data-section="informasiAlamat">
                                                            <i class="fas fa-save me-2"></i>Simpan Informasi Alamat
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion mt-3" id="accordionNomorIdentitas">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingNomorIdentitas">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNomorIdentitas" aria-expanded="false" aria-controls="collapseNomorIdentitas">
                                                Nomor Identitas
                                            </button>
                                        </h2>
                                        <div id="collapseNomorIdentitas" class="accordion-collapse collapse" aria-labelledby="headingNomorIdentitas" data-bs-parent="#accordionNomorIdentitas">
                                            <div class="accordion-body">
                                                <div class="row mb-4">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="noKTP" class="form-label">
                                                                No. KTP <span class="required">*</span>
                                                            </label>
                                                            <input type="text"
                                                                class="form-control"
                                                                id="noKTP"
                                                                name="no_ktp"
                                                                placeholder="Masukkan No. KTP"
                                                                required>
                                                            <div class="error-message"></div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="noNPWP" class="form-label">
                                                                No. NPWP <span class="required">*</span>
                                                            </label>
                                                            <input type="text"
                                                                class="form-control"
                                                                id="noNPWP"
                                                                name="no_NPWP"
                                                                placeholder="Masukkan No. NPWP"
                                                                required>
                                                            <div class="error-message"></div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="noBPJSsehat" class="form-label">
                                                                No. BPJS Kesehatan <span class="required">*</span>
                                                            </label>
                                                            <input type="tel"
                                                                class="form-control"
                                                                id="noBPJSsehat"
                                                                name="no_BPJSsehat"
                                                                placeholder="Contoh: 628123924843"
                                                                required>
                                                            <div class="error-message"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="noSIM" class="form-label">
                                                                No. SIM <span class="required">*</span>
                                                            </label>
                                                            <input type="text"
                                                                class="form-control"
                                                                id="noSIM"
                                                                name="no_SIM"
                                                                placeholder="Masukkan No. SIM"
                                                                required>
                                                            <div class="error-message"></div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exp_date_SIM" class="form-label">
                                                                Tanggal Kadaluarsa SIM <span class="required">*</span>
                                                            </label>
                                                            <input type="date"
                                                                class="form-control"
                                                                id="exp_date_SIM"
                                                                name="exp_date_SIM"
                                                                required>
                                                            <div class="error-message"></div>
                                                        </div>
                                                        
                                                        <div class="mb-3">
                                                            <label for="noBPJSkerja" class="form-label">
                                                                No. BPJS Ketenagakerjaan <span class="required">*</span>
                                                            </label>
                                                            <input type="tel"
                                                                class="form-control"
                                                                id="noBPJSkerja"
                                                                name="no_BPJSkerja"
                                                                placeholder="Contoh: 628123924843"
                                                                required>
                                                            <div class="error-message"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-md-12 text-end">
                                                        <button type="button" class="btn btn-primary px-4 save-section-btn" data-section="nomorIdentitas">
                                                            <i class="fas fa-save me-2"></i>Simpan Nomor Identitas
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion mt-3" id="accordionDetailPribadiLainnya">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingDetailPribadiLainnya">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDetailPribadiLainnya" aria-expanded="false" aria-controls="collapseDetailPribadiLainnya">
                                                Detail Pribadi Lainnya
                                            </button>
                                        </h2>
                                        <div id="collapseDetailPribadiLainnya" class="accordion-collapse collapse" aria-labelledby="headingDetailPribadiLainnya" data-bs-parent="#accordionDetailPribadiLainnya">
                                            <div class="accordion-body">
                                                <div class="row mb-4">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="jenisKelamin" class="form-label">
                                                                Jenis Kelamin <span class="required">*</span>
                                                            </label>
                                                            <select class="form-select"
                                                                id="jenisKelamin"
                                                                name="jenis_kelamin"
                                                                required>
                                                                <option value="">Pilih Jenis Kelamin</option>
                                                                <option value="L">Laki-laki</option>
                                                                <option value="P">Perempuan</option>
                                                            </select>
                                                            <div class="error-message"></div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="agama" class="form-label">
                                                                Agama <span class="required">*</span>
                                                            </label>
                                                            <select class="form-select"
                                                                id="agama"
                                                                name="agama"
                                                                required>
                                                                <option value="">Pilih Agama</option>
                                                                <option value="Islam">Islam</option>
                                                                <option value="Protestan">Kristen</option>
                                                                <option value="Katolik">Katolik</option>
                                                                <option value="Konghucu">Konghucu</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Buddha">Buddha</option>
                                                            </select>
                                                            <div class="error-message"></div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="statusnikah" class="form-label">
                                                                Status Pernikahan <span class="required">*</span>
                                                            </label>
                                                            <select class="form-select"
                                                                id="statusnikah"
                                                                name="statusnikah"
                                                                required>
                                                                <option value="">Pilih Status Pernikahan</option>
                                                                <option value="Single">Belum Menikah (Single)</option>
                                                                <option value="Married">Menikah (Married)</option>
                                                                <option value="Widower/Widow">Duda/Janda (Widower/Widow)</option>
                                                            </select>
                                                            <div class="error-message"></div>
                                                        </div>

                                                        <div class="mb-3" id="dudaJandaDateGroup" style="display: none;">
                                                            <label for="dudaJandaDate" class="form-label">
                                                                Dari Kapan Duda/Janda <span class="required">*</span>
                                                            </label>
                                                            <input type="date"
                                                                class="form-control"
                                                                id="dudaJandaDate"
                                                                name="duda_janda_date">
                                                            <div class="error-message"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-md-12 text-end">
                                                        <button type="button" class="btn btn-primary px-4 save-section-btn" data-section="detailPribadiLainnya">
                                                            <i class="fas fa-save me-2"></i>Simpan Detail Pribadi Lainnya
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion mt-3" id="accordionSumberLowongan">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingSumberLowongan">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSumberLowongan" aria-expanded="false" aria-controls="collapseSumberLowongan">
                                                Sumber Informasi Lowongan
                                            </button>
                                        </h2>
                                        <div id="collapseSumberLowongan" class="accordion-collapse collapse" aria-labelledby="headingSumberLowongan" data-bs-parent="#accordionSumberLowongan">
                                            <div class="accordion-body">
                                                <div class="row mb-4">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="sumber_lowongan" class="form-label">
                                                                Sumber Informasi <span class="required">*</span>
                                                            </label>
                                                            <select class="form-select"
                                                                id="sumber_lowongan"
                                                                name="sumber_lowongan"
                                                                required>
                                                                <option value="">Pilih Sumber Lowongan</option>
                                                                <option value="Youtube">Youtube</option>
                                                                <option value="Twitter/X">Twitter/X</option>
                                                                <option value="LinkedIn">LinkedIn</option>
                                                                <option value="Facebook">Facebook</option>
                                                                <option value="Lainnya">Lainnya</option>
                                                            </select>
                                                            <div class="error-message"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-md-12 text-end">
                                                        <button type="button" class="btn btn-primary px-4 save-section-btn" data-section="sumberLowongan">
                                                            <i class="fas fa-save me-2"></i>Simpan Sumber Lowongan
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Preview gambar profile
        function previewImage(input) {
            const profilePreview = document.getElementById('profilePreview');
            const uploadArea = document.getElementById('uploadAreaContainer');
            const fileInfo = document.querySelector('#accordionInformasiUtama .file-info'); // Target within the specific section

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    profilePreview.src = e.target.result;
                    profilePreview.style.display = 'block'; // Show the image
                    uploadArea.style.display = 'none'; // Hide the circular upload area

                    const fileName = input.files[0].name;
                    const fileSize = (input.files[0].size / 1024 / 1024).toFixed(2); // MB
                    fileInfo.innerHTML = `
                        Syarat: format jpg / png maks. 1 MB<br>
                        File: <strong>${fileName}</strong> (Ukuran: ${fileSize} MB)<br>
                        Jika Anda ingin mengganti dokumen yg telah diunggah, silakan hapus dokumen yg telah diunggah sebelumnya
                    `;
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                // If no file is selected (e.g., user cancels the file dialog or clears the input)
                profilePreview.src = "https://via.placeholder.com/80x80?text=?"; // Reset to placeholder
                profilePreview.style.display = 'none'; // Hide the image
                uploadArea.style.display = 'flex'; // Show the circular upload area (placeholder)

                fileInfo.innerHTML = `
                    Syarat: format jpg / png maks. 1 MB<br>
                    Jika Anda ingin mengganti dokumen yg telah diunggah, silakan hapus dokumen yg telah diunggah sebelumnya
                `;
            }
        }

        // --- Form Validation Logic for Individual Sections ---
        document.querySelectorAll('.save-section-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                const sectionId = this.dataset.section;
                const sectionElement = document.getElementById(`collapse${sectionId.charAt(0).toUpperCase() + sectionId.slice(1)}`);
                let isValid = true;

                // Reset error messages and invalid class for the specific section
                sectionElement.querySelectorAll('.error-message').forEach(msg => {
                    msg.style.display = 'none';
                });
                sectionElement.querySelectorAll('.form-control').forEach(input => {
                    input.classList.remove('is-invalid');
                });

                // Define required fields per section
                const sectionRequiredFields = {
                    informasiUtama: {
                        'namaLengkap': 'Silakan masukkan Nama Lengkap Anda',
                        'alamatEmail': 'Silakan masukkan Alamat Email Anda',
                        'noTelepon': 'Silakan masukkan no. telp',
                        'tempatLahir': 'Silakan masukkan tempat lahir',
                        'tanggalLahir': 'Silakan masukkan tanggal lahir',
                        'goldar': 'Golongan Darah harus diisi'
                    },
                    informasiAlamat: {
                        'alamatktp': 'Silakan masukkan alamat',
                        'alamatnow': 'Silakan masukkan alamat sekarang',
                        'alamatortu': 'Silakan masukkan alamat orangtua',
                        'kodePosKTP': 'Silakan masukkan kode pos sesuai Alamat KTP',
                        'kodePos_now': 'Silakan masukkan kode pos sesuai Alamat Sekarang',
                        'kodePos_ortu': 'Silakan masukkan kode pos sesuai Alamat Orangtua'
                    },
                    nomorIdentitas: {
                        'noKTP': 'Silakan masukkan no. KTP',
                        'noNPWP': 'Silakan masukkan no. NPWP',
                        'noBPJSsehat': 'Silakan masukkan Nomor BPJS Kesehatan',
                        'noSIM': 'Silakan masukkan no. SIM',
                        'exp_date_SIM': 'Silakan masukkan tanggal kadaluarsa SIM',
                        'noBPJSkerja': 'Silakan masukkan Nomor BPJS Ketenagakerjaan'
                    },
                    detailPribadiLainnya: {
                        'jenisKelamin': 'Silakan pilih jenis kelamin',
                        'agama': 'Agama harus diisi',
                        'statusnikah': 'Silakan pilih Status Pernikahan'
                    },
                    sumberLowongan: {
                        'sumber_lowongan': 'Lowongan harus diisi'
                    }
                };

                const requiredFields = sectionRequiredFields[sectionId];

                for (const fieldId in requiredFields) {
                    const field = sectionElement.querySelector(`#${fieldId}`); // Select within the current section
                    if (field && (field.type === 'select-one' ? !field.value : !field.value.trim())) {
                        field.classList.add('is-invalid');
                        const errorMsg = field.parentElement.querySelector('.error-message');
                        if (errorMsg) {
                            errorMsg.textContent = requiredFields[fieldId];
                            errorMsg.style.display = 'block';
                        }
                        isValid = false;
                    }
                }

                // Specific validation for 'Dari Kapan Duda/Janda' if visible in 'detailPribadiLainnya'
                if (sectionId === 'detailPribadiLainnya') {
                    const statusNikahField = sectionElement.querySelector('#statusnikah');
                    const dudaJandaDateField = sectionElement.querySelector('#dudaJandaDate');

                    if (statusNikahField && statusNikahField.value === 'Widower/Widow') {
                        if (!dudaJandaDateField.value.trim()) {
                            dudaJandaDateField.classList.add('is-invalid');
                            const errorMsg = dudaJandaDateField.parentElement.querySelector('.error-message');
                            if (errorMsg) {
                                errorMsg.textContent = 'Silakan masukkan tanggal duda/janda';
                                errorMsg.style.display = 'block';
                            }
                            isValid = false;
                        }
                    }
                }

                // Validate email format (only if it's in the current section)
                if (sectionId === 'informasiUtama') {
                    const emailField = sectionElement.querySelector('#alamatEmail');
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (emailField.value && !emailRegex.test(emailField.value)) {
                        emailField.classList.add('is-invalid');
                        const errorMsg = emailField.parentElement.querySelector('.error-message');
                        if (errorMsg) {
                            errorMsg.textContent = 'Format email tidak valid';
                            errorMsg.style.display = 'block';
                        }
                        isValid = false;
                    }
                }
                
                // Validate phone number format (for BPJS Kesehatan, BPJS Ketenagakerjaan, and No. Telepon)
                if (sectionId === 'informasiUtama' || sectionId === 'nomorIdentitas') {
                    const phoneFields = (sectionId === 'informasiUtama') ? ['noTelepon'] : ['noBPJSsehat', 'noBPJSkerja', 'noSIM'];
                    const phoneRegex = /^[0-9]{10,15}$/; // Assuming 10 to 15 digits for phone numbers

                    phoneFields.forEach(fieldId => {
                        const field = sectionElement.querySelector(`#${fieldId}`);
                        if (field && field.value && !phoneRegex.test(field.value.replace(/\D/g, ''))) {
                            field.classList.add('is-invalid');
                            const errorMsg = field.parentElement.querySelector('.error-message');
                            if (errorMsg) {
                                errorMsg.textContent = `Format ${field.previousElementSibling.textContent.replace(' *', '')} tidak valid. Harap masukkan 10-15 digit angka.`;
                                errorMsg.style.display = 'block';
                            }
                            isValid = false;
                        }
                    });
                }
                
                // Validate Kode Pos format (assuming 5 digits) for all kode pos fields
                if (sectionId === 'informasiAlamat') {
                    const kodePosFields = ['kodePosKTP', 'kodePos_now', 'kodePos_ortu'];
                    const kodePosRegex = /^[0-9]{5}$/;
                    kodePosFields.forEach(fieldId => {
                        const field = sectionElement.querySelector(`#${fieldId}`);
                        if (field.value && !kodePosRegex.test(field.value)) {
                            field.classList.add('is-invalid');
                            const errorMsg = field.parentElement.querySelector('.error-message');
                            if (errorMsg) {
                                errorMsg.textContent = 'Format Kode Pos tidak valid. Harap masukkan 5 digit angka.';
                                errorMsg.style.display = 'block';
                            }
                            isValid = false;
                        }
                    });
                }

                if (isValid) {
                    alert(`Data di bagian "${this.textContent.replace('Simpan ', '').trim()}" berhasil disimpan!`);
                    // In a real application, you would send specific data for this section
                    // For example, using fetch API to send data to a backend endpoint:
                    /*
                    const formData = new FormData();
                    sectionElement.querySelectorAll('input, select, textarea').forEach(input => {
                        if (input.name) { // Only append if input has a name
                            formData.append(input.name, input.value);
                        }
                    });
                    fetch('/api/save-personal-data-section', { // Replace with your actual endpoint
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Success:', data);
                        alert(`Data di bagian "${this.textContent.replace('Simpan ', '').trim()}" berhasil disimpan!`);
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat menyimpan data.');
                    });
                    */
                } else {
                    // Find the first invalid element in the current section and scroll to it
                    const firstInvalidField = sectionElement.querySelector('.is-invalid');
                    if (firstInvalidField) {
                        firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }
            });
        });


        // === Logika untuk mengubah warna header berdasarkan status collapse dan toggle icon ===
        document.addEventListener('DOMContentLoaded', function() {
            const mainCardHeader = document.querySelector('.card-header');
            const mainCollapseIcon = mainCardHeader.querySelector('.collapse-icon');
            const dataPribadiCollapse = document.getElementById('dataPribadiCollapse');
            const profilePreview = document.getElementById('profilePreview');
            const uploadArea = document.getElementById('uploadAreaContainer');
            const statusNikahSelect = document.getElementById('statusnikah');
            const dudaJandaDateGroup = document.getElementById('dudaJandaDateGroup');
            const dudaJandaDateField = document.getElementById('dudaJandaDate');


            // Function to update the profile image display based on whether an image is already uploaded
            function updateProfileImageDisplay() {
                // Check if profilePreview has a valid image loaded (not just the placeholder src)
                // The naturalWidth/Height check ensures the image has actually loaded
                const isImageLoaded = profilePreview.src && profilePreview.src !== window.location.href && !profilePreview.src.includes('placeholder.com');

                if (isImageLoaded) {
                    uploadArea.style.display = 'none'; // Hide the circular upload area
                    profilePreview.style.display = 'block'; // Show the image
                } else {
                    // If no valid image is loaded, show the upload area and hide the image
                    uploadArea.style.display = 'flex';
                    profilePreview.style.display = 'none';
                    // Ensure the placeholder image src is set correctly for initial load
                    profilePreview.src = "https://via.placeholder.com/80x80?text=?";
                }
            }


            // Main Card Header Toggle Logic
            if (mainCardHeader && dataPribadiCollapse && mainCollapseIcon) {
                dataPribadiCollapse.addEventListener('show.bs.collapse', function () {
                    mainCardHeader.classList.add('active');
                    mainCollapseIcon.classList.remove('collapsed');
                });

                dataPribadiCollapse.addEventListener('hide.bs.collapse', function () {
                    mainCardHeader.classList.remove('active');
                    mainCollapseIcon.classList.add('collapsed');
                });

                // Initial state for main card header
                if (dataPribadiCollapse.classList.contains('show')) {
                    mainCardHeader.classList.add('active');
                    mainCollapseIcon.classList.remove('collapsed');
                } else {
                    mainCardHeader.classList.remove('active');
                    mainCollapseIcon.classList.add('collapsed');
                }
            }

            // Logic for 'Status Pernikahan' conditional field
            if (statusNikahSelect) {
                statusNikahSelect.addEventListener('change', function() {
                    if (this.value === 'Widower/Widow') {
                        dudaJandaDateGroup.style.display = 'block';
                        dudaJandaDateField.setAttribute('required', 'required'); // Make it required when visible
                    } else {
                        dudaJandaDateGroup.style.display = 'none';
                        dudaJandaDateField.removeAttribute('required'); // Remove required when hidden
                        dudaJandaDateField.value = ''; // Clear value when hidden
                        dudaJandaDateField.classList.remove('is-invalid'); // Clear validation state
                        // Check if error message exists before trying to hide it
                        const errorMsg = dudaJandaDateField.parentElement.querySelector('.error-message');
                        if (errorMsg) {
                            errorMsg.style.display = 'none';
                        }
                    }
                });
                // Call on page load to set initial state in case form is pre-filled
                statusNikahSelect.dispatchEvent(new Event('change'));
            }
            
            // Initial call to set the correct display state for the profile image section
            updateProfileImageDisplay();

            // Set up event listeners for inner accordion headers
            document.querySelectorAll('.accordion-button').forEach(button => {
                const targetCollapseId = button.dataset.bsTarget;
                const targetCollapseElement = document.querySelector(targetCollapseId);

                if (targetCollapseElement) {
                    targetCollapseElement.addEventListener('show.bs.collapse', function () {
                        button.classList.remove('collapsed'); // Ensure icon points up
                        button.setAttribute('aria-expanded', 'true');
                    });

                    targetCollapseElement.addEventListener('hide.bs.collapse', function () {
                        button.classList.add('collapsed'); // Ensure icon points down
                        button.setAttribute('aria-expanded', 'false');
                    });
                }
            });
        });
    </script>
</body>
</html>