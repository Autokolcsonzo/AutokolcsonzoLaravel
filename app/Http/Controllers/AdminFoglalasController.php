<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminFoglalas;
use Illuminate\Support\Facades\DB;

class AutokListazasaController extends Controller
{

    public function index()
    {
        $foglalas = AdminFoglalas::all(); 
        return $foglalas;
    }



    public function create()
    {
    }

    public function store(Request $request)
    {
       
    }

    public function show($fogl_azonosito)
    {
       
    }

    public function edit($fogl_azonosito)
    {
    }

    public function update(Request $request, $fogl_azonosito)
    {
        
    }

    public function destroy($fogl_azonosito)
    {
        
    }
}
