<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UtilizadorController;
use App\Http\Controllers\UtilizadorControllerr;
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
Route::get('/Utilizador/Show/{utilizador}',[UtilizadorController::class, 'show']);
Route::get('/Utilizador/Insert/{utilizador}',[UtilizadorController::class, 'create']);
Route::get('/Utilizador/edit/{utilizador}',[UtilizadorController::class, 'edit']);
Route::get('/Utilizador/update/{utilizador}',[UtilizadorController::class, 'update']);
Route::get('/Utilizador/destroy/{utilizador}',[UtilizadorController::class, 'destroy']);

Route::get('/Main', function () {
    return view('Main');
});
