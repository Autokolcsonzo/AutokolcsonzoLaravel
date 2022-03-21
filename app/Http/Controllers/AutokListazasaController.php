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
    
    //találatok kereső alapján. a tulajdonságog mindig AND ek
    //keresesParameteresen( {mezo}/{helyszin}/{elvitel}/{visszahoz}/{marka}/{modell}/{kivitel}/{uzemanyag}/{evTol}/{evIg}/{arTol}/{arIg}/{checkboxok})
    //http://127.0.0.1:8000/api/auto_fill/kék/Budapest/2022-03-25/2022-03-26/BMW/X5/Kombi/Benzin/2013/2022/2000/6000/GPS+ABS
    //http://127.0.0.1:8000/api/auto_fill/null/null/2022-03-25/2022-03-26/null/null/null/null/null/null/null/null/null
    public function keresesParameteresen(
        $mezo, 
        $helyszin, 
        $elvitel, $visszahoz, //dátumot validálni kell.
        $marka, 
        $modell, 
        $kivitel, 
        $uzemanyag, 
        $evTol, $evIg, 
        $arTol, $arIg,
        $checkboxok)
    {
        //$mezoArray = explode("+", $mezo);
        $checkboxArray = explode("+", $checkboxok);
        /*->orWhere('auto_fill.marka', 'LIKE' , $mezo)
            ->orWhere('auto_fill.tipus', 'LIKE' , $mezo)
            ->orWhere('auto_fill.modell', 'LIKE' , $mezo)
            ->orWhere('auto_fill.kivitel', 'LIKE' , $mezo)
            ->orWhere('auto_fill.uzemanyag', 'LIKE' , $mezo)
            ->orWhere('auto_fill.tulajdonsag', 'LIKE' , $mezo)
            ->orWhere('auto_fill.extra_megnevezese', 'LIKE' , $mezo)*/
        /*if($mezoArray[0] == 'null'){    -----------------------------------------Folyatatni
            $mezoString = 'auto_fill.marka LIKE "%" AND
                     auto_fill.tipus LIKE "%" AND
                     auto_fill.modell LIKE "%" AND
                     auto_fill.kivitel LIKE "%" AND
                     auto_fill.uzemanyag LIKE "%" AND
                     auto_fill.tulajdonsag LIKE "%" AND
                     auto_fill.extra_megnevezese "%"';
        }else{
            $checkboxString = 'auto_fill.tulajdonsag LIKE';
            for ($i=0; $i < count($checkboxArray); $i++) {
                if($i == count($checkboxArray)-1){
                    $checkboxString .= ' "%'.$checkboxArray[$i].'%"';
                }else{
                    $checkboxString .= ' "%'.$checkboxArray[$i].'%" AND auto_fill.tulajdonsag LIKE';
                }
            }
        }*/
        if($helyszin == 'null'){
            $helyszin = '%';
        }
        if($mezo == 'null'){
            $mezo = '%';
        }
        /*if($elvitel == 'null'){
            $elvitel = '%';
        }
        if($visszahoz == 'null'){
            $visszahoz = '%';
        }*/
        if($marka == 'null'){
            $marka = '%';
        }
        if($modell == 'null'){
            $modell = '%';
        }
        if($kivitel == 'null'){
            $kivitel = '%';
        }
        if($uzemanyag == 'null'){
            $uzemanyag = '%';
        }
        if($evTol == 'null'){
            $evTol = 1900;
        }
        if($evIg == 'null'){
            $evIg = 5000;
        }
        if($arTol == 'null'){
            $arTol = 0;
        }
        if($arIg == 'null'){
            $arIg = 10000000000;
        }
        if($checkboxArray[0] == 'null'){
            $checkboxString = 'auto_fill.tulajdonsag LIKE "%"';
        }else{
            $checkboxString = 'auto_fill.tulajdonsag LIKE';
            for ($i=0; $i < count($checkboxArray); $i++) {
                if($i == count($checkboxArray)-1){
                    $checkboxString .= ' "%'.$checkboxArray[$i].'%"';
                }else{
                    $checkboxString .= ' "%'.$checkboxArray[$i].'%" AND auto_fill.tulajdonsag LIKE';
                }
            }
        }
        //WHERE interests LIKE '%sports%' OR interests LIKE '%pub%'
        
        
        
        //echo($checkboxString);
        //die;
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
            ->where('auto_fill.varos','LIKE', $helyszin)
            ->where('auto_fill.marka','LIKE', $marka)
            ->where('auto_fill.modell','LIKE', $modell)
            ->where('auto_fill.kivitel','LIKE', $kivitel)
            ->where('auto_fill.uzemanyag','LIKE', $uzemanyag)
            //->whereIn('auto_fill.tulajdonsag', $checkboxArray)
            
            ->whereRaw($checkboxString)
            ->where('auto_fill.napiAr','<=', $arIg)
            ->where('auto_fill.napiAr','>=', $arTol)
            ->where('auto_fill.evjarat','>=', $evTol)
            ->where('auto_fill.evjarat','<=', $evIg)
            ->where('auto_fill.szin', 'LIKE' , $mezo)
            /*->orWhere('auto_fill.marka', 'LIKE' , $mezo)
            ->orWhere('auto_fill.tipus', 'LIKE' , $mezo)
            ->orWhere('auto_fill.modell', 'LIKE' , $mezo)
            ->orWhere('auto_fill.kivitel', 'LIKE' , $mezo)
            ->orWhere('auto_fill.uzemanyag', 'LIKE' , $mezo)
            ->orWhere('auto_fill.tulajdonsag', 'LIKE' , $mezo)
            ->orWhere('auto_fill.extra_megnevezese', 'LIKE' , $mezo)*/
            ->get();
            //dd($checkboxArray);
        /*dd($mezo, 
        $helyszin, 
        $elvitel, $visszahoz, //dátumot validálni kell.
        //$checkboxok, //csekbxok összefűzése szükséges.
        $marka, 
        $modell, 
        $kivitel, 
        $uzemanyag, 
        $evTol, $evIg, 
        $arTol, $arIg,
        $checkboxString);*/

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
