<?php

use Illuminate\Database\Seeder;

class Permissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'borrar usuario',
        ]);
        DB::table('permissions')->insert([
            'name' => 'insertar usuario',
        ]);
    }
}
