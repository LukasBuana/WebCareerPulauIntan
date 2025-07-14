<!DOCTYPE html>
<html>
<head>
    <title>Form Aplikasi Kandidat Karyawan</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            font-size: 9pt;
            margin: 20mm; /* Adjust margins to match your PDF */
            line-height: 1.3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 5px; /* Spacing between tables/sections */
        }
        table, th, td {
            border: 1px solid black;
        }
        td {
            padding: 5px 8px; /* Padding inside cells */
            text-align: left;
            vertical-align: top;
            word-wrap: break-word; /* Ensure long text wraps */
        }
        .header {
            font-weight: bold;
            background-color: #f0f0f0; /* Light grey background for headers if desired */
        }
        .small-text {
            font-size: 7.5pt;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .font-bold { font-weight: bold; }
        .uppercase { text-transform: uppercase; }

        /* Specific Layout Adjustments for Main Data Table (I. DATA DIRI) */
        .personal-data-table td:nth-child(1) { width: 35%; } /* Label column */
        .personal-data-table td:nth-child(2) { width: 45%; } /* Value column (for Name) */
        .personal-data-table td:nth-child(3) { width: 20%; } /* L/P* column */
        /* For colspan rows (like address), adjust widths if needed based on combined space */

        /* Specific styles for Status Pernikahan checkboxes */
        .checkbox-container {
            display: block; /* Ensures checkbox and label are on their own line */
            margin-bottom: 3px;
        }
        .checkbox-box {
            display: inline-block;
            width: 10px; /* Size of the square checkbox */
            height: 10px;
            border: 1px solid black;
            vertical-align: middle;
            margin-right: 5px;
            text-align: center;
            line-height: 10px; /* Vertically center the checkmark */
            font-size: 8pt; /* Size of the checkmark */
        }

        /* Styles for Family Member Table (II. DATA KELUARGA) */
        .family-table td:nth-child(1) { width: 20%; } /* HUBUGAN KELUARGA */
        .family-table td:nth-child(2) { width: 25%; } /* NAMA */
        .family-table td:nth-child(3) { width: 5%; } /* L/P */
        .family-table td:nth-child(4) { width: 20%; } /* TEMPAT/TGL LAHIR */
        .family-table td:nth-child(5) { width: 15%; } /* PENDIDIKAN */
        .family-table td:nth-child(6) { width: 15%; } /* PEKERJAAN */

        /* Styles for Emergency Contact (inline-block for placement) */
        .emergency-item {
            margin-bottom: 5px;
        }
        .emergency-label {
            display: inline-block;
            width: 120px; /* Adjust as needed */
        }
        .emergency-value {
            display: inline-block;
            border-bottom: 1px solid black;
            width: calc(100% - 125px); /* Fill remaining space */
        }

        /* Styles for Contact Person Table */
        .contact-person-table td:nth-child(1) { width: 15%; } /* KETERANGAN */
        .contact-person-table td:nth-child(2) { width: 20%; } /* NAMA */
        .contact-person-table td:nth-child(3) { width: 5%; }  /* L/P */
        .contact-person-table td:nth-child(4) { width: 25%; } /* Alamat */
        .contact-person-table td:nth-child(5) { width: 15%; } /* NO TELEPON */
        .contact-person-table td:nth-child(6) { width: 10%; } /* HUBUNGAN */
        .contact-person-table td:nth-child(7) { width: 10%; } /* PEKERJAAN */

        /* Styles for Educational Background Table */
        .education-table td:nth-child(1) { width: 25%; } /* JENJANG PENDIDIKAN */
        .education-table td:nth-child(2) { width: 30%; } /* NAMA SEKOLAH */
        .education-table td:nth-child(3) { width: 15%; } /* PERIODE */
        .education-table td:nth-child(4) { width: 20%; } /* JURUSAN */
        .education-table td:nth-child(5) { width: 10%; } /* PERINGKAT */

        /* Styles for Organizational Experience Table */
        .organization-table td:nth-child(1) { width: 35%; } /* NAMA ORGANISASI */
        .organization-table td:nth-child(2) { width: 45%; } /* JABATAN DI DALAM ORGANISASI */
        .organization-table td:nth-child(3) { width: 20%; } /* PERIODE MENJABAT */

        /* Styles for Training & Courses Table */
        .training-table td:nth-child(1) { width: 5%; }  /* NO */
        .training-table td:nth-child(2) { width: 35%; } /* NAMA TRAINING */
        .training-table td:nth-child(3) { width: 15%; } /* TAHUN */
        .training-table td:nth-child(4) { width: 30%; } /* PENYELENGGARA */
        .training-table td:nth-child(5) { width: 15%; } /* PERINGKAT */

        /* Styles for Language Table */
        .language-table td:nth-child(1) { width: 5%; }  /* NO */
        .language-table td:nth-child(2) { width: 20%; } /* JENIS BAHASA */
        .language-table td:nth-child(3),
        .language-table td:nth-child(4),
        .language-table td:nth-child(5),
        .language-table td:nth-child(6) { width: 18.75%; } /* MENDENGAR, MEMBACA, BERBICARA, MENULIS */

        /* Styles for Computer Skills */
        .computer-skill-grid {
            display: table; /* Simulate table for alignment */
            width: 100%;
        }
        .computer-skill-row {
            display: table-row;
        }
        .computer-skill-cell {
            display: table-cell;
            width: 25%; /* Adjust to make 4 columns */
            padding: 2px 5px;
            border: 1px solid black;
            box-sizing: border-box; /* Include padding and border in the width */
        }
        .computer-skill-label { font-weight: bold; }

        /* Styles for Working Experience */
        .work-exp-table td:nth-child(1) { width: 30%; } /* Label */
        .work-exp-table td:nth-child(2) { width: 70%; } /* Value */

        /* Styles for Questions (X. LAIN-LAIN) */
        .questions-table td:nth-child(1) { width: 5%; text-align: center; } /* No */
        .questions-table td:nth-child(2) { width: 60%; } /* PERTANYAAN */
        .questions-table td:nth-child(3) { width: 10%; text-align: center; } /* YA/TIDAK */
        .questions-table td:nth-child(4) { width: 25%; } /* PENJELASAN */

        /* Health Declaration Table */
        .health-decl-table td:nth-child(1) { width: 5%; } /* No */
        .health-decl-table td:nth-child(2) { width: 75%; } /* Question */
        .health-decl-table td:nth-child(3) { width: 20%; text-align: center; } /* Yes/No */


        /* Page break for multiple pages */
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>

    <div class="header-section">
        <div style="float: left; width: 100px; font-weight: bold;">
            
        </div>
        <div style="float: right; font-weight: bold;">CONFIDENTIAL [cite: 2]</div>
        <div style="clear: both;"></div>
    </div>

    <h2 class="text-center font-bold" style="margin-top: 15px; margin-bottom: 0;">FORM APLIKASI KANDIDAT KARYAWAN [cite: 3]</h2>
    <p class="text-center" style="margin-top: 0; margin-bottom: 10px;">(APPLICATION FORM) [cite: 4]</p>

    <div style="width: 80px; height: 100px; border: 1px solid black; float: right; text-align: center; line-height: 20px; font-size: 8pt;">
        Pas Foto<br> [cite: 5]
        3x4 [cite: 6]
    </div>
    <div style="clear: both;"></div> {{-- Clear the float for subsequent content --}}

    <p style="font-size: 8pt; margin-top: 10px;">
        (Isilah Form ini dengan lengkap dan data yang benar. Isilah dengan huruf balok. [cite: 7] <br>
        Please fill the form completely with valid data & use the capital letter) [cite: 7]
    </p>

    <h3>I. DATA DIRI KANDIDAT KARYAWAN (PERSONAL DATA) [cite: 8]</h3>
    <table class="personal-data-table">
        <tr>
            <td>Nama Lengkap (Full Name) [cite: 9]</td>
            <td class="uppercase">{{ $name ?? '' }}</td>
            <td class="text-right">(L/P*) {{ strtoupper($gender ?? '') }}</td>
        </tr>
        <tr>
            <td>Tempat / Tgl & thn Lahir<br><span class="small-text">(Place & Date of Birth)</span> [cite: 9]</td>
            <td colspan="2">{{ $place_date_of_birth ?? '' }}</td>
        </tr>
        <tr>
            <td>Alamat sesuai KTP & Kode Pos<br><span class="small-text">(Permanent Address)</span> [cite: 9]</td>
            <td colspan="2" class="uppercase">{{ $address_ktp ?? '' }}</td>
        </tr>
        <tr>
            <td>Alamat sekarang & Kode Pos<br><span class="small-text">(Permanent Address)</span> [cite: 9]</td>
            <td colspan="2" class="uppercase">{{ $address_now ?? '' }}</td>
        </tr>
        <tr>
            <td>Telepon & HP (Phone) [cite: 9]</td>
            <td colspan="2">{{ $phone ?? '' }}</td>
        </tr>
        <tr>
            <td>Alamat E-mail (E-mail Address) [cite: 9]</td>
            <td colspan="2">{{ $email ?? '' }}</td>
        </tr>
        <tr>
            <td>Alamat Tinggal Orang Tua & Kode Pos<br><span class="small-text">(Parents Permanent Address)</span> [cite: 9]</td>
            <td colspan="2" class="uppercase">{{ $parents_address ?? '' }}</td>
        </tr>
        <tr>
            <td>Agama (Religion) [cite: 9]</td>
            <td colspan="2">{{ $religion ?? '' }}</td>
        </tr>
        <tr>
            <td>No KTP/Passport (ID/Passport Number) [cite: 9]</td>
            <td colspan="2">{{ $id_number ?? '' }}</td>
        </tr>
        <tr>
            <td>Blood Type: O/AB/A/B <span class="small-text">(pilih salah satu / please choose one)</span> [cite: 9]</td>
            <td colspan="2">{{ $blood_type ?? '' }}</td>
        </tr>
    </table>

    <table style="width: 100%;">
        <tr>
            <td style="width: 35%;">Status Pernikahan (Marital Status) <br><span class="small-text">(pilih salah satu / please choose one)</span> [cite: 11]</td>
            <td style="width: 65%;">
                <div class="checkbox-container">
                    <span class="checkbox-box">{{ ($marital_status ?? '') == 'single' ? '&#10003;' : '' }}</span> Belum menikah/single [cite: 12]
                </div>
                <div class="checkbox-container">
                    <span class="checkbox-box">{{ ($marital_status ?? '') == 'married' ? '&#10003;' : '' }}</span> Menikah/ married sejak tanggal {{ $married_since_date ?? '' }} [cite: 13]
                </div>
                <div class="checkbox-container">
                    <span class="checkbox-box">{{ ($marital_status ?? '') == 'widow/widower' ? '&#10003;' : '' }}</span> Janda- Duda/widdower-widdow sejak tanggal {{ $widow_since_date ?? '' }} [cite: 14]
                </div>
            </td>
        </tr>
        <tr>
            <td>No. SIM(License Number): [cite: 17]</td>
            <td>{{ $sim_number ?? '' }} Expired: {{ $sim_expired ?? '' }} [cite: 18]</td>
        </tr>
        <tr>
            <td>No. BPJS [cite: 19]</td>
            <td>{{ $bpjs_number ?? '' }}</td>
        </tr>
        <tr>
            <td>No. NPWP [cite: 20]</td>
            <td>{{ $npwp_number ?? '' }}</td>
        </tr>
        <tr>
            <td>Sumber Informasi Lowongan<br><span class="small-text">(Job Vacancy Information)</span> [cite: 21]</td>
            <td>{{ $job_info_source ?? '' }}</td>
        </tr>
    </table>

    <h3>II. DATA KELUARGA (FAMILY MEMBER) [cite: 23]</h3>
    <p>Data Tanggungan (Suami/Istri jika sudah menikah)/ (Dependent Data) [cite: 24]</p>
    <table class="family-table">
        <thead>
            <tr>
                <td>HUBUGAN KELUARGA<br>(Relationship) [cite: 25]</td>
                <td>NAMA<br>(Name) [cite: 25]</td>
                <td>L/P<br>(M/F) [cite: 25]</td>
                <td>TEMPAT/TGL LAHIR<br>(Place/Date of Birth) [cite: 25]</td>
                <td>PENDIDIKAN<br>(Education) [cite: 25]</td>
                <td>PEKERJAAN (Occupation) [cite: 25]</td>
            </tr>
        </thead>
        <tbody>
            @foreach($family_dependents as $dependent)
            <tr>
                <td>{{ $dependent['relationship'] ?? '' }}</td>
                <td class="uppercase">{{ $dependent['name'] ?? '' }}</td>
                <td class="uppercase">{{ $dependent['gender'] ?? '' }}</td>
                <td>{{ $dependent['dob'] ?? '' }}</td>
                <td>{{ $dependent['education'] ?? '' }}</td>
                <td>{{ $dependent['occupation'] ?? '' }}</td>
            </tr>
            @endforeach
            @for($i = count($family_dependents); $i < 5; $i++)
            <tr>
                <td>{{ $i == 0 ? 'Suami / Istri (Spouse)' : 'Anak ke ' . ($i) . ' (Children)' }}</td>
                <td></td><td></td><td></td><td></td><td></td>
            </tr>
            @endfor
        </tbody>
    </table>

    <div style="text-align: right; font-size: 8pt; margin-top: 5px;">
        PI-FM-13-02-R5 [cite: 26] <span style="margin-left: 10px;">Page 1</span> [cite: 27]
    </div>

    <div class="page-break"></div>

    <div class="header-section">
        <div style="float: left; width: 100px; font-weight: bold;">PULAUINTAN [cite: 28]</div>
        <div style="float: right; font-weight: bold;">CONFIDENTIAL [cite: 29]</div>
        <div style="clear: both;"></div>
    </div>

    <h3 style="margin-top: 15px;">Anggota keluarga yang dapat dihubungi dalam keadaan darurat (Emergency Information Data): [cite: 30]</h3>
    <div class="emergency-item">
        <span class="emergency-label">Nama (Name) : [cite: 31]</span>
        <span class="emergency-value uppercase">{{ $emergency_contact['name'] ?? '' }}</span>
    </div>
    <div class="emergency-item">
        <span class="emergency-label">Alamat (Address) : [cite: 32, 33]</span>
        <span class="emergency-value uppercase">{{ $emergency_contact['address'] ?? '' }}</span>
    </div>
    <div class="emergency-item">
        <span class="emergency-label">Telp (Phone Number): [cite: 34]</span>
        <span class="emergency-value">{{ $emergency_contact['phone'] ?? '' }}</span>
    </div>
    <div class="emergency-item">
        <span class="emergency-label">Hubungan dengan Anda (Relationship): [cite: 35]</span>
        <span class="emergency-value">{{ $emergency_contact['relationship'] ?? '' }}</span>
    </div>

    <h3 style="margin-top: 20px;">Susunan keluarga, termasuk anda (please describe your family member include yourself) [cite: 36]</h3>
    <table class="family-table">
        <thead>
            <tr>
                <td>HUBUGAN KELUARGA<br>(Relationship) [cite: 37]</td>
                <td>NAMA<br>(Name) [cite: 37]</td>
                <td>L/P<br>(M/F) [cite: 37]</td>
                <td>TEMPAT/TGL LAHIR<br>(Place/Date of Birth) [cite: 37]</td>
                <td>PENDIDIKAN<br>(Education) [cite: 37]</td>
                <td>PEKERJAAN<br>(Occupation) [cite: 37]</td>
            </tr>
        </thead>
        <tbody>
            @foreach($family_members_full as $member)
            <tr>
                <td>{{ $member['relationship'] ?? '' }}</td>
                <td class="uppercase">{{ $member['name'] ?? '' }}</td>
                <td class="uppercase">{{ $member['gender'] ?? '' }}</td>
                <td>{{ $member['dob'] ?? '' }}</td>
                <td>{{ $member['education'] ?? '' }}</td>
                <td>{{ $member['occupation'] ?? '' }}</td>
            </tr>
            @endforeach
            @for($i = count($family_members_full); $i < 6; $i++)
            <tr>
                <td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
            @endfor
        </tbody>
    </table>

    <h3 style="margin-top: 20px;">Sebutkan nama 2 anggota keluarga & 2 teman anda yang dapat kami hubungi (please mention your contact person) [cite: 38]</h3>
    <table class="contact-person-table">
        <thead>
            <tr>
                <td>KETERANGAN<br>(Notes) [cite: 39]</td>
                <td>NAMA<br>(Name) [cite: 39]</td>
                <td>L/P<br>(M/F) [cite: 39]</td>
                <td>Alamat<br>(Address) [cite: 39]</td>
                <td>NO TELEPON<br>(Phone No) [cite: 39]</td>
                <td>HUBUNGAN<br>(Relationship) [cite: 39]</td>
                <td>PEKERJAAN<br>(Occupation) [cite: 39]</td>
            </tr>
        </thead>
        <tbody>
            @foreach($contact_persons as $contact)
            <tr>
                <td>{{ $contact['notes'] ?? '' }}</td>
                <td class="uppercase">{{ $contact['name'] ?? '' }}</td>
                <td class="uppercase">{{ $contact['gender'] ?? '' }}</td>
                <td class="uppercase">{{ $contact['address'] ?? '' }}</td>
                <td>{{ $contact['phone'] ?? '' }}</td>
                <td>{{ $contact['relationship'] ?? '' }}</td>
                <td>{{ $contact['occupation'] ?? '' }}</td>
            </tr>
            @endforeach
            @for($i = count($contact_persons); $i < 4; $i++)
            <tr>
                <td>{{ $i == 0 ? 'Keluarga 1' : ($i == 1 ? 'Keluarga 2' : ($i == 2 ? 'Teman 1' : 'Teman 2')) }}</td>
                <td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
            @endfor
        </tbody>
    </table>

    <h3 style="margin-top: 20px;">III. RIWAYAT PENDIDIKAN/ EDUCATIONAL BACKGROUND [cite: 40]</h3>
    <table class="education-table">
        <thead>
            <tr>
                <td>JENJANG PENDIDIKAN<br>(Level of Education) [cite: 41]</td>
                <td>NAMA SEKOLAH<br>(Institution) [cite: 41]</td>
                <td>PERIODE (Period) [cite: 41]</td>
                <td>JURUSAN (Major) [cite: 41]</td>
                <td>PERINGKAT<br>(Grade) [cite: 41]</td>
            </tr>
        </thead>
        <tbody>
            @foreach($educational_background as $edu)
            <tr>
                <td>{{ $edu['level'] ?? '' }}</td>
                <td class="uppercase">{{ $edu['institution'] ?? '' }}</td>
                <td>{{ $edu['period'] ?? '' }}</td>
                <td>{{ $edu['major'] ?? '' }}</td>
                <td>{{ $edu['grade'] ?? '' }}</td>
            </tr>
            @endforeach
            @for($i = count($educational_background); $i < 4; $i++)
            <tr>
                <td>{{ $i == 0 ? 'Sekolah Menengah Atas (High School)' : ($i == 1 ? 'Diploma (Diplome)' : ($i == 2 ? 'Universitas (University)' : 'Master (Master Degree)')) }}</td>
                <td></td><td></td><td></td><td></td>
            </tr>
            @endfor
        </tbody>
    </table>

    <h3 style="margin-top: 20px;">IV. PENGALAMAN ORGANISASI/ ORGANIZATIONAL EXPERIENCE [cite: 42]</h3>
    <table class="organization-table">
        <thead>
            <tr>
                <td>NAMA ORGANISASI<br>(Organization) [cite: 43]</td>
                <td>JABATAN DI DALAM ORGANISASI<br>(Title in Organization) [cite: 43]</td>
                <td>PERIODE MENJABAT<br>(Period) [cite: 43]</td>
            </tr>
        </thead>
        <tbody>
            @foreach($organizational_experience as $org)
            <tr>
                <td class="uppercase">{{ $org['organization'] ?? '' }}</td>
                <td>{{ $org['title'] ?? '' }}</td>
                <td>{{ $org['period'] ?? '' }}</td>
            </tr>
            @endforeach
            @if(count($organizational_experience) == 0)
            <tr><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td></tr>
            @endif
        </tbody>
    </table>

    <div style="text-align: right; font-size: 8pt; margin-top: 5px;">
        PI-FM-13-02-R5 [cite: 44] <span style="margin-left: 10px;">Page 2</span> [cite: 45]
    </div>

    <div class="page-break"></div>

    <div class="header-section">
        <div style="float: left; width: 100px; font-weight: bold;">PULAUINTAN [cite: 46]</div>
        <div style="float: right; font-weight: bold;">CONFIDENTIAL [cite: 49]</div>
        <div style="clear: both;"></div>
    </div>

    <h3 style="margin-top: 15px;">V. PENGALAMAN KURSUS & TRAINING/ TRAINING & COURSES EXPERIENCE [cite: 47]</h3>
    <table class="training-table">
        <thead>
            <tr>
                <td>NO [cite: 48]</td>
                <td>NAMA TRAINING<br>(Training & Course) [cite: 48]</td>
                <td>TAHUN<br>(Year) [cite: 48]</td>
                <td>PENYELENGGARA<br>(Held by) [cite: 48]</td>
                <td>PERINGKAT<br>(Grade) [cite: 48]</td>
            </tr>
        </thead>
        <tbody>
            @foreach($training_courses as $course)
            <tr>
                <td class="text-center">{{ $course['no'] ?? '' }}</td>
                <td class="uppercase">{{ $course['name'] ?? '' }}</td>
                <td>{{ $course['year'] ?? '' }}</td>
                <td class="uppercase">{{ $course['held_by'] ?? '' }}</td>
                <td>{{ $course['grade'] ?? '' }}</td>
            </tr>
            @endforeach
            @for($i = count($training_courses); $i < 3; $i++)
            <tr><td>{{ $i+1 }}</td><td></td><td></td><td></td><td></td></tr>
            @endfor
        </tbody>
    </table>

    <h3 style="margin-top: 20px;">VI. BAHASA ASING YANG DIKUASAI (Baik Sekali, Baik, Cukup, Kurang)/LANGUAGE (excellent, good, poor) [cite: 50]</h3>
    <table class="language-table">
        <thead>
            <tr>
                <td>NO [cite: 51]</td>
                <td>JENIS BAHASA<br>(Language) [cite: 51]</td>
                <td>MENDENGAR<br>(Listening) [cite: 51]</td>
                <td>MEMBACA<br>(Reading) [cite: 51]</td>
                <td>BERBICARA<br>(Speaking) [cite: 51]</td>
                <td>MENULIS<br>(Written) [cite: 51]</td>
            </tr>
        </thead>
        <tbody>
            @foreach($languages as $lang)
            <tr>
                <td class="text-center">{{ $lang['no'] ?? '' }}</td>
                <td class="uppercase">{{ $lang['language'] ?? '' }}</td>
                <td>{{ $lang['listening'] ?? '' }}</td>
                <td>{{ $lang['reading'] ?? '' }}</td>
                <td>{{ $lang['speaking'] ?? '' }}</td>
                <td>{{ $lang['written'] ?? '' }}</td>
            </tr>
            @endforeach
            @for($i = count($languages); $i < 3; $i++)
            <tr><td>{{ $i+1 }}</td><td></td><td></td><td></td><td></td><td></td></tr>
            @endfor
        </tbody>
    </table>

    <h3 style="margin-top: 20px;">VII. KETERAMPILAN KOMPUTER (Baik Sekali, Baik, Cukup, Kurang) / Computer Skill (excellent, good, poor) [cite: 52]</h3>
    <div class="computer-skill-grid">
        <div class="computer-skill-row">
            <div class="computer-skill-cell">1. <span class="computer-skill-label">Ms. Word</span>[cite: 53]: {{ $computer_skills['Ms. Word'] ?? '' }}</div>
            <div class="computer-skill-cell">5. <span class="computer-skill-label">ZWCAD</span>[cite: 53]: {{ $computer_skills['ZWCAD'] ?? '' }}</div>
        </div>
        <div class="computer-skill-row">
            <div class="computer-skill-cell">2. <span class="computer-skill-label">Ms. Excel</span>[cite: 53]: {{ $computer_skills['Ms. Excel'] ?? '' }}</div>
            <div class="computer-skill-cell">6. <span class="computer-skill-label">Photoshop/CorelDRAW</span>[cite: 53]: {{ $computer_skills['Photoshop/CorelDRAW'] ?? '' }}</div>
        </div>
        <div class="computer-skill-row">
            <div class="computer-skill-cell">3. <span class="computer-skill-label">Ms. Powerpoint</span>[cite: 53]: {{ $computer_skills['Ms. Powerpoint'] ?? '' }}</div>
            <div class="computer-skill-cell">7.</div>
        </div>
        <div class="computer-skill-row">
            <div class="computer-skill-cell">4. <span class="computer-skill-label">AutoCAD</span>[cite: 53]: {{ $computer_skills['AutoCAD'] ?? '' }}</div>
            <div class="computer-skill-cell">8.</div>
        </div>
    </div>

    <h3 style="margin-top: 20px;">Tulisan/karya Ilmiah yang pernah Saudara tulis (skripsi, artikel, buku, dsb) /Published scientific paper (thesis, article, book): [cite: 54]</h3>
    <p>a) {{ $scientific_papers[0] ?? '' }} [cite: 55]</p>
    <p>b) {{ $scientific_papers[1] ?? '' }} [cite: 56]</p>

    <h3 style="margin-top: 20px;">VIII. PENGALAMAN KERJA/ WORKING EXPERIENCE [cite: 57]</h3>
    <p>Tulislah pengalaman kerja Anda mulai dari pengalaman kerja yang terakhir : [cite: 58]</p>

    @foreach($working_experience as $index => $exp)
    @if($index < 3) {{-- Only show up to 3 experiences as per typical form length --}}
    <table class="work-exp-table" style="margin-top: {{ $index > 0 ? '15px' : '0' }};">
        <tr>
            <td>Nama Perusahaan (Company) [cite: 59, 68, 81]</td>
            <td><span class="uppercase">{{ $exp['company'] ?? '' }}</span></td>
        </tr>
        <tr>
            <td>Periode Kerja (dari s/d) (Period) [cite: 60, 69, 82]</td>
            <td>{{ $exp['period'] ?? '' }}</td>
        </tr>
        <tr>
            <td>Alamat Perusahaan (Company Address) [cite: 61, 70, 83]</td>
            <td class="uppercase">{{ $exp['address'] ?? '' }}</td>
        </tr>
        <tr>
            <td>No Telepon Perusahaan (Company Phone Number) [cite: 62, 71, 84]</td>
            <td>{{ $exp['phone'] ?? '' }}</td>
        </tr>
        <tr>
            <td>Jabatan Awal (First Role Title) [cite: 63, 72, 85]</td>
            <td>{{ $exp['first_role'] ?? '' }}</td>
        </tr>
        <tr>
            <td>Jabatan Terakhir (Last Role Title) [cite: 64, 73, 86]</td>
            <td>{{ $exp['last_role'] ?? '' }}</td>
        </tr>
        <tr>
            <td>Nama Atasan Langsung (Name of Direct Supervisor) [cite: 65, 77, 87]</td>
            <td>{{ $exp['supervisor_name'] ?? '' }}</td>
        </tr>
        <tr>
            <td>Alasan berhenti (Resignation Reason) [cite: 66, 78, 88]</td>
            <td>{{ $exp['resignation_reason'] ?? '' }}</td>
        </tr>
        <tr>
            <td>Gaji Terakhir (Last Salary) [cite: 67, 79, 89]</td>
            <td>{{ $exp['last_salary'] ?? '' }}</td>
        </tr>
        @if($index == 0) {{-- Duty description only for the last/current job --}}
        <tr>
            <td colspan="2">Uraikan secara singkat dan jelas tugas dan tanggung jawab anda pada jabatan yang terakhir (Please describe duties and responsibilities in your current or last position): [cite: 90]<br>
                <div style="min-height: 50px; border: 1px solid #ccc; padding: 5px; margin-top: 5px;">{{ $exp['duties'] ?? '' }}</div>
            </td>
        </tr>
        <tr>
            <td colspan="2">Gambarlah struktur organisasi pada posisi jabatan pekerjaan Anda yang terakhir (Please decribe the structure organization which shown your current last position) [cite: 91]<br>
                {{-- Anda bisa menempatkan gambar struktur organisasi di sini jika ada --}}
                <div style="min-height: 80px; border: 1px solid #ccc; padding: 5px; margin-top: 5px; text-align: center;">
                    {{-- <img src="{{ asset('path/to/org_chart.png') }}" style="max-width: 100px;"> --}}
                    [Tempat untuk gambar struktur organisasi]
                </div>
            </td>
        </tr>
        @endif
    </table>
    @endif
    @endforeach

    <div style="text-align: right; font-size: 8pt; margin-top: 5px;">
        PI-FM-13-02-R5 [cite: 74] <span style="margin-left: 10px;">Page 3</span> [cite: 75]
    </div>

    <div class="page-break"></div>

    <div class="header-section">
        <div style="float: left; width: 100px; font-weight: bold;">PULAUINTAN [cite: 76]</div>
        <div style="float: right; font-weight: bold;">CONFIDENTIAL [cite: 80]</div>
        <div style="clear: both;"></div>
    </div>

    {{-- If there are more work experiences on page 4, repeat the table structure --}}
    {{-- Assuming the first work experience section spanned across page 3 and 4,
         or there are second/third experiences on page 4.
         For this example, I'll assume the tables are full and flow naturally.
         Adjust based on your exact PDF structure for Page 4.
    --}}
    <h3 style="margin-top: 15px;">IX. PRESTASI KERJA/ WORK ACHIEVEMENT [cite: 92]</h3>
    <p>karya luar biasa yang pernah Saudara lakukan selama bekerja (misal: membangun proyek baru, merintis usaha, dsb) [cite: 93]</p>
    <table class="organization-table"> {{-- Reusing organization-table style for similar layout --}}
        <thead>
            <tr>
                <td>PRESTASI [cite: 94]</td>
                <td>TAHUN [cite: 97]</td>
            </tr>
        </thead>
        <tbody>
            @foreach($achievements as $ach)
            <tr>
                <td>{{ $ach['achievement'] ?? '' }}</td>
                <td>{{ $ach['year'] ?? '' }}</td>
            </tr>
            @endforeach
            {{-- Add empty rows if needed --}}
            @if(count($achievements) == 0)
            <tr><td></td><td></td></tr>
            @endif
        </tbody>
    </table>

    <div style="text-align: right; font-size: 8pt; margin-top: 5px;">
        PI-FM-13-02-R5 [cite: 95] <span style="margin-left: 10px;">Page 4</span> [cite: 96]
    </div>

    <div class="page-break"></div>

    <div class="header-section">
        <div style="float: left; width: 100px; font-weight: bold;">PULAUINTAN [cite: 98]</div>
        <div style="float: right; font-weight: bold;">CONFIDENTIAL [cite: 103]</div>
        <div style="clear: both;"></div>
    </div>

    <h3 style="margin-top: 15px;">X. LAIN-LAIN [cite: 99]</h3>
    <table class="questions-table">
        <thead>
            <tr>
                <td>No [cite: 100]</td>
                <td>PERTANYAAN<br>(QUESTION) [cite: 100]</td>
                <td>YA/TIDAK<br>(YES/NO) [cite: 100]</td>
                <td>PENJELASAN<br>(REMARKS) [cite: 100]</td>
            </tr>
        </thead>
        <tbody>
            @foreach([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20] as $q_num)
                <tr>
                    <td class="text-center">{{ $q_num }}</td>
                    <td>
                        @switch($q_num)
                            @case(1) Apakah anda pernah melamar di perusahaan ini sebelumnya. Kapan & sebagai apa? (Have you previously applied to this company / group? If so when & what position?) [cite: 100] @break
                            @case(2) Apakah saat ini anda melamar di perusahaan lain? Sebagai posisi apa? (Are you also aply to other company? If yes please mention the company & in what position?) [cite: 100] @break
                            @case(3) Apakah anda terikat kontrak dengan perusahaan tempat bekerja anda saat ini? (Are you under any contract agreement with other company?) [cite: 100] @break
                            @case(4) Apakah anda memiliki pekerjaan part time? Dimana dan sebagai apa? (Do you have any part time job?Please specify the name of the company & position held?) [cite: 100] @break
                            @case(5) Apakah anda keberatan bila kami meminta referensi pada perusahaan anda sebelumnya? (Do you have any objection if we contact your previous employer for background checking?) [cite: 100] @break
                            @case(6) Apakah anda memiliki teman atau saudara yang bekerja di group / perusahaan ini? Sebutkan nama dan hubungan dengan anda (Do you have any acquintance or relative employed by our company or group? Please mention your relationship) [cite: 100] @break
                            @case(7) Apakah anda pernah menjalani pemeriksaan Psikologis? Bilamana, dimana dan untuk tujuan apa? (Have you ever undergone psychological examination before? If so, when, where, for what purpose?) [cite: 100] @break
                            @case(8) Apakah anda pernah berurusan dengan polisi karena tindakan tertentu? (Have you ever been involved in any administrative civil or criminal case?) [cite: 100] @break
                            @case(9) Bila diterima apakah anda bersedia ditempatkan di berdasarkan kebutuhan perusahaan? (If you accepted by this company do you agree to be located as company needs?) [cite: 100] @break
                            @case(10) Apakah anda sanggup untuk digaji sesuai dengan standard perusahaan? (Are you able to be paid in accordance with our company standards?) [cite: 100] @break
                            @case(11) Apakah anda sanggup mengikuti jam kerja, peraturan dan tata tertib perusahaan? (Are you willing to comply with business hours, company rules and regulations?) <br> Apakah anda bersedia mengikuti pemeriksaan psikologi ? (Are you willing to take psychological examination?) <br> Apakah anda bersedia mengikuti pemeriksaan kesehatan? (Are you willing to take Medical Check Up?) [cite: 100] @break
                            @case(12) Apakah anda bersedia bertugas keluar kota? (Are you willing work out of town?) <br> Apakah anda bersedia dipindahkan (mutasi) ke kota/proyek lain? (Are you willing transfer to another city/project?) <br> Apakah anda bersedia di-demosi dengan alasan yang jelas? (Are you willing to be demoted for obvious reasons?) [cite: 100] @break
                            @case(13) Apakah lamaran anda dipengaruhi oleh keluarga, orang lain atau diri sendiri? (Is your application influenced by family, others or yourself?) [cite: 100] @break
                            @case(14) Apakah tugas pekerjaan yang sudah anda kuasai? (What kind of assignment/ competency that you improved?) [cite: 100] @break
                            @case(15) Jabatan atau bagian apa yang anda inginkan? (What position do you want?) [cite: 100] @break
                            @case(16) Besar gaji yang anda harapkan? (Please mention your expected salary) [cite: 100] @break
                            @case(17) Mengapa anda tertarik untuk bekerja di perusahaan ini? (Why do you interested apply to this company?) [cite: 100] @break
                            @case(18) Macam pekerjaan atau jabatan yang tidak sesuai dengan cita cita anda? Please describe any kind of jobs that do not fit to you?) [cite: 100] @break
                            @case(19) Bila diterima, kapan anda dapat mulai bekerja? (If you accepted by this company when can you start to work?) [cite: 100] @break
                            @case(20) Apabila anda diterima bekerja di perusahaan kami, kontribusi apa yang anda berikan untuk memajukan perusahaan? Jelaskan (If you are accepted working in our company, please explain what contribution you can give the company?) [cite: 100] @break
                        @endswitch
                    </td>
                    <td class="text-center">{{ $questions[$q_num]['answer'] ?? '' }}</td>
                    <td>{{ $questions[$q_num]['explanation'] ?? '' }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" style="text-align: right; border: none; padding-top: 20px;">
                    Jakarta, {{ $declaration_date ?? '' }} [cite: 100]
                </td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: right; border: none; padding-top: 50px;">
                    <span style="border-bottom: 1px solid black; padding-bottom: 3px;">{{ $applicant_name ?? '' }}</span> [cite: 100] <br>
                    (Pelamar/Applicant) [cite: 100]
                </td>
            </tr>
        </tbody>
    </table>

    <div style="text-align: right; font-size: 8pt; margin-top: 5px;">
        PI-FM-13-02-R5 [cite: 101] <span style="margin-left: 10px;">Page 5</span> [cite: 102]
    </div>

    <div class="page-break"></div>

    <div class="header-section">
        <div style="float: left; width: 100px; font-weight: bold;">PULAUINTAN [cite: 104]</div>
        <div style="float: right; font-weight: bold;">CONFIDENTIAL [cite: 105]</div>
        <div style="clear: both;"></div>
    </div>

    <h2 class="text-center font-bold" style="margin-top: 15px; margin-bottom: 0;">FORMULIR PERNYATAAN KESEHATAN PRA-KERJA [cite: 106]</h2>
    <p style="margin-top: 20px;">
        <span class="font-bold">No. KTP</span> [cite: 107] <span style="margin-left: 5px;">:</span> [cite: 108] <span style="border-bottom: 1px solid black; padding-bottom: 2px;">{{ $health_declaration['id_number'] ?? '' }}</span>
    </p>
    <p style="margin-top: 5px;">
        <span class="font-bold">Nama</span> [cite: 109] <span style="margin-left: 5px;">:</span> <span style="border-bottom: 1px solid black; padding-bottom: 2px;">{{ $health_declaration['name'] ?? '' }}</span>
    </p>
    <p style="margin-top: 5px;">
        <span class="font-bold">Berat badan</span> [cite: 110] <span style="margin-left: 5px;">:</span> <span style="border-bottom: 1px solid black; padding-bottom: 2px; width: 50px; display: inline-block;">{{ $health_declaration['weight'] ?? '' }}</span> kg [cite: 111]
        <span style="margin-left: 30px;"></span>
        <span class="font-bold">Tinggi badan</span> [cite: 112] <span style="margin-left: 5px;">:</span> [cite: 113] <span style="border-bottom: 1px solid black; padding-bottom: 2px; width: 50px; display: inline-block;">{{ $health_declaration['height'] ?? '' }}</span> cm [cite: 114]
    </p>

    <p style="font-size: 8pt; margin-top: 20px;">
        Semua pernyataan yang dibuat hanya digunakan untuk pihak PT. Pulauintan Bajaperkasa Konstruksi. [cite: 115] Pengungkapan penyakit/cacat tidak akan secara otomatis mendiskualifikasi Anda dari mendapatkan pekerjaan ini. [cite: 116] Tujuan utama dari penyataan kesehatan pra-kerja ini adalah untuk membantu Perusahaan untuk memastikan bahwa tidak ada personil yang ditempatkan dalam lingkungan atau diberikan tugas-tugas yang akan mengakibatkan cedera fisik atau mental. [cite: 117]
    </p>

    <table class="health-decl-table">
        <thead>
            <tr>
                <td colspan="3" class="text-center">Coret yang tidak perlu, Jika jawabannya YA agar memberikan penjelasan [cite: 118]</td>
            </tr>
        </thead>
        <tbody>
            @foreach([1,2,3,4,5,6,7,8,9] as $q_num)
                <tr>
                    <td class="text-center">{{ $q_num }}.</td>
                    <td>
                        @switch($q_num)
                            @case(1) Apakah Anda memiliki kondisi medis atau cacat yang dapat mempengaruhi kemampuan Anda dalam melakukan pekerjaan yang dilamar? [cite: 118] @break
                            @case(2) Apakah pernah Anda berhenti dari pekerjaan sebelumnya karena alasan kesehatan? [cite: 118] @break
                            @case(3) Apakah Anda pernah gagal dalam pemeriksaan kesehatan pra kerja / asuransi kesehatan, dll? [cite: 118] @break
                            @case(4) Apakah Anda sedang menjalani pengobatan / akan menjalani operasi? [cite: 118] @break
                            @case(5) Apakah Anda berada dibawah pengawasan medis? [cite: 118] @break
                            @case(6) Apakah Anda mengkonsumsi obat tertentu secara rutin? [cite: 118] @break
                            @case(7) Apakah Anda mempunyai alergi? [cite: 118] @break
                            @case(8) Dalam jangka waktu 12 bulan terakhir, apakah Anda pernah absen kerja dengan alasan kesehatan atau luka selama 2 minggu atau lebih? [cite: 118] @break
                            @case(9) Apakah Anda pernah mendapat kecelakaan? [cite: 118] @break
                        @endswitch
                    </td>
                    <td class="text-center">{{ ($health_declaration[$q_num]['answer'] ?? '') == 'Ya' ? 'Ya' : 'Tidak' }} [cite: 118]</td>
                </tr>
            @endforeach
            <tr>
                <td class="text-center">10.</td>
                <td>Hanya untuk kandidat perempuan: Apakah Anda sedang mengandung saat ini? {{ $health_declaration['pregnant_weeks'] ?? '' }} minggu [cite: 118] <br> Jika YA, [cite: 118]</td>
                <td class="text-center">{{ ($health_declaration[10]['answer'] ?? '') == 'Ya' ? 'Ya' : (($health_declaration[10]['answer'] ?? '') == 'Tidak' ? 'Tidak' : 'N/A') }} [cite: 118]</td>
            </tr>
        </tbody>
    </table>

    <p style="font-size: 8pt; margin-top: 20px;">
        Saya menyatakan dan menjamin bahwa semua informasi diatas adalah benar dan saya tidak menyembunyikan fakta yang sesungguhnya. [cite: 119, 121]
        Saya memahami apabila saya ditunjuk dan dikemudian hari ditemukan informasi yang saya buat tidak akurat atau informasi tidak relevan, saya bersedia dihilangkan haknya sebagai karyawan. [cite: 120]
        Saya memberikan kewenangan kepaa PT Pulauintan Bajaperkasa Konstruksi untuk menghubungi semua pihak yang bersangkutan untuk keperluan vertifikasi dan untuk mendapatkan informasi lainnya mengenai saya secara lisan maupun tertulis dari waktu ke waktu apabila hal itu dianggap perlu. [cite: 122]
        Apabila kemudian hari ditemukan bahwa data yang saya sampaikan di atas tidak benar dan/atau ada pemalsuan, maka Saya bersedia dihilangkan haknya sebagai karyawan PT Pulauintan Bajaperkasa Konstruksi dan dikenakan tuntutan perdata dan pidana sesuai ketentuan hokum dan perundang-undangan yang berlaku. [cite: 123]
    </p>

    <div style="margin-top: 50px;">
        <span style="border-bottom: 1px solid black; display: inline-block; width: 200px; height: 20px;"></span> <span style="margin-left: 50px;">Tanggal[cite: 128]:</span> <span style="border-bottom: 1px solid black; display: inline-block; width: 150px; height: 20px;">{{ $declaration_date ?? '' }}</span><br>
        <span style="display: block; margin-left: 0; margin-top: 5px;">Tanda Tangan [cite: 124]</span>
    </div>
    <div style="margin-top: 20px;">
        <span style="border-bottom: 1px solid black; display: inline-block; width: 200px; height: 20px;">{{ $health_declaration['name'] ?? '' }}</span><br>
        <span style="display: block; margin-left: 0; margin-top: 5px;">Nama Lengkap [cite: 125]</span>
    </div>


    <div style="text-align: right; font-size: 8pt; margin-top: 5px;">
        PI-FM-13-02-R5 [cite: 126] <span style="margin-left: 10px;">Page 6</span> [cite: 127]
    </div>

</body>
</html>