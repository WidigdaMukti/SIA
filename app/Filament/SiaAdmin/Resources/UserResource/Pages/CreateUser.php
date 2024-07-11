<?php

namespace App\Filament\SiaAdmin\Resources\UserResource\Pages;

use App\Models\User;
use App\Models\Siswa;
use Filament\Actions;
use App\Models\AdminGuru;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\SiaAdmin\Resources\UserResource;
use App\Models\AbsensiSiswa;
use App\Models\Nilai;
use App\Models\OrangTua;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $user = User::create($data);

        // Membuat siswa baru atau admin/guru baru dan menghubungkannya dengan user
        if ($user->role_id == 3) {
            $siswaBaru = new Siswa();
            $siswaBaru->nik_siswa = $user->nik;
            $siswaBaru->nama_lengkap = $user->nama_lengkap;
            $siswaBaru->email = $user->email;
            // Isi kolom lainnya untuk siswa
            $siswaBaru->save();

            // Membuat orang tua baru dan menghubungkannya dengan siswa
            $orangTuaBaru = new OrangTua();
            $orangTuaBaru->nik_siswa = $siswaBaru->nik_siswa;
            // Isi kolom lainnya untuk orang tua
            $orangTuaBaru->save();

            $absenSiswa = new AbsensiSiswa();
            $absenSiswa->nik_siswa = $siswaBaru->nik_siswa;
            // Isi kolom lainnya untuk absensi siswa
            $absenSiswa->save();

            $nilai = new Nilai();
            $nilai->nik_siswa = $siswaBaru->nik_siswa;
            // Isi kolom lainnya untuk nilai
            $nilai->save();

            return $siswaBaru;
        } elseif ($user->role_id == 1 || $user->role_id == 2) {
            $adminGuru = new AdminGuru();
            $adminGuru->nik_guru = $user->nik;
            $adminGuru->email = $user->email;
            // Isi kolom lainnya untuk admin/guru
            $adminGuru->save();
            return $adminGuru;
        }

        return $user;
    }

    protected function getRedirectUrl(): string
    {
        return route('filament.siaAdmin.resources.users.index');
    }
}
