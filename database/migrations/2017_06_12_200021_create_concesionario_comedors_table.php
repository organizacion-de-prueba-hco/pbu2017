<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConcesionarioComedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concesionario_comedors', function (Blueprint $table) {
            $table->integer('responsable')->unsigned();
            $table->primary('responsable');
            $table->string('empresa');
            $table->string('ruc');
            $table->foreign('responsable')->references('id')
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
        Schema::drop('concesionario_comedors');
    }
}
