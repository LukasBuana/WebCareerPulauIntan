<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // <<< TAMBAHKAN BARIS INI


class JobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

        // Anda bisa menyalin semua INSERT statement di sini
        // Untuk multiple statements, gunakan DB::unprepared()
        DB::unprepared("
      
        
                -- Dummy Data untuk job_categories
            INSERT INTO job_categories (name, slug, description, created_at, updated_at) VALUES
            ('IT & Software', 'it-software', 'Pekerjaan yang berkaitan dengan pengembangan perangkat lunak, IT support, jaringan, dan data.', NOW(), NOW()),
            ('Engineering', 'engineering', 'Posisi di bidang teknik sipil, mesin, elektro, dan industri.', NOW(), NOW()),
            ('Marketing', 'marketing', 'Lowongan di bidang pemasaran digital, branding, riset pasar, dan komunikasi.', NOW(), NOW()),
            ('Human Resources', 'human-resources', 'Pekerjaan terkait manajemen sumber daya manusia, rekrutmen, dan pelatihan.', NOW(), NOW()),
            ('Finance & Accounting', 'finance-accounting', 'Posisi di bidang keuangan, akuntansi, audit, dan analisis finansial.', NOW(), NOW());

            -- Dummy Data untuk job_locations
            INSERT INTO job_locations (name, city, province, country, created_at, updated_at) VALUES
            ('Jakarta', 'Jakarta', 'DKI Jakarta', 'Indonesia', NOW(), NOW()),
            ('Bandung', 'Bandung', 'Jawa Barat', 'Indonesia',NOW(), NOW()),
            ('Yogyakarta', 'Yogyakarta', 'DI Yogyakarta', 'Indonesia', NOW(), NOW());

            -- Dummy Data untuk job_types
            INSERT INTO job_types (name, created_at, updated_at) VALUES
            ('Full-time', NOW(), NOW()),
            ('Part-time', NOW(), NOW()),
            ('Contract', NOW(), NOW()),
            ('Internship', NOW(), NOW());

            -- Dummy Data untuk skills
            INSERT INTO skills (name, created_at, updated_at) VALUES
            ('PHP', NOW(), NOW()),
            ('Laravel', NOW(), NOW()),
            ('SQL', NOW(), NOW()),
            ('JavaScript', NOW(), NOW()),
            ('React', NOW(), NOW()),
            ('Python', NOW(), NOW()),
            ('Project Management', NOW(), NOW()),
            ('Data Analysis', NOW(), NOW()),
            ('Digital Marketing', NOW(), NOW()),
            ('Recruitment', NOW(), NOW()),
            ('Financial Reporting', NOW(), NOW()),
            ('Leadership', NOW(), NOW()),
            ('Communication', NOW(), NOW());
        ");

        // Karena subquery (SELECT id FROM ...) tidak bisa langsung di DB::unprepared()
        // untuk table jobs dan pivot, lebih baik gunakan Eloquent atau query builder
        // di sini, atau jalankan sebagai script SQL terpisah.
        // Untuk contoh ini, saya akan menyertakan kode SQL lengkap sebagai seeder.
        // Jika Anda ingin ini dieksekusi sebagai satu blok, pastikan tidak ada komentar multi-line
        // di dalamnya yang bisa memecah perintah SQL untuk DB::unprepared().
        // Ini hanyalah contoh. Untuk produksi, lebih baik menggunakan Eloquent untuk seeding.

        // Misalnya untuk Jobs:
        DB::table('jobs')->insert([
            [
                'title' => 'Product Owner',
                'slug' => 'productowner',
                'job_category_id' => DB::table('job_categories')->where('name', 'Marketing')->first()->id,
                'job_location_id' => DB::table('job_locations')->where('name', 'Yogyakarta')->first()->id,
                'job_type_id' => DB::table('job_types')->where('name', 'Full-time')->first()->id,
                'description' => 'Kami mencari Legal Officer',
                'responsibilities' => 'Merancang, mengembangkan, dan memelihara aplikasi backend; Menulis kode yang bersih, terdokumentasi dengan baik, dan dapat diuji; Berkolaborasi dengan tim frontend dan DevOps; Melakukan code review dan memberikan masukan konstruktif.',
                'qualifications' => 'Pengalaman minimal 5 tahun dalam pengembangan backend; Mahir dengan PHP, Laravel, dan MySQL; Memahami prinsip-prinsip RESTful API dan arsitektur mikroservis; Pengalaman dengan Git, Docker, dan AWS/GCP.',
                'min_salary' => 8000000.00,
                'max_salary' => 10000000.00,
                'salary_currency' => 'IDR',
                'experience_level' => 'Senior',
                'education_level' => 'S1',
                'application_deadline' => '2025-08-31',
                'status' => 'Published',
                'is_featured' => TRUE,
                'views_count' => 150,
                'posted_by_user_id' => 1, // Pastikan user dengan ID 1 ada
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'title' => 'Legal Officer',
                'slug' => 'legalofficer',
                'job_category_id' => DB::table('job_categories')->where('name', 'Marketing')->first()->id,
                'job_location_id' => DB::table('job_locations')->where('name', 'Yogyakarta')->first()->id,
                'job_type_id' => DB::table('job_types')->where('name', 'Full-time')->first()->id,
                'description' => 'Kami mencari Legal Officer',
                'responsibilities' => 'Merancang, mengembangkan, dan memelihara aplikasi backend; Menulis kode yang bersih, terdokumentasi dengan baik, dan dapat diuji; Berkolaborasi dengan tim frontend dan DevOps; Melakukan code review dan memberikan masukan konstruktif.',
                'qualifications' => 'Pengalaman minimal 5 tahun dalam pengembangan backend; Mahir dengan PHP, Laravel, dan MySQL; Memahami prinsip-prinsip RESTful API dan arsitektur mikroservis; Pengalaman dengan Git, Docker, dan AWS/GCP.',
                'min_salary' => 8000000.00,
                'max_salary' => 10000000.00,
                'salary_currency' => 'IDR',
                'experience_level' => 'Senior',
                'education_level' => 'S1',
                'application_deadline' => '2025-08-31',
                'status' => 'Published',
                'is_featured' => TRUE,
                'views_count' => 150,
                'posted_by_user_id' => 1, // Pastikan user dengan ID 1 ada
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'title' => 'Web Developer',
                'slug' => 'webdeveloper',
                'job_category_id' => DB::table('job_categories')->where('name', 'Marketing')->first()->id,
                'job_location_id' => DB::table('job_locations')->where('name', 'Yogyakarta')->first()->id,
                'job_type_id' => DB::table('job_types')->where('name', 'Full-time')->first()->id,
                'description' => 'Kami mencari Legal Officer',
                'responsibilities' => 'Merancang, mengembangkan, dan memelihara aplikasi backend; Menulis kode yang bersih, terdokumentasi dengan baik, dan dapat diuji; Berkolaborasi dengan tim frontend dan DevOps; Melakukan code review dan memberikan masukan konstruktif.',
                'qualifications' => 'Pengalaman minimal 5 tahun dalam pengembangan backend; Mahir dengan PHP, Laravel, dan MySQL; Memahami prinsip-prinsip RESTful API dan arsitektur mikroservis; Pengalaman dengan Git, Docker, dan AWS/GCP.',
                'min_salary' => 8000000.00,
                'max_salary' => 10000000.00,
                'salary_currency' => 'IDR',
                'experience_level' => 'Senior',
                'education_level' => 'S1',
                'application_deadline' => '2025-08-31',
                'status' => 'Published',
                'is_featured' => TRUE,
                'views_count' => 150,
                'posted_by_user_id' => 1, // Pastikan user dengan ID 1 ada
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            // ... tambahkan data jobs lainnya di sini
        ]);

        // Untuk job_requirements, job_benefits, job_skill_pivot juga bisa menggunakan DB::table()->insert()
        // dan subquery atau mendapatkan ID terlebih dahulu.
    }
}
