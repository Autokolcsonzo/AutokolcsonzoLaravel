<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Felhasznalo;

class adminFoglalasMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $felhasznalok = DB::table('felhasznalo')->count();
        $foglalasok = DB::table('foglalas')->count();
        $bevetel = DB::table('fizetes')->sum('kifizetendo_osszegeg');

        $adat = DB::table('felhasznalo_foglalas')
            ->select(
                'fogazon_foglalas',
                'alvazSzam',
                'felhasznalo',
                'elvitel',
                'visszahozatal',
                'fogl_kelt',
                'ervenyessegi_ido',
                'kedvezmeny',
                'allapot',
                'befizetett_osszeg',
                'kifizetendo_osszegeg',
                'kedvezmeny',
                'megye',
                'ir_szam',
                'varos',
                'utca',
                'hazszam',
                'napiar',
                'fizetes_alapja',
                'foglalas_osszege',
                'fogl_kelt'

            )->get()->sortByDesc('fogl_kelt');
        // return $adatok;

        if (Session()->has('loginId')) {
            $loggedUser = Felhasznalo::where('felhasznalo_id', '=', Session()->get('loginId'))->first();
            if ($loggedUser->jogkor == 2) {
                return response()->view('adminFoglalas', compact('adat', 'felhasznalok', 'foglalasok', 'bevetel'));
            } else {
                return redirect()->back();
            }
        } else {
            return response()->view('welcome');
        }
        return $next($request);
    }
}
