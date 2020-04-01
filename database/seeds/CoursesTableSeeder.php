<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'id' => 1,
            'nombre' => 'Desarrollo de Aplicaciones Multiplataforma',
            'curso' => '1',
            'num_alumnos' => 24,
            'classroom_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('courses')->insert([
            'id' => 2,
            'nombre' => 'Sistemas Microinformaticos y Redes',
            'curso' => '2',
            'num_alumnos' => 26,
            'classroom_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
