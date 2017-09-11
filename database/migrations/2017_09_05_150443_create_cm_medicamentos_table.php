<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmMedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cm_medicamentos', function (Blueprint $table) {
            $table->increments('id');//
            $table->string('medicamento');//paracetamol
            $table->string('presentacion');//10 mg or 20mg
            $table->integer('cantidad');//cantidad de 
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
        Schema::drop('cm_medicamentos');
    }
}
