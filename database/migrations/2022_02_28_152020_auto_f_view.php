<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AutoFView extends Migration
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
            CREATE VIEW auto_fill AS
                SELECT 
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
                    modell_tulajdonsag.tulajdonsag,
                    auto_kepek.kep, 
                    auto_extra.extra_megnevezese, 
                    telephely.megye, 
                    telephely.ir_szam, 
                    telephely.varos, 
                    telephely.utca, 
                    telephely.hazszam 
                    
                    FROM    
                        auto,
                        auto_kepek,
                        auto_extra,
                        modell,
                        modell_tulajdonsag,
                        telephely
                    WHERE 
                        auto.alvazSzam = auto_kepek.alvazSzam AND 
                        auto.alvazSzam = auto_extra.alvazSzam AND 
                        auto.modell = modell.modell_id AND 
                        modell.modell_id = modell_tulajdonsag.modell_id AND 
                        auto.telephely = telephely.telephely_id AND
                        auto.statusz = 0
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
            DROP VIEW IF EXISTS `auto_fill`;
            SQL;
    }
}
