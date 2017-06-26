<?php

use Illuminate\Database\Seeder;

class ProvinciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array(
						'CHACHAPOYAS ',
						'BAGUA',
						'BONGARA',
						'CONDORCANQUI',
						'LUYA',
						'RODRIGUEZ DE MENDOZA',
						'UTCUBAMBA',
						'HUARAZ',
						'AIJA',
						'ANTONIO RAYMONDI',
						 'ASUNCION',
						 'BOLOGNESI',
						 'CARHUAZ',
						 'CARLOS FERMIN FITZCARRALD',
						 'CASMA',
						 'CORONGO',
						 'HUARI',
						 'HUARMEY',
						 'HUAYLAS',
						 'MARISCAL LUZURIAGA',
						 'OCROS',
						 'PALLASCA',
						 'POMABAMBA',
						 'RECUAY',
						 'SANTA',
						 'SIHUAS',
						 'YUNGAY',
						 'ABANCAY',
						 'ANDAHUAYLAS',
						 'ANTABAMBA',
						 'AYMARAES',
						 'COTABAMBAS',
						 'CHINCHEROS',
						 'GRAU',
						 'AREQUIPA',
						 'CAMANA',
						 'CARAVELI',
						 'CASTILLA',
						 'CAYLLOMA',
						 'CONDESUYOS',
						 'ISLAY',
						 'LA UNION',
						 'HUAMANGA',
						 'CANGALLO',
						 'HUANCA SANCOS',
						 'HUANTA',
						 'LA MAR',
						 'LUCANAS',
						 'PARINACOCHAS',
						 'PAUCAR DEL SARA SARA',
						 'SUCRE',
						 'VICTOR FAJARDO',
						 'VILCAS HUAMAN',
						 'CAJAMARCA',
						 'CAJABAMBA',
						 'CELENDIN',
						 'CHOTA ',
						 'CONTUMAZA',
						 'CUTERVO',
						 'HUALGAYOC',
						 'JAEN',
						 'SAN IGNACIO',
						 'SAN MARCOS',
						 'SAN PABLO',
						 'SANTA CRUZ',
						 'CALLAO',
						 'CUSCO',
						 'ACOMAYO',
						 'ANTA',
						 'CALCA',
						 'CANAS',
						 'CANCHIS',
						 'CHUMBIVILCAS',
						 'ESPINAR',
						 'LA CONVENCION',
						 'PARURO',
						 'PAUCARTAMBO',
						 'QUISPICANCHI',
						 'URUBAMBA',
						 'HUANCAVELICA',
						 'ACOBAMBA',
						 'ANGARAES',
						 'CASTROVIRREYNA',
						 'CHURCAMPA',
						 'HUAYTARA',
						 'TAYACAJA',
						 'HUÁNUCO', 
						 'AMBO', 
						 'DOS DE MAYO',
						 'HUACAYBAMBA',
						 'HUAMALIES',
						 'LEONCIO PRADO',
						 'MARAÑON',
						 'PACHITEA',
						 'PUERTO INCA',
						 'LAURICOCHA',
						 'YAROWILCA',
						 'ICA', 
						 'CHINCHA', 
						 'NAZCA',						
						 'PALPA', 
						 'PISCO', 
						 'HUANCAYO', 
						 'CONCEPCION', 
						 'CHANCHAMAYO', 
						 'JAUJA', 
						 'JUNIN', 
						 'SATIPO', 
						 'TARMA', 
						 'YAULI', 
						 'CHUPACA', 
						 'TRUJILLO', 
						 'ASCOPE', 
						 'BOLIVAR', 
						 'CHEPEN', 
						 'JULCAN', 
						 'OTUZCO', 
						 'PACASMAYO', 
						 'PATAZ', 
						 'SANCHEZ CARRION', 
						 'SANTIAGO DE CHUCO', 
						 'GRAN CHIMU', 
						 'VIRU', 
						 'CHICLAYO', 
						 'FERREÑAFE', 
						 'LAMBAYEQUE', 
						 'LIMA', 
						 'BARRANCA', 
						 'CAJATAMBO', 
						 'CANTA', 
						 'CAÑETE', 
						 'HUARAL', 
						 'HUAROCHIRI', 
						 'HUAURA', 
						 'OYON', 
						 'YAUYOS', 
						 'MAYNAS', 
						 'ALTO AMAZONAS', 
						 'LORETO', 
						 'MARISCAL RAMON CASTILLA', 
						 'REQUENA', 
						 'UCAYALI', 
						 'TAMBOPATA', 
						 'MANU', 
						 'TAHUAMANU', 
						 'MARISCAL NIETO', 
						 'GENERAL SANCHEZ CERRO', 
						 'ILO', 
						 'PASCO', 
						 'DANIEL ALCIDES CARRION', 
						 'OXAPAMPA', 
						 'PIURA', 
						 'AYABACA', 
						 'HUANCABAMBA', 
						 'MORROPON', 
						 'PAITA', 
						 'SULLANA', 
						 'TALARA', 
						 'SECHURA', 
						 'PUNO', 
						 'AZANGARO', 
						 'CARABAYA', 
						 'CHUCUITO', 
						 'EL COLLAO', 
						 'HUANCANE', 
						 'LAMPA', 
						 'MELGAR', 
						 'MOHO', 
						 'SAN ANTONIO DE PUTINA', 
						 'SAN ROMAN', 
						 'SANDIA', 
						 'YUNGUYO', 
						 'MOYOBAMBA', 
						 'BELLAVISTA', 
						 'EL DORADO', 
						 'HUALLAGA', 
						 'LAMAS', 
						 'MARISCAL CACERES', 
						 'PICOTA', 
						 'RIOJA', 
						 'SAN MARTIN', 
						 'TOCACHE', 
						 'TACNA', 
						 'CANDARAVE', 
						 'JORGE BASADRE', 
						 'TARATA', 
						 'TUMBES', 
						 'CONTRALMIRANTE VILLAR', 
						 'ZARUMILLA', 
						 'CORONEL PORTILLO', 
						 'ATALAYA', 
						 'PADRE ABAD', 
						 'PURUS');

    	for ($i=1; $i<=7; $i++) { 
    		DB::table('provincias')->insert([
                'provincia' => $array[$i-1],
                'departamento_id' => "1",
             ]);
    	}
    	for ($i=8; $i<=27; $i++) { 
    		DB::table('provincias')->insert([
                'provincia' => $array[$i-1],
                'departamento_id' => "2",
             ]);
    	}
    	for ($i=28; $i<=34; $i++) { 
    		DB::table('provincias')->insert([
                'provincia' => $array[$i-1],
                'departamento_id' => "3",
             ]);
    	}
    	for ($i=35; $i<=42; $i++) { 
    		DB::table('provincias')->insert([
                'provincia' => $array[$i-1],
                'departamento_id' => "4",
             ]);
    	}
    	for ($i=43; $i<=53; $i++) { 
    		DB::table('provincias')->insert([
                'provincia' => $array[$i-1],
                'departamento_id' => "5",
             ]);
    	}
    	for ($i=54; $i<=65; $i++) { 
    		DB::table('provincias')->insert([
                'provincia' => $array[$i-1],
                'departamento_id' => "6",
             ]);
    	}

    		DB::table('provincias')->insert([
                'provincia' => $array[66-1],
                'departamento_id' => "7",
             ]);

    	for ($i=67; $i<=79; $i++) { 
    		DB::table('provincias')->insert([
                'provincia' => $array[$i-1],
                'departamento_id' => "8",
             ]);
    	}
    	for ($i=80; $i<=86; $i++) { 
    		DB::table('provincias')->insert([
                'provincia' => $array[$i-1],
                'departamento_id' => "9",
             ]);
    	}
    	for ($i=87; $i<=97; $i++) { 
    		DB::table('provincias')->insert([
                'provincia' => $array[$i-1],
                'departamento_id' => "10",
             ]);
    	}
    	for ($i=98; $i<=102; $i++) { 
    		DB::table('provincias')->insert([
                'provincia' => $array[$i-1],
                'departamento_id' => "11",
             ]);
    	}
    	for ($i=103; $i<=111; $i++) { 
    		DB::table('provincias')->insert([
                'provincia' => $array[$i-1],
                'departamento_id' => "12",
             ]);
    	}
    	for ($i=112; $i<=123; $i++) { 
    		DB::table('provincias')->insert([
                'provincia' => $array[$i-1],
                'departamento_id' => "13",
             ]);
    	}
    	for ($i=124; $i<=126; $i++) { 
    		DB::table('provincias')->insert([
                'provincia' => $array[$i-1],
                'departamento_id' => "14",
             ]);
    	}
    	for ($i=127; $i<=136; $i++) { 
    		DB::table('provincias')->insert([
                'provincia' => $array[$i-1],
                'departamento_id' => "15",
             ]);
    	}
    	for ($i=137; $i<=142; $i++) { 
    		DB::table('provincias')->insert([
                'provincia' => $array[$i-1],
                'departamento_id' => "16",
             ]);
    	}
    	for ($i=143; $i<=145; $i++) { 
    		DB::table('provincias')->insert([
                'provincia' => $array[$i-1],
                'departamento_id' => "17",
             ]);
    	}
    	for ($i=146; $i<=148; $i++) { 
    		DB::table('provincias')->insert([
                'provincia' => $array[$i-1],
                'departamento_id' => "18",
             ]);
    	}
    	for ($i=149; $i<=151; $i++) { 
    		DB::table('provincias')->insert([
                'provincia' => $array[$i-1],
                'departamento_id' => "19",
             ]);
    	}
    	for ($i=152; $i<=159; $i++) { 
    		DB::table('provincias')->insert([
                'provincia' => $array[$i-1],
                'departamento_id' => "20",
             ]);
    	}
    	for ($i=160; $i<=172; $i++) { 
    		DB::table('provincias')->insert([
                'provincia' => $array[$i-1],
                'departamento_id' => "21",
             ]);
    	}
    	for ($i=173; $i<=182; $i++) { 
    		DB::table('provincias')->insert([
                'provincia' => $array[$i-1],
                'departamento_id' => "22",
             ]);
    	}
    	for ($i=183; $i<=186; $i++) { 
    		DB::table('provincias')->insert([
                'provincia' => $array[$i-1],
                'departamento_id' => "23",
             ]);
    	}
    	for ($i=187; $i<=189; $i++) { 
    		DB::table('provincias')->insert([
                'provincia' => $array[$i-1],
                'departamento_id' => "24",
             ]);
    	}
    	for ($i=190; $i<=193; $i++) { 
    		DB::table('provincias')->insert([
                'provincia' => $array[$i-1],
                'departamento_id' => "25",
             ]);
    	}

    	DB::table('provincias')->insert([
                'provincia' => 'Extranjero',
                'departamento_id' => "26",
             ]);
    	
               
                

    }
}