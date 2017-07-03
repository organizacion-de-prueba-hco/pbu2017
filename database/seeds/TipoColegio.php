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
            'tipo' => 'Particular',                
        ]);
        DB::table('tipo_colegios')->insert([
            'tipo' => 'Estatal',                
        ]);
        DB::table('tipo_colegios')->insert([
            'tipo' => 'No especifica',                
        ]);
    }
}
