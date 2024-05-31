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
}
