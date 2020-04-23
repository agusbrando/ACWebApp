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
            'session_id' => 1,
            'user_id' => 1,
            'title' => 'default',
            'description' => 'default',
            'date' => date("Y-m-d"),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('events')->insert([
            'session_id' => 2,
            'user_id' => 2,
            'title' => 'default',
            'description' => 'default',
            'date' => date("Y-m-d"),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
