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
        DB::table('evaluations')->insert([
            'subject_id' => 1,
            'name' => '1Eval',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
