<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoglalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foglalas', function (Blueprint $table) {
            $table->increments('fogl_azonosito');
            $table->char('alvazSzam', 17);
            $table->index('alvazSzam');
            $table->foreign('alvazSzam')->references('alvazSzam')->on('auto');
            $table->integer('felhasznalo')->unsigned();
            $table->foreign('felhasznalo')->references('felhasznalo_id')->on('felhasznalo');
            $table->dateTime('elvitel');
            $table->dateTime('visszahozatal');
            $table->timestamp('fogl_kelt')->useCurrent();
            $table->dateTime('ervenyessegi_ido');
            $table->integer('kedvezmeny')->unsigned();
            $table->foreign('kedvezmeny')->references('szazalek_id')->on('kedvezmeny');
            $table->char('allapot', 20);
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
        Schema::dropIfExists('foglalas');
    }
}