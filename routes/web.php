<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventoController;
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


Route::get('/', [EventoController::class, 'index'])->name('index');
Route::get('/evento/create', [EventoController::class, 'create'])->name('create')->middleware('auth');
Route::get('/evento/{id}', [EventoController::class, 'show'])->name('show');
Route::post('/evento', [EventoController::class, 'store'])->name('store');
Route::delete('/evento/{id}', [EventoController::class, 'destroy'])->middleware('auth');
Route::get('/evento/edit/{id}', [EventoController::class, 'edit'])->middleware('auth');
Route::put('/evento/update/{id}', [EventoController::class, 'update'])->middleware('auth');


Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/auth', [UserController::class, 'auth'])->name('auth');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/user', [UserController::class, 'user'])->name('user');

Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/dashboard', [EventoController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::post('/evento/join/{id}', [EventoController::class, 'joinEvent'])->middleware('auth');
Route::delete('/evento/leave/{id}', [EventoController::class, 'leaveEvent'])->middleware('auth');
