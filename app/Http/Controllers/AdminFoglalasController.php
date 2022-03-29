<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foglalas;
use App\Models\AdminFoglalasModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminFoglalasController extends Controller
{

    public function adatokKiiratasa()
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
        return view('adminFoglalas', compact('adat', 'felhasznalok', 'foglalasok', 'bevetel'));
    }

    public function create()
    {
    }

    public function store(Request $fogl_azonosito)
    {
  
    }

    public function show($fogl_azonosito)
    {
    }

    public function edit($fogl_azonosito)
    {
        $data = AdminFoglalasModel::find($fogl_azonosito);
        return view('adminFoglalasModositas', compact('data'));
    }

    public function update(Request $request, $fogl_azonosito)
    {
    }

    public function destroy($fogl_azonosito)
    {
    }


    public function osszAdatok()
    {
        $felhasznalok = DB::table('felhasznalo')->count();
        $foglalasok = DB::table('foglalas')->count();
        $bevetel = DB::table('foglalas')->select('kifizetendo_osszegeg')->count();
        return view('adminFoglalas', compact('felhasznalok', 'foglalasok', 'bevetel'));
    }
}
