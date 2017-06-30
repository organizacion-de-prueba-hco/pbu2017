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
            $table->string('solicitud_decano')->default('1'); //1=Si, 0=No
            $table->string('croquis_vivienda')->default('1'); //1=Si, 0=No
            $table->string('reporte_notas')->default('1'); //1=Si, 0=No
            $table->string('dni_estudiante'); //1=Si, 0=No
            $table->string('dni_apoderado')->default('1'); //1=Si, 0=No
            $table->string('recibo')->default('1'); //N° de recibo
            $table->string('certificado_medico')->default('1'); //N0=>en blanco, Si =>diagnostico
            $table->string('ficha_soc_econ')->default('1'); //0=n0, 1=si
            $table->string('declaracion_jurada')->default('1');
            $table->string('tipo_beca'); //a,b,c o d
            $table->string('estado')->default('1'); //Activo o Inactivo
            $table->string('obs'); //En caso sea No
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
