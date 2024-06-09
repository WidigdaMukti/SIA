<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    use HasFactory;

    protected $table = 'orang_tuas';
    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nik_siswa', 'nik_siswa');
    }

    public function scopeActiveSiswa($query)
    {
        return $query->whereHas('siswa', function ($query) {
            $query->whereHas('user', function ($query) {
                $query->where('status', 1)->where('role_id', 3);
            });
        });
    }
}
