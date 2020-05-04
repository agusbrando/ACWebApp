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
            'level' => 1,
            'name' => 'Desarrollo de Aplicaciones Multiplataforma',
            'num_students' => 30,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('courses')->insert([
            'level' => 2,
            'name' => 'Desarrollo de Aplicaciones Multiplataforma',
            'num_students' => 24,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('courses')->insert([
            'level' => 1,
            'name' => 'Desarrollo de Aplicaciones Web',
            'num_students' => 22,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('courses')->insert([
            'level' => 2,
            'name' => 'Desarrollo de Aplicaciones Web',
            'num_students' => 20,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('courses')->insert([
            'level' => 1,
            'name' => 'Sistemas Microinformaticos y Redes',
            'num_students' => 25,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('courses')->insert([
            'level' => 2,
            'name' => 'Desarrollo de Aplicaciones Multiplataforma',
            'num_students' => 19,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
