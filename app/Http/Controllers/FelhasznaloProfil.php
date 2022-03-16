<?php

namespace App\Http\Controllers;

use App\Models\FelhasznaloModell;
use App\Models\Felhasznalo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;



class FelhasznaloProfil extends Controller
{



    public function bejelentkezett()
    {
        $data = array();
        $password = array();
        if (Session::has('loginId')) {
            $data = Felhasznalo::where('felhasznalo_id', '=', Session::get('loginId'))->first();
        }




        return view('felhasznaloiProfil', compact('data'));
    }




    public function update(Request $request)

    {

        $input['jelszo'] = Hash::make($request['jelszo']);

        $rules = [
            'felhasznalonev' => 'min:4|max:10',
            'keresztnev' => 'min:3|max:15|regex:/^([^0-9]*)$/',
            'vezeteknev' => 'min:3|max:15|regex:/^([^0-9]*)$/',
            'e_mail' => 'unique:felhasznalo,e_mail',
            'jelszo'=> 'min:5|max:10'
        ];
    
        $customMessages = [
            'felhasznalonev.min' => 'A módosítás sikertelen. A felhasználónévnek legalabb :min karakternek kell lennie!',
            'felhasznalonev.max' => 'A módosítás sikertelen. A felhasználónévnek maximum :max karakternek kell lennie!',
            'jelszo.min'=>'A módosítás sikertelen. A jelszónak legalabb :min karakternek kell lennie!',
            'jelszo.max' => 'A módosítás sikertelen. A jelszónak maximum :max karakternek kell lennie!',
            'e_mail.unique'=> 'A módosítás sikertelen. Az e-mail már létezik.',
            'regex'=>' A módosítás sikertelen. Nem használhatsz számokat a nevekben.'

        ];
    
        $this->validate($request, $rules, $customMessages);


        $felhasznalo_id = $request->input('felhasznalo_id');
        $input = $request->all();


        

        $data = FelhasznaloModell::find($felhasznalo_id);

        $data->keresztnev = $input['keresztnev'];
        $data->felhasznalonev = $input['felhasznalonev'];
        $data->vezeteknev = $input['vezeteknev'];
        $data->jelszo=$input['jelszo'];
        $data->e_mail = $input['e_mail'];
        $data->szul_ido = $input['szul_ido'];
        $data->tel_szam = $input['tel_szam'];
        $data->ir_szam = $input['ir_szam'];
        $data->megye = $input['megye'];
        $data->varos = $input['varos'];
        $data->utca = $input['utca'];
        $data->hazszam = $input['hazszam'];

        

        $data->update();
        return  redirect('felhasznaloiProfil');
    }
}
