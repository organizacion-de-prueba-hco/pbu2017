<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculaTallersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matricula_tallers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('curso_taller_id')->unsigned();
            $table->integer('estudiante')->unsigned();
            //Notas semestre I
            $table->float('i_ex_i'); //Examen 1
            $table->float('i_ex_ii');//Examen 2 
            $table->float('i_par');  //1 parcial
            $table->float('i_pre');  //nose que será pré XD
            //Notas semestre II
            $table->float('ii_ex_i');
            $table->float('ii_ex_ii');
            $table->float('ii_par');
            $table->float('ii_pre');

            $table->foreign('curso_taller_id')->references('id')
                  ->on('curso_tallers')->onDelete('cascade');
            $table->foreign('estudiante')->references('user_id')
                  ->on('estudiantes')->onDelete('cascade');
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
        Schema::drop('matricula_tallers');
    }
}
