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
        for ($i = 1; $i < 5; $i++) {
            DB::table('attachments')->insert([
                'name'         =>  'name ' .  $i,
                'attachmentable_id'         =>     $i,
                'attachmentable_type' =>  Message::class,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
