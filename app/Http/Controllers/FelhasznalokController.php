<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FelhasznaloModell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FelhasznalokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $felhasznalo = FelhasznaloModell::all(); 
        return $felhasznalo;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $felhasznalo = new FelhasznaloModell();
        $felhasznalo->felhasznalo_id = $request->felhasznalo_id;
        $felhasznalo->vezeteknev = $request->vezeteknev;
        $felhasznalo->keresztnev = $request->keresztnev;
        $felhasznalo->felhasznalonev = $request->felhasznalonev;
        $felhasznalo->jelszo = $request->jelszo;
        $felhasznalo->szul_ido = $request->szul_ido;
        $felhasznalo->varos = $request->varos;
        $felhasznalo->megye = $request->megye;
        $felhasznalo->ir_szam = $request->ir_szam;
        $felhasznalo->utca = $request->utca;
        $felhasznalo->hazszam = $request->hazszam;
        $felhasznalo->tel_szam = $request->tel_szam;
        $felhasznalo->e_mail = $request->e_mail;
       
        $felhasznalo->save();

        $felhasznalo_kepek = [
          
            'profilkep' => $req->kep
        ];

        DB::table('felhasznalo')->insert($felhasznalo_kepek);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($felhasznalo_id)
    {
        $felhasznalo = FelhasznaloModell::find($felhasznalo_id);
      
        return response()->json($felhasznalo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($felhasznalo_id)

    {
        /* $felhasznalo = FelhasznaloModell::findOrFail($felhasznalo_id); */

     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$felhasznalo_id)
    {

        
    
        $felhasznalo = FelhasznaloModell::findOrFail($felhasznalo_id);
     
        $felhasznalo->vezeteknev = $request->vezeteknev;
        $felhasznalo->keresztnev = $request->keresztnev;
        $felhasznalo->felhasznalonev = $request->felhasznalonev;
        $felhasznalo->jelszo = $request->jelszo;
        $felhasznalo->szul_ido = $request->szul_ido;
        $felhasznalo->varos = $request->varos;
        $felhasznalo->megye = $request->megye;
        $felhasznalo->ir_szam = $request->ir_szam;
        $felhasznalo->utca = $request->utca;
        $felhasznalo->hazszam = $request->hazszam;
        $felhasznalo->tel_szam = $request->tel_szam;
        $felhasznalo->e_mail = $request->e_mail;
     
        
       $felhasznalo->save();
       return view('felhasznalo.update', compact('felhasznalo'));
      
      
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($felhasznalo_id)
    {
        $felhasznalo = FelhasznaloModell::find($felhasznalo_id);
        $felhasznalo->delete();
    }

    public function osszAdatok() {
        $felhasznalok = DB::table('felhasznalo')->count();
        $foglalasok = DB::table('foglalas')->count();
        $bevetel = DB::table('foglalas')->select('kifizetendo_osszegeg')->count();
        return view('adminFelhasznalok', compact('felhasznalok', 'foglalasok', 'bevetel'));
    }
}
