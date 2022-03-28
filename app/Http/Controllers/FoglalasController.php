<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminFoglalasModel;

class FoglalasController extends Controller
{
    public function foglalas(Request $request)
    {
        //dd($request->all());
        $foglalas = new AdminFoglalasModel();
        $foglalas->fogl_azonosito = $request->fogl_azonosito;
        $foglalas->alvazSzam = $request->autoId;
        $foglalas->felhasznalo = $request->custId;
        $foglalas->elvitel = $request->foglalas_tol." ".$request->foglalas_tolIdo;
        $foglalas->visszahozatal = $request->foglalas_ig." ".$request->foglalas_igIdo;
        $foglalas->fogl_kelt = $request->foglalas_kelt;
        $foglalas->ervenyessegi_ido = $request->foglalas_ig;
        $foglalas->kedvezmeny = 1;
        $foglalas->allapot = 'Aktív';
        $foglalas->save();
         
        return back()->with('success', 'Sikeres foglalás');

    }
}
