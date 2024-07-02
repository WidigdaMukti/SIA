<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapelRaport extends Model
{
    use HasFactory;

    protected $table = 'mapel_raports';
    protected $guarded = [];

    public function nilai()
    {
        return $this->belongsTo(Nilai::class, 'id_mapel_kelas_nilai', 'id_mapel_kelas');
    }

    public function raportSiswas()
    {
        return $this->belongsTo(RaportSiswa::class, 'id_mapel_raport');
    }
}
