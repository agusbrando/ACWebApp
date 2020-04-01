<?php

use Illuminate\Database\Seeder;

class AulasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aulas')->insert([
            'nombre' => 'Taller',
            'num_aula' => 1,
            'num_alumnos' => 25,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('aulas')->insert([
            'nombre' => 'Aula_2',
            'num_aula' => 2,
            'num_alumnos' => 22,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
