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
        DB::table('messages')->insert([
            'user_id' => 1,
            'subject' => 'de admin a user',
            'message' => 'con un adjunto',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('messages')->insert([
            'user_id' => 1,
            'subject' => 'de admin a guillermo',
            'message' => 'sin adjunto',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('messages')->insert([
            'user_id' => 2,
            'subject' => 'de user a admin',
            'message' => 'sin adjunto',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('messages')->insert([
            'user_id' => 4,
            'subject' => 'de marcelo a admin',
            'message' => 'con dos adjuntos',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
