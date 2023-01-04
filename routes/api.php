<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller('\App\Http\Controllers\Api\AuthController')->group(function () {
    Route::post('login', 'login'); // login
});

Route::controller('\App\Http\Controllers\Api\UserController')->group(function () {
    Route::post('register', 'register');
});
Route::resource('user', '\App\Http\Controllers\Api\UserController')->only([
    'index', 'show', 'update', "destroy"
]);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout', '\App\Http\Controllers\Api\AuthController@logout'); //logout
});
