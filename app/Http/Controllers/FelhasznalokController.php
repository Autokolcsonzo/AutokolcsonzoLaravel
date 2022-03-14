<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Felhasznalo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class FelhasznalokController extends Controller
{

     public function adatokKiiratasa() {
        $felhasznalok = DB::table('felhasznalo')->count();
        $foglalasok = DB::table('foglalas')->count();
        $bevetel = DB::table('fizetes')->sum('kifizetendo_osszegeg');

        $adat = DB::table('felhasznalo')
        ->select('jogkor', 'felhasznalonev', 'e_mail', 'reg_datum', 'ir_szam', 'megye', 'varos', 'utca', 'hazszam', 'tel_szam', 'szul_ido')
        ->get();
       // return $adatok;
       return view('adminFelhasznalok', compact('adat','felhasznalok', 'foglalasok', 'bevetel'));
    }

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

            'profilkep' => $request->kep
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
    public function edit($felhasznalo)

    {
        $felhasznalo = FelhasznaloModell::find($felhasznalo);
        return view('felhasznaloiProfil', compact('felhasznalo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

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

    public function osszAdatok()
    {
        $felhasznalok = DB::table('felhasznalo')->count();
        $foglalasok = DB::table('foglalas')->count();
        $bevetel = DB::table('foglalas')->select('kifizetendo_osszegeg')->count();
        return view('adminFelhasznalok', compact('felhasznalok', 'foglalasok', 'bevetel'));
    }
}