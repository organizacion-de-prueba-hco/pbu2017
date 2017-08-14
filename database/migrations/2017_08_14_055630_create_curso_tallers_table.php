<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoTallersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_tallers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('taller_id')->unsigned();
            $table->integer('director')->unsigned();
            $table->string('semestre');
            $table->string('docente');
            $table->string('estado');
            $table->foreign('taller_id')->references('id')
                  ->on('tallers')->onDelete('cascade');
            $table->foreign('director')->references('id')
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
        Schema::drop('curso_tallers');
    }
}
