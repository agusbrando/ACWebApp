<?php

use Illuminate\Database\Seeder;

class SessionTimetableSeeder extends Seeder
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
            'subject_id' => 1
        ]);

        
    }
}
