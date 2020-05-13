<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\Classroom;
use App\Models\Course;
use App\Models\Type;
use App\Models\State;
use App\Models\Item;
use App\Models\User;
use App\Models\Year;
use App\Models\Evaluation;
use App\Models\Subject;
use App\Models\YearUnion;
use App\Models\YearUnionUser;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years = Year::orderBy("date_start", "DESC")->get(); //Ordeno los años para que salga el más reciente primero
        foreach($years as $year){
            $year->yearUnions = YearUnion::select('year_id', 'course_id', 'name', 'level', 'num_students')->where('year_id', $year->id)->distinct()->join('courses', 'course_id', '=', 'courses.id')->get();
        }
  
        return view('courses.index', compact( 'years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classrooms = Classroom::all(); 
        $courses = Course::all(); 
        $users = User::all();
        $subjects = Subject::all();
        $evaluations = Evaluation::all();
        $years = Year::orderBy("date_start", "DESC")->get();

        return view('courses.create', compact('classrooms', 'courses', 'users', 'subjects', 'evaluations','years'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Redirigimos un curso al show para mostrar los detalles
     *
     * @param  int  $courseId
     * @param  int  $yearId
     * 
     * @return \Illuminate\Http\Response
     */
    public function show($courseId, $yearId)
    {

        $yearUnions = YearUnion::select('id','evaluation_id')->where('course_id', $courseId)->where('year_id', $yearId)->distinct()->get()->load('evaluation'); 
        foreach($yearUnions as $yearUnion){
            $yearUnion->yearUnionUsers = YearUnionUser::where('year_union_id', $yearUnion->id)->get()->load('items', 'user');
            $registrados = array();
            foreach($yearUnion->yearUnionUsers as $yearUnionUser){


                //Aseguramos que no se repitan los usuarios
                if( !in_array($yearUnionUser->user_id, $registrados) ){
                    array_push($registrados, $yearUnionUser->user_id);
                    $yearUnionUser->items = $yearUnionUser->items;
                    $yearUnionUser->user = $yearUnionUser->user;
                }else{
                    $yearUnion->yearUnionUsers->pull($yearUnionUser->id);
                }
                
            }
        }
        

        $types = Type::where('model', Item::class);
        $classrooms = Classroom::all();  
        
        // $items = Item::all();
        // $users = User::all();
        // $yearUnionUsers = User::all()->join('yearUnionUsers', 'user_id', '=', 'yearUnionUsers.user_id');
        
        

        return view('courses.show', compact( 'classrooms', 'types','yearUnions'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($courseId, $yearId)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::find($id)->delete();

        return redirect('/courses')->with('exito', 'Curso eliminado!');
    }
}
