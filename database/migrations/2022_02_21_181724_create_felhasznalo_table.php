<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFelhasznaloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('felhasznalo', function (Blueprint $table) {
            $table->increments('felhasznalo_id');
            $table->char('vezeteknev', 30);
            $table->char('keresztnev', 30);
            $table->char('felhasznalonev', 30);
            $table->char('jelszo', 70);
            $table->date('szul_ido');
            $table->string('profilkep')->default('../kepek/profilkep.png')->nullable();
            $table->char('ir_szam', 5);
            $table->char('megye', 30);
            $table->char('varos', 40);
            $table->char('utca', 30);
            $table->char('hazszam', 10);
            $table->char('tel_szam', 12);
            $table->char('e_mail', 60);
            $table->timestamp('reg_datum');
            $table->tinyInteger('jogkor')->nullable()->default('0');
            $table->integer('telephely')->unsigned()->nullable();
            $table->foreign('telephely')->references('telephely_id')->on('telephely');
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
        Schema::dropIfExists('felhasznalo');
    }
}