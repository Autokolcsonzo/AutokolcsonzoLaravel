<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\auto;
use App\Models\modell;
use App\Models\autoKepek;
use Illuminate\Support\Facades\DB;

class AdminAutokController extends Controller
{
    /* public function __construct() {
        $this->middleware(['auth:felhasznalo']);
      } */

    public function adatokKiiratasa()
    {
        $felhasznalok = DB::table('felhasznalo')->count();
        $foglalasok = DB::table('foglalas')->count();
        $bevetel = DB::table('fizetes')->sum('kifizetendo_osszegeg');
        $adat = DB::table('auto')
            ->join('modell', 'auto.modell', '=', 'modell.modell_id')
            ->join('telephely', 'auto.telephely', '=', 'telephely.telephely_id')
            ->select('modell.tipus', 'modell.uzemanyag', 'modell.teljesitmeny', 'modell.evjarat', 'auto.napiAr', 'auto.szin', 'auto.forgalmiSzam',  'auto.alvazSzam', 'auto.statusz', 'auto.rendszam', 'modell.marka', 'telephely.varos')
            ->get();

        $modell = DB::table('modell')->get();
        $telephely = DB::table('telephely')->get();

        return view('adminAutok', compact('adat', 'felhasznalok', 'foglalasok', 'bevetel', 'telephely', 'modell'));
    }

    public function edit($alvazSzam)
    {
        $autok = Auto::find($alvazSzam);
        return view('adminAutokEdit', compact('autok'));
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

        return redirect('/adminAutok');
    }

    public function ujAuto(Request $req)
    {
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
    }

    public function ujModell(Request $req)
    {
        $modell = new Modell;

        $modell->modell = $req->input('modell');
        $modell->marka = $req->input('marka');
        $modell->tipus = $req->input('tipus');
        $modell->evjarat = $req->input('evjarat');
        $modell->kivitel = $req->input('kivitel');
        $modell->uzemanyag = $req->input('uzemanyag');
        $modell->save();
        return redirect('/adminAutok');
    }

    public function ujKep(Request $req)
    {
        /* $auto_kepek = [
            //alváz szám, migrációba is vissza
            'kep' => $req->kep
        ]; */

        $auto_kepek = new autoKepek();
        //   $alvazSzam = $req->input('alvazSzam');

        //  $alvaz = autoKepek::find($alvazSzam);

        $auto_kepek->alvazSzam = $req->input('alvazSzam');

        // $auto_kepek->kep = $req->input('kep');

        // $input = $req->all();

        if ($req->hasFile('kep')) {
            
            $image = $req->file('kep');
            $image_name = $image->getClientOriginalName();
            $destinaion_path = 'kepek/autok/' . $image_name;
            request()->file('kep')->move(public_path('kepek/autok/'), $image_name);

            $auto_kepek['kep'] = $destinaion_path;
            // dd($input['kep']);
        }
        $auto_kepek->save();
        //  $alvaz->save($auto_kepek);
        //$auto_kepek->kep = $req->input('kep');
        // DB::table('auto_kepek')->insert($input);


        //   return redirect()->back();
        return redirect('/adminAutok')->with('auto_kepek', $auto_kepek);
    }
}
