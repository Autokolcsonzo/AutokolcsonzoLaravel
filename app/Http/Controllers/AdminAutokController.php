<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\auto;
use App\Models\autoKepek;
use App\Models\modell;
use App\Models\Felhasznalo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminAutokController extends Controller
{

    public function adatokKiiratasa() {
        $felhasznalok = DB::table('felhasznalo')->count();
        $foglalasok = DB::table('foglalas')->count();
        $bevetel = DB::table('fizetes')->sum('kifizetendo_osszegeg');
        $adat = DB::table('auto')
        ->join('modell', 'auto.modell', '=', 'modell.modell_id')
        ->join('telephely', 'auto.telephely', '=', 'telephely.telephely_id')
        ->join('auto_kepek', 'auto.alvazSzam', '=', 'auto_kepek.alvazSzam')
        ->select('auto_kepek.kep', 'auto.alvazSzam', 'auto.statusz', 'auto.rendszam', 'modell.marka', 'telephely.varos')
        ->get();
       // return $adatok;
       return view('adminAutok', compact('adat','felhasznalok', 'foglalasok', 'bevetel'));
    }
    
    public function edit($alvazSzam) {       
        $autok = Auto::find($alvazSzam);
        return view('adminAutokEdit', compact('autok'));
        /* return response()->json(auto::find($rendszam), 200); */
    }
    
    public function delete($alvazSzam) {
        Auto::find($alvazSzam)->delete();
        return redirect()->back();
    }
    
    public function update(Request $req, $alvazSzam) {
        $input = $req->all();

        $data = Auto::find($alvazSzam);

        $data->alvazSzam = $input['alvazSzam'];
        $data->telephely = $input['telephely'];
        $data->napiAr = $input['napiAr'];
        $data->szin =$input['szin'];
        $data->forgalmiSzam = $input['forgalmiSzam'];
        $data->statusz = $input['statusz'];
        $data->rendszam = $input['rendszam'];
        $data->save();

/*         return response()->json(['message'=>'success'], 200); */

        return redirect('/adminAutok');
    }

    public function store(Request $req)
    {
        /*   $modell_id = 'modell_id'; */

        $modell = [
            'marka' => $req->marka,
            'tipus' => $req->tipus,
          /*   'modell' => $req->modell, */ // nem jó
            'evjarat' => $req->evjarat,
            'kivitel' => $req->kivitel,
            'uzemanyag' => $req->uzemanyag,
            'teljesitmeny' => $req->teljesitmeny,
            /* 'modell_id' => $modell_id */
        ];

        DB::table('modell')->insert($modell);

        $auto = [
            'alvazSzam' => $req->alvazSzam,
            'modell' => $req->modell, //$modell->modell_id, nem jó
            'telephely' => $req->telephely,
            'napiAr' => $req->napiAr,
            /* 'tulajdonsag' => $req->tulajdonsag, EZ MAJD A MODELLBŐL JÖN és az extra is*/
            'szin' => $req->szin,
            'forgalmiSzam' => $req->forgalmiSzam,
            'statusz' => $req->statusz,
            'rendszam' => $req->rendszam
        ];

        DB::table('auto')->insert($auto);

        $auto_kepek = [
            //alváz szám, migrációba is vissza
            'kep' => $req->kep
        ];

        $input = $req->all();

        if ($req->hasFile('kep'))
       {
           $destinaion_path = 'public/images/autok';
           $image = $req->file('kep');
           $image_name = $image->getClientOriginalName();
           $path = $req->file('kep')->storeAs($destinaion_path, $image_name); 
           $input['kep'] = $image_name;
           /* $file = $req->file('kep');
           $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('kepek/autok/'.$filename); */
            
       }

        DB::table('auto_kepek')->insert($auto_kepek);

        //   return redirect()->back();
        return redirect()->back()->with('status', 'adatok sikeresen feltöltve');
    }
}