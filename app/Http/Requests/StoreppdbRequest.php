<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreppdbRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|numeric|digits:16',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string|max:255',
            'kewarganegaraan' => 'required|in:WNI,WNA,Keturunan',
            'anak_ke' => 'required|numeric',
            'jumlah_saudara_kandung' => 'required|numeric',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'golongan_darah' => 'required|in:A,B,AB,O',
            'nama_ayah' => 'nullable|string|max:255',
            'pekerjaan_ayah' => 'nullable|string|max:255',
            'tempat_lahir_ayah' => 'nullable|string|max:255',
            'tanggal_lahir_ayah' => 'nullable|date',
            'agama_ayah' => 'nullable|string|max:255',
            'pendidikan_terakhir_ayah' => 'nullable|in:Tidak Sekolah,SD Sederajat,SMP Sederajat,SMA Sederajat,Diploma,Sarjana',
            'gaji_perbulan_ayah' => 'nullable|in:Tidak Berpenghasilan,Kurang dari Rp. 500.000,Rp. 500.000 - Rp. 999.999,Rp. 1.000.000 - Rp. 1.999.999,Rp. 2.000.000 - Rp. 4.999.999,Rp. 5.000.000 - Rp. 20.000.000,Lebih Dari Rp. 20.000.000',
            'alamat_rumah_ayah' => 'nullable|string|max:255',
            'kewarganegaraan_ayah' => 'nullable|in:WNI,WNA,Keturunan',
            'nomor_telepon_hp_ayah' => 'nullable|numeric',
            'nama_ibu' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'tempat_lahir_ibu' => 'required|string|max:255',
            'tanggal_lahir_ibu' => 'required|date',
            'agama_ibu' => 'required|string|max:255',
            'pendidikan_terakhir_ibu' => 'required|in:Tidak Sekolah,SD Sederajat,SMP Sederajat,SMA Sederajat,Diploma,Sarjana',
            'gaji_perbulan_ibu' => 'required|in:Tidak Berpenghasilan,Kurang dari Rp. 500.000,Rp. 500.000 - Rp. 999.999,Rp. 1.000.000 - Rp. 1.999.999,Rp. 2.000.000 - Rp. 4.999.999,Rp. 5.000.000 - Rp. 20.000.000,Lebih Dari Rp. 20.000.000',
            'alamat_rumah_ibu' => 'nullable|string|max:255',
            'kewarganegaraan_ibu' => 'nullable|in:WNI,WNA,Keturunan',
            'nomor_telepon_hp_ibu' => 'nullable|numeric',
            'nomor_telepon' => 'required|numeric',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'required' => ':attribute wajib diisi.',
    //         'email' => ':attribute harus berupa alamat email yang valid.',
    //         'numeric' => ':attribute harus berupa angka.',
    //         'integer' => ':attribute harus berupa bilangan bulat.',
    //         'in' => ':attribute memiliki nilai yang tidak valid.',
    //         'exists' => ':attribute tidak ditemukan di database.',
    //         'string' => ':attribute harus berupa teks.',
    //         'max' => ':attribute tidak boleh lebih dari :max karakter.',
    //         'min' => ':attribute tidak boleh kurang dari :min.',
    //         'date' => ':attribute harus berupa tanggal yang valid.',
    //         'regex' => ':attribute tidak sesuai dengan format yang valid.',
    //     ];
    // }

    // public function attributes()
    // {
    //     return [
    //         'nik_siswa' => 'NIK Peserta Didik',
    //         'no_kk' => 'No Kartu Keluarga',
    //         'nisn' => 'NISN',
    //         'nipd' => 'NIPD',
    //         'nama_lengkap' => 'Nama Lengkap',
    //         'email' => 'Email',
    //         'jenis_kelamin' => 'Jenis Kelamin',
    //         'tempat_lahir' => 'Tempat Lahir',
    //         'tanggal_lahir' => 'Tanggal Lahir',
    //         'agama' => 'Agama',
    //         'kewarganegaraan' => 'Kewarganegaraan',
    //         'jumlah_saudara_kandung' => 'Jumlah Saudara Kandung',
    //         'jumlah_saudara_tiri' => 'Jumlah Saudara Tiri',
    //         'jumlah_saudara_angkat' => 'Jumlah Saudara Angkat',
    //         'bahasa_sehari-hari' => 'Bahasa Sehari-hari',
    //         'berat_badan' => 'Berat Badan',
    //         'tinggi_badan' => 'Tinggi Badan',
    //         'gol_darah' => 'Golongan Darah',
    //         'alamat_rumah' => 'Alamat Rumah',
    //         'nomor_telepon' => 'Nomor Telepon',
    //         'bertempat_tinggal' => 'Bertempat Tinggal',
    //         'alat_transportasi' => 'Alat Transportasi',
    //         'masuk_sekolah_sebagai' => 'Masuk Sekolah Sebagai',
    //         'asal_anak' => 'Asal Anak',
    //         'nama_tk' => 'Nama Taman Kanak-kanak',
    //         'no_tahun_surat_ket' => 'No Tahun Surat Keterangan',
    //         'lama_belajar' => 'Lama Belajar',
    //         'skhun' => 'SKHUN',
    //         'penerima_kps' => 'Penerima KPS',
    //         'no_kps' => 'No KPS',
    //         'no_peserta_ujian_nasional' => 'No Peserta Ujian Nasional',
    //         'no_seri_ijazah' => 'No Seri Ijazah',
    //         'penerima_kip' => 'Penerima KIP',
    //         'nomor_kip' => 'Nomor KIP',
    //         'nama_kip' => 'Nama KIP',
    //         'no_kks' => 'No KKS',
    //         'no_registrasi_akta_lahir' => 'No Registrasi Akta Lahir',
    //         'bank' => 'Bank',
    //         'no_rek_bank' => 'No Rekening Bank',
    //         'rek_atas_nama' => 'Rekening Atas Nama',
    //         'layak_pip' => 'Layak PIP (Usulan dari Sekolah)',
    //         'alasan_layak_pip' => 'Alasan Layak PIP',
    //         'kebutuhan_khusus' => 'Kebutuhan Khusus',
    //         'kelas_id' => 'Kelas',
    //     ];
    // }
}
