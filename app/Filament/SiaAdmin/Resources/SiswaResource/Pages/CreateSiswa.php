<?php

namespace App\Filament\SiaAdmin\Resources\SiswaResource\Pages;

use App\Filament\SiaAdmin\Resources\SiswaResource;
use App\Models\OrangTua;
use App\Models\Siswa;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateSiswa extends CreateRecord
{
    protected static string $resource = SiswaResource::class;

    protected function handleRecordCreation(array $data): Model
    {
       // Cek apakah user dengan nik_siswa ini sudah ada dan role_id = 3
        $user = User::where('nik', $data['nik_siswa'])
        ->where('role_id', 3)
        ->first();

        // Jika user tidak ditemukan, buat user baru
        if (!$user) {
            $user = User::create([
                'nik' => $data['nik_siswa'],
                'nama_lengkap' => $data['nama_lengkap'],
                'email' => $data['email'],
                'password' => bcrypt('password'),  // Ganti 'password' dengan password yang diinginkan
                'role_id' => 3,
            ]);
        }

        // Buat siswa dengan id user yang baru saja dibuat
        $siswa = Siswa::create([
            'nik_siswa' => $user->nik,
            'nama_lengkap' => $data['nama_lengkap'],
            'email' => $data['email'],
            'id_kelas' => $data['id_kelas'],
            // Tambahkan field lainnya di sini
        ]);

        OrangTua::create([
            'nik_siswa' => $siswa->nik_siswa,
            // Tambahkan field lainnya di sini
        ]);

        return $siswa;
    }

    protected function getRedirectUrl(): string
    {
        return route('filament.siaAdmin.resources.siswas.index');
    }
}
