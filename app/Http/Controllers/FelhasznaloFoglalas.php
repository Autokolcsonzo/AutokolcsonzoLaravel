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
                    'kifizetendo_osszegeg',
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
                    'fizetes_alapja'



            )->where('felhasznalo_foglalas.felhasznalo', '=', Session::get('loginId'))->get();
            
        }

        return view('felhasznaloiFoglalasok', compact('data'));
    }
}
