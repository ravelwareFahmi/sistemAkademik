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
    public function handle($request, Closure $next,...$roles)
    {
        // kondisi jika role pada tabel user sama dengan parameter $roles dari route 
        if (in_array($request->user()->role, $roles)) {
            return $next($request);
        } else {
            return redirect('/');
        }
    }
}
