<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmOdoMedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cm_odo_meds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->string('indicaciones');
            $table->integer('odontologia_id')->unsigned();
            $table->integer('medicamento_id')->unsigned();
            $table->string('estado')->default('0');

            $table->foreign('odontologia_id')->references('id')->on('cm_odontologias')->onDelete('cascade');
            $table->foreign('medicamento_id')->references('id')->on('cm_medicamentos')
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
        Schema::drop('cm_odo_meds');
    }
}
