<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoExtraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_extra', function (Blueprint $table) {
            $table->increments('auto_extra_id');
            $table->char('alvazSzam', 17);
            $table->index('alvazSzam');
            $table->foreign('alvazSzam')->references('alvazSzam')->on('auto');
            $table->char('extra_megnevezese', 50);
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
        Schema::dropIfExists('auto_extra');
    }
}