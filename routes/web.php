<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::resource('posts', 'PostController');
Route::resource('comments', 'CommentController');
Route::resource('attachments', 'AttachmentController');
Route::resource('permissions','PermissionController');

Route::get('attachments', 'AttachmentController@create');
Route::post('attachments', 'AttachmentController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/stock', function () {
    return view('stock');
});
Route::get('/', 'HomeController@index');
    



Route::post('/items/filter', 'ItemController@filter');
Route::resource('items', 'ItemController');
