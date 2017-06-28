<?php

use Illuminate\Database\Seeder;

class EstadoCivilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('est_civils')->insert([
                'est_civil' => 'Soltero(a)',
        	]);
        DB::table('est_civils')->insert([
                'est_civil' => 'Casado(a)',
        	]);
        DB::table('est_civils')->insert([
                'est_civil' => 'Conviviente',
        	]);
        DB::table('est_civils')->insert([
                'est_civil' => 'Separado',
        	]);
        DB::table('est_civils')->insert([
                'est_civil' => 'Divorciado(a)',
        	]);
        DB::table('est_civils')->insert([
                'est_civil' => 'Viudo',
        	]);
        DB::table('est_civils')->insert([
                'est_civil' => 'No Especifica',
            ]);
    }
}
