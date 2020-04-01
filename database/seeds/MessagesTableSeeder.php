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
        for ($i = 1; $i < 6; $i++) {
            DB::table('messages')->insert([
                'user_id'         =>     $i,
                'title'         =>  'title ' .  $i,
                'text'         =>  'text ' .  $i
            ]);
        }
    }
}
