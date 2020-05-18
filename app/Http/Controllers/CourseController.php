<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
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
        foreach ($years as $year) {
            $year->yearUnions = YearUnion::select('year_id', 'course_id', 'name', 'level', 'num_students')->where('year_id', $year->id)->distinct()->join('courses', 'course_id', '=', 'courses.id')->get();
        }

        return view('courses.index', compact('years'));
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

        return view('courses.create', compact('classrooms', 'courses', 'users', 'subjects', 'evaluations', 'years'));
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
        $courseId = $courseId;
        $yearId = $yearId;
        $classrooms = Classroom::all();

        return view('courses.show', compact('classrooms', 'courseId', 'yearId'));
    }
    /**
     * Aqui filtramos las evaluaciones dependiendo del aula
     *
     * @param  Request request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request, $courseId, $yearId)
    {
        //Definimos que obtendrá objetos de la tabla items
        $query = DB::table('items');

        //cogemos los valores de los selects
        $idClass = $request->get('idClass');

        //Controlamos que si no llega null haga una consulta obteniendo los item 
        //que tenga dicho id del aula.
        //Los resultados de cada consulta se va concatenando en $query
        if ($idClass != "") {
            $query = $query->where('classroom_id', $idClass);
            
            $items = $query->get();
        }else{
            $items = Item::all();
        }
        //Finalmente obtenemos todos los items que han pasado los filtros
        $yearUnions = YearUnion::select('id', 'evaluation_id')->where('course_id', $courseId)->where('year_id', $yearId)->distinct()->get()->load('evaluation');
        foreach ($yearUnions as $yearUnion) {
            $yearUnion->yearUnionUsers = YearUnionUser::where('year_union_id', $yearUnion->id)->where('assistance',1)->get()->load('items', 'user');
            $registrados = array();
            foreach ($yearUnion->yearUnionUsers as $yearUnionUser) {

                //Aseguramos que no se repitan los usuarios
                if (!in_array($yearUnionUser->user_id, $registrados)) {
                    array_push($registrados, $yearUnionUser->user_id);
                    $yearUnionUser->items = $yearUnionUser->items;
                    $yearUnionUser->user = $yearUnionUser->user;
                } else {
                    $yearUnion->yearUnionUsers->pull($yearUnionUser->id);
                }
            }
        }

        //Filtro para coger solo los typos del modelo Item
        $types = Type::all()->where('model', Item::class);
        $classrooms = Classroom::all();
        $states = State::all();
      
        return view('courses.filter', compact('classrooms', 'items', 'types', 'states', 'yearUnions'));
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

        return view('courses.edit', compact('yearUnionUsers'));
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
    public function destroy($courseId, $yearId)
    {
        //cojo todos los year union con ese año y curso
        $yearUnions = YearUnion::where('course_id', $courseId)->where('year_id', $yearId)->get();
        foreach($yearUnions as $yearUnion){
            //y los voy eliminando
            $yearUnion->delete();
        }

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
        $item->aula = Classroom::find($item->classroom_id);
        $item->state = State::find($item->state_id);
        $item->type = Type::find($item->type_id);
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

        // $item_id1 = 1;
        // $item_id2 = 2;

        //Busco el curso del alumno
        $yearUnions = User::find($userId)->yearUnions;

        //crear for en un futuro si hay un multi select
        // $items = [Item::find($item_id1), Item::find($item_id2)];
        
        //Cojo el item que voy a asignar
        $item = Item::find($itemId);

        
        foreach ($yearUnions as $yearUnion) {
            foreach ($item as $item) {
                //compruebo que el alumno sea presencial
                if ($yearUnion->pivot->assistance) {
                    //si es presencial le asigno el Item
                    $yearUnion->pivot->items()->attach($item->id);
                }
            }
        }

        return view('courses.filter', compact('item'));
    }
}
