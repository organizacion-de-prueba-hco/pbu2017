<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichaSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_socials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expediente_id')->unsigned();
            $table->integer('asistenta_social')->unsigned();
            $table->string('opinion_a');
            $table->string('opinion_b');
            $table->string('opinion_c');
            $table->string('evidencias');

            $table->foreign('expediente_id')->references('expediente')->on('expedientes')->onDelete('cascade');
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
        Schema::drop('ficha_socials');
    }
}
