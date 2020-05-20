<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
        //Cojo los años odenados para que salga el más reciente primero
        $years = Year::orderBy("date_start", "DESC")->get();
        //Recorro todos los años para guardar en el todos los cursos que se han impartido
        foreach ($years as $year) {
            //Guardo los diferentes yearUnion en cada año
            $year->yearUnions = YearUnion::select('year_id', 'course_id', 'name', 'level', 'num_students')
                ->where('year_id', $year->id)->distinct()->join('courses', 'course_id', '=', 'courses.id')->get();
            
        }
        // Aquí le redirijes a la vista y le pasas los datos que quieres,
        //en este caso, le redirijo a la vista index y le paso los años con los cursos
        return view('courses.index', compact('years'));
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
        for($i=1; $i<=3; $i++){
            $cursos = $request->get('course');
            
            $fechasInicioFin =[];
            $year=1;
            array_push($fechasInicioFin,['date_start'=> $request->get('eval_1_date_start'), 'date_end'=>$request->get('eval_1_date_end')]);//1ºEVAL
            array_push($fechasInicioFin,['date_start'=> $request->get('eval_2_date_start'), 'date_end'=>$request->get('eval_2_date_end')]);//2ºEVAL
            array_push($fechasInicioFin,['date_start'=> $request->get('eval_3_date_start'), 'date_end'=>$request->get('eval_3_date_end')]);//3ºEVAL
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

    /**
     * Redirigimos un curso al show para mostrar los detalles
     *
     * @param  int  $courseId
     * @param  int  $yearId
     *
     * @return \Illuminate\Http\Response
     */
    public function show($courseId, $yearId, Request $request)
    {
        $request->session()->put('course_id', $courseId);
        $request->session()->put('year_id', $yearId);
        $yearUnions = YearUnion::select('id', 'evaluation_id', 'subject_id')->where('course_id', $courseId)->where('year_id', $yearId)->distinct()->get()->load('evaluation', 'subject');
        $subject_ids = array();
        foreach ($yearUnions as $yearUnion) {
            if (!in_array($yearUnion->subject_id, $subject_ids)) {
                array_push($subject_ids, $yearUnion->subject_id);
            }
            $yearUnion->yearUnionUsers = YearUnionUser::where('year_union_id', $yearUnion->id)->get()->load('items', 'user');
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

        //Subjects Tab
        $subjects = Subject::whereIn('id', $subject_ids)->get();

        //Items Tab
        $items = Item::all();
        $types = Type::where('model', Item::class);
        $classrooms = Classroom::all();

        return view('courses.show', compact('classrooms', 'types', 'yearUnions', 'items', 'subjects', 'yearId', 'courseId'));
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
        } else {
            $items = Item::all();
        }
        //Finalmente obtenemos todos los items que han pasado los filtros
        $yearUnions = YearUnion::select('id', 'evaluation_id')->where('course_id', $courseId)->where('year_id', $yearId)->distinct()->get()->load('evaluation');
        foreach ($yearUnions as $yearUnion) {
            $yearUnion->yearUnionUsers = YearUnionUser::where('year_union_id', $yearUnion->id)->where('assistance', 1)->get()->load('items', 'user');
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
        $courseId = $courseId;
        $yearId = $yearId;

        return view('courses.filter', compact('classrooms', 'items', 'types', 'states', 'yearUnions', 'courseId', 'yearId', 'idClass'));
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
     * @param  int  $courseId
     * @param  int  $yearId
     * @return \Illuminate\Http\Response
     */
    public function destroy($courseId, $yearId)
    {
        //cojo todos los year union con ese año y curso
        $yearUnion = YearUnion::where('course_id', $courseId)->where('year_id', $yearId)->first();

        //y los voy eliminando
        $yearUnion->delete();


        return redirect('courses.index')->with('exito', 'Curso eliminado!');
    }
    /**
     * Hacemos un softDelete del curso en la base de datos.
     *
     * @param  int  $courseId
     * @param  int  $yearId
     * @return \Illuminate\Http\Response
     */
    public function eliminarYearUnion($courseId, $yearId)
    {
        //cojo todos los year union con ese año y curso
        $yearUnions = YearUnion::where('course_id', $courseId)->where('year_id', $yearId)->get();

        //y los voy eliminando
        foreach($yearUnions as $yearUnion){
            $yearUnion->delete();
        }
        


        return redirect('courses')->with('exito', 'Curso eliminado!');
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
     * Vuelvo a pasar todos los datos en el compact porque si no no puedo cargar los diferentes selects
     *
     * @param  int  $itemId
     * @param  int  $userId
     * @param  int  $yearUnionId
     *
     * @return \Illuminate\Http\Response
     */
    public function responsabilizarItem(Request $request, $userId, $courseId, $yearId)
    {
        $request->validate([
            'idClass2' => 'required',
            'itemIds' => 'required'
        ]);
        $idClass = $request->get('idClass2');
        //Busco el curso del alumno
        $yearUnions = User::find($userId)->yearUnions;

        if ($idClass != "") {

            $items = Item::where('classroom_id', $idClass)->get();
        } else {
            $items = Item::all();
        }
        //Cojo el array de Ids del multi select
        $itemIds = $request->get('itemIds');

        //Cojo los items con los ids del array
        $itemsUser = Item::whereIn('id', $itemIds)->get();
        $classId = Classroom::find($idClass);

        foreach ($yearUnions as $yearUnion) {
            foreach ($itemsUser as $item) {
                //compruebo que el alumno sea presencial
                if ($yearUnion->pivot->assistance) {
                    //si es presencial le asigno el Item
                    foreach ($itemIds as $itemId) {
                        $encontrado = false;
                        //Compruebo que no tenga ese item ya añadido
                        foreach ($yearUnion->pivot->items as $itemUser) {
                            if ($itemUser->id == $itemId) {
                                $encontrado = true;
                                break;
                            }
                        }
                        if (!$encontrado) {

                            $yearUnion->pivot->items()->attach($item->id);
                        }
                    }
                }
            }
        }



        $yearUnions = YearUnion::select('id', 'evaluation_id')->where('course_id', $courseId)->where('year_id', $yearId)->distinct()->get()->load('evaluation');
        foreach ($yearUnions as $yearUnion) {
            $yearUnion->yearUnionUsers = YearUnionUser::where('year_union_id', $yearUnion->id)->where('assistance', 1)->get()->load('items', 'user');
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

        $types = Type::all()->where('model', Item::class);
        $classrooms = Classroom::all();
        $states = State::all();
        $courseId = $courseId;
        $yearId = $yearId;

        return view('courses.filter', compact('classrooms', 'items', 'types', 'states', 'yearUnions', 'courseId', 'yearId', 'idClass'));
    }
}
