<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmOdoAtencionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cm_odo_atencions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('odontologia_id')->unsigned();
            $table->integer('procedimiento_id')->unsigned();
             $table->string('obs');
             $table->date('prox_cita');

            $table->foreign('odontologia_id')->references('id')->on('cm_odontologias')->onDelete('cascade');
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
        Schema::drop('cm_odo_atencions');
    }
}
