<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Program;
use App\Models\Unit;
use App\Models\User;
use App\Models\Evaluable;
use App\Models\Evaluated;
use App\Models\Course;
use App\Models\Year;
use App\Models\YearUnion;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::all();
        return view('programs.index',compact('programs'));
    }

    public function myPrograms(){
        $user = Auth::user();
        $programs = [];
        $programs_professor = Program::all()->where('professor_id',$user->id);
       
        return view('programs.index',compact('programs','programs_professor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $editar=false;
        $programs = Program::all();
        $usuario = Auth::user();
        $profesores = DB::table('users')->where('role_id', 2)->get();
        $subjects = Subject::all();
        $courses = Course::all();
        $years = Year::all();
        return view('programs.create',compact('programs','profesores','usuario','subjects','years','courses','editar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'professor_id'=>'required',
            'course_id'=>'required',
            'subject_id'=>'required',
            'year_id'=>'required'
        ]);

        $profesor = User::findorfail($request->get('professor_id'));
        $curso = Course::findorfail($request->get('course_id'));
        $asignatura = Subject::findorfail($request->get('subject_id'));
        $anyo = Year::findorfail($request->get('year_id'));
        
        $evaluations = YearUnion::where('subject_id',$asignatura->id)->where('course_id',$curso->id)->where('year_id',$anyo->id)->get();


        if($evaluations!=null){
            if($evaluations->first()->program_id==null){

                $program = new Program([
                    'name'=> $anyo->name.' - '.$curso->abbreviation.' - '.$asignatura->name
                ]);
                $program->professor()->associate($profesor);
                $program->save();
    
                $program->yearUnions()->saveMany($evaluations);
                      
                return redirect('/programs');
    
            }else{
                echo 'error, ya existe';
            }
            
        }else{


        }
        
        
        
        

    }
    public function storeUnit(Request $request, $id){
        $program = Program::findorfail($id);
        $request->validate([
            'name'=>'required',
            'expected_eval'=>'required',
            'expected_date'=>'required'
        ]);

        $fechas = explode(' - ',$request->get('expected_date'),2);
        $fechaInicio = str_replace('/', '-', $fechas[0]);
        $fechaFin  = str_replace('/', '-', $fechas[1]);

        $fechaInicio = date("Y-m-d",strtotime($fechaInicio));
        $fechaFin = date("Y-m-d",strtotime($fechaFin));
        

        $unit = new Unit([
            'name' => $request->get('name'),
            'expected_date_start' =>  $fechaInicio,
            'expected_date_end' =>  $fechaFin,
            'expected_eval'=>$request->get('expected_eval')
        ]);
        
        $program->units()->save($unit);
        return redirect('/programs/'.$id);
    }
    public function updateUnit(Request $request,$program_id, $id){

        $request->validate([
            'name'=>'required',
            'expected_date_start'=>'required',
            'expected_date_end'=>'required',
            'expected_eval'=>'required'
        ]);

        $unit = Unit::find($id);

        $unit->name = $request->get('name');
        $unit->expected_date_start= $request->get('expected_date_start');
        $unit->expected_date_end = $request->get('expected_date_end');
        $unit->expected_eval = $request->get('expected_eval');
        $unit->date_start = $request->get('date_start');
        $unit->date_end = $request->get('date_end');
        $unit->eval = $request->get('eval');
        $unit->notes = $request->get('notes');
        $unit->improvements = $request->get('improvements');
        $unit->save();
        
       

        return redirect('/programs/'.$program_id);
    }
    public function storeAspecto(Request $request, $id){
        $program = Program::findorfail($id);

        $request->validate([
            'name'=>'required',
            'description'=>'required'
        ]);
        $name = $request->get('name');
        $description = $request->get('description');

        $aspecto = Evaluable::where('name',$name)->first();

        if($aspecto == null){
            $aspecto = new Evaluable([
                'name' => $name
            ]);
            $aspecto->save();
        }
        
        $program->evaluables()->attach($aspecto->id,['description'=>$description]);
        
        return redirect('/programs/'.$id);
    }
    public function updateAspecto(Request $request, $program_id, $id){

        $request->validate([
            //'name'=>'required',
            'description'=>'required'
        ]);
       // $name = $request->get('name');
        $description = $request->get('description');

        $aspecto = Evaluated::find($id);
        
        /*$evaluable = Evaluable::find($aspecto->evaluable_id);
        $evaluable->name = $name;
        $evaluable->save();*/
        $aspecto->description = $description;
        $aspecto->save();
        $mostrarAspecto = true;
        return redirect('/programs/'.$program_id);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $usuario = Auth::user();
        $program = Program::findorfail($id);
        $evaluables = Evaluable::all();
        $evaluadoEditar_id = -1;
        $editar=false;
        
        $responsable=null;
        $fechas=null;
        $notas=null;
        $evaluado=['1'=>false, '2'=>false, '3'=>false];
        $MisEvaluables = $program->evaluables;
        $listaEvaluables=[];
        foreach($evaluables as $evaluable){
            $encontrado = false;
            foreach($MisEvaluables as $MiEvaluable){
                if($evaluable->id == $MiEvaluable->id){
                    $encontrado=true;
                    break;
                }
            }
            if(!$encontrado){
                array_push($listaEvaluables,$evaluable);
            }
        }
        if($yearUnion->course->level == 1){
            for($i=1;$i<=4;$i++){
                $yearUnion = $program->yearUnions->where('evaluation_id',$i)->first();
                if($yearUnion != null){
                    $notas[$i]=$yearUnion->notes;
                    $fechas[$i]=$yearUnion->date_check;
                    $responsable[$i]=$yearUnion->responsable_id;
                    $responsable[$i]=User::find($responsable[$i]);
                    if($notas[$i]==null){
                        $notas[$i]='';
                    }
                    if($fechas[$i]==null){
                        $evaluado[$i]=false;
                    }else{
                        $evaluado[$i]=true;
                    }
                    if($responsable[$i]==null){
                        $evaluado[$i]=false;
                    }else{
                        $evaluado[$i]=true;
                    }
                }else{
                    $notas[$i]='';
                }    
            }
        }else{
            for($i=1;$i<=3;$i++){
                $yearUnion = $program->yearUnions->where('evaluation_id',$i)->first();
                if($yearUnion != null){
                    $notas[$i]=$yearUnion->notes;
                    $fechas[$i]=$yearUnion->date_check;
                    $responsable[$i]=$yearUnion->responsable_id;
                    $responsable[$i]=User::find($responsable[$i]);
                    if($notas[$i]==null){
                        $notas[$i]='';
                    }
                    if($fechas[$i]==null){
                        $evaluado[$i]=false;
                    }else{
                        $evaluado[$i]=true;
                    }
                    if($responsable[$i]==null){
                        $evaluado[$i]=false;
                    }else{
                        $evaluado[$i]=true;
                    }
                }else{
                    $notas[$i]='';
                }    
            }
        }
        $responsables = User::all();
        return view('programs.show',compact('program','evaluables','editar','evaluadoEditar_id', 'listaEvaluables','responsable','fechas','notas','usuario','evaluado'));
    }
    public function editarAspecto($program_id, $id){
        $usuario = Auth::user();
        $program = Program::findorfail($program_id);
        $evaluables = Evaluable::all();
        $evaluadoEditar_id = $id;
        $editar=true;
        $MisEvaluables = $program->evaluables;
        $listaEvaluables=[];
        $responsable=null;
        $fechas=null;
        $notas=null;
        $evaluado=['1'=>false, '2'=>false, '3'=>false];
        foreach($evaluables as $evaluable){
            $encontrado = false;
            foreach($MisEvaluables as $MiEvaluable){
                if($evaluable->id == $MiEvaluable->id){
                    $encontrado=true;
                    break;
                }
            }
            if(!$encontrado){
                array_push($listaEvaluables,$evaluable);
            }
        }
        if($yearUnion->course->level == 1){
            for($i=1;$i<=4;$i++){
                $yearUnion = $program->yearUnions->where('evaluation_id',$i)->first();
                if($yearUnion != null){
                    $notas[$i]=$yearUnion->notes;
                    $fechas[$i]=$yearUnion->date_check;
                    $responsable[$i]=$yearUnion->responsable_id;
                    $responsable[$i]=User::find($responsable[$i]);
                    if($notas[$i]==null){
                        $notas[$i]='';
                    }
                    if($fechas[$i]==null){
                        $evaluado[$i]=false;
                    }else{
                        $evaluado[$i]=true;
                    }
                    if($responsable[$i]==null){
                        $evaluado[$i]=false;
                    }else{
                        $evaluado[$i]=true;
                    }
                }else{
                    $notas[$i]='';
                }    
            }
        }else{
            for($i=1;$i<=3;$i++){
                $yearUnion = $program->yearUnions->where('evaluation_id',$i)->first();
                if($yearUnion != null){
                    $notas[$i]=$yearUnion->notes;
                    $fechas[$i]=$yearUnion->date_check;
                    $responsable[$i]=$yearUnion->responsable_id;
                    $responsable[$i]=User::find($responsable[$i]);
                    if($notas[$i]==null){
                        $notas[$i]='';
                    }
                    if($fechas[$i]==null){
                        $evaluado[$i]=false;
                    }else{
                        $evaluado[$i]=true;
                    }
                    if($responsable[$i]==null){
                        $evaluado[$i]=false;
                    }else{
                        $evaluado[$i]=true;
                    }
                }else{
                    $notas[$i]='';
                }    
            }
        }
        
        return view('programs.show',compact('program','evaluables','editar','evaluadoEditar_id','listaEvaluables','responsable','fechas','notas','usuario','evaluado'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editar=true;
        $programacion = Program::find($id);
        $programs = Program::all();
        $profesores = DB::table('users')->where('role_id', 2)->get();
        $subjects = Subject::all();
        return view('programs.create',compact('programs','profesores','subjects','editar','programacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'professor_id'=>'required',
            'user_id'=>'required',
            'subject_id'=>'required',
            'name'=>'required'
        ]);

        $profesor = User::find($request->get('professor_id'));
        $responsable = User::find($request->get('user_id'));
        $asignatura = Subject::find($request->get('subject_id'));

        $program = Program::find($id);

        $program->name = $request->get('name');
        $program->professor()->associate($profesor);
        $program->responsable()->associate($responsable);
        $program->subject()->associate($asignatura);

        $program->save();
        return redirect('/programs');

    }
    public function storeEvaluacion(Request $request, $id){

        $request->validate([
            'notes'=>'required',
            'date_check'=>'required',
            'eval'=>'required',
        ]);

        $user = Auth::user();
        $notes = $request->get('notes');
        $date_check = $request->get('date_check');
        $evaluation_id= $request->get('eval');

        $program = Program::find($id);
        $yearUnion = $program->yearUnions->where('evaluation_id',$evaluation_id)->first();
        $yearUnion->responsable()->associate($user);
        $yearUnion->date_check = $date_check ;
        $yearUnion->notes = $notes;
        $yearUnion->save();

        return redirect('/programs/'.$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::find($id);
        $program->delete();

        return redirect('/programs');
    }

    public function destroyUnit($program_id, $id)
    {

        $unit = Unit::find($id);
        $unit->delete();

        return redirect('/programs/'.$program_id);

    }
    public function destroyAspecto($program_id,$id)
    {

        $aspecto = Evaluated::find($id);
        $aspecto->delete();
        return redirect('/programs/'.$program_id);

    }
}
