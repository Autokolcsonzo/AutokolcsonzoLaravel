<?php

namespace App\Http\Controllers;

use App\Models\Telephely;
use Illuminate\Http\Request;

class TelephelyController extends Controller
{

    public function index()
    {

        
      $telephely = Telephely::all();

      return response()->json($telephely);
    }

   
   
}
