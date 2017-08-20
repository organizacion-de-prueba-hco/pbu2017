<?php

use Illuminate\Database\Seeder;

class TallerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     	DB::table('tallers')->insert([
                'unidad' => '3',
                'taller' => 'Futbol',
        	]);
     	DB::table('tallers')->insert([
                'unidad' => '3',
                'taller' => 'Voleibol',
        	]);
     	DB::table('tallers')->insert([
                'unidad' => '3',
                'taller' => 'Karate',
        	]);
     	DB::table('tallers')->insert([
                'unidad' => '3',
                'taller' => 'Básquetbol',
        	]);
     	DB::table('tallers')->insert([
                'unidad' => '3',
                'taller' => 'Futsal',
        	]);
     	DB::table('tallers')->insert([
                'unidad' => '3',
                'taller' => 'Taekwondo',
        	]);

     	DB::table('tallers')->insert([
                'unidad' => '4',
                'taller' => 'Teatro',
        	]);
     	DB::table('tallers')->insert([
                'unidad' => '4',
                'taller' => 'Música',
        	]);
     	DB::table('tallers')->insert([
                'unidad' => '4',
                'taller' => 'Danzas',
        	]);     
        DB::table('tallers')->insert([
                'unidad' => '4',
                'taller' => 'Dibujo y Pintura',
        	]);	
    }
}
