<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalMapel extends Model
{
    use HasFactory;

    protected $table = 'jadwal_mapels';
    protected $guarded = [];

    public function mapelKelas()
    {
        return $this->belongsTo(MapelKelas::class, 'id_mapel_kelas', 'id');
    }
}
