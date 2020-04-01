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
            'name' => 'borrar usuario',
        ]);
    }
}
