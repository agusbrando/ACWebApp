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




// Route::get('/login', function () {
//     return view('login');
// });
//  Route::get('/', function () {   
//      return view('auth.login');
//  });



Auth::routes();

Route::resource('permissions','PermissionController');
// Route::get('/permissions', 'PermissionController@index')->name('permissions');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users','UserController');
Route::get('users/edit/{id}',['as' => 'users.showedit', 'uses' => 'UserController@show']);
Route::get('users/store/{id}',['as' => 'users.store', 'uses' => 'UserController@store']);

Route::get('/', 'HomeController@index');