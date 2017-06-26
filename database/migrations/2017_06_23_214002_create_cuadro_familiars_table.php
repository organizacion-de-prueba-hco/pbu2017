<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuadroFamiliarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuadro_familiars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('nombres');
            $table->string('parentesco');
            $table->date('f_nac');
            $table->string('dni');
            $table->string('telefono');
            $table->string('grado_instrucion');
            $table->string('ocupacion');
            $table->string('residencia');
            $table->float('sueldo');
            $table->float('honorario');
            $table->float('pension');
            $table->float('empresa');
            $table->string('lugar_trabajo');
            $table->date('trabajo_inicio');
            $table->date('trabajo_fin');

            $table->foreign('user_id')->references('id')
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
        Schema::drop('cuadro_familiars');
    }
}
