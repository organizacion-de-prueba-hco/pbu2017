<?php

use Illuminate\Database\Seeder;

class ModalidadIngresoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_ingresos')->insert([
                'modalidad' => 'CEPRE',
        	]);
        DB::table('m_ingresos')->insert([
                'modalidad' => 'Examen de Admisión',
        	]);
        DB::table('m_ingresos')->insert([
                'modalidad' => 'Deportista calificado',
        	]);
        DB::table('m_ingresos')->insert([
                'modalidad' => 'Traslado Externo',
        	]);
        DB::table('m_ingresos')->insert([
                'modalidad' => 'Primeros Puestos',
        	]);
        DB::table('m_ingresos')->insert([
                'modalidad' => 'Minusválidos',
        	]);
        DB::table('m_ingresos')->insert([
                'modalidad' => 'Otros',
        	]);
    }
}
