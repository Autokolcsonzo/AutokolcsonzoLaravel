<?php

namespace App\Http\Middleware;

use App\Models\felhasznalo;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
       // dd(Auth::check());
        if (Auth::check() && Auth::felhasznalo()->jogkor == 2) // 1=felhasznalo, 2=admin
        {
            return $next($request);
        } else {
            return redirect('/login')->with('status', 'Admin bejelentkezés szükséges!');
        }
        /*  } else {
            return redirect('/login')->with('status', 'Bejelentkezés szükséges!');
        }
        return $next($request); */
    }
}
