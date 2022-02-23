<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\felhasznalo;
use Illuminate\Support\Facades\Auth;

class BejelentkezesController extends Controller
{
     public function index()
    {
        /* dd(auth()->felhasznalo()); */
        
        return view ('bejelentkezes');
    }

  /*   public function addBejelentkezes(Request $request)
    {
        $cus = new felhasznalo();
        $cus->felhasznalonev = $request->felhasznalonev;
        $cus->jelszo = $request->jelszo;
        $cus->save();
        
        return view ('bejelentkezes');
    } */

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'felhasznalonev' => 'required',
            'jelszo' => 'required', //|confirmed nem működik :D
        ]);
         Felhasznalo::create([
            'felhasznalonev' => $req->felhasznalonev,
            'jelszo' => $req->jelszo, //Hash::make($req->jelszo) jelszó hosszát változtatni kell
        ]);
        /* if (auth()->attempt($req->only('felhasznalonev', 'jelszo'))) {
            return back()->with('status', 'invalid login details');
        } */
        return redirect()->route('welcome');
        /* $validalt = $req->validate([
            'felhasznalonev' => "required",
            'jelszo' => "required"
        ]);

                if (Auth::attempt($validalt)) {
            $req->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'fnev'
        ]);

        return view('bejelentkezes'); */
    }
}