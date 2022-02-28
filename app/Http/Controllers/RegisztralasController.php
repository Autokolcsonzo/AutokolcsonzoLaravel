<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisztralasController extends Controller
{

    public function index()
    {
       /*  print_r($req->all()); */
        return view('regisztracio');
    }

}