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
                'name' => 'Attachment '.$i,
                'attachmentable_id' => $i,
                'attachmentable_type' => 'Post '.$i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
