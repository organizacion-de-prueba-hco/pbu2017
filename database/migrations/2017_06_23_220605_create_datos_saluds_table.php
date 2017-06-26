<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosSaludsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_saluds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('miembro_familiar')->unsigned();
            $table->string('diagnostico');
            $table->string('seguro_medico');
            $table->string('lugar_atencion');
            $table->foreign('miembro_familiar')->references('id')
                  ->on('cuadro_familiars')->onDelete('cascade');
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
        Schema::drop('datos_saluds');
    }
}
