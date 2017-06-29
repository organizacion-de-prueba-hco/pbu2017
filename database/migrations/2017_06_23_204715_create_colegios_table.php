<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColegiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colegios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estudiante_id')->unsigned();
            $table->string('iv_colegio');
            $table->integer('iv_tipo')->default('3')->unsigned();
            $table->integer('iv_distrito')->default('887')->unsigned();
            $table->integer('iv_fecha');
            $table->float('iv_pension');
            $table->string('v_colegio');
            $table->integer('v_tipo')->default('3')->unsigned();
            $table->integer('v_distrito')->default('887')->unsigned();
            $table->integer('v_fecha');
            $table->float('v_pension');

            $table->foreign('estudiante_id')->references('user_id')
                  ->on('estudiantes')->onDelete('cascade');
            $table->foreign('iv_tipo')->references('id')
                  ->on('tipo_colegios')->onDelete('cascade');
            $table->foreign('v_tipo')->references('id')
                  ->on('tipo_colegios')->onDelete('cascade');
            $table->foreign('v_distrito')->references('id')
                  ->on('distritos')->onDelete('cascade');
            $table->foreign('iv_distrito')->references('id')
                  ->on('distritos')->onDelete('cascade');
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
        Schema::drop('colegios');
    }
}
