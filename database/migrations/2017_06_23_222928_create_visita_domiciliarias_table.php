<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitaDomiciliariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visita_domiciliarias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('miembro_familiar')->unsigned();
            $table->integer('asistenta_social')->unsigned();
            $table->string('motivo',1500);
            $table->string('diagnostico',1500);
            $table->string('observaciones',1500);
            $table->string('intervencion',1500);
            $table->date('fecha');
            $table->foreign('miembro_familiar')->references('id')
                  ->on('cuadro_familiars')->onDelete('cascade');
            $table->foreign('asistenta_social')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('visita_domiciliarias');
    }
}
