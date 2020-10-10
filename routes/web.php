<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
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

Route::get('/', 'App\Http\Controllers\TasksController@index');
Route::post('/handlers/tasks/add', 'App\Http\Controllers\TasksController@addOrEdit');
Route::post('/handlers/tasks/edit', 'App\Http\Controllers\TasksController@addOrEdit');
Route::get('/handlers/tasks/status', 'App\Http\Controllers\TasksController@changeStatus');
Route::get('/handlers/tasks/delete', 'App\Http\Controllers\TasksController@delete');
