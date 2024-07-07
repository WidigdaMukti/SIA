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
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements FilamentUser, HasName, MustVerifyEmail
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

    const ROLE_ADMIN = 1;
    const ROLE_GURU = 2;
    const ROLE_SISWA = 3;

    const ROLES = [
        self::ROLE_ADMIN => 1,
        self::ROLE_GURU => 2,
        self::ROLE_SISWA => 3
    ];

    public function isAdmin()
    {
        return $this->role_id === self::ROLE_ADMIN;
    }

    public function isGuru()
    {
        return $this->role_id === self::ROLE_GURU;
    }

    public function isSiswa()
    {
        return $this->role_id === self::ROLE_SISWA;
    }


    public function canAccessPanel(Panel $panel): bool
    {
        if ($this->status == 0) {
            return false; // Jika status user adalah 0, maka tidak dapat mengakses panel apa pun
        }

        switch ($panel->getId()) {
            case 'siaAdmin':
                return $this->isAdmin();
            case 'siaGuru':
                return $this->isGuru();
            case 'siaSiswa':
                return $this->isSiswa();
            default:
                return false;
        }
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
