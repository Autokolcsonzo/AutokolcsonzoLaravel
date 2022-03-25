<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class FelhasznalofoglalasView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->createView());
    }
   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->dropView());
    }
   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function createView(): string
    {
        return <<<SQL
            CREATE VIEW felhasznalo_foglalas AS
                SELECT 
                foglalas.fogl_azonosito AS fogazon_foglalas,
                    foglalas.alvazSzam AS foglalas_alvazszam,
                    foglalas.felhasznalo,
                    foglalas.elvitel,
                    foglalas.visszahozatal,
                    foglalas.fogl_kelt,
                    foglalas.ervenyessegi_ido,
                    foglalas.kedvezmeny,
                    foglalas.allapot,
                    auto.alvazSzam,
                    auto.statusz, 
                    auto.napiAr, 
                    auto.szin, 
                    modell.marka, 
                    modell.tipus, 
                    modell.modell, 
                    modell.evjarat, 
                    modell.kivitel, 
                    modell.uzemanyag, 
                    modell.teljesitmeny,
                    auto_kepek.kep,
                    telephely.megye, 
                    telephely.ir_szam, 
                    telephely.varos, 
                    telephely.utca, 
                    telephely.hazszam,
                    fizetes.kifizetes_id,
                    fizetes.fogl_azonosito as fizetes_foglalas,
                    fizetes.kelt,
                    fizetes.sorszam,
                    fizetes.fizetes_alapja,
                    fizetes.befizetett_osszeg,
                    fizetes.kifizetendo_osszegeg,
                    (fizetes.befizetett_osszeg+fizetes.kifizetendo_osszegeg) AS foglalas_osszege
                    
                    
                    
                    FROM    
                        foglalas,
                        auto_kepek,
                        modell,
                        telephely,
                        auto,
                        fizetes

                    WHERE 
                        auto.alvazSzam = auto_kepek.alvazSzam AND 
                        auto.modell = modell.modell_id AND 
                        auto.telephely = telephely.telephely_id AND
                        auto.alvazSzam=foglalas.alvazSzam AND
                        foglalas.fogl_azonosito=fizetes.fogl_azonosito
                    
            SQL;
    }
   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function dropView(): string
    {
        return <<<SQL
            DROP VIEW IF EXISTS `felhasznalo_foglalas`;
            SQL;
    }
}

