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
        DB::table('sessions')->insert([
            'classroom_id'=>1,
            'date'=>date('Y-m-d'),
            'time_start' =>'8:30',
            'time_end' => '9:25',
            'dia'=>'Lunes',
            'model' => 'defaultModel',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sessions')->insert([
            'classroom_id'=>1,
            'date'=>date('Y-m-d'),
            'time_start' =>'8:30',
            'time_end' => '9:25',
            'dia'=>'Martes',
            'model' => 'defaultModel',
            'created_at' => now(),
            'updated_at' => now(), 
        ]);
    }
} 
