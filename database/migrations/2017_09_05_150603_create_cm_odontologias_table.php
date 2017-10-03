<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmOdontologiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cm_odontologias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('odontologo_id')->unsigned();
            $table->integer('user_id')->unsigned();

            //I. Motivo de consulta.
             $table->string('i_motivo_consulta');

            //II. Estado de salud general
              $table->string('ii_a');
              $table->string('ii_b');
              $table->string('ii_c');
              $table->string('ii_d');

            //III. Estado de salud Bucodental
              //A) Examen Odontológico
              //11-18
              $table->string('iii_xi');
              $table->string('iii_xii');
              $table->string('iii_xiii');
              $table->string('iii_xiv');
              $table->string('iii_xv');
              $table->string('iii_xvi');
              $table->string('iii_xvii');
              $table->string('iii_xviii');
              //21-28
              $table->string('iii_xxi');
              $table->string('iii_xxii');
              $table->string('iii_xxiii');
              $table->string('iii_xxiv');
              $table->string('iii_xxv');
              $table->string('iii_xxvi');
              $table->string('iii_xxvii');
              $table->string('iii_xxviii');
              //31-38
              $table->string('iii_xxxi');
              $table->string('iii_xxxii');
              $table->string('iii_xxxiii');
              $table->string('iii_xxxiv');
              $table->string('iii_xxxv');
              $table->string('iii_xxxvi');
              $table->string('iii_xxxvii');
              $table->string('iii_xxxviii');
              //41-48
              $table->string('iii_xli');
              $table->string('iii_xlii');
              $table->string('iii_xliii');
              $table->string('iii_xliv');
              $table->string('iii_xlv');
              $table->string('iii_xlvi');
              $table->string('iii_xlvii');
              $table->string('iii_xlviii');
              //51-55
              $table->string('iii_li');
              $table->string('iii_lii');
              $table->string('iii_liii');
              $table->string('iii_liv');
              $table->string('iii_lv');
              //61-65
              $table->string('iii_lxi');
              $table->string('iii_lxii');
              $table->string('iii_lxiii');
              $table->string('iii_lxiv');
              $table->string('iii_lxv');
              //71-75
              $table->string('iii_lxxi');
              $table->string('iii_lxxii');
              $table->string('iii_lxxiii');
              $table->string('iii_lxxiv');
              $table->string('iii_lxxv');
              //81-85
              $table->string('iii_lxxxi');
              $table->string('iii_lxxxii');
              $table->string('iii_lxxxiii');
              $table->string('iii_lxxxiv');
              $table->string('iii_lxxxv');

              //B) Examen Bucal
              $table->string('iii_b_a');
              $table->string('iii_b_b');
              $table->string('iii_b_c');
              $table->string('iii_b_d');
              $table->string('iii_b_e');
              $table->string('iii_b_f');
              $table->string('iii_b_otros');

              //IV. Diagnóstico
              $table->string('iv_diagnostico');

              //V. Plan de tratamiento
               //relación de muchos a muchos con tratamientos: odo_pros

              //VI. Atenciones
               //relación de muchos a muchos con tratamientos: odo_atencion

            //I. Estado de salud Bucodental

            $table->foreign('odontologo_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('cm_odontologias');
    }
}
