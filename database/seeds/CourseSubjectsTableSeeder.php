<?php

use Illuminate\Database\Seeder;
use App\Models\Subject;
class CourseSubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO ASIR y FPBASICA

        //1ºDAM
       for($i=4; $i<=8; $i++){

        DB::table('course_subjects')->insert([
                'course_id' => 1,
                'subject_id' => $i,
                 'max_hours' => round(Subject::find($i)->hours),
                'hours'=> (Subject::find($i)->hours),
                 'created_at' => now(),
                'updated_at' => now()
             ]);

         }
        //Ingles id 3
        DB::table('course_subjects')->insert([
            'course_id' => 1,
            'subject_id' => 3,
            'max_hours' => 14,
            'hours'=> 96,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //FOL id 2
        DB::table('course_subjects')->insert([
            'course_id' => 1,
            'subject_id' => 2,
            'max_hours' => 14,
            'hours'=> 96,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //2ºDAM
        for($i=9; $i<=13; $i++){

            DB::table('course_subjects')->insert([
                'course_id' => 2,
                'subject_id' => $i,
                'max_hours' => round(Subject::find($i)->hours),
                'hours'=> (Subject::find($i)->hours),
                'created_at' => now(),
                'updated_at' => now()
            ]);

        }
        //Ingles id 3
        DB::table('course_subjects')->insert([
            'course_id' => 2,
            'subject_id' => 3,
            'max_hours' => 6,
            'hours' =>40,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        //EIE id 1
        DB::table('course_subjects')->insert([
            'course_id' => 2,
            'subject_id' => 1,
            'max_hours' => 9,
            'hours' =>60,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //1ºDAW
        for($i=4; $i<=8; $i++){

            DB::table('course_subjects')->insert([
                'course_id' => 3,
                'subject_id' => $i,
                'max_hours' => round(Subject::find($i)->hours),
                'hours'=> 96,
                'created_at' => now(),
                'updated_at' => now()
            ]);

        }
        //Ingles id 3
        DB::table('course_subjects')->insert([
            'course_id' => 3,
            'subject_id' => 3,
            'max_hours' => 14,
            'hours'=> 96,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //FOL id 2
        DB::table('course_subjects')->insert([
            'course_id' => 3,
            'subject_id' => 2,
            'max_hours' => 14,
            'hours'=> 96,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
