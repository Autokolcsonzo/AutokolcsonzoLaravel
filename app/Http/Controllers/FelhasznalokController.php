<?php

namespace App\Http\Controllers;

class FelhasznalokController extends Controller
{



    public function adatokKiiratasa()
    {
        return view('adminFelhasznalok');
        /* $felhasznalok = DB::table('felhasznalo')->count();
        $foglalasok = DB::table('foglalas')->count();
        $bevetel = DB::table('fizetes')->sum('kifizetendo_osszeg');
        $felhasznalo=DB::table('felhasznalo')->get();

     

     
        // return $adatok;
        return view('adminFelhasznalok', compact('felhasznalo', 'felhasznalok', 'foglalasok', 'bevetel')); */
    }

}
