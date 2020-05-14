<?php

use Illuminate\Database\Seeder;

class SessionTimetableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('session_timetables')->insert([
            'session_id' => 1,
            'timetable_id' => 1,
            'year_union_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 1,
            'timetable_id' => 1,
            'year_union_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 1,
            'timetable_id' => 1,
            'year_union_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 1,
            'timetable_id' => 1,
            'year_union_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 1,
            'timetable_id' => 1,
            'year_union_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 1,
            'timetable_id' => 1,
            'year_union_id' => 6,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
