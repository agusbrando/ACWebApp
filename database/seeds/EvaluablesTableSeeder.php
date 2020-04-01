<?php

use Illuminate\Database\Seeder;

class EvaluablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('evaluables')->insert([
            'name' => 'La metodología didáctica aplicada',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('evaluables')->insert([
            'name' => 'Los criterios de evaluación',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
