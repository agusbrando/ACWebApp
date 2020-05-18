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
        //TODO ASIR y FPBASICA

        DB::table('courses')->insert([
            'level' => 1,
            'name' => 'Desarrollo de Aplicaciones Multiplataforma',
            'abbreviation' =>'DAM',
            'num_students' => 30,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('courses')->insert([
            'level' => 2,
            'name' => 'Desarrollo de Aplicaciones Multiplataforma',
            'abbreviation' =>'DAM',
            'num_students' => 24,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('courses')->insert([
            'level' => 1,
            'name' => 'Desarrollo de Aplicaciones Web',
            'abbreviation' =>'DAW',
            'num_students' => 22,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('courses')->insert([
            'level' => 2,
            'name' => 'Desarrollo de Aplicaciones Web',
            'abbreviation' =>'DAW',
            'num_students' => 20,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('courses')->insert([
            'level' => 1,
            'name' => 'Sistemas Microinformaticos y Redes',
            'abbreviation' =>'SMR',
            'num_students' => 25,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('courses')->insert([
            'level' => 2,
            'name' => 'Sistemas Microinformaticos y Redes',
            'abbreviation' =>'SMR',
            'num_students' => 19,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
