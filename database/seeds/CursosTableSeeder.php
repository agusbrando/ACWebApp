<?php

use Illuminate\Database\Seeder;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->insert([
            'id' => 'DAM',
            'nombre' => 'Desarrollo de Aplicaciones Multiplataforma',
            'curso' => '1',
            'num_alumnos' => 24,
            'id_aula' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('cursos')->insert([
            'id' => 'SMR',
            'nombre' => 'Sistemas Microinformaticos y Redes',
            'curso' => '2',
            'num_alumnos' => 26,
            'id_aula' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
