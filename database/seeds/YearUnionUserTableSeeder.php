<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;
use App\Models\YearUnion;
use Illuminate\Support\Facades\DB;

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
        $year_id = 1;
        $cursos = Course::all();
        foreach ($cursos as $curso) {
            $empiezo = User::where('first_name', 'Alumno1 ' . $curso->level . $curso->abbreviation)->first();
            if ($empiezo != null) {
                foreach ($curso->subjects as $asignatura) {

                    for ($i = 1; $i <= 4; $i++) {
                        if ($i == 3 && ($curso->level == 2)) {
                            $i++;
                        }
                        $yearUnion = YearUnion::where('subject_id', $asignatura->id)->where('evaluation_id', $i)->where('course_id', $curso->id)->where('year_id', $year_id)->first();
                        for ($j = $empiezo->id; $j < ($empiezo->id + $curso->num_students); $j++) {

                            DB::table('yearUnionUsers')->insert([
                                'year_union_id' => $yearUnion->id,
                                'user_id' => $j,
                                'assistance' => true,
                                'created_at' => now(),
                                'updated_at' => now(),
                            ]);
                        }
                    }
                }
            }
        }
    }
}
