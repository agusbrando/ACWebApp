<?php

use Illuminate\Database\Seeder;

class ClassroomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO 9 Aulas + Aula taller
        

        DB::table('classrooms')->insert([
            'name'=> 'Aula 1',
            'number'=> 1,
        ]);
        DB::table('classrooms')->insert([
            'name'=> 'Aula 2',
            'number'=> 2,
        ]);
        DB::table('classrooms')->insert([
            'name'=> 'Aula 3',
            'number'=> 3,
        ]);
        DB::table('classrooms')->insert([
            'name'=> 'Aula 4',
            'number'=> 4,
        ]);
        DB::table('classrooms')->insert([
            'name'=> 'Aula 5',
            'number'=> 5,
        ]);
        DB::table('classrooms')->insert([
            'name'=> 'Aula 6',
            'number'=> 6,
        ]);
        DB::table('classrooms')->insert([
            'name'=> 'Aula 7',
            'number'=> 7,
        ]);
        DB::table('classrooms')->insert([
            'name'=> 'Aula 8',
            'number'=> 8,
        ]);
        DB::table('classrooms')->insert([
            'name'=> 'Aula 9',
            'number'=> 9,
        ]);
        DB::table('classrooms')->insert([
            'name'=> 'Taller',
            'number'=> 10,
        ]);
    }
}
