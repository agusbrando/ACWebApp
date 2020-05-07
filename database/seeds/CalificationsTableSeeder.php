<?php

use Illuminate\Database\Seeder;

class CalificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('califications')->insert([
            'year_user_id'=>5,
            'task_id'=>1,
            'value'=>5,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
