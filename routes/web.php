<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UtilizadorController;
use App\Http\Controllers\SalaController;
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
Route::get('/',[TestController::class, 'Welcome']);
Route::get('/Registo',[TestController::class, 'Registo']);
Route::get('/logI',[TestController::class, 'logI']);
Route::get('/Utilizador/Show',[UtilizadorController::class, 'show']);
Route::get('/UtilizadorOut',[UtilizadorController::class, 'LogOut']);
Route::get('/Utilizador/Create',[UtilizadorController::class, 'create']);
Route::post('/Utilizador/store',[UtilizadorController::class, 'store']);
Route::post("/Utilizador/Log_In",[UtilizadorController::class, 'Log_In']);

Route::get('/Main',[SalaController::class, 'index']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

