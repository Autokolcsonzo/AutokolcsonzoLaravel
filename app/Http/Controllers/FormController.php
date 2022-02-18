<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\felhasznalo;

class FormController extends Controller
{
    public function index()
    {
        return view('probaForm');
    }
 
    public function store(Request $request)
    {
         
        $validatedData = $request->validate([
          'vezeteknev' => 'required',
          'keresztnev' => 'required',
          'felhasznalonev' => 'required',
          'jelszo' => 'required',
          'szul_ido' => 'required',
          'varos' => 'required',
          'megye' => 'required',
          'ir_szam' => 'required',
          'utca' => 'required',
          'hazszam' => 'required',
          'tel_szam' => 'required|unique:felhasznalo|max:255',
          'e_mail' => 'required|unique:felhasznalo|max:255',
        ]);
 
        $emp = new felhasznalo;
 
        $emp->vezeteknev = $request->vezeteknev;
        $emp->keresztnev = $request->keresztnev;
        $emp->felhasznalonev = $request->felhasznalonev;
        $emp->jelszo = $request->jelszo;
        $emp->szul_ido = $request->szul_ido;
        $emp->varos = $request->varos;
        $emp->megye = $request->megye;
        $emp->ir_szam = $request->ir_szam;
        $emp->utca = $request->utca;
        $emp->hazszam = $request->hazszam;
        $emp->tel_szam = $request->tel_szam;
        $emp->e_mail = $request->e_mail;
 
        $emp->save();
 
        return redirect('probaForm')->with('status', 'Form Data Has Been validated and insert');
 
    }
}