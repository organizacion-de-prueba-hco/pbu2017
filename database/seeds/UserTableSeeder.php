<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'dni' => '00000000',
                'nombres' => 'Super',
                'apellido_paterno' => 'Usuario',
                'apellido_materno' => 'Usuario',
                'email' => 'admi@hotmail.com',
                'estado_login' => '1',
                'tipo_user' => '0',
                'password' => bcrypt('123456saem'),
                'foto' => 'admin.png',
        ]);
        DB::table('users')->insert([
                'dni' => '00000001',
                'nombres' => 'Dr. Ewer',
                'apellido_paterno' => 'Portocarrero',
                'apellido_materno' => 'Merino',
                'email' => 'vicerrector@hotmail.com',
                'estado_login' => '1',
                'tipo_user' => '1',
                'password' => bcrypt('123456bu'),
                'foto' => 'admin.png',
        ]);
        DB::table('users')->insert([
                'dni' => '00000002',
                'nombres' => 'Mg. Oscar',
                'apellido_paterno' => 'Paterno',
                'apellido_materno' => 'Materno',
                'email' => 'dbu@hotmail.com',
                'estado_login' => '1',
                'tipo_user' => '1',
                'password' => bcrypt('123456bu'),
                'foto' => 'admin.png',
        ]);
        // DB::table('users')->insert([
        //         'dni' => '00000003',
        //         'nombres' => 'Mg. Cloria',
        //         'apellido_paterno' => 'Paterno',
        //         'apellido_materno' => 'Materno',
        //         'email' => 'mgc@hotmail.com',
        //         'estado_login' => '1',
        //         'tipo_user' => '1',
        //         'password' => bcrypt('123456bu'),
        //         'foto' => 'admin.png',
        // ]);
        DB::table('directivos')->insert([
                'user_id' => '2',
                'cargo_funcion' => 'Vicerrector Académico',
        ]);
        DB::table('directivos')->insert([
                'user_id' => '3',
                'cargo_funcion' => 'Director Bienestar Universitario',
        ]);
        // DB::table('directivos')->insert([
        //         'user_id' => '4',
        //         'cargo_funcion' => 'Oficina BU',
        // ]);

        DB::table('users')->insert([
                'dni' => '00000004',
                'nombres' => 'Jef. USU',
                'apellido_paterno' => 'Paterno',
                'apellido_materno' => 'Materno',
                'email' => 'jusu@hotmail.com',
                'estado_login' => '1',
                'tipo_user' => '2',
                'password' => bcrypt('123456bu'),
                'foto' => 'admin.png',
        ]);
        DB::table('users')->insert([
                'dni' => '00000005',
                'nombres' => 'Asist. Social',
                'apellido_paterno' => 'Usuario',
                'apellido_materno' => 'Usuario',
                'email' => 'asitsoc@hotmail.com',
                'estado_login' => '1',
                'tipo_user' => '2-1',
                'password' => bcrypt('123456bu'),
                'foto' => 'admin.png',
        ]);
        DB::table('users')->insert([
                'dni' => '00000006',
                'nombres' => 'consesionario',
                'apellido_paterno' => 'Usuario',
                'apellido_materno' => 'Usuario',
                'email' => 'ccomedor@hotmail.com',
                'estado_login' => '1',
                'tipo_user' => '2-2',
                'password' => bcrypt('123456bu'),
                'foto' => 'admin.png',
        ]);
        DB::table('concesionario_comedors')->insert([
                'responsable' => '6',
                'empresa' => 'Los comedores',
                'ruc' => '23232390',
        ]);
        DB::table('users')->insert([
                'dni' => '00000007',
                'nombres' => 'Personal',
                'apellido_paterno' => 'Usuario',
                'apellido_materno' => 'Nuticionista',
                'email' => 'pnutricion@hotmail.com',
                'estado_login' => '1',
                'tipo_user' => '2-3',
                'password' => bcrypt('123456bu'),
                'foto' => 'admin.png',
        ]);

        // DB::table('users')->insert([
        //         'dni' => '00000008',
        //         'nombres' => 'Jef. Act Fís Mental',
        //         'apellido_paterno' => 'Usuario',
        //         'apellido_materno' => 'materno',
        //         'email' => 'fisica@hotmail.com',
        //         'estado_login' => '1',
        //         'tipo_user' => '3',
        //         'password' => bcrypt('123456bu'),
        //         'foto' => 'admin.png',
        // ]);

        // DB::table('users')->insert([
        //         'dni' => '00000009',
        //         'nombres' => 'Jef. Cultural',
        //         'apellido_paterno' => 'Usuario',
        //         'apellido_materno' => 'Materno',
        //         'email' => 'cultural@hotmail.com',
        //         'estado_login' => '1',
        //         'tipo_user' => '4',
        //         'password' => bcrypt('123456bu'),
        //         'foto' => 'admin.png',
        // ]);

    }
}
