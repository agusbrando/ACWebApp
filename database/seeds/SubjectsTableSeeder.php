<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'courses_id' => 1,
            'name' => 'PMM'
        ]);
        DB::table('subjects')->insert([
            'courses_id' => 2,
            'name' => 'DI'
        ]);
        DB::table('subjects')->insert([
            'courses_id' => 1,
            'name' => 'FOL'
        ]);
    }
}
