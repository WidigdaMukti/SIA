<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check()) {
            $user = Auth::user();

            switch ($role) {
                case 'siaAdmin':
                    if ($user->role_id === 1) {
                        return $next($request);
                    }
                    break;
                case 'siaGuru':
                    if ($user->role_id === 2) {
                        return $next($request);
                    }
                    break;
                case 'siaSiswa':
                    if ($user->role_id === 3) {
                        return $next($request);
                    }
                    break;
                default:
                    return redirect('/');
            }
            return redirect('/');
        }

        return redirect('/'); // Redirect ke halaman lain jika tidak memiliki akses
    }
}
