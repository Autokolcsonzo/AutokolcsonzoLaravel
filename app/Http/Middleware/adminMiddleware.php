<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Felhasznalo;

class adminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Session()->has('loginId')) {
            $loggedUser = Felhasznalo::where('felhasznalo_id', '=', Session()->get('loginId'))->first();
            if ($loggedUser->jogkor == 2) {
                return response()->view('adminAutok', compact('loggedUser'));
            } else {
                return redirect()->back();
            }
        } else {
            return response()->view('auth.login');
        }
        return $next($request);
    }
}
