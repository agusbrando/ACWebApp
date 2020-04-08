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
        for ($i = 1; $i < 5; $i++) {
            DB::table('posts')->insert([
                'created_at' => now(),
                'updated_at' => now(),
                'text'         =>    'text ' . $i
            ]);
        }
    }
}
