<?php

use Illuminate\Database\Seeder;

class TimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('timetables')->insert([
            'name' => '2DAM2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('timetables')->insert([
            'name' => '2DAM2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('timetables')->insert([
            'name' => '2DAM2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('timetables')->insert([
            'name' => '2DAM2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('timetables')->insert([
            'name' => '2DAM2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
