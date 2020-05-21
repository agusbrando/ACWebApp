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
        //TODO para el año 20-21 todas las asig todas las evals con foreach
        
        // Creacion de todos los seeders de los yearUnions, necesario primero los cursos, con sus asignaturas
        for($i=1; $i<=3; $i++){ 
            $cursos = Course::all();
            
            $fechasInicioFin =[];
            $year=1;//PARA el año con ID=1
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
        

    }
}
