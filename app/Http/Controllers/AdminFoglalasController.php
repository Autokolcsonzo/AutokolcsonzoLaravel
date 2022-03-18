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

        $adat = DB::table('foglalas')
            ->select('fogl_azonosito', 'alvazSzam', 'felhasznalo', 'fogl_kelt', 'elvitel', 'visszahozatal', 'ervenyessegi_ido', 'kedvezmeny', 'allapot')
            ->get();
        // return $adatok;
        return view('adminFoglalas', compact('adat', 'felhasznalok', 'foglalasok', 'bevetel'));
    }

    public function create()
    {
    }

    public function store(Request $fogl_azonosito)
    {
        $foglalas = AdminFoglalasModel::find($fogl_azonosito);

        return response()->json($foglalas);
    }

    public function show($fogl_azonosito)
    {
    }

    public function edit($fogl_azonosito)
    {
    }

    public function update(Request $request, $fogl_azonosito)
    {
    }

    public function destroy($fogl_azonosito)
    {
    }

    public function expand()
    {
        $foglalas = AdminFoglalasModel::with('felhasznalo')->get();
        return $foglalas;
    }

    public function osszAdatok()
    {
        $felhasznalok = DB::table('felhasznalo')->count();
        $foglalasok = DB::table('foglalas')->count();
        $bevetel = DB::table('foglalas')->select('kifizetendo_osszegeg')->count();
        return view('adminFoglalas', compact('felhasznalok', 'foglalasok', 'bevetel'));
    }
}
