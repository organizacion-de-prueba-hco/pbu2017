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
        	'INGENIERIA AGRONOMICA',
            'INGENIERIA AGROINDUSTRIAL',
            'INGENIERIA AGROPECUARIA FORESTAL',
            'MEDICINA HUMANA',
            'ODONTOLOGIA',
            'PSICOLOGIA',
            'ENFERMERIA',
            'OBSTETRICIA',
            'CIENCIAS ADMINISTRATIVAS',
            'TURISMO Y HOTELERIA',
            'CIENCIAS CONTABLES Y FINANCIERAS',
            'ECONOMIA',
            'SOCIOLOGIA',
            'CIENCIAS DE LA COMUNICACION SOCIAL',
            'EDUCACION INICIAL',
            'EDUCACION PRIMARIA',
            'EDUCACION FISICA',
            'FILOSOFIA',
            'PSICOLOGIA Y CIENCIAS SOCIALES',
            'LENGUA Y LITERATURA',
            'CIENCIAS HISTORICO SOCIALES Y GEOGRAFICAS',
            'MATEMATICA Y FISICA',
            'BIOLOGIA, QUIMICA Y CIENCIA DEL AMBIENTE',
            'DERECHO Y CIENCIAS POLITICAS',
            'INGENIERIA CIVIL',
            'ARQUITECTURA',
            'INGENIERIA INDUSTRIAL',
            'INGENIERIA DE SISTEMAS',
            'MEDICINA VETERINARIA'
);
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
