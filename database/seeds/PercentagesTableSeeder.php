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
            'year_union_id' => 1,
            'type_id' => 9,
            'percentage' => 30,
            'min_grade' => 4,
            'average_grade' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('percentages')->insert([
            'year_union_id' => 1,
            'type_id' => 10,
            'percentage' => 30,
            'min_grade' => 4,
            'average_grade' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('percentages')->insert([
            'year_union_id' => 2,
            'type_id' => 9,
            'percentage' => 30,
            'min_grade' => 4,
            'average_grade' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('percentages')->insert([
            'year_union_id' => 2,
            'type_id' => 10,
            'percentage' => 30,
            'min_grade' => 4,
            'average_grade' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
