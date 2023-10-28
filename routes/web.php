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

Route::get('/registro', [\App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');

Route::get('/login', function () {
    return view('login');
});

Route::post('/buscar_usuario', [\App\Http\Controllers\AuthController::class, 'login']);
