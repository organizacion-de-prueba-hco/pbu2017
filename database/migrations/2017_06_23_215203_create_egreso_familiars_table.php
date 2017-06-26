<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEgresoFamiliarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egreso_familiars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->float('a');
            $table->float('b');
            $table->float('c');
            $table->float('d');
            $table->float('e');
            $table->float('f');
            $table->float('g');
            $table->float('h');
            $table->float('i');
            $table->float('j');
            $table->float('k');
            $table->float('l');
            $table->float('m');
            $table->float('n');
            $table->foreign('user_id')->references('id')
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
        Schema::drop('egreso_familiars');
    }
}
