<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Felhasznalo;
use App\Models\FelhasznaloModell;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class FelhasznalokController extends Controller
{



    public function adatokKiiratasa()
    {
        
    
      
        return view('adminFelhasznalok');
        /* $felhasznalok = DB::table('felhasznalo')->count();
        $foglalasok = DB::table('foglalas')->count();
        $bevetel = DB::table('fizetes')->sum('kifizetendo_osszegeg');
        $felhasznalo=FelhasznaloModell::orderBy('felhasznalo_id','DESC')->get();

     

     
        // return $adatok;
        return view('adminFelhasznalok', compact('felhasznalo', 'felhasznalok', 'foglalasok', 'bevetel')); */
    }

}
