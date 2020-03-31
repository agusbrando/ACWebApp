<?php

use Illuminate\Database\Seeder;

class AspectosEvaluablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aspectos_evaluables')->insert([
            'nombre' => 'La metodología didáctica aplicada',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('aspectos_evaluables')->insert([
            'nombre' => 'Los criterios de evaluación',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
