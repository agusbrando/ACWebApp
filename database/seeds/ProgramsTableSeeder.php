<?php

use Illuminate\Database\Seeder;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO Create one program foreach course add current profesor and ask if you dont know
        DB::table('sessions')->insert([
            'professor_id' => 2,
            'type_id' => 2,
            'day' => 5,
            'time_start' => '13:30',
            'time_end' => '14:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
