<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RolUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ( $request->user()->rol === 1) { 
            // En caso de no ser rol 2, redireccionar a usuario hacia home
            return redirect()->route('home');
        }
        return $next($request);
    }
}
