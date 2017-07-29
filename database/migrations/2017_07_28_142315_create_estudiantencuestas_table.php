<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantencuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantencuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('encuesta_id')->unsigned();
            $table->integer('estudiante_id')->unsigned();
            //i
            $table->string('i_a',1);
            $table->string('i_b',1);
            $table->string('i_c',1);
            $table->string('i_d',1);
            $table->string('i_e',1);
            $table->string('i_f',1);
            $table->string('i_g',1);
            //ii
            $table->string('ii_a',1);
            $table->string('ii_b',1);
            $table->string('ii_c',1);
            $table->string('ii_d',1);
            $table->string('ii_e',1);
            $table->string('ii_f',1);
            $table->string('ii_g',1);
            $table->string('ii_h',1);
            $table->string('ii_i',1);
            //iii
            $table->string('iii_a',1);
            $table->string('iii_b',1);
            $table->string('iii_c',1);
            $table->string('iii_d',1);
            $table->string('iii_e',1);
            //iv
            $table->string('iv_a',1);
            $table->string('iv_b',1);
            $table->string('iv_c',1);
            $table->string('iv_d',1);
            $table->string('iv_e',1);
            $table->string('iv_f',1);

            $table->foreign('encuesta_id')->references('id')
                  ->on('encuestas')->onDelete('cascade');
            $table->foreign('estudiante_id')->references('user_id')
                  ->on('estudiantes')->onDelete('cascade');
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
        Schema::drop('estudiantencuestas');
    }
}
