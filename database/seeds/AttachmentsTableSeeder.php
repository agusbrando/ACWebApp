<?php

use Illuminate\Database\Seeder;
use  App\Models\Message;
use  App\Models\Post;

class AttachmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        


        //TODO 2 Attachments para message(COMPLETADO)
        DB::table('attachments')->insert([
            'name'=>'default_message.jpg',
            'extension'=>'jpg',
            'attachmentable_id'=>2,
            'attachmentable_type'=> Message::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('attachments')->insert([
            'name'=>'default_message.jpg',
            'extension'=>'jpg',
            'attachmentable_id'=>2,
            'attachmentable_type'=> Message::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        //TODO 2 Attachments para post(COMPLETADO)
        DB::table('attachments')->insert([
            'name'=>'default_post.jpg',
            'extension'=>'jpg',
            'attachmentable_id'=>1,
            'attachmentable_type'=> Post::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('attachments')->insert([
            'name'=>'default_post.jpg',
            'extension'=>'jpg',
            'attachmentable_id'=>1,
            'attachmentable_type'=> Post::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);

       
    }


}
