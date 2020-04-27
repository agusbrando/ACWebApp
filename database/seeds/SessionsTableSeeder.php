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
            'type_id' => 1,
            'day' => 1,
            'time_start' => date('Y-m-d H:i:s'),
            'time_end' => date('Y-m-d H:i:s'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'classroom_id'=>2,
            'type_id' => 2,
            'day' => 1,
            'time_start' => date('Y-m-d H:i:s') ,
            'time_end' => date('Y-m-d H:i:s') ,   
            'created_at' => now(),
            'updated_at' => now(),  
        ]);
    }
}
