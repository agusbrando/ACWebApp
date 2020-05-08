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
            'responsable_id' => '4',
            'date_check' => '2019-09-22',
            'date_start'=> '2019-09-22',
            'date_end'=> '2019-12-01',	
            'notes' => 'Muy bien estructurado',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('yearUnions')->insert([
            'subject_id' => '1',
            'course_id' => '1',
            'evaluation_id' => '2',
            'year_id' => '1',
            'program_id' => '1',
            'responsable_id' => '4',
            'date_check' => '2020-02-22',
            'date_start'=> '2019-12-02',
            'date_end'=> '2020-02-22',		
            'notes' => 'Muy bien estructurado',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('yearUnions')->insert([
            'subject_id' => '2',
            'course_id' => '1',
            'evaluation_id' => '1',
            'year_id' => '1',
            'program_id' => '2',
            'responsable_id' => '4',
            'date_check' => '2019-09-22',	
            'date_start'=> '2019-09-22',
            'date_end'=> '2019-12-01',	
            'notes' => 'Muy bien estructurado',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('yearUnions')->insert([
            'subject_id' => '3',
            'course_id' => '1',
            'evaluation_id' => '1',
            'year_id' => '1',
            'program_id' => '3',
            'responsable_id' => '4',
            'date_check' => '2019-09-22',
            'date_start'=> '2019-09-22',
            'date_end'=> '2019-12-01',		
            'notes' => 'Muy bien estructurado',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        /*
            for($i = 1; $i<=3; $i++){

                DB::table('yearUnions')->insert([
                    'subject_id' => '1',
                    'course_id' => '4',
                    'evaluation_id' => $i,
                    'year_id' => '3',
                    'date_start'=> '2019-09-22',
                    'date_end'=> '2019-12-01',		
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
        

            }
        */

        



    }
}
