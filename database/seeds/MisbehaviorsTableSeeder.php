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
            'session_timetable_id' => 1,
            'description' => 'Retraso',
            'type_id' => 1,
            'user_id' => 1,
            'type' => 1,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('misbehaviors')->insert([
            'session_timetable_id' => 1,
            'description' => 'Falta1',
            'type_id' => 4,
            'user_id' => 1,
            'type' => 1,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('misbehaviors')->insert([
            'session_timetable_id' => 1,
            'description' => 'Falta2',
            'type_id' => 4,
            'user_id' => 1,
            'type' => 1,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('misbehaviors')->insert([
            'session_timetable_id' => 1,
            'description' => 'Falta3',
            'type_id' => 4,
            'user_id' => 2,
            'type' => 2,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
