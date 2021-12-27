<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\TestController;
use App\Http\Controllers\UtilizadorController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\EdificioController;
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
Route::post("Sala/store",[SalaController::class, 'store']);
Route::post("Edificio/store",[EdificioController::class, 'store']);

Route::get("/Requisito/Make/{id}",[TestController::class,'MakeRequisito']);
Auth::routes();
Route::get('/Main',[SalaController::class, 'index'])->middleware('ISLog');
Route::get('/Main/{numero}:{numeroedificios}',[SalaController::class, 'index_num'])->middleware('ISLog');
Route::get('/AdminMain',[SalaController::class, 'ADMINindex'])->middleware('ISADMIN');
Route::get('/AdminMain/{numero}:{numeroedificios}',[SalaController::class, 'ADMINindex_num'])->middleware('ISADMIN');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Sala/Update/{id}',[TestController::class, 'updatesala'])->middleware('ISADMIN');

Route::put('/Sala/updateput/{id}/',[SalaController::class, 'update'])->middleware('ISADMIN');
Route::get('/Sala/Delete/{id}',[SalaController::class, 'destroy'])->middleware('ISADMIN');
Route::get('/Edificio/Update/{id}',[TestController::class, 'updateedificio'])->middleware('ISADMIN');
Route::get('/Edificio/Delete/{id}',[EdificioController::class, 'destroy'])->middleware('ISADMIN');

Route::put('/Edificio/updateput/{id}/',[EdificioController::class, 'update'])->middleware('ISADMIN');

