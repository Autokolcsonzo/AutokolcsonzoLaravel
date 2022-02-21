<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooldalController extends Controller
{
    public function index() {
        /* dd(auth('felhasznalo')->felhasznalo()); */
        //Auth guard [felhasznalo] is not defined. 
        return view('welcome');
    }
}