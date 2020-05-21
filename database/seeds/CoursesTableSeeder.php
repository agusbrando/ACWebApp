<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO ASIR y FPBASICA (COMPLETO)

        //DAM
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
            'name' => 'Administracion de Sistemas Informaticos y en Red',
            'abbreviation' =>'ASIR',
            'num_students' => 23,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('courses')->insert([
            'level' => 2,
            'name' => 'Administracion de Sistemas Informaticos y en Red',
            'abbreviation' =>'ASIR',
            'num_students' => 23,
            'created_at' => now(),
            'updated_at' => now()
        ]);
   /*
        DB::table('courses')->insert([
            'level' => 1,
            'name' => 'FP Básica en Informática y Comunicaciones',
            'abbreviation' =>'FPBASICA',
            'num_students' => 30,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('courses')->insert([
            'level' => 2,
            'name' => 'FP Básica en Informática y Comunicaciones',
            'abbreviation' =>'FPBASICA',
            'num_students' => 30,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        

        //ASIR
        DB::table('courses')->insert([
            'level' => 1,
            'name' => 'Administracion de Sistemas Informaticos y en Red',
            'abbreviation' =>'ASIR',
            'num_students' => 23,
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

       */ 

        //FPBASICA
        // DB::table('courses')->insert([
        //     'level' => 1,
        //     'name' => 'FP Básica en Informática y Comunicaciones',
        //     'abbreviation' =>'FPBASICA',
        //     'num_students' => 30,
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('courses')->insert([
        //     'level' => 2,
        //     'name' => 'FP Básica en Informática y Comunicaciones',
        //     'abbreviation' =>'FPBASICA',
        //     'num_students' => 30,
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        //SMR
        // DB::table('courses')->insert([
        //     'level' => 1,
        //     'name' => 'Sistemas Microinformaticos y Redes',
        //     'abbreviation' =>'SMR',
        //     'num_students' => 25,
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('courses')->insert([
        //     'level' => 2,
        //     'name' => 'Sistemas Microinformaticos y Redes',
        //     'abbreviation' =>'SMR',
        //     'num_students' => 19,
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        

       


    }
}
