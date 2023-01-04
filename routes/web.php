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

Route::get('/task-1/{start}/{end}', [App\Http\Controllers\TaskController::class, 'task1']);
Route::get('/task-2/{inputString}', [App\Http\Controllers\TaskController::class, 'task2']);
