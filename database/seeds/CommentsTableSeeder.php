<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 5; $i++) {
            DB::table('comments')->insert([
                'user_id' => $i,
                'text' => 'Comment '.$i,
                'post_id' => $i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
