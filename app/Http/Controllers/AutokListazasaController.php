<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\auto;
use App\Models\auto_fill;
use App\Models\felhasznalo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutokListazasaController extends Controller
{
    //https://www.youtube.com/watch?v=T9q1uT2BEZI&t=1185s
    //https://www.youtube.com/watch?v=A1UtXw-bIeE
    //https://www.toptal.com/laravel/restful-laravel-api-tutorial
    //https://www.youtube.com/watch?v=5fTFHAwWRV4

    //TÖBB TÁBLÁS LEKÉRDEZÉS
    //https://www.educative.io/edpresso/how-to-perform-inner-join-of-two-tables-in-laravel-query?fbclid=IwAR28h_m-5DCNlVJeM3Y9EJ9GW04dYY4vA5fzYPKPQO3XxFIM-E03gxoVX3c
    //auto_fill/{mezo}/{helyszin}/{elvitel}/{visszahoz}/{marka}/{modell}/{kivitel}/{uzemanyag}/{evTol}/{evIg}/{arTol}/{arIg}
    //http://127.0.0.1:8000/api/auto_fill/k%C3%A9k/Budapest/2022-03-17/2022-03-17/BMW/X5/kombi/benzin/2014/2016/3000/5000
    public function keresesParameteresen(
                    $mezo, 
                    $helyszin, 
                    $elvitel, $visszahoz, //dátumot validálni kell.
                    //$checkboxok, //csekbxok összefűzése szükséges.
                    $marka, 
                    $modell, 
                    $kivitel, 
                    $uzemanyag, 
                    $evTol, $evIg, 
                    $arTol, $arIg)
    {
        //dd($marka);
        $result = DB::table('auto_fill')
            ->select(
                'auto_fill.alvazSzam',
                'auto_fill.statusz',
                'auto_fill.napiAr',
                'auto_fill.szin',
                'auto_fill.marka',
                'auto_fill.tipus',
                'auto_fill.modell',
                'auto_fill.evjarat',
                'auto_fill.kivitel',
                'auto_fill.uzemanyag',
                'auto_fill.teljesitmeny',
                'auto_fill.tulajdonsag',
                'auto_fill.extra_megnevezese',
                'auto_fill.megye',
                'auto_fill.ir_szam',
                'auto_fill.varos',
                'auto_fill.utca',
                'auto_fill.hazszam'
            )
            ->where('auto_fill.varos','=', $helyszin)
            ->where('auto_fill.marka','=', $marka)
            ->where('auto_fill.modell','=', $modell)
            ->where('auto_fill.kivitel','=', $kivitel)
            ->where('auto_fill.uzemanyag','=', $uzemanyag)
            //->where('auto_fill.tulajdonsag','=', $tulajdonsag)
            ->where('auto_fill.napiAr','<=', $arIg)
            ->where('auto_fill.napiAr','>=', $arTol)
            ->where('auto_fill.evjarat','>=', $evTol)
            ->where('auto_fill.evjarat','<=', $evIg)
            ->where('auto_fill.szin', 'LIKE' , "%{$mezo}%")
            ->orWhere('auto_fill.marka', 'LIKE' , "%{$mezo}%")
            ->orWhere('auto_fill.tipus', 'LIKE' , "%{$mezo}%")
            ->orWhere('auto_fill.modell', 'LIKE' , "%{$mezo}%")
            ->orWhere('auto_fill.kivitel', 'LIKE' , "%{$mezo}%")
            ->orWhere('auto_fill.uzemanyag', 'LIKE' , "%{$mezo}%")
            ->orWhere('auto_fill.tulajdonsag', 'LIKE' , "%{$mezo}%")
            ->orWhere('auto_fill.extra_megnevezese', 'LIKE' , "%{$mezo}%")
            ->get();
            
        return $result;
    }



    public function create()
    {
    }

    public function store(Request $request)
    {
        $auto = new Auto;
        $auto->alvazSzam = $request->alvazSzam;
        $auto->modell = $request->modell;
        $auto->telephely = $request->telephely;
        $auto->napiAr = $request->napiAr;
        $auto->szin = $request->szin;
        $auto->forgalmiSzam = $request->forgalmiSzam;
        $auto->statusz = $request->statusz;
        $auto->rendszam = $request->rendszam;
        $result = $auto->save();
        if ($result) {
            return ['result' => 'Auto added.'];
        } else {
            return ['result' => 'Auto nem került hozzáadásra.'];
        }
    }

    public function show($alvazSzam)
    {
        /* $result = Auto::where('alvazSzam', '=', $alvazSzam)->first(); */
        /* return response()->json($result); */
        $auto = Auto::find($alvazSzam);
        return response()->json($auto);
    }

    public function edit($alvazSzam)
    {
    }

    public function update(Request $request, $alvazSzam)
    {
        $auto = new Auto;
        $result = Auto::where('alvazSzam', '=', $alvazSzam)->first();
        $auto->alvazSzam = $request->alvazSzam;
        $auto->modell = $request->modell;
        $auto->telephely = $request->telephely;
        $auto->napiAr = $request->napiAr;
        $auto->szin = $request->szin;
        $auto->forgalmiSzam = $request->forgalmiSzam;
        $auto->statusz = $request->statusz;
        $auto->rendszam = $request->rendszam;
        $result = $auto->save();
        if ($result) {
            return ['result' => 'Auto updated.'];
        } else {
            return ['result' => 'Auto not updated.'];
        }
    }

    public function destroy($alvazSzam)
    {
        $auto = new Auto;
        $result = Auto::where('alvazSzam', '=', $alvazSzam)->first();
        $result = $auto->delete();
        if ($result) {
            return ['result' => 'Auto deleted.'];
        } else {
            return ['result' => 'Auto not deleted.'];
        }
    }
}
