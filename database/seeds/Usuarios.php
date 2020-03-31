<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
class Usuarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nombre' => 'Juan',
            'apellidos' => 'Garcia',
            'email' => 'JuanGarcia@gmail.com',
            'password' => 'Juanito',
            'id_rol' => '123',
            ]);
    }
}
