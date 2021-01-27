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
            
        // dd($role);
        // Check user role
        // switch ($role) {
        //     case '1':
        //             return $next($request);
        //         break;
        //     case '2':
        //             return $next($request);
        //         break; 
        //     case '3':
        //             return $next($request);
        //         break; 
        //     case '4':
        //             return $next($request);
        //         break; 
        //     case '5':
        //             return $next($request);
        //         break; 
        //     case '6':
        //             return $next($request);
        //         break; 
        //     case '7':
        //             return $next($request);
        //         break; 
        //     case '8':
        //             return $next($request);
        //         break; 
        //     case '9':
        //             return $next($request);
        //         break; 
        //     default:
        //             return '/login'; 
        //         break;
        // }
        }

        return $next($request);
    }
}
