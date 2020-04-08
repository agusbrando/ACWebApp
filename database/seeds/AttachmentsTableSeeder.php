<?php

use Illuminate\Database\Seeder;

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
                'created_at' => now(),
                'updated_at' => now(),
                'attachmentable_type'         =>  Message::class
            ]);
        }
    }
}
