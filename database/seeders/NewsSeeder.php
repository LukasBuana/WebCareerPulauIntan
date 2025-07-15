<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('news')->insert([
            [
                'title' => 'Pemberitahuan kepada Kandidat: Hati-hati Modus Penipuan Rekrutmen!',
                'subtitle' => 'Indofood menyatakan bahwa banyak lowongan pekerjaan palsu yang dipasang di situs web',
                'description' => 'admin@example.com',
                'image' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tutorial Melamar Kerja di Indofood Career',
                'subtitle' => 'Tahukah kamu cara melamar ke Indofood?',
                'description' => 'admin@example.com',
                'image' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tips Wawancara Kerja secara Online',
                'subtitle' => 'Tahap wawancara merupakan salah satu tahapan penting dalam proses seleksi',
                'description' => 'admin@example.com',
                'image' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ]
            // ... tambahkan user lain jika diperlukan
        ]);
    }
}
