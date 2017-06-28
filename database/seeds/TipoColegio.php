<?php

use Illuminate\Database\Seeder;

class TipoColegio extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_colegios')->insert([
            'tipo' => 'Privado',                
        ]);
        DB::table('tipo_colegios')->insert([
            'tipo' => 'Público',                
        ]);
        DB::table('tipo_colegios')->insert([
            'tipo' => 'No especifica',                
        ]);
    }
}
