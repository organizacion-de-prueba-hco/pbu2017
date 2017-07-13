<?php

use Illuminate\Database\Seeder;

class NBecasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=1; $i <= 28; $i++) { 
        DB::table('cantidad_becas')->insert([
                'escuela_id' => $i,
                'a' => '100'
                'b' => '100'
                'c' => '100'
        ]);
    	}
    }
}
