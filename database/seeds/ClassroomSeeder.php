<?php

use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classroom')->insert([
            'name' => 'default',
            'number' => 1,
        ]);
        DB::table('classroom')->insert([
            'name' => 'default2',
            'number' => 2,
        ]);
    }
}
