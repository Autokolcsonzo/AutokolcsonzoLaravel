<?php

namespace App\Http\Controllers;

use App\Models\FelhasznaloModell;
use App\Models\Felhasznalo;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class FelhasznaloProfil extends Controller
{


     public function bejelentkezett() {
        $data = array();
        if(Session::has('loginId')) {
            $data = Felhasznalo::where('felhasznalo_id', '=', Session::get('loginId'))->first();
        }
        return view('felhasznaloiProfil', compact('data'));
    } 



 /*  

    public function modositas(Request $request, $felhasznalo_id)
    {
        $felhasznalo="ADATOK PRÓBA";

        return view('felhasznaloiProfil', compact('felhasznalo'));


    } */

   


  

}
