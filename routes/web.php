<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\TestController;
use App\Http\Controllers\UtilizadorController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\EdificioController;
use App\Http\Controllers\RequisitoController;

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
Route::get('/',[TestController::class, 'logI']);
Route::get('/Registo',[TestController::class, 'Registo']);
Route::get('/logI',[TestController::class, 'logI']);

Route::get('/UtilizadorOut',[UtilizadorController::class, 'LogOut']);
Route::get('/Utilizador/Create',[UtilizadorController::class, 'create']);
Route::post('/Utilizador/store',[UtilizadorController::class, 'store']);
Route::post("/Utilizador/Log_In",[UtilizadorController::class, 'Log_In']);
Route::get('Utilizador/forgotone',[UtilizadorController::class, 'VIEW_EMAIL']);
Route::post("/Utilizador/forgot/",[UtilizadorController::class, 'forget_Password']);
Route::get("/Utilizador/Passwordrestet/{Email}:{token}",[UtilizadorController::class, 'forget_Password_commit']);
Route::post("/Utilizador/Confirm/{Email}:{token}",[UtilizadorController::class, 'Password_confirm']);

Route::post("Sala/store",[SalaController::class, 'store']);
Route::post("Edificio/store",[EdificioController::class, 'store']);
Auth::routes();
Route::get('/Main',[SalaController::class, 'index'])->middleware('ISLog');
Route::get('/Main/{numero}:{numeroedificios}',[SalaController::class, 'index_num'])->middleware('ISLog');
Route::get('/AdminMain',[SalaController::class, 'ADMINindex'])->middleware('ISADMIN');
Route::get('/AdminMain/{numero}:{numeroedificios}',[SalaController::class, 'ADMINindex_num'])->middleware('ISADMIN');

Route::get('/Utilizador/Show',[UtilizadorController::class, 'show'])->middleware('ISLog');
Route::post("/Utilizador/changeupdate",[UtilizadorController::class, 'change_Password'])->middleware('ISLog');

Route::get("/Requisito/Make/{id}",[RequisitoController::class,'MakeRequisito'])->middleware('ISLog');
Route::get("/Requisito/Create/{id}",[RequisitoController::class,'store'])->middleware('ISLog');
Route::get("/Requisitos/Show",[RequisitoController::class,'index'])->middleware('ISLog');
Route::get("/Requisitos/Show/{numero}",[RequisitoController::class,'indexnumb'])->middleware('ISLog');
Route::get("/Requisitos/Show_SALA/{id}",[SalaController::class,'show'])->middleware('ISLog');
Route::get("/Requisito/Update/{id}",[TestController::class,'update_display'])->middleware('ISLog');
Route::get("/Requisito/updateput/{id}/",[RequisitoController::class,'update'])->middleware('ISLog');
Route::get("/requisito/Delete/{id}",[RequisitoController::class,'destroy'])->middleware('ISLog');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/Sala/Update/{id}',[TestController::class, 'updatesala'])->middleware('ISADMIN');
Route::put('/Sala/updateput/{id}/',[SalaController::class, 'update'])->middleware('ISADMIN');
Route::get('/Sala/Delete/{id}',[SalaController::class, 'destroy'])->middleware('ISADMIN');

Route::get('/Edificio/Update/{id}',[TestController::class, 'updateedificio'])->middleware('ISADMIN');
Route::get('/Edificio/Delete/{id}',[EdificioController::class, 'destroy'])->middleware('ISADMIN');
Route::put('/Edificio/updateput/{id}/',[EdificioController::class, 'update'])->middleware('ISADMIN');

