<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Felhasznalo;
use Illuminate\Support\Facades\Session;

class ReszletekController extends Controller
{
    public function feltetelekUser() {
        $data = array();
        if(Session::has('loginId')) {
            $data = Felhasznalo::where('felhasznalo_id', '=', Session::get('loginId'))->first();
        }
        return view('feltetelek', compact('data'));
    }
}
