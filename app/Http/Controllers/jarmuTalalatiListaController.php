<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Felhasznalo;
use Illuminate\Support\Facades\Session;

class jarmuTalalatiListaController extends Controller
{
    public function jarmuTalalatok() {
        return view('jarmuTalalatiLista');
    }

    public function dashboard() {
        $data = array();
        if(Session::has('loginId')) {
            $data = Felhasznalo::where('felhasznalo_id', '=', Session::get('loginId'))->first();
        }
        return view('jarmuTalalatiLista', compact('data'));
    }
}