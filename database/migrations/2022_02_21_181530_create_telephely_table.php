<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelephelyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telephely', function (Blueprint $table) {
            $table->increments('telephely_id');
            $table->char('megye', 30);
            $table->char('ir_szam', 5);
            $table->char('varos', 40);
            $table->char('utca', 30);
            $table->char('hazszam', 10);
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
        Schema::dropIfExists('telephely');
    }
}