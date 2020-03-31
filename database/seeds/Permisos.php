<?php

use Illuminate\Database\Seeder;

class Permisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permisos')->insert([
            'nombre_permiso' => 'Editar usuario',
            'id_rol'=>'50',
        ]);
    }
}
