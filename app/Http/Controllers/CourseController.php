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
     * Esta es la vista principal donde se listarán todos los cursos por años.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Cojo los años odenados para que salga el más reciente primero
        $years = Year::orderBy("date_start", "DESC")->get(); 
        //Recorro todos los años para guardar en el todos los cursos que se han impartido
        foreach($years as $year){
            //Guardo los diferentes yearUnion en cada año
            $year->yearUnions = YearUnion::select('year_id', 'course_id', 'name', 'level', 'num_students')
            ->where('year_id', $year->id)->distinct()->join('courses', 'course_id', '=', 'courses.id')->get();
        }
        // Aquí le redirijes a la vista y le pasas los datos que quieres, 
        //en este caso, le redirijo a la vista index y le paso los años con los cursos
        return view('courses.index', compact( 'years'));
    }

    /**
     * Creamos un nuevo curso .
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Cojo los diferentes datos de estas tablas para mostrarlos en los desplegables
        $classrooms = Classroom::all(); 
        $courses = Course::all(); 
        $users = User::all();
        $subjects = Subject::all();
        $evaluations = Evaluation::all();
        $years = Year::orderBy("date_start", "DESC")->get();
        //devuelvo la vista del formulario para crearlo
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
        
        $items = Item::all();
        $types = Type::where('model', Item::class);
        $classrooms = Classroom::all(); 
        
        return view('courses.show', compact( 'classrooms', 'types','yearUnions', 'items'));

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

    /**
     * Esto asignará un item al usuario cuando de le demos al boton de asignar item de la vista show del curso
     *
     * @param  int  $itemId
     * @param  int  $userId
     * @param  int  $yearUnionId
     * 
     * @return \Illuminate\Http\Response
     */
    public function responsabilizarItem($itemId, $userId, $yearUnionId)
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
        
        $items = Item::all();
        $types = Type::where('model', Item::class);
        $classrooms = Classroom::all(); 
        



        $item = Item::find($id);
        $users = User::all();

        return view('items.show', compact('item', 'type', 'users', 'courses'));
    }
}
