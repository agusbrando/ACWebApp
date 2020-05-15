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
            'type_id' => 1,
            'percentage' => 30,
            'min_grade_task' => 4,
            'average_grade_task' => 5,
            'min_average_grade_task' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('percentages')->insert([
            'year_union_id' => 1,
            'type_id' => 2,
            'percentage' => 30,
            'min_grade_task' => 4,
            'average_grade_task' => 5,
            'min_average_grade_task' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('percentages')->insert([
            'year_union_id' => 1,
            'type_id' => 3,
            'percentage' => 30,
            'min_grade_task' => 4,
            'average_grade_task' => 5,
            'min_average_grade_task' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('percentages')->insert([
            'year_union_id' => 1,
            'type_id' => 4,
            'percentage' => 100,
            'min_grade_task' => 4,
            'average_grade_task' => 5,
            'min_average_grade_task' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('percentages')->insert([
            'year_union_id' => 2,
            'type_id' => 1,
            'percentage' => 30,
            'min_grade_task' => 4,
            'average_grade_task' => 5,
            'min_average_grade_task' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('percentages')->insert([
            'year_union_id' => 2,
            'type_id' => 2,
            'percentage' => 30,
            'min_grade_task' => 4,
            'average_grade_task' => 5,
            'min_average_grade_task' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('percentages')->insert([
            'year_union_id' => 2,
            'type_id' => 3,
            'percentage' => 30,
            'min_grade_task' => 4,
            'average_grade_task' => 5,
            'min_average_grade_task' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('percentages')->insert([
            'year_union_id' => 2,
            'type_id' => 4,
            'percentage' => 100,
            'min_grade_task' => 4,
            'average_grade_task' => 5,
            'min_average_grade_task' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('percentages')->insert([
            'year_union_id' => 3,
            'type_id' => 1,
            'percentage' => 30,
            'min_grade_task' => 4,
            'average_grade_task' => 5,
            'min_average_grade_task' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('percentages')->insert([
            'year_union_id' => 3,
            'type_id' => 2,
            'percentage' => 30,
            'min_grade_task' => 4,
            'average_grade_task' => 5,
            'min_average_grade_task' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('percentages')->insert([
            'year_union_id' => 3,
            'type_id' => 3,
            'percentage' => 30,
            'min_grade_task' => 4,
            'average_grade_task' => 5,
            'min_average_grade_task' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('percentages')->insert([
            'year_union_id' => 3,
            'type_id' => 4,
            'percentage' => 100,
            'min_grade_task' => 4,
            'average_grade_task' => 5,
            'min_average_grade_task' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        
    }
}
