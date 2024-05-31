<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAkademik extends Model
{
    use HasFactory;

    protected $table = 'tahun_akademiks';
    protected $guarded = [];

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id', 'id_tahun_akademik');
    }
}
