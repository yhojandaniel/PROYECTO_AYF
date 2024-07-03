<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;


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

// Rutas de la pagina web

Route::get('/', [HomeController::class, 'showHome']);

Route::get('/register', [RegisterController::class, 'showRegister']);

Route::post('/register', [RegisterController::class , 'register']);

Route::get('/login', [LoginController::class, 'showLogin']);

Route::post('/login', [LoginController::class , 'login']);

Route::post('/logout', [LogoutController::class , 'logout']);