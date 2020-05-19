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
        //TODO para el año 20-21 todas las asig todas las evals con foreach

        //EVAL 1 curso 1
        DB::table('yearUnions')->insert([
            'subject_id' => '1',
            'course_id' => '1',
            'evaluation_id' => '1',
            'year_id' => '1',
            'program_id' => '1',
            'responsable_id' => '4',
            'date_check' => '2016-09-22',	//fecha en la que se revisa / da el visto beno
            'date_start'=> '2016-12-20', //fecha de la eval
            'date_end'=> '2016-12-01',
            'notes' => 'Muy bien estructurado',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //EVAL 2 curso 1
        DB::table('yearUnions')->insert([
            'subject_id' => '1',
            'course_id' => '1',
            'evaluation_id' => '2',
            'year_id' => '1',
            'program_id' => '1',
            'responsable_id' => '4',
            'date_check' => '2017-01-20',
            'date_start'=> '2017-01-07',
            'date_end'=> '2017-03-12',
            'notes' => 'Muy bien estructurado',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //EVAL 3 curso 1
        DB::table('yearUnions')->insert([
            'subject_id' => '1',
            'course_id' => '1',
            'evaluation_id' => '3',
            'year_id' => '1',
            'program_id' => '2',
            'responsable_id' => '4',
            'date_check' => '2017-03-29',
            'date_start'=> '2017-03-28',
            'date_end'=> '2017-06-01',
            'notes' => 'Muy bien estructurado',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('yearUnions')->insert([
            'subject_id' => '3',
            'course_id' => '2',
            'evaluation_id' => '1',
            'year_id' => '1',
            'program_id' => '2',
            'responsable_id' => '4',
            'date_check' => '2017-09-22',
            'date_start'=> '2017-06-22',
            'date_end'=> '2018-12-01',
            'notes' => 'Muy bien estructurado',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('yearUnions')->insert([
            'subject_id' => '1',
            'course_id' => '4',
            'evaluation_id' => '2',
            'year_id' => '1',
            'program_id' => '1',
            'responsable_id' => '4',
            'date_check' => '2018-09-22',
            'date_start'=> '2018-06-22',
            'date_end'=> '2019-12-01',
            'notes' => 'Muy bien estructurado',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('yearUnions')->insert([
            'subject_id' => '1',
            'course_id' => '3',
            'evaluation_id' => '2',
            'year_id' => '1',
            'program_id' => '1',
            'responsable_id' => '4',
            'date_check' => '2019-09-22',
            'date_start'=> '2019-06-22',
            'date_end'=> '2020-12-01',
            'notes' => 'Muy bien estructurado',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('yearUnions')->insert([
            'subject_id' => '4',
            'course_id' => '1',
            'evaluation_id' => '1',
            'year_id' => '1',
            'program_id' => '1',
            'responsable_id' => '4',
            'date_check' => '2016-09-22',	//fecha en la que se revisa / da el visto beno
            'date_start'=> '2016-12-20', //fecha de la eval
            'date_end'=> '2016-12-01',
            'notes' => 'Muy bien estructurado',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('yearUnions')->insert([
            'subject_id' => '2',
            'course_id' => '1',
            'evaluation_id' => '1',
            'year_id' => '1',
            'program_id' => '1',
            'responsable_id' => '4',
            'date_check' => '2016-09-22',	//fecha en la que se revisa / da el visto beno
            'date_start'=> '2016-12-20', //fecha de la eval
            'date_end'=> '2016-12-01',
            'notes' => 'Muy bien estructurado',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('yearUnions')->insert([
            'subject_id' => '5',
            'course_id' => '1',
            'evaluation_id' => '1',
            'year_id' => '1',
            'program_id' => '1',
            'responsable_id' => '4',
            'date_check' => '2016-09-22',	//fecha en la que se revisa / da el visto beno
            'date_start'=> '2016-12-20', //fecha de la eval
            'date_end'=> '2016-12-01',
            'notes' => 'Muy bien estructurado',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('yearUnions')->insert([
            'subject_id' => '6',
            'course_id' => '1',
            'evaluation_id' => '1',
            'year_id' => '1',
            'program_id' => '1',
            'responsable_id' => '4',
            'date_check' => '2016-09-22',	//fecha en la que se revisa / da el visto beno
            'date_start'=> '2016-12-20', //fecha de la eval
            'date_end'=> '2016-12-01',
            'notes' => 'Muy bien estructurado',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
