<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedMedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('med_meds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->string('indicaciones');
            $table->integer('medicina_id')->unsigned();
            $table->integer('medicamento_id')->unsigned();

            $table->foreign('medicina_id')->references('id')->on('cm_medicinas')->onDelete('cascade');
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
        Schema::drop('med_meds');
    }
}
