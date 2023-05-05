<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/cursos', function () {
//     Route::apiResource('estudantes', StudentController::class);
//     Route::apiResource('professor', StudentController::class);
// })->middleware('auth');

Route::resource('estudantes', StudentController::class);
Route::apiResource('professores', TeacherController::class)->middleware('auth');
Route::resource('login', LoginController::class);
Route::post('authentification', [AuthController::class, 'login']);
//Route::resource('login', AuthController::class);
//Route::post('/authetificacion', [AuthController::class, 'login']);

// Route::group([

//     'middleware' => 'api',
//     'prefix' => 'auth'

// ], function ($router) {

//     //Route::post('login', 'AuthController@login');
//     //Route::post('login', [AuthController::class, 'login']);
//     Route::post('logout', 'AuthController@logout');
//     Route::post('refresh', 'AuthController@refresh');
//     Route::post('me', 'AuthController@me');

// });

