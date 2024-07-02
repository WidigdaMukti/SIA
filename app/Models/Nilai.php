<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilais';
    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nik_siswa', 'nik_siswa');
    }

    public function mapel()
    {
        return $this->belongsTo(MapelKelas::class, 'id_mapel_kelas', 'id');
    }

    public function mapelRaports()
    {
        return $this->hasMany(MapelRaport::class, 'id_mapel_kelas_nilai', 'id');
    }

    public function scopeActiveNilaiSiswa($query)
    {
        return $query->whereHas('siswa', function ($query) {
            $query->whereHas('user', function ($query) {
                $query->where('status', 1)->where('role_id', 3);
            });
        });
    }

    public function scopeSearchGuruMapel($query, $term)
    {
        return $query->whereHas('mapel', function ($query) use ($term) {
            $query->whereHas('guruMapel', function ($query) use ($term) {
                $query->where('nama_lengkap', 'like', '%'.$term.'%');
            });
        });
    }

}
