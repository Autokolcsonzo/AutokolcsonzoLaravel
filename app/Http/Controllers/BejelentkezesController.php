<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\felhasznalo;
use Illuminate\Support\Facades\Auth;

class BejelentkezesController extends Controller
{
    /*  public function index()
    {
        return view ('bejelentkezes');
    }

    public function addBejelentkezes(Request $request)
    {
        $cus = new User();
        $cus->name = $request->name;
        $cus->password = $request->password;
        $cus->save();
        
        return view ('bejelentkezes');
    }

    function list() {
        
    } */

    public function index()
    {
        return view('bejelentkezes');
    }

    public function login(Request $req)
    {
        $validalt = $req->validate([
            'fnev' => "required",
            'jelszo1' => "required"
        ]);

        /*         if (Auth::attempt($validalt)) {
            $req->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'fnev'
        ]) */

        return view('bejelentkezes');
    }
}
