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
        //TODO 4 Comments 2 para cada post (COMPLETADO)
        
        DB::table('comments')->insert([
            'user_id' => 1,
            'post_id' => '2',
            'text' => 'Comentario 3',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('comments')->insert([
            'user_id' => 1,
            'post_id' => '2',
            'text' => 'Comentario 4',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        


        DB::table('comments')->insert([
            'user_id' => 1,
            'post_id' => '1',
            'text' => 'Comentario 1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('comments')->insert([
            'user_id' => 2,
            'post_id' => '1',
            'text' => 'Comentario 2',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
