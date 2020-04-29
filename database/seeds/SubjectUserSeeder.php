<?php

use Illuminate\Database\Seeder;

class SubjectUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects_users')->insert([
            'user_id'=>1,
            'subject_id'=>1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects_users')->insert([
            'user_id'=>2,
            'subject_id'=>1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
