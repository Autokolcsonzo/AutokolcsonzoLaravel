<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\felhasznalo;

class RegisztralasController extends Controller
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

    public function index(Request $req)
    {
        return view('Felhasználó.felhasznaloiFooldal');
    }

    public function mentes(Request $req)
    {
        $validalt = $req->validate([
            'fnev' => "required",
            'jelszo1' => "required"
        ]);

        /*         if (Auth::attempt($validalt)) {  49. videó
            $req->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'fnev'
        ]) */

        $felhasznalo = new Felhasznalo();
        $felhasznalo->insert($req);

        return redirect('bejelentkezes');
    }
}
