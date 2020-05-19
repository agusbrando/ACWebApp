<?php

use Illuminate\Database\Seeder;

class EvaluationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO evaluacion final (COMPLETO)

        DB::table('evaluations')->insert([
            'name' => '1Eval',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('evaluations')->insert([
            'name' => '2Eval',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('evaluations')->insert([
            'name' => '3Eval',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('evaluations')->insert([
            'name' => 'EvalFinal',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
