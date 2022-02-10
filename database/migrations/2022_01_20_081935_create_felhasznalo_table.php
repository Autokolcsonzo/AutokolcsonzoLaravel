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
            $table->char('vezeteknev', 30)->nullable();
            $table->char('keresztnev', 30)->nullable();
            $table->char('felhasznalonev', 30);
            $table->char('jelszo', 32);
            $table->dateTime('szul_ido')->nullable();
            $table->binary('profilkep')->nullable();
            $table->char('varos', 40)->nullable();
            $table->char('megye', 30)->nullable();
            $table->char('ir_szam', 5)->nullable();
            $table->char('utca', 30)->nullable();
            $table->char('hazszam', 10)->nullable();
            $table->char('tel_szam', 12)->nullable();
            $table->char('e_mail', 60)->nullable();
            $table->timestamp('reg_datum')->useCurrent();
            $table->tinyInteger('jogkor')->nullable();
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