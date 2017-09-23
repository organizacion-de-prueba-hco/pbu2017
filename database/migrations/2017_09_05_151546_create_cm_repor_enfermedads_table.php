<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmReporEnfermedadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cm_repor_enfermedads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medicina_id')->unsigned();
            $table->integer('periodo');
            $table->foreign('medicina_id')->references('id')->on('cm_medicinas')->onDelete('cascade');
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
        Schema::drop('cm_repor_enfermedads');
    }
}
