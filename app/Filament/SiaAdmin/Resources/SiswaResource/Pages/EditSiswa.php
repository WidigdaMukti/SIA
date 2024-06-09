<?php

namespace App\Filament\SiaAdmin\Resources\SiswaResource\Pages;

use App\Filament\SiaAdmin\Resources\SiswaResource;
use App\Models\OrangTua;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditSiswa extends EditRecord
{
    protected static string $resource = SiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        // Cek apakah user dengan nik ini sudah ada dan role_id = 3
        $user = User::where('nik', $record->user->nik)
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
        } else {
            // Jika user ditemukan, update user
            $user->update([
                'nik' => $data['nik_siswa'],
                'nama_lengkap' => $data['nama_lengkap'],
                'email' => $data['email'],
                // Update field lainnya di sini
            ]);
        }

        // Update siswa
        $record->update([
            'nik_siswa' => $user->nik,
            'nama_lengkap' => $data['nama_lengkap'],
            'email' => $data['email'],
            'id_kelas' => $data['id_kelas'],
            // Update field lainnya di sini sesuai dengan kolom yang ada di tabel siswa
        ]);

        // Cek apakah orang tua dengan nik_siswa ini sudah ada
        $orangTua = OrangTua::where('nik_siswa', $record->nik_siswa)->first();

        // Jika orang tua ditemukan, update orang tua
        if ($orangTua) {
            $orangTua->update([
                'nik_siswa' => $user->nik,
                // Update field lainnya di sini sesuai dengan kolom yang ada di tabel orang_tua
            ]);
        } else {
            // Orang tua tidak ditemukan, buat orang tua baru atau lakukan tindakan lain
            OrangTua::create([
                'nik_siswa' => $user->nik,
                // Tambahkan field lainnya di sini sesuai dengan kolom yang ada di tabel orang_tua
            ]);
        }

        return $record;
    }

    protected function getRedirectUrl(): string
    {
        return route('filament.siaAdmin.resources.siswas.index');
    }
}
