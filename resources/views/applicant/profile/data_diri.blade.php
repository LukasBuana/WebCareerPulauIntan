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
        /* Corrected the previous invalid CSS selector for .btn-primary */
        .btn.btn-primary.px-4 {
            /* This was an invalid selector in the previous code, targeting the class directly */
            /* It's already defined above by .btn-primary, so this specific block can be removed */
            /* Or, if you intended to override specific styles, define them correctly: */
            /* color: white; /* Example */
            /* background-color: #dc3545; /* Example (red) */
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
                                @csrf

                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <h6 class="text-muted mb-3">Informasi Utama</h6>
                                    </div>
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
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="noTelepon" class="form-label">
                                                No. Telepon <span class="required">*</span>
                                            </label>
                                            <input type="tel"
                                                   class="form-control is-invalid"
                                                   id="noTelepon"
                                                   name="no_telepon"
                                                   placeholder="Contoh: 628123924843"
                                                   required>
                                            <div class="error-message" style="display: block;">Silakan masukkan no. telp</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="tempatLahir" class="form-label">
                                                Tempat Lahir <span class="required">*</span>
                                            </label>
                                            <input type="text"
                                                   class="form-control is-invalid"
                                                   id="tempatLahir"
                                                   name="tempat_lahir"
                                                   placeholder="Masukkan Tempat lahir"
                                                   required>
                                            <div class="error-message" style="display: block;">Silakan masukkan tempat lahir</div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="tanggalLahir" class="form-label">
                                                Tanggal Lahir <span class="required">*</span>
                                            </label>
                                            <input type="date"
                                                   class="form-control is-invalid"
                                                   id="tanggalLahir"
                                                   name="tanggal_lahir"
                                                   required>
                                            <div class="error-message" style="display: block;">Silakan masukkan tanggal lahir</div>
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
                                            <div class="error-message">Golongan Darah harus diisi</div>
                                        </div>
                                    </div>
                                </div> <hr class="my-4"> <div class="row mb-4">
                                    <div class="col-md-12">
                                        <h6 class="text-muted mb-3">Informasi Alamat</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="alamatktp" class="form-label">
                                                Alamat KTP <span class="required">*</span>
                                            </label>
                                            <textarea class="form-control is-invalid"
                                                      id="alamatktp"
                                                      name="alamatktp"
                                                      rows="4"
                                                      placeholder="Masukkan Alamat sesuai dengan KTP"
                                                      required></textarea>
                                            <div class="error-message" style="display: block;">Silakan masukkan alamat</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamatnow" class="form-label">
                                                Alamat Sekarang <span class="required">*</span>
                                            </label>
                                            <textarea class="form-control is-invalid"
                                                      id="alamatnow"
                                                      name="alamatnow"
                                                      rows="4"
                                                      placeholder="Masukkan Alamat sesuai dengan tempat tinggal sekarang"
                                                      required></textarea>
                                            <div class="error-message" style="display: block;">Silakan masukkan alamat sekarang</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamatortu" class="form-label">
                                                Alamat Orangtua <span class="required">*</span>
                                            </label>
                                            <textarea class="form-control is-invalid"
                                                      id="alamatortu"
                                                      name="alamatortu"
                                                      rows="4"
                                                      placeholder="Masukkan Alamat orangtua"
                                                      required></textarea>
                                            <div class="error-message" style="display: block;">Silakan masukkan alamat orangtua</div>
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
                                            <div class="error-message">Silakan masukkan kode pos sesuai Alamat KTP</div>
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
                                            <div class="error-message">Silakan masukkan kode pos sesuai Alamat Sekarang</div>
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
                                            <div class="error-message">Silakan masukkan kode pos sesuai Alamat Orangtua</div>
                                        </div>
                                    </div>
                                </div> <hr class="my-4"> <div class="row mb-4">
                                    <div class="col-md-12">
                                        <h6 class="text-muted mb-3">Nomor Identitas</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="noKTP" class="form-label">
                                                No. KTP <span class="required">*</span>
                                            </label>
                                            <input type="text"
                                                   class="form-control is-invalid"
                                                   id="noKTP"
                                                   name="no_ktp"
                                                   placeholder="Masukkan No. KTP"
                                                   required>
                                            <div class="error-message" style="display: block;">Silakan masukkan no. KTP</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="noNPWP" class="form-label">
                                                No. NPWP <span class="required">*</span>
                                            </label>
                                            <input type="text"
                                                   class="form-control is-invalid"
                                                   id="noNPWP"
                                                   name="no_NPWP"
                                                   placeholder="Masukkan No. NPWP"
                                                   required>
                                            <div class="error-message" style="display: block;">Silakan masukkan no. NPWP</div>
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
                                            <div class="error-message">Silakan masukkan Nomor BPJS Kesehatan</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="noSIM" class="form-label">
                                                No. SIM <span class="required">*</span>
                                            </label>
                                            <input type="text"
                                                   class="form-control is-invalid"
                                                   id="noSIM"
                                                   name="no_SIM"
                                                   placeholder="Masukkan No. SIM"
                                                   required>
                                            <div class="error-message" style="display: block;">Silakan masukkan no. SIM</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exp_date_SIM" class="form-label">
                                                Tanggal Kadaluarsa SIM <span class="required">*</span>
                                            </label>
                                            <input type="date"
                                                   class="form-control is-invalid"
                                                   id="exp_date_SIM"
                                                   name="exp_date_SIM"
                                                   required>
                                            <div class="error-message" style="display: block;">Silakan masukkan tanggal kadaluarsa SIM</div>
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
                                            <div class="error-message">Silakan masukkan Nomor BPJS Ketenagakerjaan</div>
                                        </div>
                                    </div>
                                </div> <hr class="my-4"> <div class="row mb-4">
                                    <div class="col-md-12">
                                        <h6 class="text-muted mb-3">Detail Pribadi Lainnya</h6>
                                    </div>
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
                                            <div class="error-message">Silakan pilih jenis kelamin</div>
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
                                            <div class="error-message">Agama harus diisi</div>
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
                                            <div class="error-message">Silakan pilih Status Pernikahan</div>
                                        </div>

                                        <div class="mb-3" id="dudaJandaDateGroup" style="display: none;">
                                            <label for="dudaJandaDate" class="form-label">
                                                Dari Kapan Duda/Janda <span class="required">*</span>
                                            </label>
                                            <input type="date"
                                                   class="form-control"
                                                   id="dudaJandaDate"
                                                   name="duda_janda_date">
                                            <div class="error-message">Silakan masukkan tanggal duda/janda</div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <h6 class="text-muted mb-3">Sumber Informasi Lowongan</h6>
                                    </div>
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
                                            <div class="error-message">Lowongan harus diisi</div>
                                        </div>
                                

                                </div> 
                                        

                                <div class="row mt-4">
                                    <div class="col-md-12 text-end">
                                        <button type="submit" class="btn btn-primary px-4">
                                            <i class="fas fa-save me-2"></i>Simpan
                                        </button>
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
            const fileInfo = document.querySelector('.file-info');

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

        // Form validation
        document.getElementById('dataPribadiForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Reset error messages and invalid class
            document.querySelectorAll('.error-message').forEach(msg => {
                msg.style.display = 'none';
            });
            document.querySelectorAll('.form-control').forEach(input => {
                input.classList.remove('is-invalid');
            });

            let isValid = true;

            // Validate required fields
            const requiredFields = {
                'namaLengkap': 'Silakan masukkan Nama Lengkap Anda',
                'alamatEmail': 'Silakan masukkan Alamat Email Anda',
                'noKTP': 'Silakan masukkan no. KTP',
                'noBPJSsehat': 'Silakan masukkan Nomor BPJS Kesehatan',
                'noBPJSkerja': 'Silakan masukkan Nomor BPJS Ketenagakerjaan',
                'noTelepon': 'Silakan masukkan no. telp',
                'alamatktp': 'Silakan masukkan alamat',
                'alamatortu': 'Silakan masukkan alamat orangtua',
                'alamatnow': 'Silakan masukkan alamat sekarang',
                'kodePosKTP': 'Silakan masukkan kode pos sesuai Alamat KTP', // Updated ID
                'kodePos_now': 'Silakan masukkan kode pos sesuai Alamat Sekarang', // Updated ID
                'kodePos_ortu': 'Silakan masukkan kode pos sesuai Alamat Orangtua', // Updated ID
                'tempatLahir': 'Silakan masukkan tempat lahir',
                'tanggalLahir': 'Silakan masukkan tanggal lahir',
                'jenisKelamin': 'Silakan pilih jenis kelamin',
                'goldar': 'Golongan Darah harus diisi', // Added validation for new field
                'agama': 'Agama harus diisi',
                'statusnikah': 'Silakan pilih Status Pernikahan'
            };

            for (const fieldId in requiredFields) {
                const field = document.getElementById(fieldId);
                // For select elements, ensure value is not empty or default option's value
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

            // Specific validation for 'Dari Kapan Duda/Janda' if visible
            const statusNikahField = document.getElementById('statusnikah');
            const dudaJandaDateField = document.getElementById('dudaJandaDate');

            if (statusNikahField.value === 'Widower/Widow') {
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


            // Validate email format
            const emailField = document.getElementById('alamatEmail');
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

            // Validate phone number format (for BPJS Kesehatan, BPJS Ketenagakerjaan, and No. Telepon)
            const phoneFields = ['noBPJSsehat', 'noBPJSkerja', 'noTelepon'];
            const phoneRegex = /^[0-9]{10,15}$/; // Assuming 10 to 15 digits for phone numbers

            phoneFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
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

            // Validate Kode Pos format (assuming 5 digits) for all kode pos fields
            const kodePosFields = ['kodePosKTP', 'kodePos_now', 'kodePos_ortu'];
            const kodePosRegex = /^[0-9]{5}$/;
            kodePosFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
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


            if (isValid) {
                alert('Data berhasil disimpan!');
                // this.submit(); // Uncomment untuk submit form
            }
        });

        // === Logika untuk mengubah warna header berdasarkan status collapse dan toggle icon ===
        document.addEventListener('DOMContentLoaded', function() {
            const cardHeader = document.querySelector('.card-header');
            const collapseIcon = cardHeader.querySelector('.collapse-icon');
            const dataPribadiCollapse = document.getElementById('dataPribadiCollapse');
            const profilePreview = document.getElementById('profilePreview');
            const uploadArea = document.getElementById('uploadAreaContainer');
            const statusNikahSelect = document.getElementById('statusnikah');
            const dudaJandaDateGroup = document.getElementById('dudaJandaDateGroup');
            const dudaJandaDateField = document.getElementById('dudaJandaDate');


            // Function to update the profile image display based on whether an image is already uploaded
            function updateProfileImageDisplay() {
                const isImageLoaded = profilePreview.naturalWidth > 0 && profilePreview.naturalHeight > 0;

                if (profilePreview.src && profilePreview.src !== window.location.href && !profilePreview.src.includes('placeholder.com') && isImageLoaded) {
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


            if (cardHeader && dataPribadiCollapse && collapseIcon) {
                // Event listener saat collapse ditampilkan
                dataPribadiCollapse.addEventListener('show.bs.collapse', function () {
                    cardHeader.classList.add('active'); // Tambahkan kelas 'active' (warna merah)
                    collapseIcon.classList.remove('collapsed'); // Pastikan icon menghadap ke atas
                });

                // Event listener saat collapse disembunyikan
                dataPribadiCollapse.addEventListener('hide.bs.collapse', function () {
                    cardHeader.classList.remove('active'); // Hapus kelas 'active' (kembali ke warna default)
                    collapseIcon.classList.add('collapsed'); // Pastikan icon menghadap ke bawah
                });

                // Inisialisasi status warna dan icon saat halaman dimuat
                if (dataPribadiCollapse.classList.contains('show')) {
                    cardHeader.classList.add('active');
                    collapseIcon.classList.remove('collapsed'); // Icon menghadap ke atas
                } else {
                    cardHeader.classList.remove('active');
                    collapseIcon.classList.add('collapsed'); // Icon menghadap ke bawah
                }
            }

            // Initial call to set the correct display state for the profile image section
            updateProfileImageDisplay();

            // Logic for 'Status Pernikahan' conditional field
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
        });
    </script>
</body>
</html>