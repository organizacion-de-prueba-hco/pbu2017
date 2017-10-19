<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmTopicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cm_topicos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('usuario'); //Tipo de usuario: 1=Ingresantes, 2=Docentes, 3=administrativo, 4=publico
            $table->string('usuario_desc'); //Detalles del tipo de usuario
            $table->string('recibo');
            $table->integer('procedimiento_id')->unsigned();
            $table->string('proc_obs');
            $table->foreign('user_id')->references('id')
                  ->on('users')->onDelete('cascade');
            $table->foreign('procedimiento_id')->references('id')->on('cm_procedimientos')
                  ->onDelete('cascade');

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
        Schema::drop('cm_topicos');
    }
}
