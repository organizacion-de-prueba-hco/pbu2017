<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeclaracionJuradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('declaracion_juradas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('miembro_familiar')->unsigned();
            $table->integer('asistenta_social')->unsigned();
            $table->integer('distrito')->unsigned();
            $table->string('desempeño_como');
            $table->float('haber_mensual');
            $table->integer('n_hijos');
            $table->float('apoyo_mensual');
            $table->string('otros_gastos',1500);

            $table->foreign('miembro_familiar')->references('id')
                  ->on('cuadro_familiars')->onDelete('cascade');
            $table->foreign('distrito')->references('id')
                  ->on('distritos')->onDelete('cascade');
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
        Schema::drop('declaracion_juradas');
    }
}
