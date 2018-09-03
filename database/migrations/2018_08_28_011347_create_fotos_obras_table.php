<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotosObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos_obras', function (Blueprint $table) {
            $table->increments('id');
            $table->String('caminho');

            $table->integer('obra_id')->unsigned();
            $table->foreign('obra_id')->references('id')->on('obras');

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
        Schema::dropIfExists('fotos_obras');
    }
}
