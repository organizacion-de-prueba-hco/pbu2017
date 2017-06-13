<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_expedientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expediente_id')->unsigned();
            $table->string('tipo_beca');
            $table->string('resultado');
            $table->foreign('expediente_id')->references('expediente')->on('expedientes')->onDelete('cascade');
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
        Schema::drop('historial_expedientes');
    }
}
