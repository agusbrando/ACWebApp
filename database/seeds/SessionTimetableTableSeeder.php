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
        //TODO ask Carlos
        //Lunes
        DB::table('session_timetables')->insert([
            'session_id' => 90,
            'timetable_id' => 1,
            'year_union_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 91,
            'timetable_id' => 1,
            'year_union_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 92,
            'timetable_id' => 1,
            'year_union_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 93,
            'timetable_id' => 1,
            'year_union_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 94,
            'timetable_id' => 1,
            'year_union_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 95,
            'timetable_id' => 1,
            'year_union_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        //Martes
        DB::table('session_timetables')->insert([
            'session_id' => 96,
            'timetable_id' => 1,
            'year_union_id' => 7,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 97,
            'timetable_id' => 1,
            'year_union_id' => 7,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 98,
            'timetable_id' => 1,
            'year_union_id' => 8,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 99,
            'timetable_id' => 1,
            'year_union_id' => 8,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 100,
            'timetable_id' => 1,
            'year_union_id' => 9,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 101,
            'timetable_id' => 1,
            'year_union_id' => 9,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //Miercoles
        DB::table('session_timetables')->insert([
            'session_id' => 102,
            'timetable_id' => 1,
            'year_union_id' => 6,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 103,
            'timetable_id' => 1,
            'year_union_id' => 6,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 104,
            'timetable_id' => 1,
            'year_union_id' => 7,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 105,
            'timetable_id' => 1,
            'year_union_id' => 7,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 106,
            'timetable_id' => 1,
            'year_union_id' => 7,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 107,
            'timetable_id' => 1,
            'year_union_id' => 7,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //Jueves
        DB::table('session_timetables')->insert([
            'session_id' => 108,
            'timetable_id' => 1,
            'year_union_id' =>10 ,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 109,
            'timetable_id' => 1,
            'year_union_id' => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 110,
            'timetable_id' => 1,
            'year_union_id' => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 111,
            'timetable_id' => 1,
            'year_union_id' => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 112,
            'timetable_id' => 1,
            'year_union_id' => 8,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 113,
            'timetable_id' => 1,
            'year_union_id' => 8,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //Viernes
        DB::table('session_timetables')->insert([
            'session_id' => 114,
            'timetable_id' => 1,
            'year_union_id' =>9 ,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 115,
            'timetable_id' => 1,
            'year_union_id' => 9,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 116,
            'timetable_id' => 1,
            'year_union_id' => 9,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 117,
            'timetable_id' => 1,
            'year_union_id' => 9,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 118,
            'timetable_id' => 1,
            'year_union_id' => 8,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('session_timetables')->insert([
            'session_id' => 119,
            'timetable_id' => 1,
            'year_union_id' => 8,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
