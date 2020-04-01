<?php

use Illuminate\Database\Seeder;

class SendsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 6; $i++) {
            DB::table('sends')->insert([
                'message_id'         =>     $i,
                'user_id'         =>    $i,
                'read'         =>    $i
            ]);
        }
    }
}
