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

Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register_view');

Route::get('/login', function () {
    return view('login');
});

Route::post('/auth/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::post('/auth/register', [\App\Http\Controllers\AuthController::class, 'registerUser']);

