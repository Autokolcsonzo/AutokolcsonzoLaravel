<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminFoglalas;
use App\Models\AdminFoglalasModel;
use Illuminate\Support\Facades\DB;

class AdminFoglalasController extends Controller
{

    public function index()
    {
        $foglalas = AdminFoglalasModel::all(); 
        return $foglalas;
    }



    public function create()
    {
    }

    public function store(Request $fogl_azonosito)
    {
        $foglalas = AdminFoglalasModel::find($fogl_azonosito);
      
        return response()->json($foglalas);
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

    public function expand()
    {
        $foglalas=AdminFoglalasModel::with('felhasznalo')->get();
        return $foglalas;
    }
}
