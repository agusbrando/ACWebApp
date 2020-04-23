<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/calendar/{mes}','CalendarController@index_month');
// Route::get('/calendar','CalendarController@index');

Route::resource('calendar', 'CalendarController');

// Route::post('/event/store','CalendarController@store');
// Route::post('/event/create','CalendarController@create');
// Route::put('/event/destroy/{id}','CalendarController@destroy');
// Route::put('/event/update','CalendarController@update');
// Route::get('/event/details/{id}','CalendarController@details');


 Route::resource('event', 'CalendarController');


Route::get('/login', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/models', function () {

    $role = 1;

    echo '*Usuarios con el id_role '.$role.'*<br>';
    $users = App\Models\Role::find($role)->users;

    foreach ($users as $user) {
        echo ($user->first_name).'<br>';
    }

    echo'<br>';

    $idUser = 3;

    echo '*Rol del usuario con id '.$idUser.'*<br>';

    $user = App\Models\User::find($idUser);

    echo $user->role->name;

});
