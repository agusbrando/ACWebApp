<?php

use Illuminate\Support\Facades\DB;
use App\Models\Course;
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
        //EVAL 1 curso 1
        DB::table('yearUnions')->insert([
            'subject_id' => '1',
            'course_id' => '1',
            'evaluation_id' => '1',
            'year_id' => '1',
            'program_id' => '1',
            'responsable_id' => '4',
            'date_check' => '2016-09-22', //fecha en la que se revisa / da el visto beno
            'date_start'=> '2016-12-20', //fecha de la eval
            'date_end'=> '2016-12-01',
            'notes' => 'Muy bien estructurado',
            'classroom_id'=>1, 
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
            'classroom_id'=>1, 
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
            'classroom_id'=>1, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        // Creacion de todos los seeders de los yearUnions, necesario primero los cursos, con sus asignaturas
        for($i=1; $i<=3; $i++){
            $cursos = Course::all();
            
            $fechasInicioFin =[];
            $year=1;
            array_push($fechasInicioFin,['date_start'=> '2019-09-09', 'date_end'=>'2019-11-21']);//1ºEVAL
            array_push($fechasInicioFin,['date_start'=>'2019-11-22', 'date_end'=>'2020-02-24']);//2ºEVAL
            array_push($fechasInicioFin,['date_start'=>'2020-02-25', 'date_end'=>'2020-05-28']);//3ºEVAL
            foreach($cursos as $curso){
                foreach($curso->subjects as $j=>$subject){
                    DB::table('yearUnions')->insert([
                        'subject_id' => $subject->id,
                        'course_id' => $curso->id,
                        'evaluation_id' => $i,
                        'year_id' => $year,
                        'date_start'=> $fechasInicioFin[$i-1]['date_start'],
                        'date_end'=> $fechasInicioFin[$i-1]['date_end'],
                        'classroom_id'=> $j+1, 
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
            if($curso->level == 2){
                if( $i==2 ){
                    break;
                }
            }
        }
        
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
            'classroom_id'=>1, 
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
            'classroom_id'=>1, 
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
            'classroom_id'=>1, 
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
            'classroom_id'=>1, 
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
            'classroom_id'=>1, 
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
            'classroom_id'=>1, 
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
            'classroom_id'=>1, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
