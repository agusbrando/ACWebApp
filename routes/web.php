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



<<<<<<< HEAD
Route::get('/login', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Route::resource('asignaturas', 'AsignaturaController');
Route::resource('porcentajes', 'PorcentajesController');
Route::resource('evaluaciones', 'EvaluacionesController');
Route::resource('desglose', 'DesgloseController');
Route::get('porcentajes/evaluacion/{id}', 'PorcentajesController@index');
Route::get('porcentajes/create/{id}', 'PorcentajesController@create');
Route::get('porcentajes/edit/{id_subject}/{id_eval}/{id_type}', 'PorcentajesController@edit');
=======

// Route::get('/login', function () {
//     return view('login');
// });
//  Route::get('/', function () {   
//      return view('auth.login');
//  });

Route::resource('permissions','PermissionController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index');
>>>>>>> master_javiamdazo
