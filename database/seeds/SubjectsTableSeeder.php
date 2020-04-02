<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'name' => 'Acceso a Datos',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Bases de Datos',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => '​​​​​​​Programación multimedia y dispositivos móviles​',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
