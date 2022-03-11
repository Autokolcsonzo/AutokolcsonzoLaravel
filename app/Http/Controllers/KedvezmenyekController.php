<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KedvezmenyekController extends Controller
{
    public function index()
    {
        $result = DB::table('kedvezmeny')
            ->select(
                'szazalek',
                'naptol'
            )
            ->get();
        return $result;
    }
}