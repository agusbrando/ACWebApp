<?php

use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nombre' => 'Admin',
            'email' => 'admin@campusaula.com',
            'apellidos' => 'Admin',
            'contrasenya' => bcrypt('adminPass'),
            'created_at' => now(),
            'updated_at' => now(),
            'id_rol' => 1
        ]);
        DB::table('usuarios')->insert([
            'nombre' => 'User',
            'email' => 'user@campusaula.com',
            'apellidos' => 'User',
            'contrasenya' => bcrypt('userPass'),
            'created_at' => now(),
            'updated_at' => now(),
            'id_rol' => 1
        ]);
        DB::table('usuarios')->insert([
            'nombre' => 'Guillermo',
            'apellidos' => 'Garrido Portes',
            'email' => 'guillermo.garrido@campusaula.com',
            'contrasenya' => bcrypt('contrasenya'),
            'created_at' => now(),
            'updated_at' => now(),
            'id_rol' => 1
        ]);
        DB::table('usuarios')->insert([
            'nombre' => 'Marcelo',
            'apellidos' => 'Malonda Pellicer',
            'email' => 'marcelo.malonda@campusaula.com',
            'contrasenya' => bcrypt('contrasenya'),
            'created_at' => now(),
            'updated_at' => now(),
            'id_rol' => 1
        ]);
    }
}
