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
     * Esta es la vista principal donde se listarán todos los cursos.
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
     * Creamos un nuevo curso .
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
     * Guardamos el curso en la Base de datos.
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

        $yearUnions = YearUnion::select('id','evaluation_id', 'subject_id')->where('course_id', $courseId)->where('year_id', $yearId)->distinct()->get()->load('evaluation', 'subject');
        $subject_ids = array();
        foreach($yearUnions as $yearUnion){
            if( !in_array($yearUnion->subject_id, $subject_ids) ){
                array_push($subject_ids, $yearUnion->subject_id);
            }
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
       
        //Subjects Tab
        $subjects = Subject::whereIn('id', $subject_ids)->get();

        //Items Tab
        $items = Item::all();
        $types = Type::where('model', Item::class);
        $classrooms = Classroom::all();

        return view('courses.show', compact( 'classrooms', 'types','yearUnions', 'items', 'subjects', 'yearId', 'courseId'));

    }

    /**
     * Aqui pasamos dos atributos y cargamos un curso en la vista de editar.
     *
     * @param  int  $courseId
     * @param int $yearId
     * @return \Illuminate\Http\Response
     */
    public function edit($courseId, $yearId)
    {
        $yearUnionUsers = User::all()->join('yearUnionUsers', 'user_id', '=', 'yearUnionUsers.user_id');

        return view('courses.edit', compact( 'yearUnionUsers'));
    }

    /**
     * El boton de la vista edit hara que actualice los datos de un curso específico en la base de datos.
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
     * Hacemos un softDelete del curso en la base de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::find($id)->delete();

        return redirect('/courses')->with('exito', 'Curso eliminado!');
    }

    /**
     * Esto nos llevará a la vista de detalle del item cuando le hagamos click en la tabla.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showItem($id)
    {
        $item = Item::find($id);
        $type = Type::find($item->type_id);
        $users = User::all();
        $courses = Course::all();

        return view('items.show', compact('item', 'type', 'users', 'courses'));
    }
}
