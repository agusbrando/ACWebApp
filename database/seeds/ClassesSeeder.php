<?php

use Illuminate\Database\Seeder;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            'name' => 'default',
            'number' => 1,
        ]);
        DB::table('classes')->insert([
            'name' => 'default2',
            'number' => 2,
        ]);
    }
}
