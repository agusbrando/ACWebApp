<?php

use Illuminate\Database\Seeder;

class MisbehaviorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('misbehaviors')->insert([
            'id' => 1,
            'session_timetable_id' =>1,
            'description' => 'Retraso',
            'session_timetable_id'=>1,
            'type_id' => 1,
            'year_user_id' => 1,
            'session_timetable_id' => 1,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
            'session_timetable_id'=>1
        ]);
    }
}
