<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FelhasznaloModell;
use Illuminate\Support\Facades\DB;

class FelhasznaloAdmin extends Controller



{
   public function index()
   {




      $felhasznalo = FelhasznaloModell::all();

      return response()->json($felhasznalo);
   }



   public function store(Request $request)
   {

      $data = $request->all();
      FelhasznaloModell::create($data);
      return response()->json([
         'success' => true,
         'message' => 'Success',
      ]);
   }






   public function edit($felhasznalo_id)
   {
      $felhasznalo = FelhasznaloModell::where('felhasznalo_id', $felhasznalo_id)->first();
      return response()->json([
         'success' => true,
         'felhasznalo' => $felhasznalo
      ]);
   }

   public function update(Request $request, $felhasznalo_id)
   {

      $felhasznalo = FelhasznaloModell::where('felhasznalo_id', $felhasznalo_id)->first();
      $data = $request->all();
      $felhasznalo->update($data);

      return redirect()->back();
   }




   public function destroy($felhasznalo_id)
   {

      $felhasznalo = FelhasznaloModell::find($felhasznalo_id);
      $felhasznalo->delete();

      return redirect()->back();
   }
}
