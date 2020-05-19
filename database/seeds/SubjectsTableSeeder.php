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
        //TODO add all subjects for every course. Website
        DB::table('subjects')->insert([
            'course_id'=>1,
            'name' => 'Acceso a Datos',
            'abbreviation' =>'AD',
            'max'=>16,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
	        'course_id' => 2,
            'name' => 'Diseño de Interfaces',
            'abbreviation'=>'DI',
            'max'=>16,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
	        'course_id' => 2,
            'name' => 'Empresa e Iniciativa Emprendedora',
            'abbreviation'=>'EIE',
            'max'=>9,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
	        'course_id' => 2,
            'name' => 'Programación de Servicios y Procesos',
            'abbreviation'=>'PSP',
            'max'=>9,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'course_id' => 1,
            'name' => 'Programacion multimedia y dispositivos moviles',
            'abbreviation'=>'PMM',
            'max'=>18,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'course_id' => 1,
            'name' => 'Sistema de Gestión Empresarial',
            'abbreviation'=>'SGE',
            'max'=>12,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'course_id' => 1,
            'name' => 'Ingles',
            'abbreviation'=>'Inglés',
            'max'=>6,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'course_id' => 1,
            'name' => 'Comportamiento',
            'abbreviation'=>'Comportamiento',
            'max'=>99,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
