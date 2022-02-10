<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto', function (Blueprint $table) {
            $table->char('alvazSzam', 17)->primary();
            $table->integer('modell')->unsigned();
            $table->integer('telephely')->unsigned();
            $table->foreign('telephely')->references('telephely_id')->on('telephely');
            $table->foreign('modell')->references('modell_id')->on('modell');
            $table->integer('napiAr');
            $table->char('szin', 20);
            $table->char('forgalmiSzam', 30);
            $table->boolean('statusz');
            $table->char('rendszam', 6);
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
        Schema::dropIfExists('auto');
    }
}
