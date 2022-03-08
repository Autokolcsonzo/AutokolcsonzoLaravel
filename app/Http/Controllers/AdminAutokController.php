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
    
    public function adminIndex()
    {
        $result = DB::table('auto')
            ->join('modell', 'auto.modell', '=', 'modell.modell_id')
            ->join('telephely', 'auto.telephely', '=', 'telephely.telephely_id')
            ->select('auto.rendszam', 'modell.marka', 'telephely.varos')
            ->get();
        return $result;
    }

    public function adminOsszesFelhasznalok()
    {
        /*  $result = DB::table('felhasznalo')->get()->count(); */
        /* dd('ok'); */
        /* return view('adminAutok', compact('result')); */
        /* $result = DB::table('felhasznalo')
            ->select('felhasznalo_id', DB::raw('COUNT(felhasznalo_id)'))
            ->groupBy('felhasznalo_id');
        return $result; */

        $count = DB::table('felhasznalo')->get()->count();
        return view('adminAutok', compact('count'));
    }

    public function create() {
        $autok = Auto::all();
        return view('adminAutok', compact('autok'));
    }

     public function edit($auto) {
         $auto = Auto::find($auto);
         return view('adminAutok', compact('auto'));
        /* return response()->json(auto::find($rendszam), 200); */
    }

    public function update(Request $req, $data) {
        $input = $req->all();

        $data = Auto::find($data);

        $data->alvazSzam = $input['alvazSzam'];
      //  $data->marka = $input['marka'];
        $data->modell = $input['modell'];
  /*       $data->tipus = $input['tipus'];
        $data->evjarat = $input['evjarat'];
        $data->kivitel = $input['kivitel'];
        $data->uzemanyag = $input['uzemanyag'];
        $data->teljesitmeny = $input['teljesitmeny']; */
        $data->telephely = $input['telephely'];
        $data->napiAr = $input['napiAr'];
       /*  $data->extra_megnevezese = $input['extra_megnevezese'];
        $data->kep = $input['kep']; */
        $data->szin = $input['szin'];
        $data->forgalmiSzam = $input['forgalmiSzam'];
        $data->statusz = $input['statusz'];
        $data->rendszam = $input['rendszam'];
        $data->save();

        return redirect('/adminAutok');
    }

    public function store(Request $req)
    {
        /*   $modell_id = 'modell_id'; */

        $modell = [
            'marka' => $req->marka,
            'tipus' => $req->tipus,
            'modell' => $req->modell, // nem jó
            'evjarat' => $req->evjarat,
            'kivitel' => $req->kivitel,
            'uzemanyag' => $req->uzemanyag,
            'teljesitmeny' => $req->teljesitmeny,
            /* 'modell_id' => $modell_id */
        ];
        /* return dd($saveRecord); */

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

        /* if ($req->hasFile('kep'))
       {
           //$file = $request->file('image');
           //$contents = $file->openFile()->fread($file->getSize());
           $file = $req->file('kep');
           $extension = $file->getClientOriginalExtension();
           $filename = time().'.'.$extension;
           $file->move('public/kepek/autok', $filename);
           $auto->kep = $filename;
       } */

        DB::table('auto_kepek')->insert($auto_kepek);

        //   return redirect()->back();
        return redirect()->back()->with('status', 'adatok sikeresen feltöltve');
    }

}