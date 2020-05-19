<?php

use Illuminate\Database\Seeder;
use  App\Models\Message;

class AttachmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attachments')->insert([
            'name'=>'noticia-gato-bano-mascota-casa-unas-gatito.jpg',
            'extension'=>'jpg',
            'attachmentable_id'=>1,
            'attachmentable_type'=> Message::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('attachments')->insert([
            'name'=>'noticia-gato-bano-mascota-casa-unas-gatito.jpg',
            'extension'=>'jpg',
            'attachmentable_id'=>4,
            'attachmentable_type'=> Message::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('attachments')->insert([
            'name'=>'doggo.jpg',
            'extension'=>'jpg',
            'attachmentable_id'=>4,
            'attachmentable_type'=> Message::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
