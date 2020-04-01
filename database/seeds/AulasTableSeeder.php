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
        DB::table('classrooms')->insert([
            'name' => 'Taller',
            'number' => 1,
            'num_alumnos' => 25,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('classrooms')->insert([
            'name' => 'Aula_2',
            'number' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
