<?php

namespace App\Filament\SiaAdmin\Resources\OrangTuaResource\Pages;

use App\Filament\SiaAdmin\Resources\OrangTuaResource;
use App\Models\OrangTua;
use App\Models\Siswa;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateOrangTua extends CreateRecord
{
    protected static string $resource = OrangTuaResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        // Cek apakah nik_siswa ada di tabel siswa
        $student = Siswa::where('nik_siswa', $data['nik_siswa'])->first();

        // Jika nik_siswa tidak ada, buat record di tabel User
        if (!$student) {
            $user = User::create([
                'nik' => $data['nik_siswa'],
                'email' => $data['nik_siswa'].'@default.com', // Menetapkan email default berdasarkan nik_siswa
                'password' => bcrypt('password'),  // Ganti 'password' dengan password yang diinginkan
                'role_id' => 3,
                // tambahkan field lainnya jika diperlukan
            ]);

            // Setelah user dibuat, buat record di tabel Siswa
            $student = Siswa::create([
                'nik_siswa' => $data['nik_siswa'],
                // tambahkan field lainnya jika diperlukan
            ]);
        }

        // Setelah memastikan siswa dan user ada, buat record orang tua
        $parent = OrangTua::create([
            'nik_siswa' => $user->nik,
            'nik_ayah' => $data['nik_ayah'],
            'nama_lengkap_ayah' => $data['nama_lengkap_ayah'],
            // tambahkan field lainnya jika diperlukan
        ]);

        return $parent;
    }
}
