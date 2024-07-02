<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // $this->registerPolicies();

        // Gate::define('access-siaAdmin-panel', function ($user) {
        //     return $user->role_id === 1; // Misalnya, role_id 1 untuk admin
        // });

        // Gate::define('access-siaGuru-panel', function ($user) {
        //     return $user->role_id === 2; // Misalnya, role_id 2 untuk guru
        // });

        // Gate::define('access-siaSiswa-panel', function ($user) {
        //     return $user->role_id === 3; // Misalnya, role_id 3 untuk siswa
        // });
    }
}
