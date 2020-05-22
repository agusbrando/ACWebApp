<?php

use Illuminate\Database\Seeder;
use App\Models\Subject;
use App\Models\Course;
use App\Models\YearUnion;
use App\Models\Program;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO Create one program foreach course add current profesor and ask if you dont know
        
        //2ºDAM
        $this->crearProgramacion('DAM',2,'Accesso a Datos',10);
        $this->crearProgramacion('DAM',2,'Sistema de Gestión Empresarial',10);
        $this->crearProgramacion('DAM',2,'Programación de Servicios y Procesos',10);
        $this->crearProgramacion('DAM',2,'Programacion multimedia y dispositivos moviles',3);
        $this->crearProgramacion('DAM',2,'Desarrollo de interfaces',3);
        $this->crearProgramacion('DAM',2,'Ingles',8);
        $this->crearProgramacion('DAM',2,'Empresa e Iniciativa Emprendedora',5);

      
      
       
        

       
        
       

    }
    /**Abreviacion, nivel, Nombre Asignatura, Profesor id */
    public function crearProgramacion($curso_abreviacion,$nivelCurso,$asignatura_nombre,$profesor_id){
        $curso = Course::where('abbreviation',$curso_abreviacion)->where('level',$nivelCurso)->first();
        
        $asignatura = Subject::where('name',$asignatura_nombre)->first();
        DB::table('programs')->insert([
            'name' => '('.($curso->level).($curso->abbreviation).') - '.$asignatura->name,
            'professor_id' => $profesor_id,
           
        ]);
        $evaluations = YearUnion::where('subject_id',$asignatura->id)->where('course_id',$curso->id)->where('year_id',1)->get();
        $program = Program::all()->last()->yearUnions()->saveMany($evaluations);
    }
}
