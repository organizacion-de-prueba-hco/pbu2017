<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(DepartamentosTableSeeder::class);
        $this->call(ProvinciasTableSeeder::class);
        $this->call(DistritosTableSeeder::class);
        $this->call(EstadoCivilTableSeeder::class);
        $this->call(ReligionTableSeeder::class);
        $this->call(ModalidadIngresoTableSeeder::class);
        $this->call(FacultadTableSeeder::class);
        $this->call(EscuelaTableSeeder::class);
        $this->call(UserTableSeeder::class);
        Model::reguard();
    }
}
