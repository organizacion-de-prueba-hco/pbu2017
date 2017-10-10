<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePsicopedagogiaSqrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psicopedagogia_sqrs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estudiante_id')->unsigned();
            $table->integer('n')->default('1');
            $table->string('p_i');
            $table->string('p_ii');
            $table->string('p_iii');
            $table->string('p_iv');
            $table->string('p_v');
            $table->string('p_vi');
            $table->string('p_vii');
            $table->string('p_viii');
            $table->string('p_ix');
            $table->string('p_x');
            $table->string('p_xi');
            $table->string('p_xii');
            $table->string('p_xiii');
            $table->string('p_xiv');
            $table->string('p_xv');
            $table->string('p_xvi');
            $table->string('p_xvii');
            $table->string('p_xviii');
            $table->string('p_xix');
            $table->string('p_xx');
            $table->string('p_xxi');
            $table->string('p_xxii');
            $table->string('p_xxiii');
            $table->string('p_xxiv');
            $table->string('p_xxv');
            $table->string('p_xxvi');
            $table->string('p_xxvii');
            $table->string('p_xxviii');
            $table->string('p_xxix');
            $table->string('p_xxx');
            $table->string('obs');
            $table->string('conclusiones');
            $table->timestamps();

            $table->foreign('estudiante_id')->references('user_id')->on('estudiantes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('psicopedagogia_sqrs');
    }
}
