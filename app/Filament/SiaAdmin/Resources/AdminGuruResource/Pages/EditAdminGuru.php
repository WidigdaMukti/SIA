<?php

namespace App\Filament\SiaAdmin\Resources\AdminGuruResource\Pages;

use App\Filament\SiaAdmin\Resources\AdminGuruResource;
use App\Models\AdminGuru;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditAdminGuru extends EditRecord
{
    protected static string $resource = AdminGuruResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        // Cek apakah user dengan nik_guru ini sudah ada dan role_id = 1 / 2
        $user = User::where('nik', $record->user->nik)
        ->whereIn('role_id', [1, 2])
        ->first();

        // Jika user tidak ditemukan, buat user baru
        if (!$user) {
            $user = User::create([
                'nik' => $data['nik_guru'],
                'nama_lengkap' => $data['nama_lengkap_tendik'],
                'email' => $data['email'],
                'password' => bcrypt('password'),  // Ganti 'password' dengan password yang diinginkan
                'role_id' => 2,
            ]);
        } else {
            // Jika user ditemukan, update user
            $user->update([
                'nik' => $data['nik_guru'],
                'nama_lengkap_tendik' => $data['nama_lengkap_tendik'],
                'email' => $data['email'],
                // Update field lainnya di sini
            ]);
        }

        // Update Admin & Guru
        $record->update([
            'nik_guru' => $user->nik,
            // 'foto' => $data['foto'],
            'no_kk' => $data['no_kk'],
            'nuptk' => $data['nuptk'],
            'nip' => $data['nip'],
            'nama_lengkap_tendik' => $data['nama_lengkap_tendik'],
            'email' => $data['email'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'kewarganegaraan' => $data['kewarganegaraan'],
            'agama' => $data['agama'],
            'alamat_rumah' => $data['alamat_rumah'],
            'no_hp' => $data['no_hp'],
            'status_kepegawaian' => $data['status_kepegawaian'],
            'jenis_ptk' => $data['jenis_ptk'],
            'tugas_tambahan' => $data['tugas_tambahan'],
            'sk_cpns' => $data['sk_cpns'],
            'tanggal_cpns' => $data['tanggal_cpns'],
            'sk_pengangkatan' => $data['sk_pengangkatan'],
            'tmt_pengangkatan' => $data['tmt_pengangkatan'],
            'lembaga_pengangkatan' => $data['lembaga_pengangkatan'],
            'pangkat_golongan' => $data['pangkat_golongan'],
            'sumber_gaji' => $data['sumber_gaji'],
            'nama_ibu_kandung' => $data['nama_ibu_kandung'],
            'status_perkawinan' => $data['status_perkawinan'],
            'nama_suami_atau_istri' => $data['nama_suami_atau_istri'],
            'nip_suami_atau_istri' => $data['nip_suami_atau_istri'],
            'pekerjaan_suami_atau_istri' => $data['pekerjaan_suami_atau_istri'],
            'tmt_pns' => $data['tmt_pns'],
            'lisensi_kepsek' => $data['lisensi_kepsek'],
            'diklat_kepegawaian' => $data['diklat_kepegawaian'],
            'keahlian_braille' => $data['keahlian_braille'],
            'keahlian_bahasa_isyarat' => $data['keahlian_bahasa_isyarat'],
            'npwp' => $data['npwp'],
            'nama_wajib_pajak' => $data['nama_wajib_pajak'],
            'bank' => $data['bank'],
            'norek_bank' => $data['norek_bank'],
            'rek_anama' => $data['rek_anama'],
            'karpeg' => $data['karpeg'],
            'karis_karsu' => $data['karis_karsu'],
            'nuks' => $data['nuks'],
        ]);

        return $record;
    }

    protected function getRedirectUrl(): string
    {
        return route('filament.siaAdmin.resources.admin-gurus.index');
    }
}
