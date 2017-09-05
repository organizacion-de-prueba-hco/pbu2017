<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmMedicinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cm_medicinas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medico_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->string('te');
            $table->string('fi');
            $table->string('ce');
            $table->string('relato_enf');

            //Triaje
            $table->string('triaje_fc');
            $table->string('triaje_fr');
            $table->string('triaje_to');
            $table->string('triaje_pa');
            $table->string('triaje_p');
            $table->string('triaje_fc');
            $table->string('triaje_t');
            $table->string('triaje_imc');

            //Impresón de diagnóstico
            $table->string('imp_dx');
            //tratamiento
            $table->string('tto_descripcion');

            //Medicamentos
            $table->integer('cantidad_medicamento');
            


            $table->foreign('medico_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('cm_medicinas');
    }
}
