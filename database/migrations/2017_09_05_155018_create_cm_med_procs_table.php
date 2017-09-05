<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmMedProcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cm_med_procs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medicina_id')->unsigned();
            $table->integer('procedimiento_id')->unsigned();

            $table->foreign('medicina_id')->references('id')->on('cm_medicinas')->onDelete('cascade');
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
        Schema::drop('cm_med_procs');
    }
}
