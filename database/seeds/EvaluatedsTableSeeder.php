<?php

use Illuminate\Database\Seeder;

class EvaluatedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO Eliminar para produccion cuando se termine de implementar los test

        DB::table('evaluateds')->insert([
            'evaluable_id' => '1',
            'program_id' => '1',
            'description' => 'Nada que destacar',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('evaluateds')->insert([
            'evaluable_id' => '2',
            'program_id' => '1',
            'description' => 'Nada que destacar',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('evaluateds')->insert([
            'evaluable_id' => '2',
            'program_id' => '2',
            'description' => 'Nada que destacar',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
