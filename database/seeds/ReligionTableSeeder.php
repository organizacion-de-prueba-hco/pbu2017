<?php

use Illuminate\Database\Seeder;

class ReligionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('religions')->insert([
                'religion' => 'Católico',
        	]);
        DB::table('religions')->insert([
                'religion' => 'Evangélico',
        	]);
        DB::table('religions')->insert([
                'religion' => 'Mormón',
        	]);
        DB::table('religions')->insert([
                'religion' => 'Adventista',
        	]);
        DB::table('religions')->insert([
                'religion' => 'Otros',
        	]);
    }
}
