<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        .detail-card {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            /* Added margin for spacing */
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
            font-size: 0.9em;
            /* Smaller font for label */
        }

        .detail-item p {
            margin-bottom: 0;
            color: #333;
            font-size: 1.1em;
            /* Slightly larger font for value */
        }

        .section-header {
            margin-top: 30px;
            margin-bottom: 15px;
            color: #2c3e50;
            font-size: 1.5rem;
            border-bottom: 2px solid #ccc;
            /* Thicker border for main sections */
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

        .profile-image-display {
            width: 120px;
            /* Larger size for detail view */
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #f0f0f0;
            margin-bottom: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .sub-section-header {
            font-size: 1.2rem;
            color: #444;
            margin-top: 20px;
            margin-bottom: 10px;
            border-bottom: 1px dashed #eee;
            padding-bottom: 5px;
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Detail Pelamar</h2>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
            <div class="container-fluid">
                <div class="block">
                    <div class="title"><strong>Detail untuk: {{ $applicant->full_name }}</strong></div>
                    <div class="block-body">
                        <div class="detail-card">
                            {{-- Foto Profil --}}
                            <div class="text-center">
                                <img src="{{ Storage::url($applicant->profile_image) }}"
                                     class="profile-image-display">
                            </div>

                            <h3 class="section-header">I. Data Diri Pribadi</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <strong>Nama Lengkap:</strong>
                                        <p>{{ $applicant->full_name }}</p>
                                    </div>
                                    <div class="detail-item">
                                        <strong>Alamat Email:</strong>
                                        <p>{{ $applicant->email_address }}</p>
                                    </div>
                                    <div class="detail-item">
                                        <strong>No. Telepon:</strong>
                                        <p>{{ $applicant->mobile_phone_number }}</p>
                                    </div>
                                    <div class="detail-item">
                                        <strong>Tempat Lahir:</strong>
                                        <p>{{ $applicant->place_of_birth }}</p>
                                    </div>
                                    <div class="detail-item">
                                        <strong>Tanggal Lahir:</strong>
                                        <p>{{ $applicant->date_of_birth ? \Carbon\Carbon::parse($applicant->date_of_birth)->format('d M Y') : '-' }}
                                        </p>
                                    </div>
                                    <div class="detail-item">
                                        <strong>Golongan Darah:</strong>
                                        <p>{{ $applicant->blood_type ?? '-' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <strong>Jenis Kelamin:</strong>
                                        <p>{{ $applicant->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                                    </div>
                                    <div class="detail-item">
                                        <strong>Agama:</strong>
                                        <p>{{ $applicant->religion ?? '-' }}</p>
                                    </div>
                                    <div class="detail-item">
                                        <strong>Status Pernikahan:</strong>
                                        <p>{{ $applicant->marital_status ?? '-' }}</p>
                                    </div>
                                    @if ($applicant->marital_status == 'Menikah' && $applicant->married_since_date)
                                        <div class="detail-item">
                                            <strong>Menikah Sejak:</strong>
                                            <p>{{ \Carbon\Carbon::parse($applicant->married_since_date)->format('d M Y') }}
                                            </p>
                                        </div>
                                    @endif
                                    @if ($applicant->marital_status == 'Janda-Duda' && $applicant->widowed_since_date)
                                        <div class="detail-item">
                                            <strong>Duda/Janda Sejak:</strong>
                                            <p>{{ \Carbon\Carbon::parse($applicant->widowed_since_date)->format('d M Y') }}
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <h3 class="section-header">II. Informasi Alamat</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <strong>Alamat KTP:</strong>
                                        <p>{{ $applicant->permanent_address_ktp ?? '-' }}</p>
                                    </div>
                                    <div class="detail-item">
                                        <strong>Kode Pos KTP:</strong>
                                        <p>{{ $applicant->permanent_postal_code_ktp ?? '-' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <strong>Alamat Sekarang:</strong>
                                        <p>{{ $applicant->current_address ?? '-' }}</p>
                                    </div>
                                    <div class="detail-item">
                                        <strong>Kode Pos Sekarang:</strong>
                                        <p>{{ $applicant->current_postal_code ?? '-' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <strong>Alamat Orangtua:</strong>
                                        <p>{{ $applicant->parents_address ?? '-' }}</p>
                                    </div>
                                    <div class="detail-item">
                                        <strong>Kode Pos Orangtua:</strong>
                                        <p>{{ $applicant->parents_postal_code ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>

                            <h3 class="section-header">III. Nomor Identitas</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <strong>No. KTP/Passport:</strong>
                                        <p>{{ $applicant->id_passport_number ?? '-' }}</p>
                                    </div>
                                    <div class="detail-item">
                                        <strong>No. NPWP:</strong>
                                        <p>{{ $applicant->npwp_number ?? '-' }}</p>
                                    </div>
                                    <div class="detail-item">
                                        <strong>No. SIM:</strong>
                                        <p>{{ $applicant->license_number ?? '-' }}</p>
                                    </div>
                                    <div class="detail-item">
                                        <strong>Tanggal Kadaluarsa SIM:</strong>
                                        <p>{{ $applicant->license_expiry_date ? \Carbon\Carbon::parse($applicant->license_expiry_date)->format('d M Y') : '-' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <strong>No. BPJS Kesehatan:</strong>
                                        <p>{{ $applicant->bpjs_health_number ?? '-' }}</p>
                                    </div>
                                    <div class="detail-item">
                                        <strong>No. BPJS Ketenagakerjaan:</strong>
                                        <p>{{ $applicant->bpjs_employment_number ?? '-' }}</p>
                                    </div>
                                    
                                </div>
                            </div>

                            {{-- Dynamic Section: Dependents --}}
                            <h3 class="section-header">IV. Tanggungan (Suami/Istri & Anak)</h3>
                            @if ($applicant->dependents->isNotEmpty())
                                @foreach ($applicant->dependents as $dependent)
                                    <div class="detail-card mb-3 bg-light">
                                        <h5 class="sub-section-header">Tanggungan #{{ $loop->iteration }}</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="detail-item"><strong>Nama:</strong>
                                                    <p>{{ $dependent->name ?? '-' }}</p>
                                                </div>
                                                <div class="detail-item"><strong>Hubungan:</strong>
                                                    <p>{{ $dependent->relationship ?? '-' }}</p>
                                                </div>
                                                <div class="detail-item"><strong>Jenis Kelamin:</strong>
                                                    <p>{{ $dependent->gender == 'L' ? 'Laki-laki' : ($dependent->gender == 'P' ? 'Perempuan' : '-') }}
                                                    </p>
                                                </div>
                                                <div class="detail-item"><strong>Pekerjaan:</strong>
                                                    <p>{{ $dependent->occupation ?? '-' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="detail-item"><strong>Tempat Lahir:</strong>
                                                    <p>{{ $dependent->place_of_birth ?? '-' }}</p>
                                                </div>
                                                <div class="detail-item"><strong>Tanggal Lahir:</strong>
                                                    <p>{{ $dependent->date_of_birth ? \Carbon\Carbon::parse($dependent->date_of_birth)->format('d M Y') : '-' }}
                                                    </p>
                                                </div>
                                                <div class="detail-item"><strong>Pendidikan:</strong>
                                                    <p>{{ $dependent->education ?? '-' }}</p>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>Tidak ada data tanggungan.</p>
                            @endif

                           {{-- START: Updated Section V for Emergency Contact --}}
                            <h3 class="section-header">V. Kontak Person Darurat</h3>
                            @if ($applicant->emergency_contact_name) {{-- Check if emergency contact data exists --}}
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <strong>Nama:</strong>
                                                <p>{{ $applicant->emergency_contact_name ?? '-' }}</p>
                                    </div>
                                    <div class="detail-item"><strong>Alamat:</strong>
                                                <p>{{ $applicant->emergency_contact_address ?? '-' }}</p>
                                            </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="detail-item"><strong>No. Telepon:</strong>
                                                <p>{{ $applicant->emergency_contact_phone ?? '-' }}</p>
                                            </div>
                                            <div class="detail-item"><strong>Hubungan:</strong>
                                                <p>{{ $applicant->emergency_contact_relationship ?? '-' }}</p>
                                            </div>
                                    
                                </div>
                            </div>
                            @else
                                <p>Tidak ada data kontak person darurat.</p>
                            @endif

                            {{-- Dynamic Section: Family Members --}}
                            <h3 class="section-header">VI. Susunan Keluarga (Ayah, Ibu, Saudara Kandung)</h3>
                            @if ($applicant->familyMembers->isNotEmpty())
                                @foreach ($applicant->familyMembers as $familyMember)
                                    <div class="detail-card mb-3 bg-light">
                                        <h5 class="sub-section-header">Anggota Keluarga #{{ $loop->iteration }}</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="detail-item"><strong>Nama:</strong>
                                                    <p>{{ $familyMember->name ?? '-' }}</p>
                                                </div>
                                                <div class="detail-item"><strong>Hubungan:</strong>
                                                    <p>{{ $familyMember->relationship ?? '-' }}</p>
                                                </div>
                                                <div class="detail-item"><strong>Jenis Kelamin:</strong>
                                                    <p>{{ $familyMember->gender == 'L' ? 'Laki-laki' : ($familyMember->gender == 'P' ? 'Perempuan' : '-') }}
                                                    </p>
                                                </div>
                                                <div class="detail-item"><strong>Pekerjaan:</strong>
                                                    <p>{{ $familyMember->occupation ?? '-' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="detail-item"><strong>Tempat Lahir:</strong>
                                                    <p>{{ $familyMember->place_of_birth ?? '-' }}</p>
                                                </div>
                                                <div class="detail-item"><strong>Tanggal Lahir:</strong>
                                                    <p>{{ $familyMember->date_of_birth ? \Carbon\Carbon::parse($familyMember->date_of_birth)->format('d M Y') : '-' }}
                                                    </p>
                                                </div>
                                                <div class="detail-item"><strong>Pendidikan:</strong>
                                                    <p>{{ $familyMember->education ?? '-' }}</p>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>Tidak ada data susunan keluarga.</p>
                            @endif

                            {{-- Dynamic Section: Contact Persons --}}
                            <h3 class="section-header">VII. Kontak Person</h3>
                            @if ($applicant->contactPersons->isNotEmpty())
                                @foreach ($applicant->contactPersons as $contactPerson)
                                    <div class="detail-card mb-3 bg-light">
                                        <h5 class="sub-section-header">Kontak Person #{{ $loop->iteration }}</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="detail-item"><strong>Keterangan:</strong>
                                                    <p>{{ $contactPerson->type ?? '-' }}</p>
                                                </div>
                                                <div class="detail-item"><strong>Nama:</strong>
                                                    <p>{{ $contactPerson->name ?? '-' }}</p>
                                                </div>
                                                <div class="detail-item"><strong>Jenis Kelamin:</strong>
                                                    <p>{{ $contactPerson->gender == 'L' ? 'Laki-laki' : ($contactPerson->gender == 'P' ? 'Perempuan' : '-') }}
                                                    </p>
                                                </div>
                                                <div class="detail-item"><strong>Alamat:</strong>
                                                    <p>{{ $contactPerson->address ?? '-' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="detail-item"><strong>No. Telepon:</strong>
                                                    <p>{{ $contactPerson->phone_no ?? '-' }}</p>
                                                </div>
                                                <div class="detail-item"><strong>Hubungan:</strong>
                                                    <p>{{ $contactPerson->relationship ?? '-' }}</p>
                                                </div>
                                                <div class="detail-item"><strong>Pekerjaan:</strong>
                                                    <p>{{ $contactPerson->occupation ?? '-' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>Tidak ada data kontak person.</p>
                            @endif

                            {{-- Dynamic Section: Education History --}}
                            <h3 class="section-header">VIII. Riwayat Pendidikan</h3>
                            @if ($applicant->educationHistory->isNotEmpty())
                                @foreach ($applicant->educationHistory as $edu)
                                    <div class="detail-card mb-3 bg-light">
                                        <h5 class="sub-section-header">Pendidikan #{{ $loop->iteration }}</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="detail-item"><strong>Jenjang:</strong>
                                                    <p>{{ $edu->level_of_education ?? '-' }}</p>
                                                </div>
                                                <div class="detail-item"><strong>Institusi:</strong>
                                                    <p>{{ $edu->institution ?? '-' }}</p>
                                                </div>
                                                <div class="detail-item"><strong>Tahun Periode:</strong>
                                                    <p>{{ $edu->period_start_year ?? '-' }} -
                                                        {{ $edu->period_end_year ?? '-' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="detail-item"><strong>Jurusan:</strong>
                                                    <p>{{ $edu->major ?? '-' }}</p>
                                                </div>
                                                <div class="detail-item"><strong>Nilai/IPK:</strong>
                                                    <p>{{ $edu->grade ?? '-' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>Tidak ada riwayat pendidikan.</p>
                            @endif

                            {{-- Dynamic Section: Organizational Experience --}}
                            <h3 class="section-header">IX. Pengalaman Organisasi</h3>
                            @if ($applicant->organizationalExperience->isNotEmpty())
                                @foreach ($applicant->organizationalExperience as $org)
                                    <div class="detail-card mb-3 bg-light">
                                        <h5 class="sub-section-header">Organisasi #{{ $loop->iteration }}</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="detail-item"><strong>Nama Organisasi:</strong>
                                                    <p>{{ $org->organization_name ?? '-' }}</p>
                                                </div>
                                                <div class="detail-item"><strong>Jabatan:</strong>
                                                    <p>{{ $org->title_in_organization ?? '-' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="detail-item"><strong>Periode:</strong>
                                                    <p>{{ $org->period ?? '-' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>Tidak ada pengalaman organisasi.</p>
                            @endif

                            {{-- Dynamic Section: Training Courses --}}
                            <h3 class="section-header">X. Pengalaman Kursus & Training</h3>
                            @if ($applicant->trainingCourses->isNotEmpty())
                                @foreach ($applicant->trainingCourses as $training)
                                    <div class="detail-card mb-3 bg-light">
                                        <h5 class="sub-section-header">Training #{{ $loop->iteration }}</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="detail-item"><strong>Nama Training:</strong>
                                                    <p>{{ $training->training_course_name ?? '-' }}</p>
                                                </div>
                                                <div class="detail-item"><strong>Tahun:</strong>
                                                    <p>{{ $training->year ?? '-' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="detail-item"><strong>Penyelenggara:</strong>
                                                    <p>{{ $training->held_by ?? '-' }}</p>
                                                </div>
                                                <div class="detail-item"><strong>Peringkat/Sertifikat:</strong>
                                                    <p>{{ $training->grade ?? '-' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>Tidak ada pengalaman kursus atau training.</p>
                            @endif

                            {{-- Dynamic Section: Languages --}}
                            <h3 class="section-header">XI. Bahasa Asing yang Dikuasai</h3>
                            @if ($applicant->languages->isNotEmpty())
                                @foreach ($applicant->languages as $language)
                                    <div class="detail-card mb-3 bg-light">
                                        <h5 class="sub-section-header">Bahasa #{{ $loop->iteration }} -
                                            {{ $language->language_name ?? 'N/A' }}</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="detail-item"><strong>Mendengar:</strong>
                                                    <p>{{ $language->listening_proficiency ?? '-' }}</p>
                                                </div>
                                                <div class="detail-item"><strong>Membaca:</strong>
                                                    <p>{{ $language->reading_proficiency ?? '-' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="detail-item"><strong>Berbicara:</strong>
                                                    <p>{{ $language->speaking_proficiency ?? '-' }}</p>
                                                </div>
                                                <div class="detail-item"><strong>Menulis:</strong>
                                                    <p>{{ $language->written_proficiency ?? '-' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>Tidak ada data bahasa asing yang dikuasai.</p>
                            @endif

                            {{-- Dynamic Section: Computer Skills --}}
                            <h3 class="section-header">XII. Keterampilan Komputer</h3>
                            @if ($applicant->computerSkills->isNotEmpty())
                                @foreach ($applicant->computerSkills as $skill)
                                    <div class="detail-card mb-3 bg-light">
                                        <h5 class="sub-section-header">Keterampilan #{{ $loop->iteration }}</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="detail-item"><strong>Nama Keterampilan:</strong>
                                                    <p>{{ $skill->skill_name ?? '-' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="detail-item"><strong>Tingkat Kuasai:</strong>
                                                    <p>{{ $skill->proficiency ?? '-' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>Tidak ada data keterampilan komputer.</p>
                            @endif

                            {{-- Dynamic Section: Publications --}}
                            <h3 class="section-header">XIII. Publikasi</h3>
                            @if ($applicant->publications->isNotEmpty())
                                @foreach ($applicant->publications as $publication)
                                    <div class="detail-card mb-3 bg-light">
                                        <h5 class="sub-section-header">Publikasi #{{ $loop->iteration }}</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="detail-item"><strong>Judul:</strong>
                                                    <p>{{ $publication->publication_title ?? '-' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="detail-item"><strong>Tipe:</strong>
                                                    <p>{{ $publication->publication_type ?? '-' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>Tidak ada data publikasi.</p>
                            @endif

                            {{-- Dynamic Section: Work Experience --}}
                            <h3 class="section-header">XIV. Pengalaman Kerja</h3>
                            @if ($applicant->workExperience->isNotEmpty())
                                @foreach ($applicant->workExperience as $work)
                                    <div class="detail-card mb-3 bg-light">
                                        <h5 class="sub-section-header">{{ $work->company_name ?? 'N/A' }}</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="detail-item"><strong>Periode:</strong>
                                                    <p>{{ $work->period_start_date ? \Carbon\Carbon::parse($work->period_start_date)->format('d M Y') : '-' }}
                                                        -
                                                        {{ $work->period_end_date ? \Carbon\Carbon::parse($work->period_end_date)->format('d M Y') : 'Sekarang' }}
                                                    </p>
                                                </div>
                                                <div class="detail-item"><strong>Alamat Perusahaan:</strong>
                                                    <p>{{ $work->company_address ?? '-' }}</p>
                                                </div>
                                                <div class="detail-item"><strong>No. Telepon Perusahaan:</strong>
                                                    <p>{{ $work->company_phone_number ?? '-' }}</p>
                                                </div>
                                                <div class="detail-item"><strong>Jabatan Awal:</strong>
                                                    <p>{{ $work->first_role_title ?? '-' }}</p>
                                                </div>
                                                <div class="detail-item"><strong>Jabatan Terakhir:</strong>
                                                    <p>{{ $work->last_role_title ?? '-' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="detail-item"><strong>Nama Atasan Langsung:</strong>
                                                    <p>{{ $work->direct_supervisor_name ?? '-' }}</p>
                                                </div>
                                                <div class="detail-item"><strong>Alasan Berhenti:</strong>
                                                    <p>{{ $work->resignation_reason ?? '-' }}</p>
                                                </div>
                                                <div class="detail-item"><strong>Gaji Terakhir:</strong>
                                                    <p>{{ $work->last_salary ?? '-' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>Tidak ada pengalaman kerja.</p>
                            @endif

                            {{-- Dynamic Section: Work Achievements --}}
                            <h3 class="section-header">XV. Prestasi Kerja</h3>
                            @if ($applicant->workAchievements->isNotEmpty())
                                @foreach ($applicant->workAchievements as $achievement)
                                    <div class="detail-card mb-3 bg-light">
                                        <h5 class="sub-section-header">Prestasi #{{ $loop->iteration }}</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="detail-item"><strong>Deskripsi:</strong>
                                                    <p>{{ $achievement->achievement_description ?? '-' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="detail-item"><strong>Tahun:</strong>
                                                    <p>{{ $achievement->year ?? '-' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>Tidak ada prestasi kerja.</p>
                            @endif

                            {{-- Section: Health Declaration --}}
                            <h3 class="section-header">XVI. Riwayat Kesehatan</h3>
                            @if ($applicant->healthDeclaration)
                                <div class="detail-card mb-3 bg-light">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="detail-item"><strong>Berat Badan:</strong>
                                                <p>{{ $applicant->healthDeclaration->weight_kg ?? '-' }} kg</p>
                                            </div>
                                            <div class="detail-item"><strong>Tinggi Badan:</strong>
                                                <p>{{ $applicant->healthDeclaration->height_cm ?? '-' }} cm</p>
                                            </div>
                                            <div class="detail-item"><strong>Memiliki Kondisi Medis:</strong>
                                                <p>{{ ($applicant->healthDeclaration->has_medical_condition ?? null) === 1 ? 'Ya' : (($applicant->healthDeclaration->has_medical_condition ?? null) === 0 ? 'Tidak' : '-') }}
                                                </p>
                                            </div>
                                            @if (($applicant->healthDeclaration->has_medical_condition ?? null) === 1)
                                                <div class="detail-item"><strong>Penjelasan Kondisi Medis:</strong>
                                                    <p>{{ $applicant->healthDeclaration->medical_condition_explanation ?? '-' }}
                                                    </p>
                                                </div>
                                            @endif
                                            <div class="detail-item"><strong>Mengundurkan Diri Karena
                                                    Kesehatan:</strong>
                                                <p>{{ ($applicant->healthDeclaration->resigned_due_to_health ?? null) === 1 ? 'Ya' : (($applicant->healthDeclaration->resigned_due_to_health ?? null) === 0 ? 'Tidak' : '-') }}
                                                </p>
                                            </div>
                                            @if (($applicant->healthDeclaration->resigned_due_to_health ?? null) === 1)
                                                <div class="detail-item"><strong>Penjelasan Mundur Karena
                                                        Kesehatan:</strong>
                                                    <p>{{ $applicant->healthDeclaration->resigned_due_to_health_explanation ?? '-' }}
                                                    </p>
                                                </div>
                                            @endif
                                            <div class="detail-item"><strong>Gagal Tes Pra-Kerja:</strong>
                                                <p>{{ ($applicant->healthDeclaration->failed_pre_employment_exam ?? null) === 1 ? 'Ya' : (($applicant->healthDeclaration->failed_pre_employment_exam ?? null) === 0 ? 'Tidak' : '-') }}
                                                </p>
                                            </div>
                                            @if (($applicant->healthDeclaration->failed_pre_employment_exam ?? null) === 1)
                                                <div class="detail-item"><strong>Penjelasan Gagal Tes
                                                        Pra-Kerja:</strong>
                                                    <p>{{ $applicant->healthDeclaration->failed_pre_employment_exam_explanation ?? '-' }}
                                                    </p>
                                                </div>
                                            @endif
                                            <div class="detail-item"><strong>Sedang Jalani Pengobatan/Operasi:</strong>
                                                <p>{{ ($applicant->healthDeclaration->undergoing_treatment_or_surgery ?? null) === 1 ? 'Ya' : (($applicant->healthDeclaration->undergoing_treatment_or_surgery ?? null) === 0 ? 'Tidak' : '-') }}
                                                </p>
                                            </div>
                                            @if (($applicant->healthDeclaration->undergoing_treatment_or_surgery ?? null) === 1)
                                                <div class="detail-item"><strong>Penjelasan
                                                        Pengobatan/Operasi:</strong>
                                                    <p>{{ $applicant->healthDeclaration->treatment_or_surgery_explanation ?? '-' }}
                                                    </p>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <div class="detail-item"><strong>Di Bawah Pengawasan Medis:</strong>
                                                <p>{{ ($applicant->healthDeclaration->under_medical_supervision ?? null) === 1 ? 'Ya' : (($applicant->healthDeclaration->under_medical_supervision ?? null) === 0 ? 'Tidak' : '-') }}
                                                </p>
                                            </div>
                                            @if (($applicant->healthDeclaration->under_medical_supervision ?? null) === 1)
                                                <div class="detail-item"><strong>Penjelasan Pengawasan Medis:</strong>
                                                    <p>{{ $applicant->healthDeclaration->medical_supervision_explanation ?? '-' }}
                                                    </p>
                                                </div>
                                            @endif
                                            <div class="detail-item"><strong>Konsumsi Obat Rutin:</strong>
                                                <p>{{ ($applicant->healthDeclaration->on_regular_medication ?? null) === 1 ? 'Ya' : (($applicant->healthDeclaration->on_regular_medication ?? null) === 0 ? 'Tidak' : '-') }}
                                                </p>
                                            </div>
                                            @if (($applicant->healthDeclaration->on_regular_medication ?? null) === 1)
                                                <div class="detail-item"><strong>Penjelasan Obat Rutin:</strong>
                                                    <p>{{ $applicant->healthDeclaration->regular_medication_explanation ?? '-' }}
                                                    </p>
                                                </div>
                                            @endif
                                            <div class="detail-item"><strong>Memiliki Alergi:</strong>
                                                <p>{{ ($applicant->healthDeclaration->has_allergies ?? null) === 1 ? 'Ya' : (($applicant->healthDeclaration->has_allergies ?? null) === 0 ? 'Tidak' : '-') }}
                                                </p>
                                            </div>
                                            @if (($applicant->healthDeclaration->has_allergies ?? null) === 1)
                                                <div class="detail-item"><strong>Penjelasan Alergi:</strong>
                                                    <p>{{ $applicant->healthDeclaration->allergies_explanation ?? '-' }}
                                                    </p>
                                                </div>
                                            @endif
                                            <div class="detail-item"><strong>Absen 12 Bulan Karena Kesehatan:</strong>
                                                <p>{{ ($applicant->healthDeclaration->absent_due_to_health_12_months ?? null) === 1 ? 'Ya' : (($applicant->healthDeclaration->absent_due_to_health_12_months ?? null) === 0 ? 'Tidak' : '-') }}
                                                </p>
                                            </div>
                                            @if (($applicant->healthDeclaration->absent_due_to_health_12_months ?? null) === 1)
                                                <div class="detail-item"><strong>Penjelasan Absen Kesehatan:</strong>
                                                    <p>{{ $applicant->healthDeclaration->absent_due_to_health_explanation ?? '-' }}
                                                    </p>
                                                </div>
                                            @endif
                                            <div class="detail-item"><strong>Pernah Alami Kecelakaan:</strong>
                                                <p>{{ ($applicant->healthDeclaration->had_accident ?? null) === 1 ? 'Ya' : (($applicant->healthDeclaration->had_accident ?? null) === 0 ? 'Tidak' : '-') }}
                                                </p>
                                            </div>
                                            @if (($applicant->healthDeclaration->had_accident ?? null) === 1)
                                                <div class="detail-item"><strong>Penjelasan Kecelakaan:</strong>
                                                    <p>{{ $applicant->healthDeclaration->accident_explanation ?? '-' }}
                                                    </p>
                                                </div>
                                            @endif
                                            <div class="detail-item"><strong>Sedang Hamil (jika Perempuan):</strong>
                                                <p>{{ ($applicant->healthDeclaration->is_pregnant ?? null) === 1 ? 'Ya' : (($applicant->healthDeclaration->is_pregnant ?? null) === 0 ? 'Tidak' : '-') }}
                                                </p>
                                            </div>
                                            @if (($applicant->healthDeclaration->is_pregnant ?? null) === 1)
                                                <div class="detail-item"><strong>Usia Kehamilan:</strong>
                                                    <p>{{ $applicant->healthDeclaration->pregnancy_week ?? '-' }}
                                                        minggu</p>
                                                </div>
                                            @endif
                                            <div class="detail-item"><strong>Persetujuan Deklarasi Kesehatan:</strong>
                                                <p>{{ ($applicant->healthDeclaration->declaration_agreed ?? null) === 1 ? 'Disetujui' : (($applicant->healthDeclaration->declaration_agreed ?? null) === 0 ? 'Tidak Disetujui' : '-') }}
                                                </p>
                                            </div>
                                            <div class="detail-item"><strong>Tanggal Deklarasi:</strong>
                                                <p>{{ $applicant->healthDeclaration->declaration_date ? \Carbon\Carbon::parse($applicant->healthDeclaration->declaration_date)->format('d M Y') : '-' }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <p>Tidak ada data riwayat kesehatan.</p>
                            @endif

                            <h3 class="section-header">XVII. Sumber Informasi Lowongan</h3>
                            <div class="detail-item">
                                <strong>Sumber:</strong>
                                <p>{{ $applicant->job_vacancy_source ?? '-' }}</p>
                            </div>

                            <div class="btn-group">
                                <a href="{{ route('admin.applicants.edit', $applicant->id) }}"
                                    class="btn btn-warning btn-sm">Edit Pelamar</a>
                                <form action="{{ route('admin.applicants.destroy', $applicant->id) }}"
                                    method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus pelamar ini?')">Hapus
                                        Pelamar</button>
                                </form>
                                {{-- TOMBOL PRINT BARU --}}
                                <a href="{{ route('admin.applicants.print_word', $applicant->id) }}"
                                    class="btn btn-primary btn-sm" target="_blank">Print Dokumen</a>
                                {{-- AKHIR TOMBOL PRINT BARU --}}
                                <a href="{{ route('admin.applicants.index') }}"
                                    class="btn btn-secondary btn-sm">Kembali ke Daftar Pelamar</a>
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
