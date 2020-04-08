<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 5; $i++) {
            DB::table('messages')->insert([
                'user_id'         =>     $i,
                'title'         =>  'title ' .  $i,
                'created_at' => now(),
                'updated_at' => now(),
                'text'         =>  'text ' .  $i
            ]);
        }
    }
}
