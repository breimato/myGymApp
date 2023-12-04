<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', [\App\Http\Controllers\AuthController::class, 'showLoginForm']);

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'showDashboard']);

Route::get('/routines', [\App\Http\Controllers\RoutinesController::class, 'showRoutines']);

Route::get('/add_routine', [\App\Http\Controllers\RoutinesController::class, 'showAddRoutines']);


Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register_view');

Route::get('/login', function () {
    return view('login');
});

Route::post('/auth/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::post('/addRoutine', [\App\Http\Controllers\RoutinesController::class, 'addRoutine']);

Route::post('/getExercises', [\App\Http\Controllers\ExerciseController::class, 'getExercisesByType']);


Route::post('/auth/register', [\App\Http\Controllers\AuthController::class, 'registerUser']);

Route::delete('/routines/{id}', [\App\Http\Controllers\RoutinesController::class, 'deleteRoutine'])->name('routines.delete');
