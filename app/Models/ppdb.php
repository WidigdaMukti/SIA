<?php

namespace App\Models;

use App\Enums\PpdbStatus;
use App\Filament\SiaAdmin\Resources\Enums\PpdbStatus as EnumsPpdbStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ppdb extends Model
{
    use HasFactory;

    protected $table = 'ppdbs';
    protected $guarded = [];

    protected $casts = [
        'status' => EnumsPpdbStatus::class
    ];
}
