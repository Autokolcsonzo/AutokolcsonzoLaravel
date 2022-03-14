<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KeresoViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeresoViewController extends Controller
{
    public function index()
    {
        // $result = DB::table('keresoview')
        //     ->select(
        //         'keresoview.marka',
        //         'keresoview.modell',
        //         'keresoview.evjarat',
        //         'keresoview.kivitel',
        //         'keresoview.uzemanyag',
        //         'keresoview.tulajdonsag',
        //         'keresoview.varos'
        //     )
        //     ->get();
        
        //---------------Városok tömbbe.-----------
        $helyszinekTomb = [];
        $helyszinSQL = DB::table('keresoview')
        ->select(
            'keresoview.varos'
        )
        ->distinct()
        ->get();
        
        foreach ($helyszinSQL as $key => $helyszin) {
            foreach ($helyszin as $key => $varos) {
                array_push($helyszinekTomb, $varos);
            } 
        }
        //----------------kivitel ------------------
        
        $kivitelTomb = [];
        $kivitelSQL = DB::table('keresoview')
        ->select(
            'keresoview.kivitel'
        )
        ->distinct()
        ->get();

        foreach ($kivitelSQL as $key => $kivitel) {
            foreach ($kivitel as $key => $value) {
                array_push($kivitelTomb, $value);
            } 
        }

        //----------------Uzemanyag --------------

        $uzemanyagTomb = [];
        $uzemanyagSQL = DB::table('keresoview')
        ->select(
            'keresoview.uzemanyag'
        )
        ->distinct()
        ->get();

        foreach ($uzemanyagSQL as $key => $uzemanyagok) {
            foreach ($uzemanyagok as $key => $uzemanyag) {
                array_push($uzemanyagTomb, $uzemanyag);
            } 
        }

        //-----------------evjarat----------------

        $evjaratTomb = [];
        $evjaratSQL = DB::table('keresoview')
        ->selectRaw("MIN(evjarat),MAX(evjarat)")
        ->get();

        foreach ($evjaratSQL as $key => $obj) {
            foreach ($obj as $key => $value) {
                array_push($evjaratTomb, $value);
            } 
        }

        //----------------checkboxok-------------


        $checkboxokTomb = [];
        $checkboxokSQL = DB::table('keresoview')
        ->select(
            'keresoview.tulajdonsag'
        )
        ->distinct()
        ->whereNotNull('keresoview.tulajdonsag')
        ->get();

        foreach ($checkboxokSQL as $key => $obj) {
            foreach ($obj as $key => $value) {
                array_push($checkboxokTomb, $value);
            } 
        }


        //-------------Márka és Modell-------------

        //$markaObj;
        $markaSQL = DB::table('keresoview')
        ->select('marka','modell')
        ->GroupBy('marka','modell')
        ->get();

         foreach ($markaSQL as $Dummy => $sor) {
             $markaObj[ $sor->marka ][] = $sor->modell;
         }


        //-------------Végső Object---------------
        $keresoParameterek = array(
                            "helyszin" => $helyszinekTomb,
                            "kivitel" => $kivitelTomb,
                            "uzemanyag" => $uzemanyagTomb,
                            "evjarat" => $evjaratTomb,
                            "checkboxs" => $checkboxokTomb,
                            "marka" => $markaObj
                        );

        return array($keresoParameterek);
    }

    
}
