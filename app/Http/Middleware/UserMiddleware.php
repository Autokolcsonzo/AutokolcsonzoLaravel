<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
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
        if(Auth::check())
        {
            if(Auth::felhasznalo()->jogkor == '0') // 0=felhasznalo
            {
                return $next($request);
            }
            else
            {
                return redirect('/')->with('status', 'Nem vagy bejelentkezve.!');
            }
        }
        else
        {
            return redirect('/bejelentkezes')->with('status', 'Előbb be kell jelentkezned!');
        }
    }
}
