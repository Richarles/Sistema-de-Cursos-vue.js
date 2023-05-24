<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CurseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCurseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
//Auth::routes();
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/cursos', function () {
//     Route::apiResource('estudantes', StudentController::class);
//     Route::apiResource('professor', StudentController::class);
// })->middleware('auth');

// Route::resource('estudantes', StudentController::class);
// Route::resource('professores', TeacherController::class);
//Route::resource('login', LoginController::class);
Route::resource('user', UserController::class)->middleware('jwt.auth');
Route::resource('usercurse', UserCurseController::class)->middleware('jwt.auth');
Route::resource('curse', CurseController::class)->middleware('jwt.auth');
Route::post('authentification', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'store']);
//Route::post('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');

//Route::resource('login', AuthController::class);
//Route::post('/authetificacion', [AuthController::class, 'login']);
// Route::middleware('jwt.verify')->group(function() {
//     Route::get('/dashboard', function() {
//         return response()->json(['message' => 'Welcome to dashboard'], 200);
//     });
// });
// Route::middleware('api')->group(function () {
//     Route::get('curse', [CurseController::class, 'index']);
// });

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

