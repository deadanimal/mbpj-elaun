<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // dd($request->user()->role_id,$role);
        // dd($role);
        if ( $request->user()->role_id != $role) {
            // dd($role);
            abort(403);
        }
        
        // dd($role);
        return $next($request);
    }
}
