<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePsicopedagogiaOtrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psicopedagogia_otros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estudiante_id')->unsigned();
            $table->integer('n')->default('1');
            $table->string('t_ansiedad');
            $table->string('t_inteligencia');
            $table->string('t_personalidad');
            $table->timestamps();

            $table->foreign('estudiante_id')->references('user_id')->on('estudiante')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('psicopedagogia_otros');
    }
}
