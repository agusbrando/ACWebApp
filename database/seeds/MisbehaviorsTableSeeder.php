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
        //TODO FALTAS Igual que en dianantia Muy Grave, Grave, Leve
        DB::table('misbehaviors')->insert([
            'session_timetable_id' => 1,
            'description' => 'Retraso',
            'type_id' => 1,
            'year_user_id' => 3,
            'type' => 1,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('misbehaviors')->insert([
            'session_timetable_id' => 1,
            'description' => 'Falta1',
            'type_id' => 4,
            'year_user_id' => 2,
            'type' => 1,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('misbehaviors')->insert([
            'session_timetable_id' => 1,
            'description' => 'Falta2',
            'type_id' => 4,
            'year_user_id' => 2,
            'type' => 1,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('misbehaviors')->insert([
            'session_timetable_id' => 1,
            'description' => 'Falta3',
            'type_id' => 4,
            'year_user_id' => 1,
            'type' => 2,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
