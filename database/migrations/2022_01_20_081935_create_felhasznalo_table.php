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
            $table->increments('felhasznalo_id')->start_from(1000);
            $table->char('vezeteknev', 30);
            $table->char('keresztnev', 30);
            $table->char('felhasznalonev', 30);
            $table->char('jelszo', 32);
            $table->dateTime('szul_ido');
            $table->binary('profilkep');
            $table->char('varos', 40);
            $table->char('megye', 30);
            $table->char('ir_szam', 5);
            $table->char('utca', 30);
            $table->char('hazszam', 10);
            $table->char('tel_szam', 12);
            $table->char('e_mail', 60);
            $table->timestamp('reg_datum')->useCurrent();
            $table->tinyInteger('jogkor');
            $table->integer('telephely')->unsigned();
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
