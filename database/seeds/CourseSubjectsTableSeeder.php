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

            DB::table('course_subject')->insert([
                'course_id' => 1,
                'subject_id' => Subject::find($i)->id,
                'max_hours' => round((Subject::find($i)->hours)*0.15),
                'hours'=> Subject::find($i)->hours,
                'created_at' => now(),
                'updated_at' => now()
             ]);

         }
        //Ingles id 3
        DB::table('course_subject')->insert([
            'course_id' => 1,
            'subject_id' => 3,
            'max_hours' => 14,
            'hours'=> 96,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //FOL id 2
        DB::table('course_subject')->insert([
            'course_id' => 1,
            'subject_id' => 2,
            'max_hours' => 14,
            'hours'=> 96,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //2ºDAM
        for($i=9; $i<=13; $i++){

            DB::table('course_subject')->insert([
                'course_id' => 2,
                'subject_id' => $i,
                'max_hours' => round((Subject::find($i)->hours)*0.15),
                'hours'=> Subject::find($i)->hours,
                'created_at' => now(),
                'updated_at' => now()
            ]);

        }
        //Ingles id 3
        DB::table('course_subject')->insert([
            'course_id' => 2,
            'subject_id' => 3,
            'max_hours' => 6,
            'hours' =>40,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        //EIE id 1
        DB::table('course_subject')->insert([
            'course_id' => 2,
            'subject_id' => 1,
            'max_hours' => 9,
            'hours' =>60,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //1ºDAW
        for($i=4; $i<=8; $i++){

            DB::table('course_subject')->insert([
                'course_id' => 3,
                'subject_id' => $i,
                'hours'=> Subject::find($i)->hours,
                'max_hours' => round((Subject::find($i)->hours)*0.15),
                'created_at' => now(),
                'updated_at' => now()
            ]);

        }
        //Ingles id 3
        DB::table('course_subject')->insert([
            'course_id' => 3,
            'subject_id' => 3,
            'max_hours' => 14,
            'hours'=> 96,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //FOL id 2
        DB::table('course_subject')->insert([
            'course_id' => 3,
            'subject_id' => 2,
            'max_hours' => 14,
            'hours'=> 96,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        //2ºDAW 
        for($i=14; $i<=17; $i++){

            DB::table('course_subject')->insert([
                'course_id' => 4,
                'subject_id' => $i,
                'max_hours' => round((Subject::find($i)->hours)*0.15),
                'hours'=> Subject::find($i)->hours,
                'created_at' => now(),
                'updated_at' => now()
            ]);

        }
        //Ingles id 3
        DB::table('course_subject')->insert([
            'course_id' => 4,
            'subject_id' => 3,
            'max_hours' => 6,
            'hours' =>40,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        //EIE id 1
        DB::table('course_subject')->insert([
            'course_id' => 4,
            'subject_id' => 1,
            'max_hours' => 9,
            'hours' =>60,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //1ºASIR
        for($i=18; $i<=21; $i++){

            DB::table('course_subject')->insert([
                'course_id' => 5,
                'subject_id' => $i,
                'hours'=> Subject::find($i)->hours,
                'max_hours' => round((Subject::find($i)->hours)*0.15),
                'created_at' => now(),
                'updated_at' => now()
            ]);

        }
        //LM id 7
        DB::table('course_subject')->insert([
            'course_id' => 5,
            'subject_id' => 7,
            'max_hours' => 14,
            'hours'=> 96,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //Ingles id 3
        DB::table('course_subject')->insert([
            'course_id' => 5,
            'subject_id' => 3,
            'max_hours' => 14,
            'hours'=> 96,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //FOL id 2
        DB::table('course_subject')->insert([
            'course_id' => 5,
            'subject_id' => 2,
            'max_hours' => 14,
            'hours'=> 96,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //2ºASIR
        for($i=22; $i<=26; $i++){

            DB::table('course_subject')->insert([
                'course_id' => 6,
                'subject_id' => $i,
                'hours'=> Subject::find($i)->hours,
                'max_hours' => round((Subject::find($i)->hours)*0.15),
                'created_at' => now(),
                'updated_at' => now()
            ]);

        }
        //Ingles id 3
        DB::table('course_subject')->insert([
            'course_id' => 6,
            'subject_id' => 3,
            'max_hours' => 6,
            'hours' =>40,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        //EIE id 1
        DB::table('course_subject')->insert([
            'course_id' => 6,
            'subject_id' => 1,
            'max_hours' => 9,
            'hours' =>60,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //1ºSMR
        for($i=27; $i<=30; $i++){

            DB::table('course_subject')->insert([
                'course_id' => 7,
                'subject_id' => $i,
                'hours'=> Subject::find($i)->hours,
                'max_hours' => round((Subject::find($i)->hours)*0.15),
                'created_at' => now(),
                'updated_at' => now()
            ]);

        }

        //Ingles id 3
        DB::table('course_subject')->insert([
            'course_id' => 7,
            'subject_id' => 3,
            'max_hours' => 9,
            'hours'=> 64,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //FOL id 2
        DB::table('course_subject')->insert([
            'course_id' => 7,
            'subject_id' => 2,
            'max_hours' => 13,
            'hours'=> 96,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //2ºSMR
        for($i=31; $i<=34; $i++){

            DB::table('course_subject')->insert([
                'course_id' => 8,
                'subject_id' => $i,
                'hours'=> Subject::find($i)->hours,
                'max_hours' => round((Subject::find($i)->hours)*0.15),
                'created_at' => now(),
                'updated_at' => now()
            ]);

        }

        //Ingles id 3
        DB::table('course_subject')->insert([
            'course_id' => 8,
            'subject_id' => 3,
            'max_hours' => 6,
            'hours' =>44,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        //EIE id 1
        DB::table('course_subject')->insert([
            'course_id' => 8,
            'subject_id' => 1,
            'max_hours' => 10,
            'hours' =>66,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
