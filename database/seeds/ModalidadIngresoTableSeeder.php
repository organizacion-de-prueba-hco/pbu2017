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
                'modalidad' => 'CENTRO PRE UNIVERSITARIO',
        	]);
        DB::table('m_ingresos')->insert([
                'modalidad' => 'DEPORTISTAS CALIFICADOS',
        	]);
        DB::table('m_ingresos')->insert([
                'modalidad' => 'TRASLADO EXTERNO',
        	]);
        DB::table('m_ingresos')->insert([
                'modalidad' => 'PRIMEROS PUESTOS',
        	]);
        DB::table('m_ingresos')->insert([
                'modalidad' => 'DISCAPACITADOS',
        	]);
        DB::table('m_ingresos')->insert([
                'modalidad' => 'EGRESADO CNA APLICACION - UNHEVAL',
            ]);
        DB::table('m_ingresos')->insert([
                'modalidad' => 'EGRESADO DE COLEGIO AGROPECUARIO MAMR',
            ]);
        DB::table('m_ingresos')->insert([
                'modalidad' => 'EGRESADO DE COLEGIO MAYOR',
            ]);
        DB::table('m_ingresos')->insert([
                'modalidad' => 'EXAMEN PREFERENCIAL QUINTO AÑO',
            ]);
        DB::table('m_ingresos')->insert([
                'modalidad' => 'HIJO DE COMUNIDADES CAMPESINAS/NATIVAS',
            ]);
        DB::table('m_ingresos')->insert([
                'modalidad' => 'LICENCIADO DE LAS FUERZAS ARMADAS',
            ]);
        DB::table('m_ingresos')->insert([
                'modalidad' => 'NO ESPECIFICADO',
            ]);
        DB::table('m_ingresos')->insert([
                'modalidad' => 'OBEC',
            ]);
        DB::table('m_ingresos')->insert([
                'modalidad' => 'PERSONAL ADMINISTRATIVO - UNHEVAL',
            ]);
        DB::table('m_ingresos')->insert([
                'modalidad' => 'PROGRAMA BECA 18',
            ]);
        DB::table('m_ingresos')->insert([
                'modalidad' => 'SEGUNDA OPCION',
            ]);
        DB::table('m_ingresos')->insert([
                'modalidad' => 'SELECCION GENERAL',
            ]);
        DB::table('m_ingresos')->insert([
                'modalidad' => 'VICTIMAS DEL TERRORISMO',
            ]);
        
        DB::table('m_ingresos')->insert([
                'modalidad' => 'BACHILLER Y/O PROFESIONAL',
            ]);
          
        DB::table('m_ingresos')->insert([
                'modalidad' => 'Otros',
        	]);
    }
}
