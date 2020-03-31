<?php

use Illuminate\Database\Seeder;

class UnidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidades')->insert([
            'id_programacion' => 1,
            'f_inicio_programada' => '2019-09-12',	
            'f_fin_programada' => '2019-09-12',	
            'f_inicio_impartida' => '2019-09-12',	
            'f_fin_impartida' => '2019-09-12',	
            'eval_programada' => '1EVAL',
            'eval_impartida' => '1EVAL',
            'observaciones' => 'Observaciones de la unidad 0',
            'mejoras' => 'Mejoras de la unidad 0 para el futuro',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
