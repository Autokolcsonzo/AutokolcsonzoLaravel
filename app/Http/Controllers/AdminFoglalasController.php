<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FoglalasViewModel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class AdminFoglalasController extends Controller
{

    public function adatokKiiratasa()
    {


        DB::table('foglalas')
              ->whereRaw('ervenyessegi_ido < CURRENT_DATE')
              ->update(['allapot' => 'Teljesítve']);



        $felhasznalok = DB::table('felhasznalo')->count();
        $foglalasok = DB::table('foglalas')->count();
        $bevetel = DB::table('fizetes')->sum('kifizetendo_osszeg');

        $adat = DB::table('felhasznalo_foglalas')
            ->select(
                'fogazon_foglalas',
                'alvazSzam',
                'felhasznalo',
                'elvitel',
                'visszahozatal',
                'fogl_kelt',
                'ervenyessegi_ido',
                'kedvezmeny',
                'allapot',
                'befizetett_osszeg',
                'kifizetendo_osszeg',
                'kedvezmeny',
                'megye',
                'ir_szam',
                'varos',
                'utca',
                'hazszam',
                'napiar',
                'fizetes_alapja',
                'foglalas_osszege',
                'fogl_kelt'



            )->get()->sortByDesc('fogl_kelt');
 
        return view('adminFoglalas', compact('adat', 'felhasznalok', 'foglalasok', 'bevetel'));
    }



    public function edit($fogazon_foglalas)
    {

        $data = FoglalasViewModel::find($fogazon_foglalas);
        return view('adminFoglalasModositas', compact('data'));
    }

    public function update(Request $request, $fogazon_foglalas)
    {



        $data = FoglalasViewModel::find($fogazon_foglalas);


        $data->elvitel = $request->elvitel;
        $data->visszahozatal = $request->visszahozatal;
        $data->kedvezmeny = $request->kedvezmeny;
        $data->ervenyessegi_ido = $request->visszahozatal;
        $data->allapot = $request->allapot;
        $data->update();

        return redirect('adminFoglalas')->with('status', 'Az adatok módosultak.');
    }

 


    public function osszAdatok()
    {
        $felhasznalok = DB::table('felhasznalo')->count();
        $foglalasok = DB::table('foglalas')->count();
        $bevetel = DB::table('foglalas')->select('kifizetendo_osszeg')->count();
        return view('adminFoglalas', compact('felhasznalok', 'foglalasok', 'bevetel'));
    }


    public function maiElvitel()
    {

        $felhasznalok = DB::table('felhasznalo')->count();
        $foglalasok = DB::table('foglalas')->count();
        $bevetel = DB::table('fizetes')->sum('kifizetendo_osszeg');

        $maiElvitel = DB::table('felhasznalo_foglalas')
            ->select(
                'fogazon_foglalas',
                'alvazSzam',
                'felhasznalo',
                'elvitel',
                'visszahozatal',
                'fogl_kelt',
                'ervenyessegi_ido',
                'kedvezmeny',
                'allapot',
                'befizetett_osszeg',
                'kifizetendo_osszeg',
                'kedvezmeny',
                'megye',
                'ir_szam',
                'varos',
                'utca',
                'hazszam',
                'napiar',
                'fizetes_alapja',
                'foglalas_osszege',
                'fogl_kelt'



            )->whereDate('elvitel', Carbon::today())
            ->get();
       
        return view('maiElvitel', compact('maiElvitel', 'felhasznalok', 'foglalasok', 'bevetel'));
    }

    public function maiVisszahozatal()
    {

        $felhasznalok = DB::table('felhasznalo')->count();
        $foglalasok = DB::table('foglalas')->count();
        $bevetel = DB::table('fizetes')->sum('kifizetendo_osszeg');

        $maiVisszahozatal = DB::table('felhasznalo_foglalas')
            ->select(
                'fogazon_foglalas',
                'alvazSzam',
                'felhasznalo',
                'elvitel',
                'visszahozatal',
                'fogl_kelt',
                'ervenyessegi_ido',
                'kedvezmeny',
                'allapot',
                'befizetett_osszeg',
                'kifizetendo_osszeg',
                'kedvezmeny',
                'megye',
                'ir_szam',
                'varos',
                'utca',
                'hazszam',
                'napiar',
                'fizetes_alapja',
                'foglalas_osszege',
                'fogl_kelt'



            )->whereDate('visszahozatal', Carbon::today())
            ->get();
    
        return view('maiVisszahozatal', compact('maiVisszahozatal', 'felhasznalok', 'foglalasok', 'bevetel'));
    }
}
