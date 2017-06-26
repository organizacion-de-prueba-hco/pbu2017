<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExoneracionPagoCentMedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exoneracion_pago_cent_meds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estudiante')->unsigned();
            $table->integer('asistenta_social')->unsigned();
            $table->string('opinion');

            $table->foreign('estudiante')->references('user_id')
                  ->on('estudiantes')->onDelete('cascade');
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
        Schema::drop('exoneracion_pago_cent_meds');
    }
}
