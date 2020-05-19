<?php

use Illuminate\Database\Seeder;

class SessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //TODO SIMPLIFY with foreach
        //TODO Add current class timetable

        // Tutorias Lunes

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 1,
            'time_start' => '08:30',
            'time_end' => '09:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 1,
            'time_start' => '09:00',
            'time_end' => '09:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 1,
            'time_start' => '09:30',
            'time_end' => '10:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 1,
            'time_start' => '10:00',
            'time_end' => '10:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 1,
            'time_start' => '10:30',
            'time_end' => '11:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 1,
            'time_start' => '11:00',
            'time_end' => '11:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 1,
            'time_start' => '11:30',
            'time_end' => '12:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 1,
            'time_start' => '12:00',
            'time_end' => '12:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 1,
            'time_start' => '12:30',
            'time_end' => '13:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 1,
            'time_start' => '13:00',
            'time_end' => '13:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 1,
            'time_start' => '13:30',
            'time_end' => '14:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 1,
            'time_start' => '14:00',
            'time_end' => '14:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tutorias Martes

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 2,
            'time_start' => '08:30',
            'time_end' => '09:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 2,
            'time_start' => '09:00',
            'time_end' => '09:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 2,
            'time_start' => '09:30',
            'time_end' => '10:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 2,
            'time_start' => '10:00',
            'time_end' => '10:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 2,
            'time_start' => '10:30',
            'time_end' => '11:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 2,
            'time_start' => '11:00',
            'time_end' => '11:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 2,
            'time_start' => '11:30',
            'time_end' => '12:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 2,
            'time_start' => '12:00',
            'time_end' => '12:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 2,
            'time_start' => '12:30',
            'time_end' => '13:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 2,
            'time_start' => '13:00',
            'time_end' => '13:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 2,
            'time_start' => '13:30',
            'time_end' => '14:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 2,
            'time_start' => '14:00',
            'time_end' => '14:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tutorias Miercoles

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 3,
            'time_start' => '08:30',
            'time_end' => '09:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 3,
            'time_start' => '09:00',
            'time_end' => '09:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 3,
            'time_start' => '09:30',
            'time_end' => '10:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 3,
            'time_start' => '10:00',
            'time_end' => '10:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 3,
            'time_start' => '10:30',
            'time_end' => '11:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 3,
            'time_start' => '11:00',
            'time_end' => '11:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 3,
            'time_start' => '11:30',
            'time_end' => '12:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 3,
            'time_start' => '12:00',
            'time_end' => '12:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 3,
            'time_start' => '12:30',
            'time_end' => '13:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 3,
            'time_start' => '13:00',
            'time_end' => '13:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 3,
            'time_start' => '13:30',
            'time_end' => '14:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 3,
            'time_start' => '14:00',
            'time_end' => '14:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tutorias Jueves

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 4,
            'time_start' => '08:30',
            'time_end' => '09:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 4,
            'time_start' => '09:00',
            'time_end' => '09:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 4,
            'time_start' => '09:30',
            'time_end' => '10:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 4,
            'time_start' => '10:00',
            'time_end' => '10:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 4,
            'time_start' => '10:30',
            'time_end' => '11:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 4,
            'time_start' => '11:00',
            'time_end' => '11:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 4,
            'time_start' => '11:30',
            'time_end' => '12:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 4,
            'time_start' => '12:00',
            'time_end' => '12:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 4,
            'time_start' => '12:30',
            'time_end' => '13:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 4,
            'time_start' => '13:00',
            'time_end' => '13:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 4,
            'time_start' => '13:30',
            'time_end' => '14:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tutorias viernes

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 5,
            'time_start' => '08:30',
            'time_end' => '09:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 5,
            'time_start' => '09:00',
            'time_end' => '09:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 5,
            'time_start' => '09:30',
            'time_end' => '10:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 5,
            'time_start' => '10:00',
            'time_end' => '10:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 5,
            'time_start' => '10:30',
            'time_end' => '11:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 5,
            'time_start' => '11:00',
            'time_end' => '11:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 5,
            'time_start' => '11:30',
            'time_end' => '12:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 5,
            'time_start' => '12:00',
            'time_end' => '12:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 5,
            'time_start' => '12:30',
            'time_end' => '13:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 5,
            'time_start' => '13:00',
            'time_end' => '13:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 5,
            'time_start' => '13:30',
            'time_end' => '14:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 5,
            'time_start' => '14:00',
            'time_end' => '14:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        //RESERVA DE AULAS HORA EN HORA

        //Lunes
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 1,
            'time_start' => '08:30',
            'time_end' => '09:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 1,
            'time_start' => '09:30',
            'time_end' => '10:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 1,
            'time_start' => '10:30',
            'time_end' => '11:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 1,
            'time_start' => '11:30',
            'time_end' => '12:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 1,
            'time_start' => '12:30',
            'time_end' => '13:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 1,
            'time_start' => '13:30',
            'time_end' => '14:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //Martes
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 2,
            'time_start' => '08:30',
            'time_end' => '09:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 2,
            'time_start' => '09:30',
            'time_end' => '10:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 2,
            'time_start' => '10:30',
            'time_end' => '11:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 2,
            'time_start' => '11:30',
            'time_end' => '12:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 2,
            'time_start' => '12:30',
            'time_end' => '13:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 2,
            'time_start' => '13:30',
            'time_end' => '14:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //Miercoles

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 3,
            'time_start' => '08:30',
            'time_end' => '09:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 3,
            'time_start' => '09:30',
            'time_end' => '10:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 3,
            'time_start' => '10:30',
            'time_end' => '11:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 3,
            'time_start' => '11:30',
            'time_end' => '12:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 3,
            'time_start' => '12:30',
            'time_end' => '13:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 3,
            'time_start' => '13:30',
            'time_end' => '14:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        //Jueves

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 4,
            'time_start' => '08:30',
            'time_end' => '09:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 4,
            'time_start' => '09:30',
            'time_end' => '10:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 4,
            'time_start' => '10:30',
            'time_end' => '11:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 4,
            'time_start' => '11:30',
            'time_end' => '12:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 4,
            'time_start' => '12:30',
            'time_end' => '13:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 4,
            'time_start' => '13:30',
            'time_end' => '14:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //Viernes

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 5,
            'time_start' => '08:30',
            'time_end' => '09:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 5,
            'time_start' => '09:30',
            'time_end' => '10:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 5,
            'time_start' => '10:30',
            'time_end' => '11:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 5,
            'time_start' => '11:30',
            'time_end' => '12:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 5,
            'time_start' => '12:30',
            'time_end' => '13:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 5,
            'time_start' => '13:30',
            'time_end' => '14:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //Lunes horario dam2020
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 1,
            'time_start' => '8:30',
            'time_end' => '9:25',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 1,
            'time_start' => '9:25',
            'time_end' => '10:20',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 1,
            'time_start' => '10:40',
            'time_end' => '11:35',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 1,
            'time_start' => '11:35',
            'time_end' => '12:25',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 1,
            'time_start' => '12:40',
            'time_end' => '13:35',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 1,
            'time_start' => '13:35',
            'time_end' => '14:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //Martes horario dam2020
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 2,
            'time_start' => '8:30',
            'time_end' => '9:25',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 2,
            'time_start' => '9:25',
            'time_end' => '10:20',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 2,
            'time_start' => '10:40',
            'time_end' => '11:35',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 2,
            'time_start' => '11:35',
            'time_end' => '12:25',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 2,
            'time_start' => '12:40',
            'time_end' => '13:35',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 2,
            'time_start' => '13:35',
            'time_end' => '14:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //Miercoles horario dam2020
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 3,
            'time_start' => '8:30',
            'time_end' => '9:25',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 3,
            'time_start' => '9:25',
            'time_end' => '10:20',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 3,
            'time_start' => '10:40',
            'time_end' => '11:35',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 3,
            'time_start' => '11:35',
            'time_end' => '12:25',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 3,
            'time_start' => '12:40',
            'time_end' => '13:35',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 3,
            'time_start' => '13:35',
            'time_end' => '14:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //Jueves horario dam2020
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 4,
            'time_start' => '8:30',
            'time_end' => '9:25',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 4,
            'time_start' => '9:25',
            'time_end' => '10:20',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 4,
            'time_start' => '10:40',
            'time_end' => '11:35',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 4,
            'time_start' => '11:35',
            'time_end' => '12:25',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 4,
            'time_start' => '12:40',
            'time_end' => '13:35',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 4,
            'time_start' => '13:35',
            'time_end' => '14:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //Viernes horario dam2020
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 5,
            'time_start' => '8:30',
            'time_end' => '9:25',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 5,
            'time_start' => '9:25',
            'time_end' => '10:20',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 5,
            'time_start' => '10:40',
            'time_end' => '11:35',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 5,
            'time_start' => '11:35',
            'time_end' => '12:25',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 5,
            'time_start' => '12:40',
            'time_end' => '13:35',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 5,
            'time_start' => '13:35',
            'time_end' => '14:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);






        //Lunes tarde horario dam2020
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 1,
            'time_start' => '15:00',
            'time_end' => '15:55',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 1,
            'time_start' => '15:55',
            'time_end' => '16:50',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 1,
            'time_start' => '17:10',
            'time_end' => '18:05',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 1,
            'time_start' => '18:05',
            'time_end' => '19:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 1,
            'time_start' => '19:15',
            'time_end' => '20:05',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 1,
            'time_start' => '20:05',
            'time_end' => '21:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //Martes horario dam2020
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 2,
            'time_start' => '15:00',
            'time_end' => '15:55',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 2,
            'time_start' => '15:55',
            'time_end' => '16:50',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 2,
            'time_start' => '17:10',
            'time_end' => '18:05',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 2,
            'time_start' => '18:05',
            'time_end' => '19:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 2,
            'time_start' => '19:15',
            'time_end' => '20:05',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 2,
            'time_start' => '20:05',
            'time_end' => '21:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //Miercoles horario dam2020
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 3,
            'time_start' => '15:00',
            'time_end' => '15:55',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 3,
            'time_start' => '15:55',
            'time_end' => '16:50',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 3,
            'time_start' => '17:10',
            'time_end' => '18:05',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 3,
            'time_start' => '18:05',
            'time_end' => '19:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 3,
            'time_start' => '19:15',
            'time_end' => '20:05',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 3,
            'time_start' => '20:05',
            'time_end' => '21:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //Jueves horario dam2020
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 4,
            'time_start' => '15:00',
            'time_end' => '15:55',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 4,
            'time_start' => '15:55',
            'time_end' => '16:50',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 4,
            'time_start' => '17:10',
            'time_end' => '18:05',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 4,
            'time_start' => '18:05',
            'time_end' => '19:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 4,
            'time_start' => '19:15',
            'time_end' => '20:05',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 4,
            'time_start' => '20:05',
            'time_end' => '21:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //Viernes horario dam2020
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 5,
            'time_start' => '15:00',
            'time_end' => '15:55',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 5,
            'time_start' => '15:55',
            'time_end' => '16:50',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 5,
            'time_start' => '17:10',
            'time_end' => '18:05',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 5,
            'time_start' => '18:05',
            'time_end' => '19:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 5,
            'time_start' => '19:15',
            'time_end' => '20:05',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 3,
            'day' => 5,
            'time_start' => '20:05',
            'time_end' => '21:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
