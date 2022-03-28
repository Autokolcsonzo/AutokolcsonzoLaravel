<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminFoglalasModel;
use Illuminate\Support\Facades\DB;
use App\Models\KedvezmenyekModell;
use App\Models\FizetesModel;


class FoglalasController extends Controller
{
    public function foglalas(Request $request)
    {   
        //kedvezmény százalékla a napokra
        $datum1 = date_create($request->input('foglalas_tol'));
        $datum2 = date_create($request->input('foglalas_ig'));
        $diff = date_diff($datum1,$datum2);
        $napok = $diff->format("%a");
        $napok = $napok + 1;
        //kedvezmény százalékla a napokra
        $kedvezmenyek = DB::table('kedvezmeny')
            ->select('szazalek_id', 'kedvezmeny.szazalek', 'kedvezmeny.naptol')
            ->get();
        $kedvSzazalek = 0;
        foreach ($kedvezmenyek as $kedvezmeny) {
            $szazalek_id = $kedvezmeny->szazalek_id;
            $szazalek = $kedvezmeny->szazalek;
            $naptol = $kedvezmeny->naptol;
            if($naptol <= $napok) {
                $kedvSzazalek = $szazalek_id;
            }
        }
        
        $foglalas = new AdminFoglalasModel();
        $foglalas->fogl_azonosito = $request->fogl_azonosito;
        $foglalas->alvazSzam = $request->autoId;
        $foglalas->felhasznalo = $request->custId;
        $foglalas->elvitel = $request->foglalas_tol." ".$request->foglalas_tolIdo;
        $foglalas->visszahozatal = $request->foglalas_ig." ".$request->foglalas_igIdo;
        $foglalas->fogl_kelt = $request->foglalas_kelt;
        $foglalas->ervenyessegi_ido = $request->foglalas_ig;
        $foglalas->kedvezmeny = $kedvSzazalek;
        $foglalas->allapot = 'Aktív';
        $foglalas->save();

        $foglalasId = DB::table('foglalas')
            ->select('fogl_azonosito')
            ->orderBy('fogl_azonosito', 'desc')
            ->first();
        
        $foglalasId = $foglalasId->fogl_azonosito;

        $fizetendoOsszeg = DB::table('auto')
            ->select('auto.napiAr')
            ->where('auto.alvazSzam', $request->autoId)
            ->get();
        
        $fizetendoOsszeg = $fizetendoOsszeg[0]->napiAr;
        $fizetendoOsszeg = $fizetendoOsszeg * $napok * (1 - $kedvSzazalek/100);
        $fizetendoOsszeg = (int)$fizetendoOsszeg;

        $fizetes = new FizetesModel();
        $fizetes->kifizetes_id = $request->kifizetes_id;
        $fizetes->fogl_azonosito = $foglalasId;
        $fizetes->kelt = $request->foglalas_kelt;
        $fizetes->sorszam = 0;
        $fizetes->fizetes_alapja = "foglalás létrehozva";
        $fizetes->befizetett_osszeg = 0;
        $fizetes->kifizetendo_osszegeg = $fizetendoOsszeg;
        $fizetes->save();
        
        return back()->with('success', 'Sikeres foglalás');

    }
}
