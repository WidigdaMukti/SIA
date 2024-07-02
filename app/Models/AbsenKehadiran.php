<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenKehadiran extends Model
{
    use HasFactory;

    protected $table = 'absen_kehadirans';
    protected $guarded = [];

    public function absensiSiswa()
    {
        return $this->belongsTo(AbsensiSiswa::class, 'id_absensi_siswa', 'id');
    }
}
