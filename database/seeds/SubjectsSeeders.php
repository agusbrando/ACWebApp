<?php

use Illuminate\Database\Seeder;

class SubjectsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'id' => 1,
            'name' => 'Diseño de Interfaces',
            'course_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
