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
        $bevetel = DB::table('fizetes')->sum('befizetett_osszeg');
        
        
        $fogazonKelt = DB::table('felhasznalo_foglalas')
        ->selectRaw('fogazon_foglalas , MAX(kelt) as kelt')
        ->groupBy('fogazon_foglalas')
        ->get();
        $fogazonKelt = $fogazonKelt->toArray();
        $fogazonArray = array_column($fogazonKelt, 'fogazon_foglalas');
        $keltArray = array_column($fogazonKelt, 'kelt');
        //dd($fogazonArray, $keltArray);
        
        
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
                'kifizetendo_osszeg',
                'kedvezmeny',
                'megye',
                'ir_szam',
                'varos',
                'utca',
                'hazszam',
                'napiar',
                'fizetes_alapja',
                'foglalas_osszege',
                'fogl_kelt',
                'kelt'

            )
            ->whereIn('fogazon_foglalas', $fogazonArray)
            ->whereIn('kelt', $keltArray)
            ->groupBy('fogazon_foglalas')
            ->get();
            //->sortBy('kelt');


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