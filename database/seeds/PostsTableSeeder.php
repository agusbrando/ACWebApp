<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO Create 2 post

        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => 'Post 1',
            'text' => 'Descripción del post 1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('posts')->insert([
            'user_id' => 2,
            'title' => 'Post 2',
            'text' => 'Descripción del post 2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
