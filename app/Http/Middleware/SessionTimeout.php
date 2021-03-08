<?php

namespace App\Http\Middleware;

use Closure;

class SessionTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! session()->has('lastActivityTime')) {
            session(['lastActivityTime' => now()]);

        }
        if (now()->diffInMinutes(session('lastActivityTime')) >= (119) ) {  
            if (auth()->check()) {
                auth()->logout();
                session()->forget('lastActivityTime');
     
                return redirect(route('welcome'));
            }
     
        }
        return $next($request);
    }
}
