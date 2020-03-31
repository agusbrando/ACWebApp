<?php

use Illuminate\Database\Seeder;

class AspectosEvaluadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aspectos_evaluados')->insert([
            'id_aspecto' => '1',
            'id_programacion' => '1',
            'descripcion' => 'Nada que destacar',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('aspectos_evaluados')->insert([
            'id_aspecto' => '2',
            'id_programacion' => '1',
            'descripcion' => 'Nada que destacar',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
