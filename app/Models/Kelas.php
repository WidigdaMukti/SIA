<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $guarded = [];

    public function adminGuru()
    {
        return $this->belongsTo(AdminGuru::class, 'nik_guru', 'nik_guru');
    }

    public function periodeAkademik()
    {
        return $this->belongsTo(TahunAkademik::class, 'id_tahun_akademik', 'id');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_kelas', 'id');
    }

    public function mapelKelas()
    {
        return $this->hasMany(MapelKelas::class);
    }

    public function scopeKelasActive()
    {
        return $this->where('status', 1);
    }
}
