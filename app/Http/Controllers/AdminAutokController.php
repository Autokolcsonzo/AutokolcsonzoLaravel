<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\auto;
use App\Models\autoKepek;
use App\Models\modell;
use DB;

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

    public function update(Request $req, $alvazSzam) {
         $validator = Validator::make($req->all(), [
            'alvazSzam' => 'required',
            'marka' => 'required',
            'modell' => 'required',
            'tipus' => 'required',
            'evjarat' => 'required',
            'kivitel' => 'required',
            'uzemanyag' => 'required',
            'teljesitmeny' => 'required',
            'telephely' => 'required',
            'napiAr' => 'required',
            'extra_megnevezese' => 'required',
            'tulajdonsag' => 'required',
            'szin' => 'required',
            'forgalmiSzam' => 'required',
            'statusz' => 'required',
            'rendszam' => 'required',
        ]);

       $auto = Auto::find($alvazSzam);
       if($auto)
       {
       $auto->alvazSzam = $req->input('alvazSzam');
       $auto->marka = $req->input('marka');
       $auto->modell = $req->input('modell');
       $auto->tipus = $req->input('tipus');
       $auto->evjarat = $req->input('evjarat');
       $auto->kivitel = $req->input('kivitel');
       $auto->uzemanyag = $req->input('uzemanyag');
       $auto->teljesitmeny = $req->input('teljesitmeny');
       $auto->telephely = $req->input('telephely');
       $auto->napiAr = $req->input('napiAr');
       $auto->extra_megnevezese = $req->input('extra_megnevezese');
       $auto->tulajdonsag = $req->input('tulajdonsag');
       $auto->szin = $req->input('szin');
       $auto->forgalmiSzam = $req->input('forgalmiSzam');
       $auto->statusz = $req->input('statusz');
       $auto->rendszam = $req->input('rendszam');
        $auto->update();

        return reaponae()->json(['message'=>'updated'], 200);
       }
       else {
           return reaponae()->json(['message'=>'neeem updated'], 404);
       }
    }

    
     public function store(Request $req) {
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
            

        
        /* public function save(Request $request)
    {
         
        $validatedData = $request->validate([
         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
 
        ]);
 
        $name = $request->file('image')->getClientOriginalName();
 
        $path = $request->file('image')->store('public/images');
 
 
        $save = new Photo;
 
        $save->name = $name;
        $save->path = $path;
 
        $save->save();
 
        return redirect('upload-image')->with('status', 'Image Has been uploaded');
 
    } */



        /* dd($req->only('felhasznalonev', 'jelszo')); */

        // validáció
     /*    $validator = Validator::make($req->all(), [
            'alvazSzam' => 'required',
            'marka' => 'required',
            'modell' => 'required',
            'tipus' => 'required',
            'evjarat' => 'required',
            'kivitel' => 'required',
            'uzemanyag' => 'required',
            'teljesitmeny' => 'required',
            'telephely' => 'required',
            'napiAr' => 'required',
            'extra_megnevezese' => 'required',
            'kep' => 'required',
            'tulajdonsag' => 'required',
            'szin' => 'required',
            'forgalmiSzam' => 'required',
            'statusz' => 'required',
            'rendszam' => 'required',
        ]); */

       /* $auto = new auto;
       $auto->alvazSzam = $req->input('alvazSzam');
       $auto->marka = $req->input('marka');
       $auto->modell = $req->input('modell');
       $auto->tipus = $req->input('tipus');
       $auto->evjarat = $req->input('evjarat');
       $auto->kivitel = $req->input('kivitel');
       $auto->uzemanyag = $req->input('uzemanyag');
       $auto->teljesitmeny = $req->input('teljesitmeny');
       $auto->telephely = $req->input('telephely');
       $auto->napiAr = $req->input('napiAr');
       $auto->extra_megnevezese = $req->input('extra_megnevezese');
       $auto->tulajdonsag = $req->input('tulajdonsag');
       $auto->szin = $req->input('szin');
       $auto->forgalmiSzam = $req->input('forgalmiSzam');
       $auto->statusz = $req->input('statusz');
       $auto->rendszam = $req->input('rendszam');
       if ($req->hasFile('kep'))
       {
           $file = $req->file('kep');
           $extension = $file->getClientOriginalExtension();
           $filename = time().'.'.$extension;
           $file->move('kepek/autok/', $filename);
           $auto->kep = $filename;
       }
       $auto->save();
       return redirect()->back()->with('status', 'adatok sikeresen feltöltve'); */

        // felhasználó eltárolása

       /*  auto::create([
            'alvazSzam' => $req->alvazSzam,
            'marka' => $req->marka,
            'modell' => $req->modell,
            'tipus' => $req->tipus,
            'evjarat' => $req->evjarat,
            'kivitel' => $req->kivitel,
            'uzemanyag' => $req->uzemanyag,
            'teljesitmeny' => $req->teljesitmeny,
            'telephely' => $req->telephely,
            'napiAr' => $req->napiAr,
            'extra_megnevezese' => $req->extra_megnevezese,
           // 'kep' => $req->kep,
            'tulajdonsag' => $req->tulajdonsag,
            'szin' => $req->telephely,
            'forgalmiSzam' => $req->forgalmiSzam,
            'statusz' => $req->statusz,
            'rendszam' => $req->rendszam,
        ]); */

        // redirect
        /* return redirect()->route('welcome'); */
    }

}