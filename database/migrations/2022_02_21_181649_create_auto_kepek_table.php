<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoKepekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_kepek', function (Blueprint $table) {
            $table->increments('auto_kep_id');
            $table->char('alvazSzam');
            $table->foreign('alvazSzam')->references('alvazSzam')->on('auto');
            $table->String('kep');
            $table->timestamp('kesz_datum')->useCurrent();
            $table->boolean('nyilvanose')->nullable();
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
        Schema::dropIfExists('auto_kepek');
    }
}