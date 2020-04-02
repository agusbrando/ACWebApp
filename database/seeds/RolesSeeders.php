<?php

use Illuminate\Database\Seeder;

class RolesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'Alumno',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
