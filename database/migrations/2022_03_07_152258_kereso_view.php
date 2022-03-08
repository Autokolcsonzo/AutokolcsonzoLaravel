<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KeresoView extends Migration
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
            CREATE VIEW KeresoView AS
                SELECT 
                    modell.marka, 
                    MIN(modell.evjarat), 
                    MAX(modell.evjarat), 
                    modell.kivitel, 
                    modell.uzemanyag, 
                    modell_tulajdonsag.tulajdonsag,
                    telephely.varos
                    FROM
                        modell,
                        modell_tulajdonsag,
                        telephely
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
