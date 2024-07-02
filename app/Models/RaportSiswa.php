<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaportSiswa extends Model
{
    use HasFactory;

    protected $table = 'raport_siswas';
    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nik_siswa', 'nik_siswa');
    }

    public function mapelRaport()
    {
        return $this->hasMany(MapelRaport::class, 'raport_siswa_id', 'id');
    }

    public function ekskulRaport()
    {
        return $this->hasMany(EkskulRaport::class, 'raport_siswa_id', 'id');
    }

    public function scopeActiveSiswa($query)
    {
        return $query->whereHas('siswa', function ($query) {
            $query->whereHas('user', function ($query) {
                $query->where('status', 1)->where('role_id', 3);
            });
        });
    }

    public function scopeGetNikSiswa($query)
    {
        return $query->whereHas('siswa', function ($query) {
            $query->where('nik_siswa');
        });
    }

}
