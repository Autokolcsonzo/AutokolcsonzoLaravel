<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\auto;
use App\Models\modell;
use App\Models\autoKepek;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminAutokController extends Controller
{

    public function adatokKiiratasa()
    {
        $felhasznalok = DB::table('felhasznalo')->count();
        $foglalasok = DB::table('foglalas')->count();
        $bevetel = DB::table('fizetes')->sum('kifizetendo_osszegeg');
        $adat = DB::table('auto')
            ->join('modell', 'auto.modell', '=', 'modell.modell_id')
            ->join('telephely', 'auto.telephely', '=', 'telephely.telephely_id')
            ->join('auto_kepek', 'auto.alvazSzam', '=', 'auto_kepek.alvazSzam')
            ->select('modell.tipus', 'modell.uzemanyag', 'modell.teljesitmeny', 'modell.evjarat', 'auto.napiAr', 'auto.szin', 'auto.forgalmiSzam', 'auto.alvazSzam', 'auto.alvazSzam', 'auto.statusz', 'auto.rendszam', 'modell.marka', 'telephely.varos')
            ->get();
        // return $adatok;
        $modell = DB::table('modell')->get();
        $telephely = DB::table('telephely')->get();

        return view('adminAutok', compact('adat', 'felhasznalok', 'foglalasok', 'bevetel', 'telephely', 'modell'));
    }

    public function edit($alvazSzam)
    {
        $autok = Auto::find($alvazSzam);
        return view('adminAutokEdit', compact('autok'));
        /* return response()->json(auto::find($rendszam), 200); */
    }

    public function delete($alvazSzam)
    {
        $torles = DB::table('auto')
            ->leftJoin('auto_kepek', 'auto.alvazSzam', '=', 'auto_kepek.alvazSzam')
            ->where('auto.alvazSzam', $alvazSzam);
        DB::table('auto_kepek')->where('alvazSzam', $alvazSzam)->delete();
        $torles->delete();
        return redirect()->back();
    }

    public function update(Request $req, $alvazSzam)
    {
        $input = $req->all();

        $data = Auto::find($alvazSzam);

        $data->alvazSzam = $input['alvazSzam'];
        $data->telephely = $input['telephely'];
        $data->napiAr = $input['napiAr'];
        $data->szin = $input['szin'];
        $data->forgalmiSzam = $input['forgalmiSzam'];
        $data->statusz = $input['statusz'];
        $data->rendszam = $input['rendszam'];
        $data->save();

        /*         return response()->json(['message'=>'success'], 200); */

        return redirect('/adminAutok');
    }

    public function ujAuto(Request $req)
    {

   /*      $auto = [
            'alvazSzam' => $req->alvazSzam,
            'modell' => $req->modell, 
            'telephely' => $req->telephely,
            'napiAr' => $req->napiAr,
            'szin' => $req->szin,
            'forgalmiSzam' => $req->forgalmiSzam,
            'statusz' => $req->statusz,
            'rendszam' => $req->rendszam
        ];

        DB::table('auto')->insert($auto);
        return redirect()->back()->with('status', 'adatok sikeresen feltöltve'); */

        /* $auto = new Auto([
        'alvazSzam' => $req->get('alvazSzam'),
        'modell' => $req->get('modell'),
        'telephely' => $req->get('telephely'),
        'napiAr' => $req->get('napiAr'),
        'szin' => $req->get('szin'),
        'forgalmiSzam' => $req->get('forgalmiSzam'),
        'statusz' => $req->get('statusz'),
        'rendszam' => $req->get('rendszam'),
    ]);
    $auto->save();
    return redirect('adminAutok'); */
        $auto = new Auto;

        $auto->alvazSzam = $req->input('alvazSzam');
        $auto->modell = $req->input('modell');
        $auto->telephely = $req->input('telephely');
        $auto->napiAr = $req->input('napiAr');
        $auto->szin = $req->input('szin');
        $auto->forgalmiSzam = $req->input('forgalmiSzam');
        $auto->statusz = $req->input('statusz');
        $auto->rendszam = $req->input('rendszam');
        $auto->save();
        return redirect('/adminAutok');

        /* $auto = [
            'alvazSzam' => $req->alvazSzam,
            'modell' => $req->modell,
            'telephely' => $req->telephely,
            'napiAr' => $req->napiAr,
            'szin' => $req->szin,
            'forgalmiSzam' => $req->forgalmiSzam,
            'statusz' => $req->statusz,
            'rendszam' => $req->rendszam
        ];

        DB::table('auto')->insert($auto);

        //   return redirect()->back();
        return redirect()->back()->with('status', 'adatok sikeresen feltöltve'); */
    }

    public function ujModell(Request $req)
    {
        $modell = [
            'marka' => $req->marka,
            'tipus' => $req->tipus,
            'modell' => $req->modell,
            'evjarat' => $req->evjarat,
            'kivitel' => $req->kivitel,
            'uzemanyag' => $req->uzemanyag,
            'teljesitmeny' => $req->teljesitmeny,
        ];

        DB::table('modell')->insert($modell);

        //   return redirect()->back();
        return redirect()->back()->with('status', 'adatok sikeresen feltöltve');
    }

    public function ujKep(Request $req)
    {
        $auto_kepek = [
            //alváz szám, migrációba is vissza
            'kep' => $req->kep
        ];

        $input = $req->all();

        if ($req->hasFile('kep')) {
            $image = $req->file('kep');
            $image_name = $image->getClientOriginalName();
            $destinaion_path = '/public/kepek/autok/' . $image_name;
            request()->file('kep')->move(public_path('public/kepek/autok/'), $image_name);

            $input['kep'] = $destinaion_path;
        }
        DB::table('auto_kepek')->insert($auto_kepek);


        //   return redirect()->back();
        return redirect()->back()->with('status', 'adatok sikeresen feltöltve');
    }
}
