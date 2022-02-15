<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FelhasznaloModell;
use Illuminate\Http\Request;

class FelhasznalokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $felhasznalok = FelhasznaloModell::all(); 
        return $felhasznalok;
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
        $felhasznalo->profilkep = $request->profilkep;
        $felhasznalo->varos = $request->varos;
        $felhasznalo->megye = $request->megye;
        $felhasznalo->ir_szam = $request->ir_szam;
        $felhasznalo->utca = $request->utca;
        $felhasznalo->hazszam = $request->hazszam;
        $felhasznalo->tel_szam = $request->tel_szam;
        $felhasznalo->e_mail = $request->e_mail;
        $felhasznalo->reg_datum = $request->reg_datum;
        $felhasznalo->jogkor = $request->jogkor;
        $felhasznalo->telephely = $request->telephely;
       $felhasznalo->save();
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
    public function edit(FelhasznaloModell $felhasznalo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $felhasznalo_id)
    {
        $felhasznalo = FelhasznaloModell::find($felhasznalo_id);
        $felhasznalo->felhasznalo_id = $request->felhasznalo_id;
        $felhasznalo->vezeteknev = $request->vezeteknev;
        $felhasznalo->keresztnev = $request->keresztnev;
        $felhasznalo->felhasznalonev = $request->felhasznalonev;
        $felhasznalo->jelszo = $request->jelszo;
        $felhasznalo->szul_ido = $request->szul_ido;
        $felhasznalo->profilkep = $request->profilkep;
        $felhasznalo->varos = $request->varos;
        $felhasznalo->megye = $request->megye;
        $felhasznalo->ir_szam = $request->ir_szam;
        $felhasznalo->utca = $request->utca;
        $felhasznalo->hazszam = $request->hazszam;
        $felhasznalo->tel_szam = $request->tel_szam;
        $felhasznalo->e_mail = $request->e_mail;
        $felhasznalo->reg_datum = $request->reg_datum;
        $felhasznalo->jogkor = $request->jogkor;
        $felhasznalo->telephely = $request->telephely;
       $felhasznalo->save();
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
}
