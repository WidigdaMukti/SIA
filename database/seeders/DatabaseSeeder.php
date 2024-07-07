<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AbsenKehadiran;
use App\Models\AbsensiSiswa;
use App\Models\AdminGuru;
use App\Models\Berita;
use App\Models\EkskulRaport;
use App\Models\JadwalMapel;
use App\Models\Kelas;
use App\Models\MapelKelas;
use App\Models\MapelRaport;
use App\Models\Nilai;
use App\Models\OrangTua;
use App\Models\RaportSiswa;
use App\Models\ppdb;
use App\Models\Siswa;
use App\Models\TahunAkademik;
use App\Models\UserRole;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        UserRole::factory()->create(['nama' => 'admin']);
        UserRole::factory()->create(['nama' => 'guru']);
        UserRole::factory()->create(['nama' => 'siswa']);

        // TahunAkademik::factory(6)->create();
        // Kelas::factory()->create()
        \App\Models\User::factory(20)->create();

        MapelKelas::factory(20)->create();
        Nilai::factory(30)->create();
        AbsensiSiswa::factory(30)->create();
        JadwalMapel::factory(20)->create();
        Berita::factory(1)->create();
        RaportSiswa::factory(20)->create();
        MapelRaport::factory(20)->create();
        EkskulRaport::factory(20)->create();
        AbsenKehadiran::factory(20)->create();
        ppdb::factory(2)->create();
        // \App\Models\User::factory()->create([
        //     'nik' => '123456578',
        //     'nama_lengkap' => 'Bagas Gumelar',
        //     'email' => 'bagas@gmail.com',
        //     'password' => bcrypt('password')
        // ]);

        // AdminGuru::factory(10)->create();
        // Siswa::factory(20)->create();
        // OrangTua::factory(20)->create();
    }
}
