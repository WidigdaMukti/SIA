<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AdminGuru;
use App\Models\Siswa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'nik' => '123456578',
        //     'nama_lengkap' => 'Bagas Gumelar',
        //     'email' => 'bagas@gmail.com',
        //     'password' => bcrypt('password')
        // ]);

        Siswa::factory(20)->create();
        AdminGuru::factory(20)->create();
    }
}
