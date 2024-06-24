<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeris';
    protected $guarded = [];

    protected $appends = ['jumlah_gambar'];

    public function getJumlahGambarAttribute()
    {
        return count($this->gambar);
    }

    protected $fillable = ['thumbnail', 'judul', 'gambar'];

    protected $casts = [
        'gambar' => 'array',
    ];
}
