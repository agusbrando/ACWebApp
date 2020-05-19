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
        //TODO FALTAS Igual que en dianantia Muy Grave, Grave, Leve en Types, no aqui
        DB::table('misbehaviors')->insert([
            'session_timetable_id' => 1,
            'description' => 'Asistencia1',
            'type_id' => 1,
            'year_user_id' => 1,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('misbehaviors')->insert([
            'session_timetable_id' => 1,
            'description' => 'Asistencia2',
            'type_id' => 4,
            'year_user_id' => 1,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('misbehaviors')->insert([
            'session_timetable_id' => 1,
            'description' => 'Asistencia3',
            'type_id' => 4,
            'year_user_id' => 1,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
       
    }
}
