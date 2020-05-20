<?php

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO Create 8 units per subject
        /*DB::table('units')->insert([
            'program_id' => 1,
            'name'=>'Unidad 0. Introduccion de la asignatura',
            'expected_date_start' => '2019-09-12',
            'expected_date_end' => '2019-09-12',
            'date_start' => '2019-09-12',
            'date_end' => '2019-09-12',
            'expected_eval' => '1EVAL',
            'eval' => '1EVAL',
            'notes' => 'Observaciones de la unidad 0',
            'improvements' => 'Mejoras de la unidad 0 para el futuro',
            'created_at' => now(),
            'updated_at' => now()
        ]);*/
    }
}
