<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;
use App\Models\YearUnion;

class YearUnionUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('yearUnionUsers')->insert([
            'year_union_id' => '1',
            'user_id' => '2',
            'assistance' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('yearUnionUsers')->insert([
            'year_union_id' => '1',
            'user_id' => '1',
            'assistance' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('yearUnionUsers')->insert([
            'year_union_id' => '3',
            'user_id' => '3',
            'assistance' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('yearUnionUsers')->insert([
            'year_union_id' => '3',
            'user_id' => '2',
            'assistance' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('yearUnionUsers')->insert([
            'year_union_id' => '4',
            'user_id' => '3',
            'assistance' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //TODO matricular al estudiante default en todas las asignaturas de su curso
        $year_id=1;
        $cursos = Course::all();
        $empiezo = User::all()->where('first_name','Alumno1')->first()->id;
        foreach($cursos as $curso){
            
            
            foreach($curso->subjects as $asignatura){
                for($i=1;$i<=3; $i++) {
                    $yearUnion=YearUnion::where('subject_id',$asignatura->id)->where('evaluation_id',$i)->where('course_id',$curso->id)->where('year_id',1)->first();
                    for($i=$empiezo;$i<($empiezo+20);$i++){
                    
                        DB::table('yearUnionUsers')->insert([
                            'year_union_id' => $yearUnion->id,
                            'user_id' => $i,
                            'assistance' => true,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
    
                    }
                    if($curso->level ==2){
                        break;
                    }
                }
            }
            $empiezo=$empiezo +20;
           

        }
    }
}
