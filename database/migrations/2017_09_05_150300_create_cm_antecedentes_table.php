<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmAntecedentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cm_antecedentes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('tipo'); //1=Personal, 2=Familiar
            //Consume
            $table->string('c_alcohol');
            $table->string('c_droga');
            $table->string('c_tabaco');
            $table->string('c_cafe');

            //Patologicos
            $table->string('p_hepatitis');
            $table->string('p_tifoidea');
            $table->string('p_tbc');
            $table->string('p_hta');
            $table->string('p_dm');
            $table->string('p_asma');
            $table->string('p_otros');
            $table->string('p_otros_desc');
            //Cirugias
            $table->string('qx');


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('cm_antecedentes');
    }
}
