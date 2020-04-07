<?php

use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
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
            'name' => 'Primero',
            'num_students' => 30
        ]);
        DB::table('courses')->insert([
            'level' => 2,
            'name' => 'Segundo',
            'num_students' => 19
        ]);
    }
}
