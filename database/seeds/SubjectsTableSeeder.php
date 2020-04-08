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
	        'course_id' => 1,
            'name' => 'Acceso a Datos',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
	        'course_id' => 2,
            'name' => 'Bases de Datos',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'course_id' => 1,
            'name' => 'Programacion multimedia y dispositivos moviles',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
