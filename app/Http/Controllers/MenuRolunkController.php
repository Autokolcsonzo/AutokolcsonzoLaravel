<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuRolunkController extends Controller
{
    public function index()
    {
        return view('rolunk');
    }
}
