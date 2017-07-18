<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComedorFaltasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comedor_faltas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expediente_id')->unsigned();
            $table->integer('concesionario_id')->unsigned();
            $table->string('tipo')->default('0');
            
            $table->foreign('expediente_id')->references('expediente')
                  ->on('expedientes')->onDelete('cascade');
            $table->foreign('concesionario_id')->references('responsable')
                  ->on('concesionario_comedors')->onDelete('cascade');
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
        Schema::drop('comedor_faltas');
    }
}
