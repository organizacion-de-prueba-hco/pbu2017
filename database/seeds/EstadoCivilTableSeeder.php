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
                'est_civil' => 'Soltero',
        	]);
        DB::table('est_civils')->insert([
                'est_civil' => 'Casado',
        	]);
        DB::table('est_civils')->insert([
                'est_civil' => 'Conviviente',
        	]);
        DB::table('est_civils')->insert([
                'est_civil' => 'Separado',
        	]);
        DB::table('est_civils')->insert([
                'est_civil' => 'Divorsiado',
        	]);
        DB::table('est_civils')->insert([
                'est_civil' => 'Viudo',
        	]);
    }
}
