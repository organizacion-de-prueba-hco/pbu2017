<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dni')->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->date('f_nac');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('tipo');
                /*
                    0=nosotros
                    1=Directivos (Rector, Vicerrector, Dra. BU)
                    2=Jefe de Unidad de Serv. Univ.
                    3=Jefe de la Unidad de Actividad física y salud mental
                    4=Jefe de la unidad de formación cultural
                    5=Estudiantes
                    6=Personal docente
                    7=Personal no docente

                    2-1=Asistente social
                    2-2=consecionario comedor
                    2-3=personal de nutricion para el comedor

                    2-4=perosnal medico general
                    .
                    .
                    .
                    .
                    (todo el personal que comprende unidad de serv univ.)
                */
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
