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
        for ($i = 1; $i < 6; $i++) {
            DB::table('attachments')->insert([
                'name'         =>  'name ' .  $i,
                'attachable_id'         =>     $i,
                'attachable_type'         =>  'attachable_type ' .  $i,
                'messages_id'         =>     $i,
                'post_id'         =>     $i
            ]);
        }
    }
}
