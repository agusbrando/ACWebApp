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
            'types_id' => 1,
            'sessions_id' => 1,
            'users_id' =>1,
            'description' => 'default',
            'date' => date("Y-m-d")
        ]);

        DB::table('events')->insert([
            'types_id' => 2,
            'sessions_id' => 2,
            'users_id' =>2,
            'description' => 'default',
            'date' => date("Y-m-d")
        ]);
    }
}
