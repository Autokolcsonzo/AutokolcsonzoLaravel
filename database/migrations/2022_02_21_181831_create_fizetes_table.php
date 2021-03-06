<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFizetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fizetes', function (Blueprint $table) {
            $table->increments("kifizetes_id");
            $table->integer("fogl_azonosito")->unsigned();
            $table->foreign('fogl_azonosito')->references('fogl_azonosito')->on('foglalas')->onDelete('cascade');;
            $table->timestamp('kelt')->useCurrent();
            $table->integer("sorszam");
            $table->char("fizetes_alapja", 30);
            $table->integer("befizetett_osszeg");
            $table->integer("kifizetendo_osszeg");
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
        Schema::dropIfExists('fizetes');
    }
}
