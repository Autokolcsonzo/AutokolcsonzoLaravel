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
            CREATE VIEW keresoview AS
                SELECT 
                    auto_fill.marka,
                    auto_fill.modell,
                    auto_fill.evjarat,
                    auto_fill.kivitel,
                    auto_fill.uzemanyag,
                    auto_fill.tulajdonsag,
                    auto_fill.varos
                FROM
                    auto_fill
                WHERE
                auto_fill.statusz = 0;
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

            DROP VIEW IF EXISTS `keresoview`;
            SQL;
    }
}
