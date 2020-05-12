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
use App\Models\YearUnion;

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
        //
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
     * redirigimos un curso al show para mostrar los detalles
     *
     * @param  int  $courseId
     * @param  int  $yearId
     * 
     * @return \Illuminate\Http\Response
     */
    public function show($courseId, $yearId)
    {
        $yearUnion = YearUnion::where('course_id', $courseId)->where('year_id', $yearId)->first(); 
        $types = Type::all()->where('model', Item::class);
        $classrooms = Classroom::all();    //->load('name', Classroom::class)
        $states = State::all();
        $items = Item::all();
  
        return view('courses.show', compact( 'yearUnion', 'classrooms', 'items', 'types', 'states'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }
}
