<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Untuk menghash password

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan user dengan ID 1 ada
        DB::table('users')->insert([
            [
                'id' => 1, // <<< PENTING: Tentukan ID secara eksplisit jika perlu
                'name' => 'admin_user',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'), // Hash password
                'role' => 'admin', // Pastikan role 'admin'
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2, // Contoh user lain
                'name' => 'regular_user',
                'email' => 'user@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ]
            // ... tambahkan user lain jika diperlukan
        ]);
    }
}