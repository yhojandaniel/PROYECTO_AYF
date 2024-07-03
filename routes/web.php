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

// Cargar html de Home
Route::get('/', [HomeController::class, 'showHome']);

// Cargar html de Registro
Route::get('/register', [RegisterController::class, 'showRegister']);

// Registrar usuario en la base de datos
Route::post('/register', [RegisterController::class , 'register']);

// Cargar html de Login
Route::get('/login', [LoginController::class, 'showLogin']);

// Loguear al usuario con verificacion en la base de datos
Route::post('/login', [LoginController::class , 'login']);

// Quitar todas las sesiones activas
Route::post('/logout', [LogoutController::class , 'logout']);