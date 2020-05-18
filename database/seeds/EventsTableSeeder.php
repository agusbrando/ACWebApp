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
        //TODO Eliminar para produccion cuando se termine de implementar los test
        DB::table('events')->insert([
            'session_id' => 1,
            'user_id' => 1,
            'type_id' => 1,
            'title' => 'default',
            'description' => 'default',
            'date' => date("Y-m-d H:i:s"),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('events')->insert([
            'session_id' => 2,
            'user_id' => 2,
            'type_id' => 2,
            'title' => 'default',
            'description' => 'default',
            'date' => date("Y-m-d H:i:s"),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
