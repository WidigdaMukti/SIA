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
// use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements FilamentUser, HasName //ustVerifyEmail
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
        'email_verified_at',
        'email',
        'password',
        'role_id',
        'status'
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
        
        switch ($this->role_id) {
            case self::ROLE_ADMIN:
                if ($panel->getId() === 'siaAdmin') {
                    return str_ends_with($this->email, '@example.net') || (str_ends_with($this->email, '@gmail.com') || str_ends_with($this->email, '@yahoo.com')) || (str_ends_with($this->email, '@admin.sd.belajar.id')) && $this->hasVerifiedEmail();
                }
                return false; // Izinkan akses ke panel lain jika bukan 'siaAdmin'

            case self::ROLE_GURU:
                if ($panel->getId() === 'siaGuru') {
                    return str_ends_with($this->email, '@example.com') || (str_ends_with($this->email, '@gmail.com')) || (str_ends_with($this->email, '@guru.sd.belajar.id'))
                    && $this->hasVerifiedEmail();
                }
                return false; // Tidak izinkan akses ke panel non-'siaGuru'

            case self::ROLE_SISWA:
                if ($panel->getId() === 'siaSiswa') {
                    return ($this->nama_lengkap || str_ends_with($this->email, '@example.com')) || (str_ends_with($this->email, '@gmail.com')) && $this->hasVerifiedEmail();
                }
                return false;
            default:
                return false; // Default to denying access for unknown roles
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
    
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            // Delete related records
            if ($user->siswa) {
                $user->siswa->absen()->delete();
                $user->siswa->orangTua()->delete();
                $user->siswa->nilai()->delete();
                $user->siswa->raportSiswa()->delete();
                $user->siswa->delete();
            }

            if ($user->orangTua) {
                $user->orangTua->delete();
            }
        });
    }
}
