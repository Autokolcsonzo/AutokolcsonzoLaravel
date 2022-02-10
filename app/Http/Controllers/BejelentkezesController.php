<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\felhasznalo;
use Illuminate\Support\Facades\Auth;

class BejelentkezesController extends Controller
{
     public function index()
    {
        return view ('bejelentkezes');
    }

    public function addBejelentkezes(Request $request)
    {
        $cus = new felhasznalo();
        $cus->felhasznalonev = $request->felhasznalonev;
        $cus->jelszo = $request->jelszo;
        $cus->save();
        
        return view ('bejelentkezes');
    }

    /* function list() {
        
    } */

  /*   public function index()
    {
        return view('bejelentkezes');
    } */

   /*  public function login(Request $req)
    {
        $validalt = $req->validate([
            'felhasznalonev' => "required",
            'jelszo' => "required"
        ]);

                if (Auth::attempt($validalt)) {
            $req->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'fnev'
        ])

        return view('bejelentkezes');
    } */
}