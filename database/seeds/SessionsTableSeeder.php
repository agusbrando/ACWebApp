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

        // Tutorias Lunes

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 1,
            'time_start' => date('Y-m-d 08:30:00'),
            'time_end' => date('Y-m-d 09:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 1,
            'time_start' => date('Y-m-d 09:00:00'),
            'time_end' => date('Y-m-d 09:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 1,
            'time_start' => date('Y-m-d 09:30:00'),
            'time_end' => date('Y-m-d 10:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 1,
            'time_start' => date('Y-m-d 10:00:00'),
            'time_end' => date('Y-m-d 10:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 1,
            'time_start' => date('Y-m-d 10:30:00'),
            'time_end' => date('Y-m-d 11:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 1,
            'time_start' => date('Y-m-d 11:00:00'),
            'time_end' => date('Y-m-d 11:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 1,
            'time_start' => date('Y-m-d 11:30:00'),
            'time_end' => date('Y-m-d 12:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 1,
            'time_start' => date('Y-m-d 12:00:00'),
            'time_end' => date('Y-m-d 12:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 1,
            'time_start' => date('Y-m-d 12:30:00'),
            'time_end' => date('Y-m-d 13:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 1,
            'time_start' => date('Y-m-d 13:00:00'),
            'time_end' => date('Y-m-d 13:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 1,
            'time_start' => date('Y-m-d 13:30:00'),
            'time_end' => date('Y-m-d 14:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 1,
            'time_start' => date('Y-m-d 14:00:00'),
            'time_end' => date('Y-m-d 14:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tutorias Martes

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 2,
            'time_start' => date('Y-m-d 08:30:00'),
            'time_end' => date('Y-m-d 09:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 2,
            'time_start' => date('Y-m-d 09:00:00'),
            'time_end' => date('Y-m-d 09:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 2,
            'time_start' => date('Y-m-d 09:30:00'),
            'time_end' => date('Y-m-d 10:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 2,
            'time_start' => date('Y-m-d 10:00:00'),
            'time_end' => date('Y-m-d 10:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 2,
            'time_start' => date('Y-m-d 10:30:00'),
            'time_end' => date('Y-m-d 11:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 2,
            'time_start' => date('Y-m-d 11:00:00'),
            'time_end' => date('Y-m-d 11:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 2,
            'time_start' => date('Y-m-d 11:30:00'),
            'time_end' => date('Y-m-d 12:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 2,
            'time_start' => date('Y-m-d 12:00:00'),
            'time_end' => date('Y-m-d 12:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 2,
            'time_start' => date('Y-m-d 12:30:00'),
            'time_end' => date('Y-m-d 13:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 2,
            'time_start' => date('Y-m-d 13:00:00'),
            'time_end' => date('Y-m-d 13:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 2,
            'time_start' => date('Y-m-d 13:30:00'),
            'time_end' => date('Y-m-d 14:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 2,
            'time_start' => date('Y-m-d 14:00:00'),
            'time_end' => date('Y-m-d 14:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tutorias Miercoles 

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 3,
            'time_start' => date('Y-m-d 08:30:00'),
            'time_end' => date('Y-m-d 09:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 3,
            'time_start' => date('Y-m-d 09:00:00'),
            'time_end' => date('Y-m-d 09:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 3,
            'time_start' => date('Y-m-d 09:30:00'),
            'time_end' => date('Y-m-d 10:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 3,
            'time_start' => date('Y-m-d 10:00:00'),
            'time_end' => date('Y-m-d 10:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 3,
            'time_start' => date('Y-m-d 10:30:00'),
            'time_end' => date('Y-m-d 11:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 3,
            'time_start' => date('Y-m-d 11:00:00'),
            'time_end' => date('Y-m-d 11:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 3,
            'time_start' => date('Y-m-d 11:30:00'),
            'time_end' => date('Y-m-d 12:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 3,
            'time_start' => date('Y-m-d 12:00:00'),
            'time_end' => date('Y-m-d 12:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 3,
            'time_start' => date('Y-m-d 12:30:00'),
            'time_end' => date('Y-m-d 13:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 3,
            'time_start' => date('Y-m-d 13:00:00'),
            'time_end' => date('Y-m-d 13:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 3,
            'time_start' => date('Y-m-d 13:30:00'),
            'time_end' => date('Y-m-d 14:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 3,
            'time_start' => date('Y-m-d 14:00:00'),
            'time_end' => date('Y-m-d 14:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tutorias Jueves

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 4,
            'time_start' => date('Y-m-d 08:30:00'),
            'time_end' => date('Y-m-d 09:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 4,
            'time_start' => date('Y-m-d 09:00:00'),
            'time_end' => date('Y-m-d 09:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 4,
            'time_start' => date('Y-m-d 09:30:00'),
            'time_end' => date('Y-m-d 10:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 4,
            'time_start' => date('Y-m-d 10:00:00'),
            'time_end' => date('Y-m-d 10:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 4,
            'time_start' => date('Y-m-d 10:30:00'),
            'time_end' => date('Y-m-d 11:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 4,
            'time_start' => date('Y-m-d 11:00:00'),
            'time_end' => date('Y-m-d 11:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 4,
            'time_start' => date('Y-m-d 11:30:00'),
            'time_end' => date('Y-m-d 12:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 4,
            'time_start' => date('Y-m-d 12:00:00'),
            'time_end' => date('Y-m-d 12:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 4,
            'time_start' => date('Y-m-d 12:30:00'),
            'time_end' => date('Y-m-d 13:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 4,
            'time_start' => date('Y-m-d 13:00:00'),
            'time_end' => date('Y-m-d 13:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 4,
            'time_start' => date('Y-m-d 13:30:00'),
            'time_end' => date('Y-m-d 14:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tutorias viernes

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 5,
            'time_start' => date('Y-m-d 08:30:00'),
            'time_end' => date('Y-m-d 09:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 5,
            'time_start' => date('Y-m-d 09:00:00'),
            'time_end' => date('Y-m-d 09:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 5,
            'time_start' => date('Y-m-d 09:30:00'),
            'time_end' => date('Y-m-d 10:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 5,
            'time_start' => date('Y-m-d 10:00:00'),
            'time_end' => date('Y-m-d 10:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 5,
            'time_start' => date('Y-m-d 10:30:00'),
            'time_end' => date('Y-m-d 11:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 5,
            'time_start' => date('Y-m-d 11:00:00'),
            'time_end' => date('Y-m-d 11:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 5,
            'time_start' => date('Y-m-d 11:30:00'),
            'time_end' => date('Y-m-d 12:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 5,
            'time_start' => date('Y-m-d 12:00:00'),
            'time_end' => date('Y-m-d 12:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 5,
            'time_start' => date('Y-m-d 12:30:00'),
            'time_end' => date('Y-m-d 13:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 5,
            'time_start' => date('Y-m-d 13:00:00'),
            'time_end' => date('Y-m-d 13:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 5,
            'time_start' => date('Y-m-d 13:30:00'),
            'time_end' => date('Y-m-d 14:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 1,
            'type_id' => 1,
            'day' => 5,
            'time_start' => date('Y-m-d 14:00:00'),
            'time_end' => date('Y-m-d 14:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        //RESERVA DE AULAS HORA EN HORA 

        //Lunes        
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 1,
            'time_start' => date('Y-m-d 08:30:00'),
            'time_end' => date('Y-m-d 09:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 1,
            'time_start' => date('Y-m-d 09:30:00'),
            'time_end' => date('Y-m-d 10:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 1,
            'time_start' => date('Y-m-d 10:30:00'),
            'time_end' => date('Y-m-d 11:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 1,
            'time_start' => date('Y-m-d 11:30:00'),
            'time_end' => date('Y-m-d 12:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 1,
            'time_start' => date('Y-m-d 12:30:00'),
            'time_end' => date('Y-m-d 13:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 1,
            'time_start' => date('Y-m-d 13:30:00'),
            'time_end' => date('Y-m-d 14:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //Martes
        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 2,
            'time_start' => date('Y-m-d 08:30:00'),
            'time_end' => date('Y-m-d 09:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 2,
            'time_start' => date('Y-m-d 09:30:00'),
            'time_end' => date('Y-m-d 10:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 2,
            'time_start' => date('Y-m-d 10:30:00'),
            'time_end' => date('Y-m-d 11:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 2,
            'time_start' => date('Y-m-d 11:30:00'),
            'time_end' => date('Y-m-d 12:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 2,
            'time_start' => date('Y-m-d 12:30:00'),
            'time_end' => date('Y-m-d 13:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 2,
            'time_start' => date('Y-m-d 13:30:00'),
            'time_end' => date('Y-m-d 14:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //Miercoles

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 3,
            'time_start' => date('Y-m-d 08:30:00'),
            'time_end' => date('Y-m-d 09:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 3,
            'time_start' => date('Y-m-d 09:30:00'),
            'time_end' => date('Y-m-d 10:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 3,
            'time_start' => date('Y-m-d 10:30:00'),
            'time_end' => date('Y-m-d 11:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 3,
            'time_start' => date('Y-m-d 11:30:00'),
            'time_end' => date('Y-m-d 12:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 3,
            'time_start' => date('Y-m-d 12:30:00'),
            'time_end' => date('Y-m-d 13:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 3,
            'time_start' => date('Y-m-d 13:30:00'),
            'time_end' => date('Y-m-d 14:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        //Jueves

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 4,
            'time_start' => date('Y-m-d 08:30:00'),
            'time_end' => date('Y-m-d 09:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 4,
            'time_start' => date('Y-m-d 09:30:00'),
            'time_end' => date('Y-m-d 10:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 4,
            'time_start' => date('Y-m-d 10:30:00'),
            'time_end' => date('Y-m-d 11:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 4,
            'time_start' => date('Y-m-d 11:30:00'),
            'time_end' => date('Y-m-d 12:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 4,
            'time_start' => date('Y-m-d 12:30:00'),
            'time_end' => date('Y-m-d 13:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 4,
            'time_start' => date('Y-m-d 13:30:00'),
            'time_end' => date('Y-m-d 14:00:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //Viernes       

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 5,
            'time_start' => date('Y-m-d 08:30:00'),
            'time_end' => date('Y-m-d 09:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 5,
            'time_start' => date('Y-m-d 09:30:00'),
            'time_end' => date('Y-m-d 10:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 5,
            'time_start' => date('Y-m-d 10:30:00'),
            'time_end' => date('Y-m-d 11:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 5,
            'time_start' => date('Y-m-d 11:30:00'),
            'time_end' => date('Y-m-d 12:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 5,
            'time_start' => date('Y-m-d 12:30:00'),
            'time_end' => date('Y-m-d 13:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id' => 2,
            'type_id' => 2,
            'day' => 5,
            'time_start' => date('Y-m-d 13:30:00'),
            'time_end' => date('Y-m-d 14:30:00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
