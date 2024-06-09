<?php

namespace App\Filament\SiaAdmin\Resources\AdminGuruResource\Pages;

use App\Filament\SiaAdmin\Resources\AdminGuruResource;
use App\Models\AdminGuru;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateAdminGuru extends CreateRecord
{
    protected static string $resource = AdminGuruResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        // Cek apakah user dengan nik_guru ini sudah ada dan role_id = 1 / 2
        $user = User::where('nik', $data['nik_guru'])
        ->where('role_id', [1, 2])
        ->first();

        // Jika user tidak ditemukan, buat user baru
        if (!$user) {
            $user = User::create([
                'nik' => $data['nik_guru'],
                'nama_lengkap' => $data['nama_lengkap'],
                'email' => $data['email'],
                'password' => bcrypt('password'),  // Ganti 'password' dengan password yang diinginkan
                'role_id' => 2,
            ]);
        }

        // Buat Admin atau Guru dengan nik user yang baru saja dibuat
        $adminGuru = AdminGuru::create([
            'nik_guru' => $user->nik,
            'nama_lengkap' => $data['nama_lengkap'],
            'email' => $data['email'],
            'nuptk' => $data['nuptk'],
            // Tambahkan field lainnya di sini
        ]);

        return $adminGuru;
    }

    protected function getRedirectUrl(): string
    {
        return route('filament.siaAdmin.resources.admin-gurus.index');
    }
}
