<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlmuerzosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almuerzos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comedor_id')->unsigned();
            $table->integer('expediente_id')->unsigned();

            $table->foreign('expediente_id')->references('expediente')
                  ->on('expedientes')->onDelete('cascade');
            $table->foreign('comedor_id')->references('id')
                  ->on('comedors')->onDelete('cascade');
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
        Schema::drop('almuerzos');
    }
}
