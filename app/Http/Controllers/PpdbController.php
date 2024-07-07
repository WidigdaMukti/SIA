<?php

namespace App\Http\Controllers;

use App\Filament\SiaAdmin\Resources\Enums\PpdbStatus;
use App\Models\OrangTua;
use App\Models\ppdb;
use App\Models\Siswa;
use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Simpan data ke dalam tabel ppdbs
        Ppdb::create($request->all());

        // Redirect atau response jika diperlukan
        return redirect('/ppdb-online')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(ppdb $ppdb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ppdb $ppdb)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ppdb $ppdb)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ppdb $ppdb)
    {
        //
    }

    public function diterima($id)
    {
        $dataPpdb = ppdb::find($id);

        if (!$dataPpdb) {
            Notification::make()
            ->title('Pendaftaran tidak valid')
            ->danger()
            ->send();
        return;
        }

        $dataPpdb->update([
            'status' => PpdbStatus::Diterima
        ]);

        $user = User::create([
            'nik' => $dataPpdb->nik,
            'nama_lengkap' => $dataPpdb->nama_lengkap,
            'email' => null,
            'password' => bcrypt('password'),
            'role_id' => 3,
            'status' => 1
        ]);

        if ($user) {
            Siswa::create([
                'nik_siswa' => $user->nik,
                'nama_lengkap' => $user->nama_lengkap,
                'email' => $user->email,
                'jenis_kelamin' => $dataPpdb->jenis_kelamin,
                'tempat_lahir' => $dataPpdb->tempat_lahir,
                'tanggal_lahir' => $dataPpdb->tanggal_lahir,
                'agama' => $dataPpdb->agama,
                'kewarganegaraan' => $dataPpdb->kewarganegaraan,
                'anak_ke' => $dataPpdb->anak_ke,
                'jumlah_saudara_kandung' => $dataPpdb->jumlah_saudara_kandung,
                'jumlah_saudara_tiri' => $dataPpdb->jumlah_saudara_tiri,
                'jumlah_saudara_angkat' => $dataPpdb->jumlah_saudara_angkat,
                'bahasa_sehari-hari' => $dataPpdb->bahasa_sehari_hari,
                'berat_badan' => $dataPpdb->berat_badan,
                'tinggi_badan' => $dataPpdb->tinggi_badan,
                'gol_darah' => $dataPpdb->golongan_darah,
                'alamat' => $dataPpdb->alamat,
                'nomor_telepon' => $dataPpdb->nomor_telepon,
                'bertempat_tinggal' => $dataPpdb->bertempat_tinggal,
                'masuk_sekolah_sebagai' => $dataPpdb->masuk_sekolah_sebagai,
                'asal_anak' => $dataPpdb->asal_anak,
                'nama_tk' => $dataPpdb->nama_tk,
                'no_tahun_surat_ket' => $dataPpdb->nomor_tahun_surat_keterangan,
                'lama_belajar' => $dataPpdb->lama_belajar,
            ]);

            OrangTua::create([
                'nik_siswa' => $user->nik,
                'nama_lengkap_ayah' => $dataPpdb->nama_ayah,
                'tempat_lahir_ayah' => $dataPpdb->tempat_lahir_ayah,
                'tanggal_lahir_ayah' => $dataPpdb->tanggal_lahir_ayah,
                'agama_ayah' => $dataPpdb->agama_ayah,
                'kewarganegaraan_ayah' => $dataPpdb->kewarganegaraan_ayah,
                'pendidikan_terakhir_ayah' => $dataPpdb->pendidikan_terakhir_ayah,
                'pekerjaan_ayah' => $dataPpdb->pekerjaan_ayah,
                'gaji_perbulan_ayah' => $dataPpdb->gaji_perbulan_ayah,
                'alamat_rumah_ayah' => $dataPpdb->alamat_rumah_ayah,
                'alamat_kantor_ayah' => $dataPpdb->alamat_kantor_ayah,
                'no_hp_ayah' => $dataPpdb->nomor_telepon_hp_ayah,
                'nama_lengkap_ibu' => $dataPpdb->nama_ibu,
                'tempat_lahir_ibu' => $dataPpdb->tempat_lahir_ibu,
                'tanggal_lahir_ibu' => $dataPpdb->tanggal_lahir_ibu,
                'agama_ibu' => $dataPpdb->agama_ibu,
                'kewarganegaraan_ibu' => $dataPpdb->kewarganegaraan_ibu,
                'pendidikan_terakhir_ibu' => $dataPpdb->pendidikan_terakhir_ibu,
                'pekerjaan_ibu' => $dataPpdb->pekerjaan_ibu,
                'gaji_ibu_perbulan' => $dataPpdb->gaji_perbulan_ibu,
                'alamat_rumah_ibu' => $dataPpdb->alamat_rumah_ibu,
                'alamat_kantor_ibu' => $dataPpdb->alamat_kantor_ibu,
                'no_hp_ibu' => $dataPpdb->nomor_telepon_hp_ibu
            ]);

            Notification::make()
            ->title('Status berhasil diubah dan data user berhasil disimpan')
            ->success()
            ->send();
        } else {
            Notification::make()
            ->title('Status gagal diubah dan data user gagal disimpan')
            ->danger()
            ->send();
        }
    }

    public function ditolak($id)
    {
        $dataPpdb = ppdb::find($id);

        if (!$dataPpdb) {
            Notification::make()
            ->title('Pendaftaran tidak valid')
            ->danger()
            ->send();
        return;
        }

        $dataPpdb->update([
            'status' => PpdbStatus::Ditolak
        ]);

        Notification::make()
        ->title('Status berhasil diubah')
        ->success()
        ->send();
    }
}
