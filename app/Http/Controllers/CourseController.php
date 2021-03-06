<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;

use App\Models\Classroom;
use App\Models\Course;
use App\Models\CourseSubject;
use App\Models\Type;
use App\Models\State;
use App\Models\Item;
use App\Models\User;
use App\Models\Year;
use App\Models\Evaluation;
use App\Models\ItemYear;
use App\Models\Subject;
use App\Models\YearUnion;
use App\Models\YearUnionUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{

    public function __construct(Request $request)
    {
        $user = Auth::user();
        if ($user != null) {
            $notifications = $user->unreadNotifications;
            $countNotifications = $user->unreadNotifications->count();
        } else {
            $notifications = [];
            $countNotifications = 0;
        }

        $request->session()->put('notifications', $notifications);
        $request->session()->put('countNotifications', $countNotifications);
    }

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
    // CREATE PASO 1
    /**
     * Creamos un nuevo curso .
     *
     * @return \Illuminate\Http\Response
     */
    public function createPaso1()
    {
        //Cojo los diferentes datos de estas tablas para mostrarlos en los desplegables

        $years = Year::orderBy("date_start", "DESC")->get();

        return view('courses.createPaso1', compact('years'));
    }

    // CREATE PASO 2
    /**
     * Creamos un nuevo curso 
     * Recibo los datos del paso anterior
     *
     * @return \Illuminate\Http\Response
     */
    public function createPaso2(Request $request)
    {
        //Cojo los diferentes datos de estas tablas para mostrarlos en los desplegables
        $courses = Course::all();
        $yearSeleccionado = $request->get('selectYear_id');
        $nuevoYear = $request->get('nuevoYearTextInput');

        if ($yearSeleccionado != null || $yearSeleccionado != "" || $nuevoYear != null || $nuevoYear != "") { //Si no hay nada vacio

            if ($yearSeleccionado == null && $nuevoYear != null || $yearSeleccionado == "" && $nuevoYear != "") {
                //Si no ha seleccionado un year comprueba si ha rellenado el formulario para crear el year nuevo
                if ($request->validate([
                    'nuevoYearTextInput' => 'required',
                    'date_inicio' => 'required',
                    'date_fin' => 'required',
                ])) {
                    $nuevoYearTextInput = $request->get('nuevoYearTextInput'); //Id del year recogido
                    //Compruebo que no exista en la BD
                    $year = Year::where('name',$nuevoYearTextInput)->first();
                    
                    if( $year== null){
                        
                        //Si no existe creo el nuevo year
                        DB::table('years')->insert([
                            'name' => $request->get('nuevoYearTextInput'),
                            'date_start' => $request->get('date_inicio'),
                            'date_end' => $request->get('date_fin'),
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                        $year = Year::orderBy("id", "DESC")->first();
                        return view('courses.createPaso2', compact('year','courses'));
                    }else{
                        //ya existe el year
                        return view('courses.createPaso2', compact('year','courses'));
                    }

                } else {
                    return redirect('courses/createPaso1')->with('error', 'No se ha completado correctamente el formulario');
                }
            } elseif ($yearSeleccionado != null && $nuevoYear == null || $yearSeleccionado != "" && $nuevoYear == "") {
                //Si entra aqui es porque ha seleccionado un year
                $year = Year::find($yearSeleccionado);
                return view('courses.createPaso2', compact('year','courses'));
            } else {
                return redirect()->back()->with(['errors', 'No has seleccionado o creado ningún año']);
            }

        }elseif($yearSeleccionado == null || $nuevoYear == null || $yearSeleccionado == "" || $nuevoYear == "") {

            if ($yearSeleccionado == null && $nuevoYear != null || $yearSeleccionado == "" && $nuevoYear != "") {

                //Si no ha seleccionado un year comprueba si ha rellenado el formulario para crear el year nuevo
                if ($request->validate([
                    'nuevoYearTextInput' => 'required',
                    'date_inicio' => 'required',
                    'date_fin' => 'required',
                ])) {
                    //creo el nuevo year
                    DB::table('years')->insert([
                        'name' => $request->get('nuevoYearTextInput'),
                        'date_start' => $request->get('date_inicio'),
                        'date_end' => $request->get('date_fin'),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    $year = Year::orderBy("id", "DESC")->first();
                    return view('courses.createPaso2', compact('year','courses'));
                } else {
                    return redirect('courses/createPaso1')->with('error', 'No se ha completado correctamente el formulario');
                }
            } elseif ($yearSeleccionado != null && $nuevoYear == null || $yearSeleccionado != "" && $nuevoYear == "") {
                $year = Year::find('yearSeleccionado');
                return view('courses.createPaso2', compact('year','courses'));
            } else {
                return redirect()->back()->with(['errors', 'No has seleccionado o creado ningún año']);
            }
        }else{
            return redirect()->back()->with(['errors', 'Los parámetros introducidos son erróneos']);
        }
    }

    // CREATE PASO 3
    /**
     * Creamos un nuevo curso .
     *
     * @return \Illuminate\Http\Response
     */
    public function createPaso3($yearId, Request $request)
    {

        $cursosRecibidos = $request->get('cursos');

        //Cojo los cursos y sus asignaturas
        $i = 0;
        $courses= array();

        if($cursosRecibidos != null){ //Si no es nulo recoge todos los cursos que ha recibido si no se pasa vacio
            for($j = 0; count($cursosRecibidos) < 0; $j++){
                $courses[$j] = $cursosRecibidos[$j];
            }
            
            $subjects = Subject::all();
            foreach ($courses as $course) {
                $courseSubjects = CourseSubject::where('course_id', $course->id)->get();
                $asignaturas = array();
                foreach ($courseSubjects as $courseSubject) {
                    foreach ($subjects as $subject) {
                        if ($subject->id == $courseSubject->subject_id) {
                            $asignaturas[$i] = $subject;
                            $i = $i + 1;
                        }
                    }
                }
                $course->asignaturas = $asignaturas;
            }
        }

        //Cojo los diferentes datos de estas tablas para mostrarlos en los desplegables
        $classrooms = Classroom::all();
        $users = User::all();
        $subjects = Subject::all();
        $evaluations = Evaluation::all();
        $years = Year::orderBy("date_start", "DESC")->get();

        return view('courses.createPaso3', compact('classrooms', 'courses', 'users', 'subjects', 'evaluations', 'years'));
    }

    /**
     * Guardamos el curso en la Base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePaso3(Request $request)
    {
        for ($i = 1; $i <= 3; $i++) {
            $curso = Course::where('id', $request->get('course'));

            $fechasInicioFin = [];
            $year = 1;
            array_push($fechasInicioFin, ['date_start' => $request->get('eval_1_date_start'), 'date_end' => $request->get('eval_1_date_end')]); //1ºEVAL
            array_push($fechasInicioFin, ['date_start' => $request->get('eval_2_date_start'), 'date_end' => $request->get('eval_2_date_end')]); //2ºEVAL
            array_push($fechasInicioFin, ['date_start' => $request->get('eval_3_date_start'), 'date_end' => $request->get('eval_3_date_end')]); //3ºEVAL

            foreach ($curso->subjects as $j => $subject) {
                DB::table('yearUnions')->insert([
                    'subject_id' => $subject->id,
                    'course_id' => $curso->id,
                    'evaluation_id' => $i,
                    'year_id' => $year,
                    'date_start' => $fechasInicioFin[$i - 1]['date_start'],
                    'date_end' => $fechasInicioFin[$i - 1]['date_end'],
                    'classroom_id' => $j + 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            if ($curso->level == 2) {
                if ($i == 2) {
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

        $course = Course::find($courseId);
        $yearUnionsPrueba = YearUnion::where('course_id', $courseId)->where('year_id', $yearId)->where('subject_id', $course->subjects->first()->id)->get();
        $yearUnionPrograms = YearUnion::where('course_id', $courseId)->where('year_id', $yearId)->where('evaluation_id', 1)->get();
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
        $itemUsers = array();

        $itemYear = ItemYear::select('item_id')->get()->toArray();
        $items = Item::where('classroom_id', $yearUnionsPrueba->first()->classroom->id)->whereNotIn('id', $itemYear)->get();


        $types = Type::where('model', Item::class);
        $classrooms = Classroom::all();

        return view('courses.show', compact('classrooms', 'types', 'yearUnions', 'items', 'subjects', 'yearId', 'courseId', 'yearUnionsPrueba', 'yearUnionPrograms'));
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
        $subjects = Subject::all();
        $classrooms = Classroom::all();
        $courses = Course::all();
        $evaluations = Evaluation::all();
        $years = Year::all();

        return view('courses.edit', compact('yearUnionUsers', 'subjects', 'classrooms', 'courses', 'evaluations', 'years'));
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
        foreach ($yearUnions as $yearUnion) {
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
            'itemIds' => 'required'
        ]);
        //Busco el curso del alumno
        $yearUnions = User::find($userId)->yearUnions;

        //Cojo el array de Ids del multi select
        $itemIds = $request->get('itemIds');

        //Cojo los items con los ids del array
        $itemsUser = Item::whereIn('id', $itemIds)->get();

        foreach ($yearUnions as $yearUnion) {
            foreach ($itemsUser as $item) {
                //compruebo que el alumno sea presencial
                if ($yearUnion->pivot->assistance) {
                    //si es presencial le asigno el Item
                    $yearUnion->pivot->items()->attach($item->id);
                }
            }
        }

        $courseId = $courseId;
        $yearId = $yearId;

        return redirect('courses/show/' . $courseId . '/' . $yearId);
    }
    public function imprimir($courseId, $yearId)
    {

        $course = Course::find($courseId);
        //Cojo las evaluaciones
        $yearUnions = YearUnion::where('course_id', $courseId)->where('year_id', $yearId)->where('subject_id', $course->subjects->first()->id)->get();


        $pdf = \PDF::loadView('courses.pdf', compact('yearUnions'))->setPaper('a4', 'landscape');
        return $pdf->download('courses.pdf');
    }
    public function asignarAsignaturas()
    {
        $i = 0;
        $courses = Course::all();
        $subjects = Subject::all();
        foreach ($courses as $course) {
            $courseSubjects = CourseSubject::where('course_id', $course->id)->get();
            $asignaturas = array();
            foreach ($courseSubjects as $courseSubject) {
                foreach ($subjects as $subject) {
                    if ($subject->id == $courseSubject->subject_id) {
                        $asignaturas[$i] = $subject;
                        $i = $i + 1;
                    }
                }
            }
            $course->asignaturas = $asignaturas;
        }


        return view('courses.asignarAsignaturas', compact('courses'));
    }
}
