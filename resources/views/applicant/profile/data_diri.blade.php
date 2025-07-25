<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pribadi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        /* Card Styles */
        .card {
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #fbf5f5;
            color: #000000;
            border-bottom: none;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            padding: 1rem 1.25rem;
        }

        .card-header.active {
            background-color: #DA251C;
            color: white;
        }

        .collapse-icon {
            transition: transform 0.3s ease;
        }

        .card-header.collapsed .collapse-icon {
            transform: rotate(180deg);
        }

        .form-control:focus,
        .form-select:focus,
        textarea:focus {
            border-color: #DA251C;
            box-shadow: 0 0 0 0.2rem rgba(218, 37, 28, 0.25);
        }

        .btn-primary {
            background-color: #DA251C;
            border-color: #DA251C;
        }

        .btn-primary:hover {
            background-color: #B11E18;
            border-color: #B11E18;
        }

        /* Upload Area Styles */
        .upload-area {
            border: 2px dashed #dee2e6;
            border-radius: 50%;
            padding: 20px;
            text-align: center;
            background-color: #f8f9fa;
            cursor: pointer;
            transition: border-color 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            /* Agar memenuhi image-display-container */
            height: 100%;
            /* Agar memenuhi image-display-container */
            position: absolute;
            /* Posisikan di dalam container */
            top: 0;
            left: 0;
        }


        .upload-area:hover {
            border-color: #DA251C;
        }

        .upload-area i {
            font-size: 2rem;
            color: #6c757d;
            margin-bottom: 5px;
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
            display: none;
        }

        /* Profile Image Styles */
        .profile-image {
            width: 100%;
            /* Agar memenuhi image-display-container */
            height: 100%;
            /* Agar memenuhi image-display-container */
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #dee2e6;
            position: absolute;
            /* Posisikan di dalam container */
            top: 0;
            left: 0;
        }


        .image-display-container {
            width: 80px;
            /* Lebar fixed */
            height: 80px;
            /* Tinggi fixed */
            position: relative;
            flex-shrink: 0;
            /* Menambahkan margin-bottom untuk jarak dari elemen di bawahnya saat flex-column */
            margin-bottom: 1rem;
            /* Sesuaikan sesuai kebutuhan, contoh: 1rem = 16px */
        }

        /* File Information Text */
        .file-info {
            font-size: 0.8rem;
            color: #6c757d;
            margin-top: 5px;
        }

        /* Style for inputs with errors (red border) */
        .form-control.is-invalid,
        .form-select.is-invalid,
        textarea.is-invalid {
            border-color: #dc3545;
        }

        /* Dynamic input group styles - These styles are for dynamic lists, which are mostly removed */
        .dynamic-input-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
        }

        .dynamic-input-group input,
        .dynamic-input-group select,
        .dynamic-input-group textarea {
            flex-grow: 1;
        }

        .dynamic-input-group .btn-remove {
            flex-shrink: 0;
            padding: 6px 10px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: none;
        }

        .dynamic-input-group .btn-remove:hover {
            background-color: #c82333;
        }

        .btn-info {
            background-color: #17a2b8;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-info:hover {
            background-color: #138496;
        }

        h3 {
            margin-top: 30px;
            margin-bottom: 20px;
            color: #DA251C;
            font-size: 1.5rem;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center active"
                        data-bs-toggle="collapse" data-bs-target="#dataPribadiCollapse" aria-expanded="true"
                        style="cursor: pointer;"id="mainCardHeaderToggle">
                        <h5 class="mb-0">
                            <i class="fas fa-user me-2"></i>Data Pribadi<span class="required" id="personalDataRequiredAsterisk">*</span>
                        </h5>
                        <i class="fas fa-chevron-up collapse-icon"></i>
                    </div>

                    <div class="collapse show" id="dataPribadiCollapse">
                        <div class="card-body">
                            {{-- Form action dan method dinamis --}}
                            <form id="biodataForm">
                                @csrf
                                @if ($applicant->exists)
                                    @method('PUT')
                                @endif

                                {{-- Pesan sukses/error dari session --}}
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                {{-- --- I. DATA DIRI KANDIDAT KARYAWAN (PERSONAL DATA) --- --}}

                               <div class="accordion" id="accordionInformasiUtama">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingInformasiUtama">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseInformasiUtama" aria-expanded="true"
                aria-controls="collapseInformasiUtama">
                Informasi Utama
            </button>
        </h2>
        <div id="collapseInformasiUtama" class="accordion-collapse collapse show"
            aria-labelledby="headingInformasiUtama"
            data-bs-parent="#accordionInformasiUtama">
            <div class="accordion-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        {{-- Updated Profile Image HTML Block --}}
                        <div class="mb-3 d-flex align-items-start flex-column flex-md-row">
                            <div class="image-display-container me-3 mb-3 mb-md-0">
                                <div class="upload-area" id="uploadAreaContainer"
                                    onclick="document.getElementById('profileImage').click();"
                                    style="display: none;">
                                    <i class="fas fa-upload"></i>
                                    <div class="text-overlay">Unggah Foto</div>
                                </div>
                                <img id="profilePreview" src=""
                                    alt="Foto Profil" class="profile-image"
                                    onclick="document.getElementById('profileImage').click();"
                                    data-original-src="{{ old('profile_image', $applicant->profile_image ?? '') }}"
                                    style="display: none;">
                            </div>
                            <div class="flex-grow-1">
                                <label for="profileImage" class="form-label">Foto Profil
                                    <span class="required">*</span></label>
                                <div class="file-info" id="profileFileInfo">
                                    Syarat: format jpg / png / jpeg maks. 2 MB<br>
                                    Belum ada foto profil.
                                </div>
                                <div class="error-message"></div>
                                <input type="file" class="form-control d-none"
                                    id="profileImage" name="profile_image"
                                    accept="image/jpeg, image/png, image/jpg"
                                    onchange="previewImage(this)">
                                <input type="hidden" name="profile_image_cleared"
                                    id="profile_image_cleared_flag" value="0">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="full_name" class="form-label">
                                Nama Lengkap <span class="required">*</span>
                            </label>
                            <input type="text" class="form-control" id="full_name"
                                name="full_name"
                                value="{{ old('full_name', $applicant->full_name) }}"
                                required>
                            <div class="error-message"></div>
                        </div>
                        <div class="mb-3">
                            <label for="email_address" class="form-label">
                                Alamat Email <span class="required">*</span>
                            </label>
                            <input type="email" class="form-control"
                                id="email_address" name="email_address"
                                value="{{ old('email_address', $applicant->email_address) }}"
                                required readonly>
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="mobile_phone_number" class="form-label">
                                No. Telepon <span class="required">*</span>
                            </label>
                            <input type="tel" class="form-control"
                                id="mobile_phone_number" name="mobile_phone_number"
                                value="{{ old('mobile_phone_number', $applicant->mobile_phone_number) }}"
                                placeholder="Contoh: 628123924843" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="mb-3">
                            <label for="place_of_birth" class="form-label">
                                Tempat Lahir <span class="required">*</span>
                            </label>
                            <input type="text" class="form-control"
                                id="place_of_birth" name="place_of_birth"
                                value="{{ old('place_of_birth', $applicant->place_of_birth) }}"
                                placeholder="Masukkan Tempat lahir" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label">
                                Tanggal Lahir <span class="required">*</span>
                            </label>
                            <input type="date" class="form-control"
                                id="date_of_birth" name="date_of_birth"
                                value="{{ old('date_of_birth', $applicant->date_of_birth ? $applicant->date_of_birth->format('Y-m-d') : '') }}"
                                required>
                            <div class="error-message"></div>
                        </div>
                        <div class="mb-3">
                            <label for="blood_type" class="form-label">
                                Golongan Darah <span class="required">*</span>
                            </label>
                            <select class="form-select" id="blood_type"
                                name="blood_type" required>
                                <option value="">Pilih Golongan Darah</option>
                                <option value="O"
                                    {{ old('blood_type', $applicant->blood_type) == 'O' ? 'selected' : '' }}>
                                    O</option>
                                <option value="A"
                                    {{ old('blood_type', $applicant->blood_type) == 'A' ? 'selected' : '' }}>
                                    A</option>
                                <option value="B"
                                    {{ old('blood_type', $applicant->blood_type) == 'B' ? 'selected' : '' }}>
                                    B</option>
                                <option value="AB"
                                    {{ old('blood_type', $applicant->blood_type) == 'AB' ? 'selected' : '' }}>
                                    AB</option>
                            </select>
                            <div class="error-message"></div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12 text-end">
                        <button type="button"
                            class="btn btn-primary px-4 save-section-btn"
                            data-section="informasiUtama">
                            <i class="fas fa-save me-2"></i>Simpan Informasi Utama
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                                {{-- SECTION 2: INFORMASI ALAMAT --}}
                                <div class="accordion mt-3" id="accordionInformasiAlamat">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingInformasiAlamat">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseInformasiAlamat"
                                                aria-expanded="false" aria-controls="collapseInformasiAlamat">
                                                Informasi Alamat
                                            </button>
                                        </h2>
                                        <div id="collapseInformasiAlamat" class="accordion-collapse collapse"
                                            aria-labelledby="headingInformasiAlamat"
                                            data-bs-parent="#accordionInformasiAlamat">
                                            <div class="accordion-body">
                                                <div class="row mb-4">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="permanent_address_ktp" class="form-label">
                                                                Alamat KTP <span class="required">*</span>
                                                            </label>
                                                            <textarea class="form-control" id="permanent_address_ktp" name="permanent_address_ktp" rows="4"
                                                                placeholder="Masukkan Alamat sesuai dengan KTP" required>{{ old('permanent_address_ktp', $applicant->permanent_address_ktp) }}</textarea>
                                                            <div class="error-message"></div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="current_address" class="form-label">
                                                                Alamat Sekarang <span class="required">*</span>
                                                            </label>
                                                            <textarea class="form-control" id="current_address" name="current_address" rows="4"
                                                                placeholder="Masukkan Alamat sesuai dengan tempat tinggal sekarang" required>{{ old('current_address', $applicant->current_address) }}</textarea>
                                                            <div class="error-message"></div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="parents_address" class="form-label">
                                                                Alamat Orangtua <span class="required">*</span>
                                                            </label>
                                                            <textarea class="form-control" id="parents_address" name="parents_address" rows="4"
                                                                placeholder="Masukkan Alamat orangtua" required>{{ old('parents_address', $applicant->parents_address) }}</textarea>
                                                            <div class="error-message"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="permanent_postal_code_ktp" class="form-label">
                                                                Kode Pos sesuai Alamat KTP <span
                                                                    class="required">*</span>
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                id="permanent_postal_code_ktp"
                                                                name="permanent_postal_code_ktp"
                                                                value="{{ old('permanent_postal_code_ktp', $applicant->permanent_postal_code_ktp) }}"
                                                                placeholder="Masukkan Kode Pos sesuai Alamat KTP"
                                                                required>
                                                            <div class="error-message"></div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="current_postal_code" class="form-label">
                                                                Kode Pos Alamat Sekarang<span class="required">*</span>
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                id="current_postal_code" name="current_postal_code"
                                                                value="{{ old('current_postal_code', $applicant->current_postal_code) }}"
                                                                placeholder="Masukkan Kode Pos sesuai Alamat Sekarang"
                                                                required>
                                                            <div class="error-message"></div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="parents_postal_code" class="form-label">
                                                                Kode Pos sesuai Alamat Orangtua <span
                                                                    class="required">*</span>
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                id="parents_postal_code" name="parents_postal_code"
                                                                value="{{ old('parents_postal_code', $applicant->parents_postal_code) }}"
                                                                placeholder="Masukkan Kode Pos sesuai Alamat Orangtua"
                                                                required>
                                                            <div class="error-message"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-md-12 text-end">
                                                        <button type="button"
                                                            class="btn btn-primary px-4 save-section-btn"
                                                            data-section="informasiAlamat">
                                                            <i class="fas fa-save me-2"></i>Simpan Informasi Alamat
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- SECTION 3: NOMOR IDENTITAS --}}
                                <div class="accordion mt-3" id="accordionNomorIdentitas">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingNomorIdentitas">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseNomorIdentitas"
                                                aria-expanded="false" aria-controls="collapseNomorIdentitas">
                                                Nomor Identitas
                                            </button>
                                        </h2>
                                        <div id="collapseNomorIdentitas" class="accordion-collapse collapse"
                                            aria-labelledby="headingNomorIdentitas"
                                            data-bs-parent="#accordionNomorIdentitas">
                                            <div class="accordion-body">
                                                <div class="row mb-4">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="id_passport_number" class="form-label">
                                                                No. KTP/Passport <span class="required">*</span>
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                id="id_passport_number" name="id_passport_number"
                                                                value="{{ old('id_passport_number', $applicant->id_passport_number) }}"
                                                                placeholder="Masukkan No. KTP/Passport" required>
                                                            <div class="error-message"></div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="npwp_number" class="form-label">
                                                                No. NPWP <span class="required">*</span>
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                id="npwp_number" name="npwp_number"
                                                                value="{{ old('npwp_number', $applicant->npwp_number) }}"
                                                                placeholder="Masukkan No. NPWP" required>
                                                            <div class="error-message"></div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="bpjs_health_number" class="form-label">
                                                                No. BPJS Kesehatan <span class="required">*</span>
                                                            </label>
                                                            <input type="tel" class="form-control"
                                                                id="bpjs_health_number" name="bpjs_health_number"
                                                                value="{{ old('bpjs_health_number', $applicant->bpjs_health_number) }}"
                                                                placeholder="Masukkan No. BPJS Kesehatan" required>
                                                            <div class="error-message"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="license_number" class="form-label">
                                                                No. SIM <span class="required">*</span>
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                id="license_number" name="license_number"
                                                                value="{{ old('license_number', $applicant->license_number) }}"
                                                                placeholder="Masukkan No. SIM" required>
                                                            <div class="error-message"></div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="license_expiry_date" class="form-label">
                                                                Tanggal Kadaluarsa SIM <span class="required">*</span>
                                                            </label>
                                                            <input type="date" class="form-control"
                                                                id="license_expiry_date" name="license_expiry_date"
                                                                value="{{ old('license_expiry_date', $applicant->license_expiry_date ? $applicant->license_expiry_date->format('Y-m-d') : '') }}"
                                                                required>
                                                            <div class="error-message"></div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="bpjs_employment_number" class="form-label">
                                                                No. BPJS Ketenagakerjaan <span
                                                                    class="required">*</span>
                                                            </label>
                                                            <input type="tel" class="form-control"
                                                                id="bpjs_employment_number"
                                                                name="bpjs_employment_number"
                                                                value="{{ old('bpjs_employment_number', $applicant->bpjs_employment_number) }}"
                                                                placeholder="Masukkan No. BPJS Ketenagakerjaan"
                                                                required>
                                                            <div class="error-message"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-md-12 text-end">
                                                        <button type="button"
                                                            class="btn btn-primary px-4 save-section-btn"
                                                            data-section="nomorIdentitas">
                                                            <i class="fas fa-save me-2"></i>Simpan Nomor Identitas
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- SECTION 4: DETAIL PRIBADI LAINNYA --}}
                                <div class="accordion mt-3" id="accordionDetailPribadiLainnya">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingDetailPribadiLainnya">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseDetailPribadiLainnya" aria-expanded="false"
                                                aria-controls="collapseDetailPribadiLainnya">
                                                Detail Pribadi Lainnya
                                            </button>
                                        </h2>
                                        <div id="collapseDetailPribadiLainnya" class="accordion-collapse collapse"
                                            aria-labelledby="headingDetailPribadiLainnya"
                                            data-bs-parent="#accordionDetailPribadiLainnya">
                                            <div class="accordion-body">
                                                <div class="row mb-4">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="gender_select" class="form-label">
                                                                Jenis Kelamin <span class="required">*</span>
                                                            </label>
                                                            <select class="form-select" id="gender_select"
                                                                name="gender" required>
                                                                <option value="">Pilih Jenis Kelamin</option>
                                                                <option value="L"
                                                                    {{ old('gender', $applicant->gender) == 'L' ? 'selected' : '' }}>
                                                                    Laki-laki</option>
                                                                <option value="P"
                                                                    {{ old('gender', $applicant->gender) == 'P' ? 'selected' : '' }}>
                                                                    Perempuan</option>
                                                            </select>
                                                            <div class="error-message"></div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="religion_select" class="form-label">
                                                                Agama <span class="required">*</span>
                                                            </label>
                                                            <select class="form-select" id="religion_select"
                                                                name="religion" required>
                                                                <option value="">Pilih Agama</option>
                                                                @foreach (['Islam', 'Protestan', 'Katolik', 'Konghucu', 'Hindu', 'Buddha'] as $religionOpt)
                                                                    <option value="{{ $religionOpt }}"
                                                                        {{ old('religion', $applicant->religion) == $religionOpt ? 'selected' : '' }}>
                                                                        {{ $religionOpt }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="error-message"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="marital_status" class="form-label">
                                                                Status Pernikahan <span class="required">*</span>
                                                            </label>
                                                            <select class="form-select" id="marital_status"
                                                                name="marital_status" required>
                                                                <option value="">Pilih Status Pernikahan</option>
                                                                <option value="Belum menikah"
                                                                    {{ old('marital_status', $applicant->marital_status) == 'Belum menikah' ? 'selected' : '' }}>
                                                                    Belum Menikah</option>
                                                                <option value="Menikah"
                                                                    {{ old('marital_status', $applicant->marital_status) == 'Menikah' ? 'selected' : '' }}>
                                                                    Menikah</option>
                                                                <option value="Janda-Duda"
                                                                    {{ old('marital_status', $applicant->marital_status) == 'Janda-Duda' ? 'selected' : '' }}>
                                                                    Janda-Duda</option>
                                                            </select>
                                                            <div class="error-message"></div>
                                                        </div>

                                                        {{-- Pastikan div ini ada dan ID-nya benar --}}
                                                        <div class="mb-3" id="marriedDateGroup"
                                                            style="display: {{ old('marital_status', $applicant->marital_status) == 'Menikah' ? 'block' : 'none' }};">
                                                            <label for="married_since_date" class="form-label">
                                                                Menikah Sejak Tanggal <span class="required">*</span>
                                                            </label>
                                                            <input type="date" class="form-control"
                                                                id="married_since_date" name="married_since_date"
                                                                value="{{ old('married_since_date', $applicant->married_since_date ? $applicant->married_since_date->format('Y-m-d') : '') }}"
                                                                {{ old('marital_status', $applicant->marital_status) == 'Menikah' ? 'required' : '' }}>
                                                            <div class="error-message"></div>
                                                        </div>

                                                        {{-- Dan div ini juga --}}
                                                        <div class="mb-3" id="widowedDateGroup"
                                                            style="display: {{ old('marital_status', $applicant->marital_status) == 'Janda-Duda' ? 'block' : 'none' }};">
                                                            <label for="widowed_since_date" class="form-label">
                                                                Duda/Janda Sejak Tanggal <span
                                                                    class="required">*</span>
                                                            </label>
                                                            <input type="date" class="form-control"
                                                                id="widowed_since_date" name="widowed_since_date"
                                                                value="{{ old('widowed_since_date', $applicant->widowed_since_date ? $applicant->widowed_since_date->format('Y-m-d') : '') }}"
                                                                {{ old('marital_status', $applicant->marital_status) == 'Janda-Duda' ? 'required' : '' }}>
                                                            <div class="error-message"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-md-12 text-end">
                                                        <button type="button"
                                                            class="btn btn-primary px-4 save-section-btn"
                                                            data-section="detailPribadiLainnya">
                                                            <i class="fas fa-save me-2"></i>Simpan Detail Pribadi
                                                            Lainnya
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- SECTION 5: SUMBER INFORMASI LOWONGAN --}}
                                <div class="accordion mt-3" id="accordionSumberLowongan">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingSumberLowongan">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseSumberLowongan"
                                                aria-expanded="false" aria-controls="collapseSumberLowongan">
                                                Sumber Informasi Lowongan
                                            </button>
                                        </h2>
                                        <div id="collapseSumberLowongan" class="accordion-collapse collapse"
                                            aria-labelledby="headingSumberLowongan"
                                            data-bs-parent="#accordionSumberLowongan">
                                            <div class="accordion-body">
                                                <div class="row mb-4">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="job_vacancy_source" class="form-label">
                                                                Sumber Informasi <span class="required">*</span>
                                                            </label>
                                                            <select class="form-select" id="job_vacancy_source"
                                                                name="job_vacancy_source" required>
                                                                <option value="">Pilih Sumber Lowongan</option>
                                                                <option value="Youtube"
                                                                    {{ old('job_vacancy_source', $applicant->job_vacancy_source) == 'Youtube' ? 'selected' : '' }}>
                                                                    Youtube</option>
                                                                <option value="Twitter/X"
                                                                    {{ old('job_vacancy_source', $applicant->job_vacancy_source) == 'Twitter/X' ? 'selected' : '' }}>
                                                                    Twitter/X</option>
                                                                <option value="LinkedIn"
                                                                    {{ old('job_vacancy_source', $applicant->job_vacancy_source) == 'LinkedIn' ? 'selected' : '' }}>
                                                                    LinkedIn</option>
                                                                <option value="Facebook"
                                                                    {{ old('job_vacancy_source', $applicant->job_vacancy_source) == 'Facebook' ? 'selected' : '' }}>
                                                                    Facebook</option>
                                                                <option value="Lainnya"
                                                                    {{ old('job_vacancy_source', $applicant->job_vacancy_source) == 'Lainnya' ? 'selected' : '' }}>
                                                                    Lainnya</option>
                                                            </select>
                                                            <div class="error-message"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-md-12 text-end">
                                                        <button type="button"
                                                            class="btn btn-primary px-4 save-section-btn"
                                                            data-section="sumberLowongan">
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
        // Fungsi untuk mengelola pratinjau gambar profil
        function previewImage(input) {
            const profilePreview = document.getElementById('profilePreview');
            const uploadAreaContainer = document.getElementById('uploadAreaContainer');
            const fileInfo = document.querySelector('#accordionInformasiUtama .file-info');
            const clearProfileImageFlag = document.getElementById('profile_image_cleared_flag');
            const clearProfileImageButton = document.getElementById('clearProfileImageButton'); // Get the clear button

            if (input.files && input.files[0]) {
                // A new file is selected, show its preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    profilePreview.src = e.target.result; // Data URL for preview
                    profilePreview.style.display = 'block';
                    uploadAreaContainer.style.display = 'none';

                    const fileName = input.files[0].name;
                    const fileSize = (input.files[0].size / 1024 / 1024).toFixed(2); // MB
                    fileInfo.innerHTML = `
                Syarat: format jpg / png / jpeg maks. 2 MB<br>
                File: <strong>${fileName}</strong> (Ukuran: ${fileSize} MB)
            `;
                    // If a new image is selected, ensure the 'cleared' flag is reset to 0
                    if (clearProfileImageFlag) {
                        clearProfileImageFlag.value = '0';
                    }
                    // Show clear button when a new file is loaded
                    if (clearProfileImageButton) {
                        clearProfileImageButton.style.display = 'block';
                    }
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                // No new file selected. Check if there's an existing image path to display.
                // Use the data-original-src for initial display or fallback when input is cleared.
                const existingProfileImagePath = profilePreview.dataset.originalSrc;

                if (existingProfileImagePath) {
                    // Display the existing image from its URL
                    profilePreview.src = "{{ Storage::url('') }}" + existingProfileImagePath;
                    profilePreview.style.display = 'block';
                    uploadAreaContainer.style.display = 'none';

                    const oldFileName = existingProfileImagePath.substring(existingProfileImagePath.lastIndexOf('/') + 1);
                    fileInfo.innerHTML = `
                Syarat: format jpg / png / jpeg maks. 2 MB<br>
                File: <strong>${oldFileName}</strong> (Ukuran: N/A - existing file)
            `;
                    // Show clear button if an existing image is present
                    if (clearProfileImageButton) {
                        clearProfileImageButton.style.display = 'block';
                    }
                } else {
                    // No new file, and no existing file in DB or explicitly cleared
                    profilePreview.src = "https://via.placeholder.com/80x80?text=?"; // Placeholder image
                    profilePreview.style.display = 'block'; // Keep placeholder visible
                    uploadAreaContainer.style.display = 'flex'; // Show upload area

                    fileInfo.innerHTML = `
                Syarat: format jpg / png / jpeg maks. 2 MB<br>
                Belum ada foto profil.
            `;
                    // Hide clear button if no image
                    if (clearProfileImageButton) {
                        clearProfileImageButton.style.display = 'none';
                    }
                }
            }
        }

        // Call on page load to set the initial state of the profile image display
        // Call on page load to set the initial state of the profile image display
        function updateProfileImageDisplay() {
            const profilePreview = document.getElementById('profilePreview');
            const uploadAreaContainer = document.getElementById('uploadAreaContainer');
            const fileInfo = document.querySelector(
                '#accordionInformasiUtama .file-info'); // Atau gunakan ID yang Anda tambahkan sebelumnya
            const clearProfileImageButton = document.getElementById('clearProfileImageButton');

            // Ambil path gambar dari data-original-src, yang diisi Blade saat page load
            const initialProfileImagePath = profilePreview.dataset.originalSrc;

            if (initialProfileImagePath) {
                // Jika ada gambar lama yang tersimpan (path tidak kosong)
                profilePreview.src = "{{ Storage::url('') }}" + initialProfileImagePath; // Buat URL public
                profilePreview.style.display = 'block'; // Tampilkan gambar preview
                uploadAreaContainer.style.display = 'none'; // Sembunyikan area upload

                const oldFileName = initialProfileImagePath.substring(initialProfileImagePath.lastIndexOf('/') + 1);
                fileInfo.innerHTML = `
            Syarat: format jpg / png / jpeg maks. 2 MB<br>
            File saat ini: <strong>${oldFileName}</strong>
        `;
                if (clearProfileImageButton) {
                    clearProfileImageButton.style.display = 'block'; // Tampilkan tombol hapus
                }
            } else {
                // Jika tidak ada gambar lama (initialProfileImagePath kosong)
                // Maka kita hanya menampilkan area upload dan placeholder
                profilePreview.src = ""; // Pastikan src gambar kosong agar tidak ada icon gambar rusak
                profilePreview.style.display = 'none'; // Sembunyikan elemen <img> preview
                uploadAreaContainer.style.display = 'flex'; // Tampilkan area upload

                fileInfo.innerHTML = `
            Syarat: format jpg / png / jpeg maks. 2 MB<br>
            Belum ada foto profil.
        `;
                if (clearProfileImageButton) {
                    clearProfileImageButton.style.display = 'none'; // Sembunyikan tombol hapus
                }
            }
        }


        // Fungsi untuk validasi satu field (menambah/menghapus kelas is-invalid)
        function validateField(inputElement) {
            let isValid = true;
            const errorMessageElement = inputElement.parentElement.querySelector('.error-message');

            if (inputElement.hasAttribute('required')) {
                if (inputElement.type === 'checkbox' || inputElement.type === 'radio') {
                    const radioGroupName = inputElement.name;
                    isValid = document.querySelector(`input[name="${radioGroupName}"]:checked`) !== null;
                } else if (inputElement.tagName === 'SELECT') {
                    isValid = inputElement.value.trim() !== '';
                } else {
                    isValid = inputElement.value.trim() !== '';
                }

            }

            if (!isValid) {
                inputElement.classList.add('is-invalid');
                if (errorMessageElement) {
                    errorMessageElement.textContent = inputElement.validationMessage || 'Field ini wajib diisi.';
                    errorMessageElement.style.display = 'block';
                    console.log(
                        `Error for ${inputElement.id || inputElement.name}: ${errorMessageElement.textContent}`
                    ); // Log the error message
                }
            } else {
                inputElement.classList.remove('is-invalid');
                if (errorMessageElement) {
                    errorMessageElement.style.display = 'none';
                }
            }
            return isValid;
        }

        // Fungsi untuk validasi semua input dalam accordion body spesifik
        function validateSectionInputs(sectionElement) {
            let allSectionValid = true;
            // Pilih semua input yang required di dalam sectionElement ini
            const inputs = sectionElement.querySelectorAll('input[required], select[required], textarea[required]');

            inputs.forEach(input => {
                if (!validateField(input)) {
                    allSectionValid = false;
                }
            });
            return allSectionValid;
        }

        // Fungsi untuk validasi semua input yang dibutuhkan di seluruh form (dipanggil saat submit final)
        function validateAllRequiredInputs() {
            let allFormValid = true;
            const form = document.getElementById('biodataForm');
            const requiredFormInputs = form.querySelectorAll('input[required], select[required], textarea[required]');

            requiredFormInputs.forEach(input => {
                if (!validateField(input)) {
                    allFormValid = false;
                }
            });
            // Tambahan validasi untuk radio groups yang mungkin tidak terdeteksi oleh input[required]
            const radioGroups = [
                'gender', 'applied_before', 'applying_other_company', 'under_contract', 'has_part_time_job',
                'object_previous_employer_contact', 'has_acquaintance_in_company', 'undergone_psych_exam',
                'involved_police_case', 'willing_to_be_located_as_needed', 'accept_company_salary_standard',
                'comply_company_rules', 'willing_to_take_psych_exam', 'willing_to_take_medical_checkup',
                'willing_to_work_out_of_town', 'willing_to_transfer', 'willing_to_be_demoted',
                'declaration_agreement', 'has_medical_condition', 'resigned_due_to_health',
                'failed_pre_employment_exam', 'undergoing_treatment_or_surgery', 'under_medical_supervision',
                'on_regular_medication', 'has_allergies', 'absent_due_to_health_12_months', 'had_accident',
                'is_pregnant'
            ];
            radioGroups.forEach(groupName => {
                const radioElements = form.querySelectorAll(`input[name="${groupName}"]`);
                if (radioElements.length > 0 && !form.querySelector(`input[name="${groupName}"]:checked`)) {
                    // Find the parent div of the radio group (e.g., .form-group or similar)
                    const parentDiv = radioElements[0].closest('.mb-3');
                    const errorDiv = parentDiv ? parentDiv.querySelector('.error-message') : null;

                    if (errorDiv) {
                        errorDiv.textContent = 'Field ini wajib dipilih.';
                        errorDiv.style.display = 'block';
                    }
                    radioElements.forEach(radio => radio.classList.add('is-invalid')); // Mark all radios in group
                    allFormValid = false;
                } else if (radioElements.length > 0) {
                    radioElements.forEach(radio => radio.classList.remove('is-invalid')); // Clear if valid
                    const parentDiv = radioElements[0].closest('.mb-3');
                    const errorDiv = parentDiv ? parentDiv.querySelector('.error-message') : null;
                    if (errorDiv) {
                        errorDiv.style.display = 'none';
                    }
                }
            });

            // Validasi khusus untuk tanggal terkait status pernikahan
            const maritalStatusSelect = document.getElementById('marital_status');
            if (maritalStatusSelect) {
                console.log('Marital Status Select element found during full validation.');

                if (maritalStatusSelect.value === 'Menikah') {
                    const marriedSinceDate = document.getElementById('married_since_date');
                    if (marriedSinceDate && marriedSinceDate.hasAttribute('required') && marriedSinceDate.value.trim() ===
                        '') {
                        marriedSinceDate.classList.add('is-invalid');
                        const errorMsg = marriedSinceDate.parentElement.querySelector('.error-message');
                        if (errorMsg) {
                            errorMsg.textContent = 'Tanggal ini wajib diisi.';
                            errorMsg.style.display = 'block';
                        }
                        allFormValid = false;
                    } else if (marriedSinceDate) {
                        marriedSinceDate.classList.remove('is-invalid');
                        const errorMsg = marriedSinceDate.parentElement.querySelector('.error-message');
                        if (errorMsg) errorMsg.style.display = 'none';
                    }
                } else if (maritalStatusSelect.value === 'Janda-Duda') {
                    const widowedSinceDate = document.getElementById('widowed_since_date');
                    if (widowedSinceDate && widowedSinceDate.hasAttribute('required') && widowedSinceDate.value.trim() ===
                        '') {
                        widowedSinceDate.classList.add('is-invalid');
                        const errorMsg = widowedSinceDate.parentElement.querySelector('.error-message');
                        if (errorMsg) {
                            errorMsg.textContent = 'Tanggal ini wajib diisi.';
                            errorMsg.style.display = 'block';
                        }
                        allFormValid = false;
                    } else if (widowedSinceDate) {
                        widowedSinceDate.classList.remove('is-invalid');
                        const errorMsg = widowedSinceDate.parentElement.querySelector('.error-message');
                        if (errorMsg) errorMsg.style.display = 'none';
                    }
                }
            }
            return allFormValid;
        }


        // Fungsi untuk mengelola state collapse header
        function setupAccordionHeaderToggle(headerId, collapseId) {
            const header = document.getElementById(headerId);
            const collapseElement = document.getElementById(collapseId);
            const collapseIcon = header.querySelector('.collapse-icon');

            if (header && collapseElement && collapseIcon) {
                // Initial state
                if (collapseElement.classList.contains('show')) {
                    header.classList.add('active');
                    collapseIcon.classList.remove('collapsed');
                } else {
                    header.classList.remove('active');
                    collapseIcon.classList.add('collapsed');
                }

                // Event listeners for Bootstrap collapse events
                collapseElement.addEventListener('show.bs.collapse', function() {
                    header.classList.add('active');
                    collapseIcon.classList.remove('collapsed');
                });
                collapseElement.addEventListener('hide.bs.collapse', function() {
                    header.classList.remove('active');
                    collapseIcon.classList.add('collapsed');
                });
            }
        }

        // --- Event Listeners untuk Tombol "Simpan Section" (AJAX Save) ---
        function setupSectionSaveButtons() {
            document.querySelectorAll('.save-section-btn').forEach(button => {
                button.addEventListener('click', async function(event) {
                    console.log('Tombol Simpan Section diklik!', this.dataset.section); // Tambahkan ini

                    event.preventDefault(); // Mencegah submit form utama
                    const sectionName = this.dataset.section;
                    const sectionAccordionBody = this.closest(
                        '.accordion-body'); // Dapatkan body accordion section ini
                    const form = document.getElementById('biodataForm');
                    const formData = new FormData();

                    // Kumpulkan data hanya dari field dalam section ini
                    let sectionValid = true;
                    const inputsInThisSection = sectionAccordionBody.querySelectorAll(
                        'input, select, textarea');

                    inputsInThisSection.forEach(input => {
                        // Validate individual field (client-side)
                        // Only validate if the input is visible and required
                        if (input.hasAttribute('required') && input.offsetParent !== null && !
                            validateField(input)) {
                            sectionValid = false;
                        }

                        // Append to FormData
                        if (input.name) { // Pastikan input punya nama
                            if (input.type === 'file') {
                                if (input.files.length > 0) {
                                    formData.append(input.name, input.files[0]);
                                } else if (input.id === 'profileImage' && !document
                                    .getElementById('profilePreview').src.includes(
                                        'placeholder.com')) {
                                    // If no new file and an old image exists, don't send the file input
                                    // or send a flag if clearing is intended. For now, rely on backend
                                    // to keep old image if no new file is provided.
                                } else if (input.id === 'profileImage' && document
                                    .getElementById('profilePreview').src.includes(
                                        'placeholder.com') && !input.files.length) {
                                    // If placeholder image is shown and no new file, it means the image was potentially cleared
                                    formData.append('profile_image_cleared',
                                        '1'); // Send a flag to backend to clear image
                                }
                            } else if (input.type === 'radio') {
                                if (input.checked) {
                                    formData.append(input.name, input.value);
                                }
                            } else if (input.type === 'checkbox') {
                                if (input.checked) {
                                    formData.append(input.name, input.value);
                                } else {
                                    // For unchecked checkboxes that are part of the section,
                                    // explicitly send 0 or false if the backend expects it.
                                    // This assumes your backend can handle missing checkbox values as false.
                                    // If Laravel validation needs it, you might need to send a hidden input with value 0.
                                }
                            } else {
                                formData.append(input.name, input.value);
                            }
                        }
                    });

                    // Handle radio groups that are conditionally required but might not be caught by individual input validation
                    const radioGroupsInThisSection = ['gender', 'marital_status',
                        'job_vacancy_source'
                    ]; // Add more as needed
                    radioGroupsInThisSection.forEach(groupName => {
                        const radioElements = sectionAccordionBody.querySelectorAll(
                            `input[name="${groupName}"]`);
                        if (radioElements.length > 0) {
                            const isChecked = sectionAccordionBody.querySelector(
                                `input[name="${groupName}"]:checked`);
                            if (radioElements[0].hasAttribute('required') && !isChecked) {
                                // If required and not checked, mark as invalid
                                radioElements.forEach(radio => radio.classList.add(
                                    'is-invalid'));
                                const parentDiv = radioElements[0].closest('.mb-3');
                                const errorDiv = parentDiv ? parentDiv.querySelector(
                                    '.error-message') : null;
                                if (errorDiv) {
                                    errorDiv.textContent = 'Field ini wajib dipilih.';
                                    errorDiv.style.display = 'block';
                                }
                                sectionValid = false;
                            } else if (isChecked) {
                                // If checked, remove invalid state
                                radioElements.forEach(radio => radio.classList.remove(
                                    'is-invalid'));
                                const parentDiv = radioElements[0].closest('.mb-3');
                                const errorDiv = parentDiv ? parentDiv.querySelector(
                                    '.error-message') : null;
                                if (errorDiv) {
                                    errorDiv.style.display = 'none';
                                }
                            }
                        }
                    });


                    // Add CSRF token for AJAX requests
                    formData.append('_token', document.querySelector('meta[name="csrf-token"]')
                        .getAttribute('content'));

                    // Determine method for saving section
                    // For a typical "save section", POST is fine for create/update on the backend via updateOrCreate.
                    // If you explicitly want PUT for updates, you'd need to adjust.
                    formData.append('_method',
                        'POST'); // Explicitly set _method to POST for Laravel route to work

                    // Kirim melalui AJAX hanya jika validasi client-side sukses
                    if (sectionValid) {
                        console.log('Validation passed. Calling window.showLoading()...'); // New log
                        window.showLoading(); // <--- Panggil fungsi global di sini

                        try {
                            const url =
                                `{{ url('/dashboard/save-section') }}/${sectionName}`; // Corrected URL
                            const response = await fetch(url, {
                                method: 'POST', // Always POST for these section saves
                                body: formData
                            });

                            const result = await response.json();

                            if (response.ok) {

                                alert(result.message);
                                                checkAndTogglePersonalDataRequiredAsterisk(); // Panggil di sini

                                                                window.location.reload(); // Fallback


                                const currentCollapseElement = this.closest('.accordion-collapse');
                                const nextAccordionItem = this.closest('.accordion-item')
                                    .nextElementSibling;
                                if (currentCollapseElement && nextAccordionItem) {
                                    const nextCollapseButton = nextAccordionItem.querySelector(
                                        '.accordion-button');
                                    if (nextCollapseButton) {
                                        const bsCollapse = new bootstrap.Collapse(
                                            currentCollapseElement, {
                                                toggle: false
                                            });
                                        bsCollapse.hide();
                                        nextCollapseButton.click(); // Buka accordion berikutnya
                                    }
                                }
                            } else {
                                // Tampilkan error dari backend
                                let errorMessages = 'Terjadi kesalahan saat menyimpan data:\n';
                                if (result.errors) {
                                    // Clear previous invalid states in the current section
                                    sectionAccordionBody.querySelectorAll('.is-invalid').forEach(el =>
                                        el.classList.remove('is-invalid'));
                                    sectionAccordionBody.querySelectorAll('.error-message').forEach(
                                        el => el.style.display = 'none');

                                    for (const field in result.errors) {
                                        // Handle nested array field names (e.g., dependents.0.name)
                                        // Adjust selector for dynamic inputs
                                        let fieldSelector = field;
                                        if (field.includes('.')) {
                                            // For "dependents.0.name" it becomes "dependents[0][name]"
                                            fieldSelector = field.replace(/\.(\d+)\./g, '[$1][')
                                                .replace(/\./g, ']');
                                            // For radio buttons, it's a bit trickier, need to target the group name.
                                            // Simplified for now, might need more specific handling for radios.
                                        }

                                        let fieldElement = sectionAccordionBody.querySelector(
                                            `[name="${fieldSelector}"]`);

                                        // Fallback for radio groups if direct name selector doesn't work well
                                        if (!fieldElement && (field.includes('gender') || field
                                                .includes(
                                                    'has_medical_condition') || field.includes(
                                                    'is_pregnant')
                                                // Add other radio group names here if needed
                                            )) {
                                            fieldElement = sectionAccordionBody.querySelector(
                                                `input[name="${field}"]`);
                                        }


                                        if (fieldElement) {
                                            fieldElement.classList.add('is-invalid');
                                            let errorMessageDiv = fieldElement.parentElement
                                                .querySelector('.error-message');
                                            // For radio buttons, error message might be at a higher level
                                            if (!errorMessageDiv && fieldElement.closest(
                                                    '.form-check-inline')) {
                                                errorMessageDiv = fieldElement.closest('.mb-3')
                                                    .querySelector('.error-message');
                                            }
                                            if (errorMessageDiv) {
                                                errorMessageDiv.textContent = result.errors[field][0];
                                                errorMessageDiv.style.display = 'block';
                                            }
                                        }
                                        errorMessages += `- ${result.errors[field][0]}\n`;
                                    }
                                } else {
                                    errorMessages += result.message || 'Respons tidak diketahui.';
                                }
                                alert(errorMessages);
                                // Scroll to first invalid field in the current section
                                const firstInvalidField = sectionAccordionBody.querySelector(
                                    '.is-invalid');
                                if (firstInvalidField) {
                                    firstInvalidField.scrollIntoView({
                                        behavior: 'smooth',
                                        block: 'center'
                                    });
                                }
                            }
                        } catch (error) {
                            console.error('Error saving section:', error);
                            alert('Terjadi kesalahan jaringan atau server.');
                        } finally {
                            window.hideLoading();
                        }
                    } else {
                        // If client-side validation fails, scroll to the first invalid field
                        const firstInvalidField = sectionAccordionBody.querySelector('.is-invalid');
                        if (firstInvalidField) {
                            firstInvalidField.scrollIntoView({
                                behavior: 'smooth',
                                block: 'center'
                            });
                        }
                        alert('Harap lengkapi field yang wajib diisi di bagian ini.');
                    }
                });
            });
        }

        // Fungsi untuk mengontrol visibilitas tombol hapus untuk SATU input group
        function toggleRemoveButtonVisibility(inputField, removeButton) {
            // This function needs to consider ALL inputs within the dynamic group, not just the first one.
            // If any field in the group has a value, show the remove button.
            const dynamicGroup = inputField.closest('.dynamic-input-group');
            if (!dynamicGroup || !removeButton) return;

            let hasContent = false;
            dynamicGroup.querySelectorAll('input, select, textarea').forEach(item => {
                if (item.type === 'radio' || item.type === 'checkbox') {
                    if (item.checked) {
                        hasContent = true;
                    }
                } else if (item.value.trim() !== '') {
                    hasContent = true;
                }
            });

            const totalInputGroups = dynamicGroup.parentElement.querySelectorAll('.dynamic-input-group').length;

            if (hasContent || totalInputGroups > 1) { // Show if has content OR if there's more than one group
                removeButton.style.display = 'inline-block';
            } else {
                removeButton.style.display = 'none';
            }
        }

        // --- Definisi Data Fields untuk Setiap Tipe Input Dinamis (Tetap sama) ---
        const dependentFields = [{
                name: 'name',
                label: 'Nama',
                type: 'text',
                placeholder: 'Nama Tanggungan',
                required: true
            },
            {
                name: 'relationship',
                label: 'Hubungan',
                type: 'text',
                placeholder: 'Contoh: Anak Kandung',
                required: true
            },
            {
                name: 'gender',
                label: 'Jenis Kelamin',
                type: 'radio',
                options: ['L', 'P'],
                required: true
            },
            {
                name: 'place_of_birth',
                label: 'Tempat Lahir',
                type: 'text',
                placeholder: 'Tempat Lahir',
                required: false
            },
            {
                name: 'date_of_birth',
                label: 'Tanggal Lahir',
                type: 'date',
                required: false
            },
            {
                name: 'education',
                label: 'Pendidikan',
                type: 'text',
                placeholder: 'Pendidikan Terakhir',
                required: false
            },
            {
                name: 'occupation',
                label: 'Pekerjaan',
                type: 'text',
                placeholder: 'Pekerjaan Saat Ini',
                required: false
            }
        ];

        const familyMemberFields = [{
                name: 'name',
                label: 'Nama',
                type: 'text',
                placeholder: 'Nama Anggota Keluarga',
                required: true
            },
            {
                name: 'relationship',
                label: 'Hubungan',
                type: 'text',
                placeholder: 'Contoh: Ayah / Kakak',
                required: true
            },
            {
                name: 'gender',
                label: 'Jenis Kelamin',
                type: 'radio',
                options: ['L', 'P'],
                required: true
            },
            {
                name: 'place_of_birth',
                label: 'Tempat Lahir',
                type: 'text',
                placeholder: 'Tempat Lahir',
                required: false
            },
            {
                name: 'date_of_birth',
                label: 'Tanggal Lahir',
                type: 'date',
                required: false
            },
            {
                name: 'education',
                label: 'Pendidikan',
                type: 'text',
                placeholder: 'Pendidikan Terakhir',
                required: false
            },
            {
                name: 'occupation',
                label: 'Pekerjaan',
                type: 'text',
                placeholder: 'Pekerjaan Saat Ini',
                required: false
            }
        ];

        const contactPersonFields = [{
                name: 'type',
                label: 'Keterangan',
                type: 'select',
                placeholder: 'Pilih',
                required: true,
                options: ['Keluarga', 'Teman']
            },
            {
                name: 'name',
                label: 'Nama',
                type: 'text',
                placeholder: 'Nama',
                required: true
            },
            {
                name: 'gender',
                label: 'Jenis Kelamin',
                type: 'radio',
                options: ['L', 'P'],
                required: true
            },
            {
                name: 'address',
                label: 'Alamat',
                type: 'textarea',
                placeholder: 'Alamat Lengkap',
                required: false
            },
            {
                name: 'phone_no',
                label: 'No. Telepon',
                type: 'text',
                placeholder: 'No. Telepon',
                required: false
            },
            {
                name: 'relationship',
                label: 'Hubungan',
                type: 'text',
                placeholder: 'Hubungan',
                required: false
            },
            {
                name: 'occupation',
                label: 'Pekerjaan',
                type: 'text',
                placeholder: 'Pekerjaan',
                required: false
            }
        ];

        const educationFields = [{
                name: 'level_of_education',
                label: 'Jenjang Pendidikan',
                type: 'select',
                placeholder: 'Pilih',
                required: true,
                options: @json($educationLevels)
            },
            {
                name: 'institution',
                label: 'Nama Institusi',
                type: 'text',
                placeholder: 'Nama Sekolah/Universitas',
                required: true
            },
            {
                name: 'period_start_year',
                label: 'Tahun Mulai',
                type: 'year',
                placeholder: 'Tahun Mulai',
                required: true
            },
            {
                name: 'period_end_year',
                label: 'Tahun Selesai',
                type: 'year',
                placeholder: 'Tahun Selesai',
                required: true
            },
            {
                name: 'major',
                label: 'Jurusan',
                type: 'text',
                placeholder: 'Jurusan',
                required: false
            },
            {
                name: 'grade',
                label: 'Peringkat',
                type: 'text',
                placeholder: 'IPK/Nilai Akhir',
                required: false
            }
        ];

        const organizationalExperienceFields = [{
                name: 'organization_name',
                label: 'Nama Organisasi',
                type: 'text',
                placeholder: 'Nama Organisasi',
                required: true
            },
            {
                name: 'title_in_organization',
                label: 'Jabatan',
                type: 'text',
                placeholder: 'Jabatan di Organisasi',
                required: false
            },
            {
                name: 'period',
                label: 'Periode Menjabat',
                type: 'text',
                placeholder: 'Contoh: 2020-2022',
                required: false
            }
        ];

        const trainingCoursesFields = [{
                name: 'training_course_name',
                label: 'Nama Training',
                type: 'text',
                placeholder: 'Nama Kursus/Training',
                required: true
            },
            {
                name: 'year',
                label: 'Tahun',
                type: 'year',
                placeholder: 'Tahun',
                required: true
            },
            {
                name: 'held_by',
                label: 'Penyelenggara',
                type: 'text',
                placeholder: 'Penyelenggara',
                required: false
            },
            {
                name: 'grade',
                label: 'Peringkat',
                type: 'text',
                placeholder: 'Peringkat/Sertifikat',
                required: false
            }
        ];

        const languageProficiencyOptions = ['Baik Sekali', 'Baik', 'Cukup', 'Kurang'];
        const languageFields = [{
                name: 'language_name',
                label: 'Jenis Bahasa',
                type: 'text',
                placeholder: 'Contoh: Inggris',
                required: true
            },
            {
                name: 'listening_proficiency',
                label: 'Mendengar',
                type: 'select',
                placeholder: 'Pilih',
                required: true,
                options: languageProficiencyOptions
            },
            {
                name: 'reading_proficiency',
                label: 'Membaca',
                type: 'select',
                placeholder: 'Pilih',
                required: true,
                options: languageProficiencyOptions
            },
            {
                name: 'speaking_proficiency',
                label: 'Berbicara',
                type: 'select',
                placeholder: 'Pilih',
                required: true,
                options: languageProficiencyOptions
            },
            {
                name: 'written_proficiency',
                label: 'Menulis',
                type: 'select',
                placeholder: 'Pilih',
                required: true,
                options: languageProficiencyOptions
            }
        ];

        const computerSkillProficiencyOptions = ['Baik Sekali', 'Baik', 'Cukup', 'Kurang'];
        const computerSkillFields = [{
                name: 'skill_name',
                label: 'Nama Keterampilan',
                type: 'text',
                placeholder: 'Contoh: Ms. Excel',
                required: true
            },
            {
                name: 'proficiency',
                label: 'Tingkat Kuasai',
                type: 'select',
                placeholder: 'Pilih',
                required: true,
                options: computerSkillProficiencyOptions
            }
        ];

        const publicationFields = [{
                name: 'title',
                label: 'Judul',
                type: 'textarea',
                placeholder: 'Judul Skripsi/Artikel/Buku',
                required: false
            },
            {
                name: 'type',
                label: 'Tipe',
                type: 'text',
                placeholder: 'Skripsi/Artikel/Buku',
                required: false
            }
        ];

        const workExperienceFields = [{
                name: 'company_name',
                label: 'Nama Perusahaan',
                type: 'text',
                placeholder: 'Nama Perusahaan',
                required: true
            },
            {
                name: 'period_start_date',
                label: 'Periode Dari',
                type: 'date',
                required: true
            },
            {
                name: 'period_end_date',
                label: 'Periode Sampai',
                type: 'date',
                required: false
            },
            {
                name: 'company_address',
                label: 'Alamat Perusahaan',
                type: 'textarea',
                placeholder: 'Alamat Lengkap Perusahaan',
                required: false
            },
            {
                name: 'company_phone_number',
                label: 'No. Telp Perusahaan',
                type: 'text',
                placeholder: 'No. Telp Perusahaan',
                required: false
            },
            {
                name: 'first_role_title',
                label: 'Jabatan Awal',
                type: 'text',
                placeholder: 'Jabatan Awal',
                required: true
            },
            {
                name: 'last_role_title',
                label: 'Jabatan Terakhir',
                type: 'text',
                placeholder: 'Jabatan Terakhir',
                required: true
            },
            {
                name: 'direct_supervisor_name',
                label: 'Nama Atasan Langsung',
                type: 'text',
                placeholder: 'Nama Atasan Langsung',
                required: false
            },
            {
                name: 'resignation_reason',
                label: 'Alasan Berhenti',
                type: 'textarea',
                placeholder: 'Alasan Berhenti',
                required: false
            },
            {
                name: 'last_salary',
                label: 'Gaji Terakhir',
                type: 'text',
                placeholder: 'Contoh: Rp 5.000.000',
                required: false
            }
        ];

        const workAchievementFields = [{
                name: 'achievement_description',
                label: 'Deskripsi Prestasi',
                type: 'textarea',
                placeholder: 'Deskripsi singkat prestasi',
                required: true
            },
            {
                name: 'year',
                label: 'Tahun',
                type: 'year',
                placeholder: 'Tahun',
                required: false
            }
        ];

        // --- JavaScript untuk Input Dinamis (Fungsi Helper) ---
        // dataFields adalah array objek: [{name: 'field_name', type: 'text', label: 'Label', placeholder: '...', required: true, options: [...]}]
        function addDynamicInputGroup(containerId, itemType, dataFields, initialValues = {}, index = null) {
            const container = document.getElementById(containerId);
            const div = document.createElement('div');
            div.classList.add('dynamic-input-group', 'mb-3', 'border', 'p-3', 'rounded', 'bg-light');

            const itemIndex = index !== null ? index : container.children.length;
            const inputNamePrefix = `${itemType}[${itemIndex}]`;

            let innerHtml = '';
            dataFields.forEach(field => {
                let fieldValue = initialValues[field.name] || '';
                const fieldId = `${itemType}_${field.name}_${itemIndex}`;

                innerHtml += `<div class="mb-3">`;
                if (field.label) {
                    innerHtml +=
                        `<label for="${fieldId}" class="form-label">${field.label} ${field.required ? '<span class="required">*</span>' : ''}</label>`;
                }

                if (field.type === 'select') {
                    innerHtml +=
                        `<select class="form-select" id="${fieldId}" name="${inputNamePrefix}[${field.name}]" ${field.required ? 'required' : ''}>`;
                    innerHtml += `<option value="">${field.placeholder || 'Pilih...'}</option>`;
                    field.options.forEach(opt => {
                        const optValue = (typeof opt === 'object' && opt !== null && opt.value !==
                            undefined) ? opt.value : opt;
                        const optText = (typeof opt === 'object' && opt !== null && opt.text !==
                            undefined) ? opt.text : opt;
                        innerHtml +=
                            `<option value="${optValue}" ${fieldValue == optValue ? 'selected' : ''}>${optText}</option>`;
                    });
                    innerHtml += `</select>`;
                } else if (field.type === 'radio') {
                    innerHtml += `<div class="d-flex flex-wrap gap-3">`;
                    field.options.forEach(opt => {
                        let isChecked = (fieldValue == opt) ? 'checked' : '';
                        const uniqueRadioId = `${fieldId}_${opt.toLowerCase().replace(/[^a-z0-9]/g, '')}`;
                        innerHtml += `
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="${uniqueRadioId}" name="${inputNamePrefix}[${field.name}]" value="${opt}" ${isChecked} ${field.required ? 'required' : ''}>
                            <label class="form-check-label" for="${uniqueRadioId}">${opt}</label>
                        </div>
                    `;
                    });
                    innerHtml += `</div>`;
                } else if (field.type === 'textarea') {
                    innerHtml += `
                        <textarea class="form-control" id="${fieldId}" name="${inputNamePrefix}[${field.name}]" placeholder="${field.placeholder}" ${field.required ? 'required' : ''}>${fieldValue}</textarea>
                    `;
                } else if (field.type === 'date') {
                    fieldValue = fieldValue ? new Date(fieldValue).toISOString().split('T')[0] : '';
                    innerHtml += `
                        <input type="date" class="form-control" id="${fieldId}" name="${inputNamePrefix}[${field.name}]" value="${fieldValue}" ${field.required ? 'required' : ''}>
                    `;
                } else if (field.type === 'year') {
                    innerHtml += `
                        <input type="number" class="form-control" name="${inputNamePrefix}[${field.name}]" value="${fieldValue}" placeholder="${field.placeholder}" min="1900" max="${new Date().getFullYear()}" ${field.required ? 'required' : ''}>
                    `;
                } else { // Default to text input
                    innerHtml += `
                    <input type="text" class="form-control" id="${fieldId}" name="${inputNamePrefix}[${field.name}]" value="${fieldValue}" placeholder="${field.placeholder}" ${field.required ? 'required' : ''}>
                `;
                }
                innerHtml += `<div class="error-message"></div></div>`;
            });

            innerHtml += `<button type="button" class="btn btn-danger btn-sm btn-remove">Hapus</button>`;
            div.innerHTML = innerHtml;
            container.appendChild(div);

            // Attach event listeners for validation and remove button visibility
            const newlyAddedInputs = div.querySelectorAll('input, select, textarea');
            newlyAddedInputs.forEach(input => {
                input.addEventListener('input', () => validateField(input));
                input.addEventListener('change', () => validateField(input));
            });

            const removeButton = div.querySelector('.btn-remove');
            // Initial check for remove button visibility
            toggleRemoveButtonVisibility(newlyAddedInputs[0] || null, removeButton); // Pass first input, or null if none

            // Focus the first input of the newly added group if it's not pre-filled
            const firstInputField = div.querySelector('input, select, textarea');
            if (firstInputField && Object.keys(initialValues).length === 0) {
                firstInputField.focus();
            }
        }

        // Fungsi handler untuk tombol "Tambah" pada grup input dinamis
        function handleAddDynamicField(containerId, itemType, fieldsDefinition) {
            const container = document.getElementById(containerId);
            // Get all required inputs from the *last* dynamic input group within this container
            const lastGroup = container.lastElementChild;
            let allCurrentItemsValid = true;

            if (lastGroup && lastGroup.classList.contains('dynamic-input-group')) {
                const inputsInLastGroup = lastGroup.querySelectorAll(
                    'input[required], select[required], textarea[required]');
                inputsInLastGroup.forEach(input => {
                    if (!validateField(input)) { // Use validateField for each input
                        allCurrentItemsValid = false;
                    }
                });

                // Special handling for radio groups within dynamic groups
                fieldsDefinition.filter(field => field.type === 'radio' && field.required).forEach(field => {
                    const radioGroupName = `${itemType}[${container.children.length - 1}][${field.name}]`;
                    const radioElements = lastGroup.querySelectorAll(`input[name="${radioGroupName}"]`);
                    if (radioElements.length > 0 && !lastGroup.querySelector(
                            `input[name="${radioGroupName}"]:checked`)) {
                        allCurrentItemsValid = false;
                        // Trigger validation to show error message for the radio group
                        validateField(radioElements[0]);
                    }
                });
            }

            // If there are no existing groups OR all existing groups are valid, add a new one
            if (allCurrentItemsValid) {
                addDynamicInputGroup(containerId, itemType, fieldsDefinition);
            } else {
                // If any required field is empty in the last group, alert the user and scroll to it
                const firstInvalidField = lastGroup.querySelector('.is-invalid');
                if (firstInvalidField) {
                    firstInvalidField.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }
                alert('Harap isi semua field yang wajib diisi pada item yang sudah ada terlebih dahulu.');
            }
        }


        // Event listener for removing dynamic inputs (using event delegation)
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('btn-remove')) {
                const group = event.target.closest('.dynamic-input-group');
                if (group) {
                    const container = group.parentElement;
                    const totalInputGroups = container.querySelectorAll('.dynamic-input-group').length;

                    if (totalInputGroups === 1) { // If this is the LAST input group
                        // Clear all fields within this last group instead of removing it
                        group.querySelectorAll('input, select, textarea').forEach(input => {
                            if (input.type === 'radio' || input.type === 'checkbox') {
                                input.checked = false;
                            } else if (input.tagName === 'SELECT') {
                                input.selectedIndex =
                                    0; // Reset select to first option (usually "Pilih...")
                            } else {
                                input.value = '';
                            }
                            input.classList.remove('is-invalid'); // Remove invalid state
                            const errorMessageDiv = input.parentElement.querySelector('.error-message');
                            if (errorMessageDiv) {
                                errorMessageDiv.style.display = 'none';
                            }
                        });
                        // Hide the remove button for the now-empty single group
                        toggleRemoveButtonVisibility(group.querySelector('input, select, textarea'), event.target);
                    } else {
                        group.remove(); // If more than one, remove the group
                    }
                    // Re-index dynamic inputs after removal to ensure correct array keys on submit
                    reindexDynamicInputs(container.id, container.dataset.itemType, dynamicSectionsMapping[container
                        .id].fields);
                }
            }
        });

        // Function to reindex dynamic inputs after an item is removed
        function reindexDynamicInputs(containerId, itemType, fieldsDefinition) {
            const container = document.getElementById(containerId);
            Array.from(container.children).forEach((group, index) => {
                fieldsDefinition.forEach(field => {
                    const oldNamePrefix = `${itemType}\\[\\d+\\]\\[${field.name}\\]`;
                    const newNamePrefix = `${itemType}[${index}][${field.name}]`;

                    group.querySelectorAll(`[name^="${itemType}["]`).forEach(input => {
                        const currentName = input.getAttribute('name');
                        const updatedName = currentName.replace(/\[\d+\]/, `[${index}]`);
                        input.setAttribute('name', updatedName);

                        // Update IDs as well to maintain uniqueness
                        const oldId = input.id;
                        if (oldId) {
                            const updatedId = `${itemType}_${field.name}_${index}`;
                            input.id = updatedId;
                            // Also update associated labels
                            const label = document.querySelector(`label[for="${oldId}"]`);
                            if (label) {
                                label.setAttribute('for', updatedId);
                            }
                        }
                    });
                });
            });
        }

        // Map container IDs to their item types and field definitions for reindexing
        const dynamicSectionsMapping = {
            'dependents-container': {
                type: 'dependents',
                fields: dependentFields
            },
            'family-members-container': {
                type: 'family_members',
                fields: familyMemberFields
            },
            'contact-persons-container': {
                type: 'contact_persons',
                fields: contactPersonFields
            },
            'education-history-container': {
                type: 'education_history',
                fields: educationFields
            },
            'organizational-experience-container': {
                type: 'organizational_experience',
                fields: organizationalExperienceFields
            },
            'training-courses-container': {
                type: 'training_courses',
                fields: trainingCoursesFields
            },
            'languages-container': {
                type: 'languages',
                fields: languageFields
            },
            'computer-skills-container': {
                type: 'computer_skills',
                fields: computerSkillFields
            },
            'publications-container': {
                type: 'publications',
                fields: publicationFields
            },
            'work-experience-container': {
                type: 'work_experience',
                fields: workExperienceFields
            },
            'work-achievements-container': {
                type: 'work_achievements',
                fields: workAchievementFields
            }
        };

        // Event listener for final form submission
        document.getElementById('biodataForm').addEventListener('submit', async function(event) {
            event.preventDefault(); // Prevent default HTML form submission

            // Validate all required fields across the entire form
            if (!validateAllRequiredInputs()) {
                alert('Harap isi semua field yang wajib diisi.');
                const firstInvalidField = document.querySelector('#biodataForm .is-invalid');
                if (firstInvalidField) {
                    firstInvalidField.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }
                return; // Stop form submission
            }

            const formData = new FormData(this);

            // Add _method for PUT if it's an update, only for the final submission
            if (this.method.toLowerCase() === 'post' && this.action.includes('update_final')) {
                formData.append('_method', 'PUT');
            }

            try {
                const url = this.action; // The URL from the form's action attribute
                const method = 'POST'; // Always use POST as FormData handles _method

                const response = await fetch(url, {
                    method: method,
                    body: formData,
                });

                const result = await response.json();

                if (response.ok) {
                    alert(result.message || 'Biodata berhasil disimpan!');

                    if (result.redirect) {
                        window.location.href = result.redirect;
                    } else {
                        location.reload(); // Reload to reflect changes if no redirect
                    }
                } else {
                    let errorMessages = 'Terjadi kesalahan saat menyimpan data:\n';
                    if (result.errors) {
                        // Clear all previous invalid states and error messages on the whole form
                        document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove(
                            'is-invalid'));
                        document.querySelectorAll('.error-message').forEach(el => el.style.display = 'none');

                        for (const field in result.errors) {
                            let fieldElement;
                            // Handle nested array field names (e.g., dependents.0.name)
                            // Convert "dependents.0.name" to "dependents[0][name]" for querySelector
                            let queryName = field.replace(/\.(\d+)\./g, '[$1][').replace(/\.(\w+)$/, '[$1]');

                            fieldElement = form.querySelector(`[name="${queryName}"]`);

                            // Special handling for radio buttons if direct selection fails
                            if (!fieldElement && (field.includes('gender') || field.includes(
                                    'has_medical_condition') || field.includes('is_pregnant'))) {
                                // Try to find any radio button in the group
                                fieldElement = form.querySelector(`input[name="${queryName}"]`);
                            }

                            if (fieldElement) {
                                fieldElement.classList.add('is-invalid');
                                let errorMessageDiv = fieldElement.parentElement.querySelector(
                                    '.error-message');
                                // Fallback for radio buttons if error message isn't directly next to input
                                if (!errorMessageDiv && fieldElement.closest('.form-check-inline')) {
                                    errorMessageDiv = fieldElement.closest('.mb-3').querySelector(
                                        '.error-message');
                                }
                                if (errorMessageDiv) {
                                    errorMessageDiv.textContent = result.errors[field][0];
                                    errorMessageDiv.style.display = 'block';
                                }
                            }
                            errorMessages += `- ${result.errors[field][0]}\n`;
                        }
                    } else {
                        errorMessages += result.message || 'Respons tidak diketahui.';
                    }
                    alert(errorMessages);
                    const firstInvalidField = document.querySelector('#biodataForm .is-invalid');
                    if (firstInvalidField) {
                        firstInvalidField.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }
                }

            } catch (error) {
                console.error('Error submitting form:', error);
                alert('Terjadi kesalahan jaringan atau server. Silakan coba lagi.');
            }
        });

           function checkAndTogglePersonalDataRequiredAsterisk() {
        const asteriskElement = document.getElementById('personalDataRequiredAsterisk');
        if (!asteriskElement) return;

        // Daftar ID collapse sections yang membentuk "Data Pribadi"
        const sectionsToCheck = [
            'collapseInformasiUtama',
            'collapseInformasiAlamat',
            'collapseNomorIdentitas',
            'collapseDetailPribadiLainnya',
            'collapseSumberLowongan'
        ];

        let allPersonalDataSectionsValid = true;

        for (const sectionId of sectionsToCheck) {
            const sectionElement = document.getElementById(sectionId);
            if (sectionElement) {
                // --- Poin Krusial Perbaikan: Gunakan checkValidity() ---
                // Iterasi semua input required di dalam setiap sectionElement
                const requiredInputsInSection = sectionElement.querySelectorAll(
                    'input[required]:not([type="file"]), select[required], textarea[required]'
                );
                for (const input of requiredInputsInSection) {
                    if (!input.checkValidity()) { // checkValidity() akan memverifikasi apakah input memiliki nilai jika required
                        allPersonalDataSectionsValid = false;
                        // console.log(`Invalid standard input in ${sectionId}:`, input.name, input.value); // Debugging
                        break; // Hentikan loop jika ada yang tidak valid
                    }
                }
                if (!allPersonalDataSectionsValid) break; // Keluar dari loop sections jika ada yang tidak valid

                // --- Pemeriksaan Radio Groups (tetap penting karena checkValidity() mungkin tidak cukup untuk group) ---
                const requiredRadioGroupsInSection = Array.from(sectionElement.querySelectorAll(
                        'input[type="radio"][required]'))
                    .map(radio => radio.name)
                    .filter((value, index, self) => self.indexOf(value) === index); // Ambil nama grup radio unik

                for (const groupName of requiredRadioGroupsInSection) {
                    // Cari apakah ada radio button yang dicentang di dalam grup ini
                    if (!sectionElement.querySelector(`input[name="${groupName}"]:checked`)) {
                        allPersonalDataSectionsValid = false;
                        // console.log(`Invalid radio group in ${sectionId}:`, groupName); // Debugging
                        break;
                    }
                }
                if (!allPersonalDataSectionsValid) break;

                // --- Penanganan Kasus Khusus: Tanggal Status Pernikahan ---
                const maritalStatusSelect = sectionElement.querySelector('#marital_status');
                if (maritalStatusSelect) {
                    const marriedSinceDate = sectionElement.querySelector('#married_since_date');
                    const widowedSinceDate = sectionElement.querySelector('#widowed_since_date');

                    if (maritalStatusSelect.value === 'Menikah' && marriedSinceDate && marriedSinceDate
                        .hasAttribute('required')) {
                        if (!marriedSinceDate.checkValidity()) {
                            allPersonalDataSectionsValid = false;
                            // console.log("Invalid married date:", marriedSinceDate.value); // Debugging
                            break;
                        }
                    }
                    if (maritalStatusSelect.value === 'Janda-Duda' && widowedSinceDate && widowedSinceDate
                        .hasAttribute('required')) {
                        if (!widowedSinceDate.checkValidity()) {
                            allPersonalDataSectionsValid = false;
                            // console.log("Invalid widowed date:", widowedSinceDate.value); // Debugging
                            break;
                        }
                    }
                }
                if (!allPersonalDataSectionsValid) break;

                // --- Penanganan Kasus Khusus: Foto Profil (jika diperlukan) ---
                const profileImageInput = sectionElement.querySelector('#profileImage');
                const profilePreview = sectionElement.querySelector('#profilePreview');
                // Asumsi profileImageInput selalu ada, required diatur di HTML
                if (profileImageInput && profileImageInput.hasAttribute('required')) {
                    const currentSrcIsPlaceholder = (profilePreview.src === "" || profilePreview.src.includes('placeholder.com'));
                    const noNewFileSelected = (profileImageInput.files.length === 0);
                    const noExistingImage = (!profilePreview.dataset.originalSrc); // Cek apakah ada originalSrc

                    // Jika input required, dan belum ada file baru, dan belum ada gambar lama
                    if (noNewFileSelected && noExistingImage) {
                         allPersonalDataSectionsValid = false;
                         // console.log("Profile image not uploaded or cleared."); // Debugging
                         break;
                    }
                }
                if (!allPersonalDataSectionsValid) break;

            } else {
                // Jika salah satu section tidak ditemukan (misalnya typo ID), anggap tidak valid
                // Atau, bisa tambahkan logging/error handling di sini jika sectionId tidak valid
                // console.warn(`Section element with ID "${sectionId}" not found.`);
            }
        }

        // Tampilkan atau sembunyikan tanda bintang berdasarkan hasil validasi semua section
        if (allPersonalDataSectionsValid) {
            asteriskElement.style.display = 'none'; // Sembunyikan tanda bintang
            // console.log("All personal data sections valid. Hiding asterisk."); // Debugging
        } else {
            asteriskElement.style.display = 'inline'; // Tampilkan tanda bintang
            // console.log("Some personal data sections are invalid. Showing asterisk."); // Debugging
        }
    }


        document.addEventListener('DOMContentLoaded', function() {
            // Initial call for profile image display
            updateProfileImageDisplay();
            setupSectionSaveButtons();
        checkAndTogglePersonalDataRequiredAsterisk();

            // Setup for main card header toggle (the first one)
            const mainCardHeader = document.getElementById('mainCardHeaderToggle'); // Get by its specific ID
            if (mainCardHeader) {
                const targetCollapseId = mainCardHeader.dataset.bsTarget.substring(1); // Remove '#'
                setupAccordionHeaderToggle(mainCardHeader.id, targetCollapseId);
            }



            // Initial setup for marital status date inputs
            const maritalStatusSelect = document.getElementById('marital_status');

            if (maritalStatusSelect) {
                maritalStatusSelect.addEventListener('change', function() {
                    const marriedDateGroup = document.getElementById('marriedDateGroup');
                    const widowedDateGroup = document.getElementById('widowedDateGroup');
                    const marriedInput = document.getElementById('married_since_date');
                    const widowedInput = document.getElementById('widowed_since_date');

                    if (this.value === 'Menikah') {
                        if (marriedDateGroup) {
                            marriedDateGroup.style.display = 'block';
                            if (marriedInput) marriedInput.setAttribute('required', 'required');
                        }
                        if (widowedDateGroup) {
                            widowedDateGroup.style.display = 'none';
                            if (widowedInput) {
                                widowedInput.removeAttribute('required');
                                widowedInput.value = ''; // Clear value when hidden
                                validateField(widowedInput); // Re-validate to clear error styling
                            }
                        }
                    } else if (this.value === 'Janda-Duda') {
                        if (marriedDateGroup) {
                            marriedDateGroup.style.display = 'none';
                            if (marriedInput) {
                                marriedInput.removeAttribute('required');
                                marriedInput.value = ''; // Clear value when hidden
                                validateField(marriedInput); // Re-validate to clear error styling
                            }
                        }
                        if (widowedDateGroup) {
                            widowedDateGroup.style.display = 'block';
                            if (widowedInput) widowedInput.setAttribute('required', 'required');
                        }
                    } else { // Belum menikah (Not married)
                        if (marriedDateGroup) {
                            marriedDateGroup.style.display = 'none';
                            if (marriedInput) {
                                marriedInput.removeAttribute('required');
                                marriedInput.value = ''; // Clear value when hidden
                                validateField(marriedInput); // Re-validate to clear error styling
                            }
                        }
                        if (widowedDateGroup) {
                            widowedDateGroup.style.display = 'none';
                            if (widowedInput) {
                                widowedInput.removeAttribute('required');
                                widowedInput.value = ''; // Clear value when hidden
                                validateField(widowedInput); // Re-validate to clear error styling
                            }
                        }
                    }
                    // Trigger validation for marital status select itself
                    validateField(this);
                });
                maritalStatusSelect.dispatchEvent(new Event('change')); // Trigger on load to set initial state
            }

            // Add event listeners 'input' and 'change' for all required inputs for real-time validation
            const form = document.getElementById('biodataForm');
            form.querySelectorAll('input[required], select[required], textarea[required]').forEach(input => {
                input.addEventListener('input', () => validateField(input));
                input.addEventListener('change', () => validateField(input));
            });

            // Add event listeners for all radio buttons to trigger validation on change
            form.querySelectorAll('input[type="radio"]').forEach(radio => {
                radio.addEventListener('change', () => validateField(radio));
            });

            // Set up event listeners for all accordion headers
            document.querySelectorAll('.accordion-button').forEach(button => {
                const targetCollapseId = button.dataset.bsTarget;
                setupAccordionHeaderToggle(button.id, targetCollapseId.substring(
                    1)); // Pass button ID and collapse ID
            });
            const profileImageInput = document.getElementById('profileImage');
            const profilePreview = document.getElementById('profilePreview');
            const uploadAreaContainer = document.getElementById('uploadAreaContainer');
            const clearProfileImageFlag = document.getElementById('profile_image_cleared_flag');
            const clearProfileImageButton = document.getElementById('clearProfileImageButton');
            const fileInfo = document.querySelector('#accordionInformasiUtama .file-info');



            // Add event listener for the file input change (already in your code, but ensure its within DOMContentLoaded)
            if (profileImageInput) {
                profileImageInput.addEventListener('change', function() {
                    previewImage(this); // Call preview function when a new file is selected
                                    checkAndTogglePersonalDataRequiredAsterisk(); // <-- TAMBAHKAN INI

                });
            }
            // Initial call for full form validation to mark empty required fields
            validateAllRequiredInputs();

            // Setup section save buttons
            setupSectionSaveButtons();
        });
    </script>
</body>

</html>
