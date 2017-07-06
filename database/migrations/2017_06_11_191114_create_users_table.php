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
            $table->string('dni', 8)->unique();
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('nombres');
            $table->string('genero'); //0 = femenino 1=masculino
            $table->integer('est_civil_id')->default('1')->unsigned();
            $table->string('domicilio')->default('--------');
            $table->string('n_domicilio')->default('--------');
            $table->integer('n_hijos');
            $table->string('telefono');
            $table->integer('distrito_nac')->default('887')->unsigned();
            $table->string('nacionalidad');
            $table->date('f_nac');
            
            $table->integer('religion_id')->default('1')->unsigned();
            $table->string('tipo_sangre');
            $table->date('f_unheval');//FEcha de ingreso a la Uheval
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('estado_login')->default('0');
            $table->string('tipo_user')->default('5');
            $table->string('foto')->default('user.png');
                /*
                    0=nosotros, super usuarios
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

                    2-4=perosonal medico general
                    .
                    .
                    .
                    .
                    (todo el personal que comprende unidad de serv univ.)
                */
            //Datos de vivienda
            $table->string('vivienda'); //Propia, alquilada, Hipotecada
            $table->string('material_vivienda');
            $table->integer('n_ambientes');
            $table->string('techo_vivienda');
            $table->string('piso_vivienda');
            $table->string('servicio_luz'); //0=no, 1=si
            $table->string('servicio_agua'); //0=no, 1=si
            $table->string('servicio_desague'); //0=no, 1=si
            $table->string('servicio_incompletos'); //0=no, 1=si
            $table->string('servicio_letrinas'); //0=no, 1=si
            $table->string('servicio_otros'); //0=no, 1=si

            $table->string('registro_discapacitado');
            $table->string('registros_terrorismo');
            $table->foreign('est_civil_id')->references('id')
                  ->on('est_civils')->onDelete('cascade');
            $table->foreign('distrito_nac')->references('id')
                  ->on('distritos')->onDelete('cascade');
            $table->foreign('religion_id')->references('id')
                  ->on('religions')->onDelete('cascade');

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
