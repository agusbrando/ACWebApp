<?php

use Illuminate\Database\Seeder;

class SchedulesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->insert([
            'id' => 1,
            'id_subjects' => 1,
            'description' => 'default',
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
