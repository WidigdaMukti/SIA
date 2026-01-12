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
            'kelas_id' => $data['kelas_id'],
            'no_kk' => $data['no_kk'],
            'nisn' => $data['nisn'],
            'nipd' => $data['nipd'],
            'nama_lengkap' => $data['nama_lengkap'],
            'email' => $data['email'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'agama' => $data['agama'],
            'kewarganegaraan' => $data['kewarganegaraan'],
            'anak_ke' => $data['anak_ke'],
            'jumlah_saudara_kandung' => $data['jumlah_saudara_kandung'],
            'jumlah_saudara_tiri' => $data['jumlah_saudara_tiri'],
            'jumlah_saudara_angkat' => $data['jumlah_saudara_angkat'],
            'bahasa_sehari-hari' => $data['bahasa_sehari-hari'],
            'berat_badan' => $data['berat_badan'],
            'tinggi_badan' => $data['tinggi_badan'],
            'gol_darah' => $data['gol_darah'],
            'alamat' => $data['alamat'],
            'nomor_telepon' => $data['nomor_telepon'],
            'bertempat_tinggal' => $data['bertempat_tinggal'],
            'alat_transportasi' => $data['alat_transportasi'],
            'masuk_sekolah_sebagai' => $data['masuk_sekolah_sebagai'],
            'asal_anak' => $data['asal_anak'],
            'nama_tk' => $data['nama_tk'],
            'no_tahun_surat_ket' => $data['no_tahun_surat_ket'],
            'lama_belajar' => $data['lama_belajar'],
            'skhun' => $data['skhun'],
            'penerima_kps' => $data['penerima_kps'],
            'no_kps' => $data['no_kps'],
            'no_peserta_ujian_nasional' => $data['no_peserta_ujian_nasional'],
            'no_seri_ijazah' => $data['no_seri_ijazah'],
            'penerima_kip' => $data['penerima_kip'],
            'nomor_kip' => $data['nomor_kip'],
            'nama_kip' => $data['nama_kip'],
            'no_kks' => $data['no_kks'],
            'no_registrasi_akta_lahir' => $data['no_registrasi_akta_lahir'],
            'bank' => $data['bank'],
            'no_rek_bank' => $data['no_rek_bank'],
            'rek_atas_nama' => $data['rek_atas_nama'],
            'layak_pip' => $data['layak_pip'],
            'alasan_layak_pip' => $data['alasan_layak_pip'],
            'kebutuhan_khusus' => $data['kebutuhan_khusus'],
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
