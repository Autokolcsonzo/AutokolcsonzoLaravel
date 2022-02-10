<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModellTulajdonsagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modell_tulajdonsag', function (Blueprint $table) {
            $table->increments('modell_tul_id');
            $table->integer('modell_id')->unsigned();
            $table->char('tulajdonsag', 50);
            $table->foreign('modell_id')->references('modell_id')->on('modell');
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
        Schema::dropIfExists('modell_tulajdonsag');
    }
}
