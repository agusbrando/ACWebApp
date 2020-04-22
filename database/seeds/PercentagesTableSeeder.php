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
        DB::table('evaluation_type')->insert([
            'evaluation_id' => 1,
            'type_id' => 1,
            'percentage' => 30,
            'nota_min' => 4,
            'nota_media' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('evaluation_type')->insert([
            'evaluation_id' => 1,
            'type_id' => 2,
            'percentage' => 30,
            'nota_min' => 4,
            'nota_media' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
