<?php

use Illuminate\Database\Seeder;

class PercentagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('percentages')->insert([
            'evaluation_id' => 1,
            'type_id' => 1,
            'percentege' => 30,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
