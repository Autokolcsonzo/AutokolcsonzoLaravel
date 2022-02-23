<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\felhasznalo;
use Illuminate\Support\Facades\Auth;
 
class CustomAuthController extends Controller
{
 
    public function index()
    {
        return view('bejelentkezes');
    }  
       
 
    public function customLogin(Request $request)
    {
        $request->validate([
            'felhasznalonev' => 'required',
            'jelszo' => 'required',
        ]);
    
        $credentials = $request->only('felhasznalonev', 'jelszo');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('welcome')
                        ->withSuccess('Signed in');
        }
   
        return redirect("bejelentkezes")->withSuccess('Login details are not valid');
    }
 
 
 
    public function registration()
    {
        return view('regisztracio');
    }
       
 
    public function customRegistration(Request $request)
    {  
        $request->validate([
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
            
        $data = $request->all();
        $check = $this->create($data);
          
        return redirect("welcome")->withSuccess('You have signed-in');
    }
 
 
    public function create(array $data)
    {
      return felhasznalo::create([
        'vezeteknev' => $data['vezeteknev'],
            'keresztnev' => $data['keresztnev'],
            'felhasznalonev' => $data['felhasznalonev'],
            'jelszo' => $data['jelszo'], //Hash::make($req->jelszo) jelszó hosszát változtatni kell
            'szul_ido' => $data['szul_ido'],
            'ir_szam' => $data['ir_szam'],
            'megye' => $data['megye'],
            'varos' => $data['varos'],
            'utca' => $data['utca'],
            'hazszam' => $data['hazszam'],
            'tel_szam' => $data['tel_szam'],
            'e_mail' => $data['e_mail']
      ]);
    }    
     
 
    public function dashboard()
    {
        if(Auth::check()){
            return view('welcome');
        }
   
        return redirect("bejelentkezes")->withSuccess('You are not allowed to access');
    }
     
 
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return Redirect('bejelentkezes');
    }
}