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
            $table->string('iv_colegio');
            $table->integer('iv_tipo')->unsigned();
            $table->integer('iv_distrito')->unsigned();
            $table->date('iv_fecha');
            $table->float('iv_pension');
            $table->string('v_colegio');
            $table->integer('v_tipo')->unsigned();
            $table->integer('v_distrito')->unsigned();
            $table->date('v_fecha');
            $table->float('v_pension');

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
