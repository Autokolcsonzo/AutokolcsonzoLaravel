<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FelhasznaloModell;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

class FelhasznaloAdmin extends Controller



{
   public function index()
   {




      $felhasznalo = FelhasznaloModell::all();

      return response()->json($felhasznalo);
   }



   public function store(Request $request)
   {

      $felhasznalo = new FelhasznaloModell();
      $felhasznalo->vezeteknev = $request->vezeteknev;
      $felhasznalo->keresztnev = $request->keresztnev;
      $felhasznalo->felhasznalonev = $request->felhasznalonev;
      $felhasznalo->jelszo = Hash::make($request->jelszo);
      $felhasznalo->szul_ido = $request->szul_ido;
      $felhasznalo->ir_szam = $request->ir_szam;
      $felhasznalo->megye = $request->megye;
      $felhasznalo->varos = $request->varos;
      $felhasznalo->utca = $request->utca;
      $felhasznalo->hazszam = $request->hazszam;
      $felhasznalo->tel_szam = $request->tel_szam;
      $felhasznalo->e_mail = $request->e_mail;
      $felhasznalo->telephely = $request->telephely;
      $felhasznalo->jogkor = 2;
      $felhasznalo->save();

      return redirect()->back()->with('status', 'Adatok sikeresen feltöltve!');
   }




   public function destroy($felhasznalo_id)
   {
      
      $foglalasid = DB::table('foglalas')
      ->select('fogl_azonosito')
      ->distinct()
      ->where('felhasznalo', '=', $felhasznalo_id)
      ->get();
      $foglIdArray = array();
      foreach ($foglalasid as $value) {
         foreach ($value as $id) {
            array_push($foglIdArray, $id);
         }
      }

      DB::table('fizetes')
      ->whereIn('fogl_azonosito', $foglIdArray)
      ->delete();

      DB::table('foglalas')
      ->whereIn('fogl_azonosito', $foglIdArray)
      ->delete();

      $felhasznalo = FelhasznaloModell::find($felhasznalo_id);
      $felhasznalo->delete();


      return redirect()->back()->with('status', 'Adatok sikeresen törölve!');
   }




   public function keres(Request $request)
   {
      $queryString = $request->query();
      foreach ($queryString as $key => $value) {
         $explodedKey = explode('_', $key);
         $column = $explodedKey[0];
         $expression = $explodedKey[1];
         $felhasznalo = FelhasznaloModell::where($column, $expression, '%' . $value . '%')->get();
      }
      return $felhasznalo;
   }
}
