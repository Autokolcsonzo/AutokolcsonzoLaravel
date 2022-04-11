<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\auto;
use App\Models\modell;
use App\Models\autoKepek;
use App\Models\Felhasznalo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminAutokController extends Controller
{

    public function adatokKiiratasa()
    {
        return view('adminAutok');
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
            ->leftJoin('auto_extra', 'auto.alvazSzam', '=', 'auto_extra.alvazSzam')
            ->leftJoin('foglalas', 'auto.alvazSzam', '=', 'foglalas.alvazSzam')
            ->where('auto.alvazSzam', $alvazSzam);
        DB::table('auto_kepek')->where('alvazSzam', $alvazSzam)->delete();
        DB::table('auto_extra')->where('alvazSzam', $alvazSzam)->delete();
        DB::table('foglalas')->where('alvazSzam', $alvazSzam)->delete();
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
        return redirect('/dashboard');
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
        return redirect('/dashboard');
    }

    public function ujKep(Request $req)
    {
        $auto_kepek = new autoKepek();

        $auto_kepek->alvazSzam = $req->input('alvazSzam');

        if ($req->hasFile('kep')) {
            $image = $req->file('kep');
            $image_name = $image->getClientOriginalName();
            $destinaion_path = 'kepek/autok/' . $image_name;
            request()->file('kep')->move(public_path('kepek/autok/'), $image_name);
            $auto_kepek['kep'] = $destinaion_path;
        }

        $auto_kepek->save();

        return redirect('/dashboard')->with('auto_kepek', $auto_kepek);
    }
}
