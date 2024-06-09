<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser, HasName
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nik',
        'nama_lengkap',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

    public function getFilamentName(): string
    {
        return "{$this->nama_lengkap}";
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'nik_siswa', 'nik');
    }

    public function orangTua()
    {
        return $this->hasOne(OrangTua::class, 'nik_siswa', 'nik');
    }

    public function adminGuru()
    {
        return $this->hasOne(AdminGuru::class, 'nik', 'nik_guru');
    }

    public function usersRole()
    {
        return $this->belongsTo(UserRole::class, 'role_id', 'id');
    }

    // public function scopeActive($query)
    // {
    //     return $query->where('status', 1);
    // }
}
