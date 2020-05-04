<?php

use Illuminate\Database\Seeder;

class MessagesUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('message_user')->insert([
            'message_id' => 1,
            'user_id' => 2,
            'read' => '0',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('message_user')->insert([
            'message_id' => 2,
            'user_id' => 3,
            'read' => '0',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('message_user')->insert([
            'message_id' => 3,
            'user_id' => 1,
            'read' => '0',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('message_user')->insert([
            'message_id' => 4,
            'user_id' => 1,
            'read' => '0',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
