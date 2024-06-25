<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'nik_siswa', 'nik');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'nik_siswa', 'nik_siswa');
    }

    public function absen()
    {
        return $this->hasMany(AbsensiSiswa::class, 'nik_siswa', 'nik_siswa');
    }

    public function scopeActiveUserWithRole($query)
    {
        return $query->whereHas('user', function ($query) {
            $query->where('status', 1)->where('role_id', 3);
        });
    }

    public function scoperActiveKelas($query)
    {
        return $query->whereHas('kelas', function ($query) {
            $query->where('status', 1);
        });
    }
}
