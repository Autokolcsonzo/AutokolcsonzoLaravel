<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\AdminFoglalasModel;

class FelhasznaloFoglalas extends Controller
{
    public function index()
    {
        $fogazonKelt = DB::table('felhasznalo_foglalas')
        ->selectRaw('fogazon_foglalas , MAX(kelt) as kelt')
        ->groupBy('fogazon_foglalas')
        ->get();
        $fogazonKelt = $fogazonKelt->toArray();
        $fogazonArray = array_column($fogazonKelt, 'fogazon_foglalas');
        $keltArray = array_column($fogazonKelt, 'kelt');

        DB::table('foglalas')
              ->whereRaw('ervenyessegi_ido < CURRENT_DATE')
              ->update(['allapot' => 'Teljesítve']);

        $data = array();
        $password = array();
        if (Session::has('loginId')) {
            $data = DB::table('felhasznalo_foglalas')
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
                    'kep',
                    'uzemanyag',
                    'kivitel',
                    'marka',
                    'tipus',
                    'modell',
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
                ->where('felhasznalo_foglalas.felhasznalo', '=', Session::get('loginId'))
                ->whereIn('fogazon_foglalas', $fogazonArray)
                ->whereIn('kelt', $keltArray)
                ->groupBy('fogazon_foglalas')
                ->get()
                ->sortByDesc('kelt');
        }

        return view('felhasznaloiFoglalasok', compact('data'));
    }


    public function update(Request $request)
    {
        $data = $request->all();

        $fogl_azonosito = $request->input('fogl_azonosito');


        $foglalas = AdminFoglalasModel::find($fogl_azonosito);

        $data['allapot'] = "Lemondva";

        $foglalas->update($data);

        return redirect()->back()->with('status', 'A foglalás lemondásra került!');
    }
}
