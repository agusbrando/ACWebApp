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
        //ASISTENCIA
        DB::table('misbehaviors')->insert([
            'session_timetable_id' => 1,
            'description' => 'Asistencia1',
            'type_id' => 14,
            'year_user_id' => 5,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('misbehaviors')->insert([
            'session_timetable_id' => 1,
            'description' => 'Asistencia2',
            'type_id' => 14,
            'year_user_id' => 4,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('misbehaviors')->insert([
            'session_timetable_id' => 1,
            'description' => 'Asistencia3',
            'type_id' => 14,
            'year_user_id' => 1,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('misbehaviors')->insert([
            'session_timetable_id' => 1,
            'description' => 'Asistencia4',
            'type_id' => 14,
            'year_user_id' => 5,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //COMPORTAMIENTO
        DB::table('misbehaviors')->insert([
            'session_timetable_id' => 1,
            'description' => 'Comportamiento1',
            'type_id' => 11,
            'year_user_id' => 1,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('misbehaviors')->insert([
            'session_timetable_id' => 1,
            'description' => 'Comportamiento2',
            'type_id' => 12,
            'year_user_id' => 1,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('misbehaviors')->insert([
            'session_timetable_id' => 1,
            'description' => 'Comportamiento3',
            'type_id' => 13,
            'year_user_id' => 1,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
