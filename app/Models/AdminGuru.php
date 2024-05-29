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
}
