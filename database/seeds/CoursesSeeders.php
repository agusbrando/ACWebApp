<?php

use Illuminate\Database\Seeder;

class CoursesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'id' => 1,
            'name' => '2DAM',
            'level' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
