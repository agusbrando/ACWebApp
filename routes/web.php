<?php

use Illuminate\Support\Facades\Route;
use App\Models\Misbehavior;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/login', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prueba', function () {

    $user_id=1;
    $typeFaltaAsistencia = 1;
    $faltas = Misbehavior::all()->where('user_id',$user_id)->where('type_id',$typeFaltaAsistencia);

    
    $lista = [];

    foreach($subjects as $subject){

        $timetables = $subject->timetables;
        $count = 0;
        foreach($timetables as $timetable){
            $misbehaviours= Misbehavior::all()->where('session_timetable_id',$timetable->id);
            if($misbehaviours!=null){
                foreach($misbehaviours as $misbehaviour){
                    if($misbehaviour->user_id == $user_id){
                        $count = $count + 1;
                    }
                }

            }
            
        }
        $elemento = ['asignatura'=> $subject->name, 'faltas'=>$count, 'max'=>$subject->maxFaltas];

        array_push($lista, $elemento);

    }

    echo $lista;

});

Route::resource('units', 'UnitController');
Route::resource('notesPercentages', 'NotesPercentagesController');
Route::resource('programs', 'ProgramController');
Route::post('programs/{id}/unit','ProgramController@storeUnit')->name('programs.storeUnit');
Route::post('programs/{id}/aspecto','ProgramController@storeAspecto')->name('programs.storeAspecto');
Route::patch('programs/{program_id}/unit/{id}','ProgramController@updateUnit')->name('programs.updateUnit');
Route::patch('programs/{program_id}/aspecto/{id}','ProgramController@updateAspecto')->name('programs.updateAspecto');
Route::delete('programs/{program_id}/unit/{id}','ProgramController@destroyUnit')->name('programs.destroyUnit');
Route::delete('programs/{program_id}/aspecto/{id}','ProgramController@destroyAspecto')->name('programs.destroyAspecto');
