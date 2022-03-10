<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModellTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modell', function (Blueprint $table) {
            $table->increments('modell_id');
            $table->char('marka', 30);
            $table->char('tipus', 30);
            $table->char('modell', 30);
            $table->year('evjarat');
            $table->char('kivitel', 30);
            $table->char('uzemanyag', 15);
            $table->char('teljesitmeny', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modell');
    }
}