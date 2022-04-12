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
        $felhasznalok = DB::table('felhasznalo')->count();
        $foglalasok = DB::table('foglalas')->count();
        $bevetel = DB::table('fizetes')->sum('kifizetendo_osszeg');

        $modell = DB::table('modell')->get();
        $telephely = DB::table('telephely')->get();

        $adat = DB::table('auto')
        ->join('modell', 'auto.modell', '=', 'modell.modell_id')
        ->join('telephely', 'auto.telephely', '=', 'telephely.telephely_id')
        ->select('modell.tipus', 'modell.uzemanyag', 'modell.teljesitmeny', 'modell.evjarat', 'auto.napiAr', 'auto.szin', 'auto.forgalmiSzam',  'auto.alvazSzam', 'auto.statusz', 'auto.rendszam', 'modell.marka', 'telephely.varos')
        ->get();

        if (Session()->has('loginId')) {
            $loggedUser = Felhasznalo::where('felhasznalo_id', '=', Session()->get('loginId'))->first();
            if ($loggedUser->jogkor == 2) {
                return response()->view('adminAutok', compact('loggedUser', 'adat', 'telephely', 'modell', 'felhasznalok', 'foglalasok', 'bevetel'));
            } else {
                return redirect()->back();
            }
        } else {
            return response()->view('auth.login');
        }
        return $next($request);
    }
}
