<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Felhasznalo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CustomAuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function registration()
    {
        return view("auth.registration");
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'vezeteknev' => 'required',
            'keresztnev' => 'required',
            'felhasznalonev' => 'required',
            'jelszo' => 'required',
            'szul_ido' => 'required',
            'ir_szam' => 'required',
            'megye' => 'required',
            'varos' => 'required',
            'utca' => 'required',
            'hazszam' => 'required',
            'tel_szam' => 'required',
            'e_mail' => 'required'
        ]);
        $felhasznalo = new Felhasznalo();
        $felhasznalo->vezeteknev = $request->vezeteknev;
        $felhasznalo->keresztnev = $request->keresztnev;
        $felhasznalo->felhasznalonev = $request->felhasznalonev;
        $felhasznalo->jelszo = Hash::make($request->jelszo);
        $felhasznalo->szul_ido = $request->szul_ido;
        $felhasznalo->ir_szam = $request->ir_szam;
        $felhasznalo->megye = $request->megye;
        $felhasznalo->varos = $request->varos;
        $felhasznalo->utca = $request->utca;
        $felhasznalo->hazszam = $request->hazszam;
        $felhasznalo->tel_szam = $request->tel_szam;
        $felhasznalo->e_mail = $request->e_mail;
        $felhasznalo->jogkor = 1;
        $res = $felhasznalo->save();
        if ($res) {
            return back()->with('success', 'regisztráltál');
        } else {
            return back()->with('fail', 'Nem regisztráltál');
        }
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'felhasznalonev' => 'required',
            'jelszo' => 'required'
        ]);
        $felhasznalo = Felhasznalo::where('felhasznalonev', '=', $request->felhasznalonev)->first();
        if ($felhasznalo) {

            if (Hash::check($request->jelszo, $felhasznalo->jelszo)) {
                $request->session()->put('loginId', $felhasznalo->felhasznalo_id);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Jelszó nem megfelelő.');
            }
        } else {
            return back()->with('fail', 'Ez az email nem regisztrált.');
        }
    }

    public function dashboard()
    {
        $adat = DB::table('auto')
            ->join('modell', 'auto.modell', '=', 'modell.modell_id')
            ->join('telephely', 'auto.telephely', '=', 'telephely.telephely_id')
            ->select('modell.tipus', 'modell.uzemanyag', 'modell.teljesitmeny', 'modell.evjarat', 'auto.napiAr', 'auto.szin', 'auto.forgalmiSzam',  'auto.alvazSzam', 'auto.statusz', 'auto.rendszam', 'modell.marka', 'telephely.varos')
            ->get();

        $modell = DB::table('modell')->get();
        $telephely = DB::table('telephely')->get();

        $felhasznalok = DB::table('felhasznalo')->count();
        $foglalasok = DB::table('foglalas')->count();
        $bevetel = DB::table('fizetes')->sum('kifizetendo_osszeg');

        $data = array();
        if (Session::has('loginId')) {
            $data = Felhasznalo::where('felhasznalo_id', '=', Session::get('loginId'))->first();
            if ($data->jogkor == 1) {
                return view('dashboard', compact('data'));
            }
            if ($data->jogkor == 2) {
                return view('adminAutok', compact('data', 'telephely', 'modell', 'adat', 'felhasznalok', 'foglalasok', 'bevetel'));
            }
        }
    }

    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
