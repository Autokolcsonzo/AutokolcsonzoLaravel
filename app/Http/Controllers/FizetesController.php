<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FizetesModel;

class FizetesController extends Controller
{
    public function fizetes(Request $request)
    {
        //$fizetesekSzama -1 megadja a következő fizetés sorszámát.
        $fizetesekSzama = DB::table('fizetes')
            ->select('fogl_azonosito')
            ->where('fogl_azonosito', '=', $request->fogazon_foglalas)
            ->count();

        $eddigBefizetve = DB::table('fizetes')
            ->selectRaw('MAX(befizetett_osszeg) as befizetett_osszeg')
            ->where('fogl_azonosito', '=', $request->fogazon_foglalas)
            ->get();
        $fizetendo = DB::table('fizetes')
            ->selectRaw('MAX(kifizetendo_osszeg) AS kifizetendo_osszeg')
            ->distinct()
            ->where('fogl_azonosito', '=', $request->fogazon_foglalas)
            ->get();
        //dd($eddigBefizetve[0]->befizetett_osszeg);
        if($request->befizetes < 0){
            $fizetes = new FizetesModel();
            $fizetes->kifizetes_id = $request->kifizetes_id;
            $fizetes->fogl_azonosito = $request->fogazon_foglalas;
            $fizetes->kelt = $request->kelt;
            $fizetes->sorszam = $fizetesekSzama;
            $fizetes->fizetes_alapja = $request->alapja;
            $fizetes->befizetett_osszeg = $eddigBefizetve[0]->befizetett_osszeg;
            $fizetes->kifizetendo_osszeg = $fizetendo[0]->kifizetendo_osszeg + abs($request->befizetes);
            $fizetes->save();
        }else{
            $fizetes = new FizetesModel();
            $fizetes->kifizetes_id = $request->kifizetes_id;
            $fizetes->fogl_azonosito = $request->fogazon_foglalas;
            $fizetes->kelt = $request->kelt;
            $fizetes->sorszam = $fizetesekSzama;
            $fizetes->fizetes_alapja = $request->alapja;
            $fizetes->befizetett_osszeg = $request->befizetes + $eddigBefizetve[0]->befizetett_osszeg;
            $fizetes->kifizetendo_osszeg =  $fizetendo[0]->kifizetendo_osszeg;
            $fizetes->save();
        }

        

        return redirect('/adminFoglalas');
        
    }
}
