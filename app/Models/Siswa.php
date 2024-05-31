<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'nama',
    //     'nik_siswa',
    //     'id_role',
    //     'nik_guru',
    //     'nisn',
    //     'nipd',
    //     'no_kk',
    //     'nama_lengkap',
    //     'jenis_kelamin',
    //     'tempat_lahir',
    //     'tanggal_lahir',
    //     'agama',
    //     'kewarganegaraan',
    //     'jumlah_saudara_kandung',
    //     'jumlah_saudara_tiri',
    //     'bahasa_sehari-hari',
    //     'berat_badan',
    //     'tinggi_badan',
    //     'gol_darah',
    //     'alamat',
    //     'alat_transportasi',
    //     'nomor_telepon',
    //     'email',
    //     'bertempat_tinggal',
    //     'masuk_sekolah_sebagai',
    //     'asal_anak',
    //     'nama_tk',
    //     'no_tahun_surat_ket',
    //     'lama_belajar',
    //     'skhun',
    //     'penerima_kps',
    //     'no_kps',
    //     'no_peserta_ujian_nasional',
    //     'no_seri_ijazah',
    //     'penerima_kip',
    //     'nomor_kip',
    //     'nama_kip',
    //     'no_kks',
    //     'no_registrasi_akta_lahir',
    //     'bank',
    //     'no_rek_bank',
    //     'rek_atas_nama',
    //     'layak_pip',
    //     'alasan_layak_pip',
    //     'kebutuhan_khusus',
    //     'id_kelas',
    // ];

    protected $table = 'siswas';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'nik_siswa', 'nik');
    }

    public function orangTua()
    {
        return $this->hasOne(OrangTua::class, 'nik_siswa');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'nik_siswa', 'nik_siswa');
    }

    public function absen()
    {
        return $this->hasMany(AbsensiSiswa::class, 'nik_siswa', 'nik_siswa');
    }
}
