<?php

namespace App\Filament\SiaAdmin\Resources\UserResource\Pages;

use App\Models\Siswa;
use Filament\Actions;
use App\Models\AdminGuru;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\EditRecord;
use App\Filament\SiaAdmin\Resources\UserResource;
use App\Models\AbsensiSiswa;
use App\Models\Kelas;
use App\Models\MapelKelas;
use App\Models\Nilai;
use App\Models\OrangTua;
use App\Models\User;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        // Update user
        $user = User::find($record->id);
        $user->update($data);

        // Periksa peran sebelumnya
        if ($record->role_id == 3) {
            // Jika pengguna sebelumnya adalah siswa, perbarui data siswa
            $siswa = Siswa::where('nik_siswa', $record->nik)->first();
            if ($siswa) {
                if ($record->nik != $user->nik) {
                    // Jika nik telah berubah, perbarui nik di tabel terkait
                    OrangTua::where('nik_siswa', $record->nik)->update(['nik_siswa' => $user->nik]);
                    AbsensiSiswa::where('nik_siswa', $record->nik)->update(['nik_siswa' => $user->nik]);
                    Nilai::where('nik_siswa', $record->nik)->update(['nik_siswa' => $user->nik]);

                    // Perbarui nik siswa dengan nik baru
                    $siswa->nik_siswa = $user->nik;
                    // Isi kolom lain untuk siswa
                    $siswa->nama_lengkap = $user->nama_lengkap;
                    $siswa->email = $user->email;
                    $siswa->save();
                }
                // Isi kolom lain untuk siswa
                $siswa->nama_lengkap = $user->nama_lengkap;
                $siswa->email = $user->email;
                $siswa->save();
            }
        }


        if ($record->role_id == 1 || $record->role_id == 2) {
            // Jika pengguna sebelumnya adalah admin/guru, perbarui data admin/guru
            $adminGuru = AdminGuru::where('nik_guru', $record->nik)->first();
            if ($adminGuru) {
                if ($record->nik != $user->nik) {
                    // Jika nik telah berubah, perbarui nik di tabel terkait
                    Kelas::where('nik_guru', $record->nik)->update(['nik_guru' => $user->nik]);
                    MapelKelas::where('nik_guru_mapel', $record->nik)->update(['nik_guru' => $user->nik]);

                    // Perbarui nik guru dengan nik baru
                    $adminGuru->nik_guru = $user->nik;
                    $adminGuru->nama_lengkap = $user->nama_lengkap;
                    $adminGuru->email = $user->email;
                    $adminGuru->save();
                }

                // Isi kolom lain untuk admin/guru, baik nik berubah atau tidak
                $adminGuru->nama_lengkap = $user->nama_lengkap;
                $adminGuru->email = $user->email;
                $adminGuru->save();
            }
        }


        // Hanya ubah status jika ada dalam data yang dikirimkan
        if (array_key_exists('status', $data)) {
            $user->status = $data['status'];
            $user->save();
        }
        return $user;
    }

    protected function getRedirectUrl(): string
    {
        return route('filament.siaAdmin.resources.users.index');
    }
}
