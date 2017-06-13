<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comedors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('concesionario')->unsigned();
            $table->string('estado');
            $table->foreign('concesionario')->references('responsable')
                  ->on('concesionario_comedors')->onDelete('cascade');
            
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
        Schema::drop('comedors');
    }
}
