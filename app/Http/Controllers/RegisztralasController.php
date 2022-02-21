<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Felhasznalo;

class RegisztralasController extends Controller
{
    /*  public function index()

    public function addBejelentkezes(Request $request)
    {
        $cus = new User();
        $cus->name = $request->name;
        $cus->password = $request->password;
        $cus->save();
        
        return view ('bejelentkezes');
    }
    } */

    public function index()
    {
       /*  print_r($req->all()); */
        return view('regisztracio');
    }

    public function store(Request $req) {
        /* dd($req->only('felhasznalonev', 'jelszo')); */
        
        // validáció
        $validator = Validator::make($req->all(), [
            'vezeteknev' => 'required',
            'keresztnev' => 'required',
            'felhasznalonev' => 'required',
            'jelszo' => 'required', //|confirmed nem működik :D
            'szul_ido' => 'required',
            'ir_szam' => 'required',
            'megye' => 'required',
            'varos' => 'required',
            'utca' => 'required',
            'hazszam' => 'required',
            'tel_szam' => 'required',
            'e_mail' => 'required',
        ]);

        /* if (!$validator->fails())
       {
       $validated_data=$req->all();
       $category = new Felhasznalo();
       $category->fill($validated_data);
       $category->save();
       return $category->category_id;
       } 
      else {
       return $validator->errors();
      } */
       
        /*  $this->validate($request, $rules); */
        
        /* if ( $request->scheduleInMonths > 36){
            echo "Ooops error not captured!!!";
        } */
        
       /*  $validator = \Validator::make($req->all(), $rules); */

        /* if ($validator->fails()) {
           return response()->json($validator->errors(),400);
        } */

        /* $this->validate($req, [
            'vezeteknev' => 'required',
            'keresztnev' => 'required',
            'felhasznalonev' => 'required',
            'jelszo' => 'required|confirmed',
            'szul_ido' => 'required',
            'varos' => 'required',
            'megye' => 'required',
            'ir_szam' => 'required',
            'utca' => 'required',
            'hazszam' => 'required',
            'tel_szam' => 'required',
            'e_mail' => 'required',
        ]); */

        // felhasználó eltárolása

        Felhasznalo::create([
            'vezeteknev' => $req->vezeteknev,
            'keresztnev' => $req->keresztnev,
            'felhasznalonev' => $req->felhasznalonev,
            'jelszo' => $req->jelszo, //Hash::make($req->jelszo) jelszó hosszát változtatni kell
            'szul_ido' => $req->szul_ido,
            'ir_szam' => $req->ir_szam,
            'megye' => $req->megye,
            'varos' => $req->varos,
            'utca' => $req->utca,
            'hazszam' => $req->hazszam,
            'tel_szam' => $req->tel_szam,
            'e_mail' => $req->e_mail,
        ]);
        // bejelentkeztetés
        /* auth()->attempt([
            'felhasznalonev' => $req->felhasznalonev,
            'jelszo' => $req->jelszo,
        ]);  */
        // E HELYETT ELVILEG JÓ AZ ALÁBBI
       /*  auth()->attempt($req->only('felhasznalonev', 'jelszo')); */
       //Error Class "\App\Models\User" not found 

        // redirect
        return redirect()->route('welcome');
    }

    public function signup(Request $req)
    {
        /* 1. verzió, EZ NEM JÓÓ */
        /* $validalt = $req->validate([
            'vezeteknev' => "required",
            'keresztnev' => "required",
            'felhasznalonev' => "required",
            'jelszo' => "required",
            'szul_ido' => "required",
            'varos' => "required",
            'megye' => "required",
            'ir_szam' => "required",
            'utca' => "required",
            'hazszam' => "required",
            'tel_szam' => "required",
            'e_mail' => "required"
        ]); */

        /*         if (Auth::attempt($validalt)) {  49. videó
            $req->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'fnev'
        ]) */

        /* $felhasznalo = new felhasznalo();
        $felhasznalo->insert([
            'vezeteknev' => $req->input('vezeteknev'),
            'keresztnev' => $req->input('keresztnev'),
            'felhasznalonev' => $req->input('felhasznalonev'),
            'jelszo' => Hash::make($req->input('jelszo')),
            'szul_ido' => $req->input('szul_ido'),
            'varos' => $req->input('varos'),
            'megye' => $req->input('megye'),
            'ir_szam' => $req->input('ir_szam'),
            'utca' => $req->input('utca'),
            'hazszam' => $req->input('hazszam'),
            'tel_szam' => $req->input('tel_szam'),
            'e_mail' => $req->input('e_mail')
        ]);

        return redirect('bejelentkezes'); */

        /* 2. verzió, EZ MŰKÖDIK */
        $felhasznalo = new Felhasznalo();
        $felhasznalo->vezeteknev = $req->vezeteknev;
        $felhasznalo->keresztnev = $req->keresztnev;
        $felhasznalo->felhasznalonev = $req->felhasznalonev;
        $felhasznalo->jelszo = $req->jelszo;
        $felhasznalo->szul_ido = $req->szul_ido;
        $felhasznalo->varos = $req->varos;
        $felhasznalo->megye = $req->megye;
        $felhasznalo->ir_szam = $req->ir_szam;
        $felhasznalo->utca = $req->utca;
        $felhasznalo->hazszam = $req->hazszam;
        $felhasznalo->tel_szam = $req->tel_szam;
        $felhasznalo->e_mail = $req->e_mail;
        $felhasznalo->save();

        /* return view ('regisztracio'); */
        return redirect()->route('bejelentkezes');
    }
}