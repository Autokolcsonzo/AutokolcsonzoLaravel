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
                    'fogl_kelt'



                )->where('felhasznalo_foglalas.felhasznalo', '=', Session::get('loginId'))->get()->sortByDesc('fogl_kelt');
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
