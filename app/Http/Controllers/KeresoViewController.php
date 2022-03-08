<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeresoViewController extends Controller
{
    public function KeresoView()
    {
        $result = DB::table('auto_fill')
            ->select(
                'auto_fill.alvazSzam',
                'auto_fill.statusz',
                'auto_fill.napiAr',
                'auto_fill.szin',
                'auto_fill.marka',
                'auto_fill.tipus',
                'auto_fill.modell',
                'auto_fill.evjarat',
                'auto_fill.kivitel',
                'auto_fill.uzemanyag',
                'auto_fill.teljesitmeny',
                'auto_fill.tulajdonsag',
                'auto_fill.extra_megnevezese',
                'auto_fill.megye',
                'auto_fill.ir_szam',
                'auto_fill.varos',
                'auto_fill.utca',
                'auto_fill.hazszam'
            )
            ->get();
        return $result;
    }
}
