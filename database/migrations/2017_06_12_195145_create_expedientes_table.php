<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->integer('expediente')->unsigned();
            $table->primary('expediente');
            $table->integer('jefe_usu')->unsigned(); //Jefe de la unidad de serv. univ.
            $table->string('requisito_a');
            $table->string('requisito_b');
            $table->string('requisito_c');
            $table->string('requisito_d');
            $table->string('tipo_beca'); //a,b,c o d
            $table->string('estado'); //Activo o Inactivo
            $table->binary('huella_a');
            $table->binary('huella_b');
            $table->foreign('expediente')->references('id')
                  ->on('users')->onDelete('cascade');
            $table->foreign('jefe_usu')->references('id')
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
        Schema::drop('expedientes');
    }
}
