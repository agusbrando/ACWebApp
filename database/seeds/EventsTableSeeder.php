<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'type_id' => 1,
            'session_id' => 1,
            'user_id' =>1,
            'description' => 'default',
            'date' => date("Y-m-d")
        ]);

        DB::table('events')->insert([
            'type_id' => 2,
            'session_id' => 2,
            'user_id' =>2,
            'description' => 'default',
            'date' => date("Y-m-d")
        ]);
    }
}
