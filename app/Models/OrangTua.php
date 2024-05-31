<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    use HasFactory;

    protected $table = 'orang_tuas';
    protected $guarded = [];

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'nik', 'nik_siswa');
    // }

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class, 'nik_siswa');
    }
}
