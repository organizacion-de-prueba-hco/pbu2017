<?php

use Illuminate\Database\Seeder;

class CmProcedimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cm_procedimientos')->insert([
                'procedimiento' => 'Curación',
                'area' => '1',
                'tarifa' => '0'
       	]);
       	DB::table('cm_procedimientos')->insert([
                'procedimiento' => 'Extracción',
                'area' => '1',
                'tarifa' => '0',
       	]);
       	DB::table('cm_procedimientos')->insert([
                'procedimiento' => 'Endodoncia',
                'area' => '1',
                'tarifa' => '0',
       	]);
       	DB::table('cm_procedimientos')->insert([
                'procedimiento' => 'Profilaxis',
                'area' => '1',
                'tarifa' => '0',
       	]);
       	DB::table('cm_procedimientos')->insert([
                'procedimiento' => 'Curación/nes',
                'area' => '0',
                'tarifa' => '0',
       	]);
       	DB::table('cm_procedimientos')->insert([
                'procedimiento' => 'Suturaciones',
                'area' => '0',
                'tarifa' => '0',
       	]);
       	DB::table('cm_procedimientos')->insert([
                'procedimiento' => 'Extracción de uña',
                'area' => '0',
                'tarifa' => '0',
       	]);
    }
}
