<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiSiswa extends Model
{
    use HasFactory;

    protected $table = 'absensi_siswas';
    protected $guarded = [];

    public function absenSiswa()
    {
        return $this->belongsTo(Siswa::class, 'nik_siswa', 'nik_siswa');
    }

    public function mapel()
    {
        return $this->belongsTo(MapelKelas::class, 'id_mapel_kelas', 'id');
    }

    public function absenKehadiran()
    {
        return $this->hasMany(AbsenKehadiran::class, 'id_absensi_siswa', 'id');
    }

    public function scopeActiveAbsenSiswa($query)
    {
        return $query->whereHas('absenSiswa', function ($query) {
            $query->whereHas('user', function ($query) {
                $query->where('status', 1)->where('role_id', 3);
            });
        });
    }
}
