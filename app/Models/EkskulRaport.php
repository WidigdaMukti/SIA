<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EkskulRaport extends Model
{
    use HasFactory;

    protected $table = 'ekskul_raports';
    protected $guarded = [];

    public function raportSiswa()
    {
        return $this->belongsTo(RaportSiswa::class, 'raport_siswa_id');
    }
}
