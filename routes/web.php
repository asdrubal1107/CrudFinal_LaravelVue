<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesionalsController;

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

Route::get('/', function () {
    return view('profesional');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profesionals', [ProfesionalsController::class, 'index']); //Ruta para listar la informacion de los profesionales
Route::post('/profesionals/registrar', [ProfesionalsController::class, 'store']); //Ruta para insertar en la bd profesionales
Route::put('/profesionals/actualizar',[ProfesionalsController::class, 'update']); //Actualizar contratista
Route::put('/profesionals/activar',[ProfesionalsController::class, 'activar']); //Actualizar contratista
Route::put('/profesionals/desactivar',[ProfesionalsController::class, 'desactivar']); //Actualizar contratista