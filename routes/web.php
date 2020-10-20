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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'TodoController@index')->name('home');
Route::resource('/todo', 'TodoController');
Route::post('/todo/search', 'TodoController@search')->name('todo.search');
Route::put('/todo/sort/name/asc', 'TodoController@sortNameAsc')->name('sort.name.asc');
Route::put('/todo/sort/name/desc', 'TodoController@sortNameDesc')->name('sort.name.desc');