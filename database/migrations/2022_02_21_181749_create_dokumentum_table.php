<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumentumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumentum', function (Blueprint $table) {
            $table->integer('felhasznalo')->unsigned();
            $table->char('jogositvany', 8);
            $table->char('szemelyi', 8);
            $table->foreign('felhasznalo')->references('felhasznalo_id')->on('felhasznalo');
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
        Schema::dropIfExists('dokumentum');
    }
}