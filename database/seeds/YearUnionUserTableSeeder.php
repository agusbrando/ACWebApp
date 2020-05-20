<?php

use Illuminate\Database\Seeder;
use App\Models\User;
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
        //TODO matricular al estudiante default en todas las asignaturas de su curso
        $year_id=1;
        $cursos = Course::all();
        $empiezo = User::where('first_name','Alumno1')->id;
        foreach($cursos as $curso){
            
            $yearUnions = YearUnions::where('year_id',$year_id)->where('course_id',$curso->id);
            foreach($yearUnions as $yearUnion){
                
                for($i=$empiezo;$i<($empiezo+20);$i++){
                    $alumno=User::find($i);
                    $alumno->yearUnions()->attach($yearUnion->id,['assistance'=>true]);
                }
                $empiezo=$empiezo +20;
            }

        }



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
    }
}
