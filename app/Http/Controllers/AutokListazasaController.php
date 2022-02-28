<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\auto;
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

    public function index()
    {
        $result = DB::table('auto')
            ->join('modell', 'auto.modell', '=', 'modell.modell_id')
            ->join('telephely', 'auto.telephely', '=', 'telephely.telephely_id')
          //  ->join('auto_kepek', 'auto.alvazSzam', '=', 'auto_kepek.alvazSzam')
            ->select('auto.napiAr', 'auto.szin', 'modell.marka', 'modell.modell', 'modell.kivitel', 'modell.uzemanyag', 'telephely.varos',)
            ->get();
        return $result;
    }
    
    public function adminIndex()
    {
        $result = DB::table('auto')
            ->join('modell', 'auto.modell', '=', 'modell.modell_id')
            ->join('telephely', 'auto.telephely', '=', 'telephely.telephely_id')
            ->select('auto.rendszam', 'modell.marka', 'telephely.varos',)
            ->get();
        return $result;
    }

    public function adminOsszesFelhasznalok()
    {
       /*  $result = DB::table('felhasznalo')->get()->count(); */
        dd('ok');
        /* return view('adminAutok', compact('result')); */
        /* $result = DB::table('felhasznalo')
            ->select('felhasznalo_id', DB::raw('COUNT(felhasznalo_id)'))
            ->groupBy('felhasznalo_id');
        return $result; */
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