<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminGuru extends Model
{
    use HasFactory;

    protected $table = 'admin_gurus';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'nik_guru', 'nik');
    }

    public function waliKelas()
    {
        return $this->hasOne(Kelas::class, 'nik_guru', 'nik_guru');
    }

    public function guruMapel()
    {
        return $this->hasMany(MapelKelas::class, 'nik_guru_mapel', 'nik_guru');
    }

    public function scopeActiveUserWithRole($query)
    {
        return $query->whereHas('user', function ($query) {
            $query->where('status', 1)->whereIn('role_id', [1, 2]);
        });
    }

    public function scopeActiveGuru($query)
    {
        return $query->whereHas('user', function ($query) {
            $query->where('status', 1)->where('role_id', 2);
        });
    }
}
