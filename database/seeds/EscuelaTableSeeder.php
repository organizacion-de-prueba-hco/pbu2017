<?php

use Illuminate\Database\Seeder;

class EscuelaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array(
        	'Escuela Profesional de Ingeniería Agronómica',
        	'Escuela Profesional de Ingeniería Agroindustrial',
        	'Escuela Profesional de Ingeniería Agropecuaria Forestal',
        	'Escuela Prosional de Medicina Humana',
        	'Escuela Profesional de Odontología',
        	'Escuela Profesional de Psicología',
        	'Escuela Profesional de Enfermería',
        	'Escuela Profesional de Obstetricia',
        	'Escuela Profesional de Ciencias Administratívas',
        	'Escuela Profesional de Turismo y Hotelería',
        	'Escuela Profesional de Ciencias Contables y Financieras',
        	'Escuela Profesional de Economía',
        	'Escuela Profesional de Sociología',
        	'Escuela Profesional de Ciencias de la Comunicación Social',
        	'Escuela Profesional de Educación Inicial',
        	'Escuela Profesional de Educación Primaria',
        	'Escuela Profesional de Educación Física',
        	'Escuela Profesional de Filosofía',
        	'Psicología y Ciencias Sociales',
        	'Escuela Profesional de Lengua y Literatura',
        	'Escuela Profesional de Ciencias Histórico Sociales y Geográficas',
        	'Escuela Profesional de Matemática y Física',
        	'Escuela Profesional Biología, Química y Ciencia del Ambiente',
        	'Escuela Profesional de Derecho y Ciencias Políticas',
        	'Escuela Profesional de Ingeniería Civil',
        	'Escuela Profesional de Arquitectura',
        	'Escuela Profesional de Ingeniería Indistrial',
        	'Escuela Profesional de Ingeniería de Sistemas',
        	'Escuela Profesional de Medicina Veterinaria');
         for ($i=0; $i<3; $i++) { 
    		DB::table('escuelas')->insert([
                'escuela' => $array[$i],
                'facultad_id' => "1",
        	]);
    	}
    	for ($i=3; $i<5; $i++) { 
    		DB::table('escuelas')->insert([
                'escuela' => $array[$i],
                'facultad_id' => "2",
        	]);
    	}
    	for ($i=5; $i<6; $i++) { 
    		DB::table('escuelas')->insert([
                'escuela' => $array[$i],
                'facultad_id' => "3",
        	]);
    	}
    	for ($i=6; $i<7; $i++) { 
    		DB::table('escuelas')->insert([
                'escuela' => $array[$i],
                'facultad_id' => "4",
        	]);
    	}
    	for ($i=7; $i<8; $i++) { 
    		DB::table('escuelas')->insert([
                'escuela' => $array[$i],
                'facultad_id' => "5",
        	]);
    	}
    	for ($i=8; $i<10; $i++) { 
    		DB::table('escuelas')->insert([
                'escuela' => $array[$i],
                'facultad_id' => "6",
        	]);
    	}
    	for ($i=10; $i<11; $i++) { 
    		DB::table('escuelas')->insert([
                'escuela' => $array[$i],
                'facultad_id' => "7",
        	]);
    	}
    	for ($i=11; $i<12; $i++) { 
    		DB::table('escuelas')->insert([
                'escuela' => $array[$i],
                'facultad_id' => "8",
        	]);
    	}
    	for ($i=12; $i<14; $i++) { 
    		DB::table('escuelas')->insert([
                'escuela' => $array[$i],
                'facultad_id' => "9",
        	]);
    	}
    	for ($i=14; $i<23; $i++) { 
    		DB::table('escuelas')->insert([
                'escuela' => $array[$i],
                'facultad_id' => "10",
        	]);
    	}
    	for ($i=23; $i<24; $i++) { 
    		DB::table('escuelas')->insert([
                'escuela' => $array[$i],
                'facultad_id' => "11",
        	]);
    	}
    	for ($i=24; $i<26; $i++) { 
    		DB::table('escuelas')->insert([
                'escuela' => $array[$i],
                'facultad_id' => "12",
        	]);
    	}
    	for ($i=26; $i<28; $i++) { 
    		DB::table('escuelas')->insert([
                'escuela' => $array[$i],
                'facultad_id' => "13",
        	]);
    	}
    	for ($i=28; $i<29; $i++) { 
    		DB::table('escuelas')->insert([
                'escuela' => $array[$i],
                'facultad_id' => "14",
        	]);
    	}
    }
}
