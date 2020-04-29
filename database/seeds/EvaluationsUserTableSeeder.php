<?php

use Illuminate\Database\Seeder;

class EvaluationsUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 5; $i <= 11; $i++) {
            DB::table('evaluations_users')->insert([
                'user_id' => $i,
                'evaluation_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        for ($i = 8; $i <= 16; $i++) {
            DB::table('evaluations_users')->insert([
                'user_id' => $i,
                'evaluation_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
