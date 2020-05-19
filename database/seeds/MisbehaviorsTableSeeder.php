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
        //TODO FALTAS Igual que en dianantia Muy Grave, Grave, Leve (COMPLETO)
        DB::table('misbehaviors')->insert([
            'session_timetable_id' => 1,
            'description' => 'Muy Grave',
            'type_id' => 1,
            'year_user_id' => 3,
            'type' => 1,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('misbehaviors')->insert([
            'session_timetable_id' => 1,
            'description' => 'Grave',
            'type_id' => 4,
            'year_user_id' => 2,
            'type' => 1,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('misbehaviors')->insert([
            'session_timetable_id' => 1,
            'description' => 'Leve',
            'type_id' => 4,
            'year_user_id' => 2,
            'type' => 1,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
       
    }
}
