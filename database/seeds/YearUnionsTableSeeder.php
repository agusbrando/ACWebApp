<?php

use Illuminate\Database\Seeder;

class YearUnionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('yearUnions')->insert([
            'subject_id' => '1',
            'course_id' => '1',
            'evaluation_id' => '1',
            'year_id' => '1',
            'program_id' => '1',
            'responsable_id' => '5',
            'notes' => 'Programacion confirmada',
            'date_check' => '2016/09/25',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
