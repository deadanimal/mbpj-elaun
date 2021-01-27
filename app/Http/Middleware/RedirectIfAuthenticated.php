<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            // return redirect('/home');
            $role = Auth::user()->role_id; 
        
        // Check user role
        switch ($role) {
            case '1':
                    return 'pentadbir-sistem/dashboard';
                break;
            case '2':
                    return 'penyelia/dashboard';
                break; 
            case '3':
                    return 'datuk-bandar/dashboard';
                break; 
            case '4':
                    return 'ketua-bahagian/dashboard';
                break; 
            case '5':
                    return 'ketua-jabatan/dashboard';
                break; 
            case '6':
                    return 'kerani-semakan/dashboard';
                break; 
            case '7':
                    return 'kerani-pemeriksaan/dashboard';
                break; 
            case '8':
                    return 'kakitangan/dashboard';
                break; 
            case '9':
                    return 'pelulus-pindaan/dashboard';
                break; 
            default:
                    return '/login'; 
                break;
        }
        }

        return $next($request);
    }
}
