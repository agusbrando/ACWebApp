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
        DB::table('yearUnions')->insert([
            'subject_id' => '2',
            'course_id' => '2',
            'evaluation_id' => '2',
            'year_id' => '1',
            'program_id' => '2',
            'responsable_id' => '5',
            'notes' => 'Programacion confirmada',
            'date_check' => '2016/09/23',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('yearUnions')->insert([
            'subject_id' => '3',
            'course_id' => '3',
            'evaluation_id' => '3',
            'year_id' => '1',
            'program_id' => '3',
            'responsable_id' => '5',
            'notes' => 'Programacion confirmada',
            'date_check' => '2016/09/24',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('yearUnions')->insert([
            'subject_id' => '1',
            'course_id' => '4',
            'evaluation_id' => '2',
            'year_id' => '3',
            'program_id' => '1',
            'responsable_id' => '5',
            'notes' => 'Programacion confirmada',
            'date_check' => '2016/09/22',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
