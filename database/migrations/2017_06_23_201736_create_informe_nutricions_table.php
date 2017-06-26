<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformeNutricionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informe_nutricions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nutricionista')->unsigned();
            $table->string('titulo');
            $table->string('subtitulo');
            $table->string('contenido',5000);
            $table->string('archivo');
            $table->foreign('nutricionista')->references('id')
                  ->on('users')->onDelete('cascade');
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
        Schema::drop('informe_nutricions');
    }
}
