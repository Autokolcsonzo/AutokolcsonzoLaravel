<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\FelhasznaloModell;
use Illuminate\Support\Facades\DB;

class adminFelhasznaloMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        $felhasznalok = DB::table('felhasznalo')->count();
        $foglalasok = DB::table('foglalas')->count();
        $bevetel = DB::table('fizetes')->sum('kifizetendo_osszegeg');
        $felhasznalo=FelhasznaloModell::orderBy('felhasznalo_id','DESC')->get();

        
        if (Session()->has('loginId')) {
            $loggedUser = FelhasznaloModell::where('felhasznalo_id', '=', Session()->get('loginId'))->first();
            if ($loggedUser->jogkor == 2) {
                return response()->view('adminFelhasznalok', compact('felhasznalo', 'felhasznalok', 'foglalasok', 'bevetel'));               
            } else {
                return redirect()->back();
            }
        } else {
            return response()->view('welcome');
        }
        return $next($request);
    }
}
