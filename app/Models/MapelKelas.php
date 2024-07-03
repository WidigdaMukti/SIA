<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapelKelas extends Model
{
    use HasFactory;

    protected $table = 'mapel_kelas';
    protected $guarded = [];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function guruMapel()
    {
        return $this->belongsTo(AdminGuru::class, 'nik_guru_mapel', 'nik_guru');
    }

    public function jadwalMapel()
    {
        return $this->hasMany(JadwalMapel::class, 'id_mapel_kelas', 'id');
    }

    public function nilaiMapel()
    {
        return $this->belongsTo(Nilai::class, 'nilai_id', 'id');
    }
    // public function nilaiMapel()
    // {
    //     return $this->hasMany(Nilai::class, 'id_mapel_kelas', 'id');
    // }

    public function absenMapel()
    {
        return $this->belongsTo(AbsensiSiswa::class, 'absensi_siswa_id', 'id');
    }
    // public function absenMapel()
    // {
    //     return $this->hasMany(AbsensiSiswa::class, 'id_mapel_kelas', 'id');
    // }

    public function scopeActiveKelas($query)
    {
        return $query->whereHas('kelas', function ($query) {
            $query->where('status', 1);
        });
    }
}
