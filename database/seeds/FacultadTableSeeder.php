<?php

use Illuminate\Database\Seeder;

class FacultadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$array = array('Ciencias Agrarias', 'Medicina','Psicología','Enfermería','Obstetricia','Ciencias Administrativas y Turismo','Ciencias Contables y Financieras','Economía','Ciencias Sociales','Ciencias de la Educación','Derecho y Ciencias Políticas','Ingeniería Civil Arquitectura','Ingeniería Industrial y de Sistemas','Medicina Veterinaria y Zootecnia');

        for ($i=0; $i<count($array); $i++) { 
    		DB::table('facultads')->insert([
                'facultad' => $array[$i],
        	]);
    	}
    }
}
