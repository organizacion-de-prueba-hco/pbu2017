<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->primary('user_id');
            $table->integer('escuela_id')->default('1')->unsigned();
            $table->integer('cod_univ')->unique();
            $table->integer('m_ingreso_id')->default('20')->unsigned();
            $table->string('anio_estudio');
            
            $table->string('tipo_familia'); //Organizada, desintegrada, armon, conf
            $table->string('trato_padres'); //Buena, regular, mala
            $table->string('cubre_gastos'); //ud, padres, padre, madre, otros

            $table->foreign('user_id')->references('id')
                  ->on('users')->onDelete('cascade');
            $table->foreign('escuela_id')->references('id')
                  ->on('escuelas')->onDelete('cascade');
            $table->foreign('m_ingreso_id')->references('id')
                  ->on('m_ingresos')->onDelete('cascade');
            
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
        Schema::drop('estudiantes');
    }
}
