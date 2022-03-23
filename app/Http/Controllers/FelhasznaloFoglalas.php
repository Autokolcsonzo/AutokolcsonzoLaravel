<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class FelhasznaloFoglalas extends Controller
{
    public function index()
    {
    

        $data = DB::table('foglalas')
            ->select('fogl_azonosito', 'alvazSzam', 'felhasznalo', 'fogl_kelt', 'elvitel', 'visszahozatal', 'ervenyessegi_ido', 'kedvezmeny', 'allapot')
            ->get();
        // return $adatok;
        return view('felhasznaloiFoglalasok', compact('data'));
    }
}
