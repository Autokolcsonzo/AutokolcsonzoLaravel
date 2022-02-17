<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class jarmuTalalatiListaController extends Controller
{
    public function jarmuTalalatok() {
        return view('jarmuTalalatiLista');
    }
}
