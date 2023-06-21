<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaludoController;
use App\Http\Controllers\OperacionesController;
use App\Http\Controllers\TablasMultiplicar;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mensaje/{nombre}', [SaludoController::class, 'Mensaje']);
Route::get('/mayuscula/{nombre}', [SaludoController::class, 'Saludar']);
Route::get('/comparar/{nom1}/{nom2}', [SaludoController::class, 'Comparar']);
Route::get('/operacion/{num1}/{op}/{num2}', [OperacionesController::class, 'Operaciones']);
Route::get('/tablas/', [TablasMultiplicar::class, 'Tablas']);
Route::get('/tablas/{num}', [TablasMultiplicar::class, 'TablasNum']);
Route::get('/calcular-edad/{nombre}/{anyo_nac}', [SaludoController::class, 'CalcularEdad']);
Route::get('/comparanombres/{nombre1}/{nombre2}', [SaludoController::class, 'ComparaNombres']);

Route::get('/alumno/create', [AlumnoController::class, 'create']);
Route::post('/alumno/insert', [AlumnoController::class, 'insert']);
Route::get('/alumno/list', [AlumnoController::class, 'list']);
Route::get('/alumno/eliminar/{id}', [AlumnoController::class, 'eliminar']);
Route::get('/alumno/editar/{id}', [AlumnoController::class, 'edit']);
Route::post('/alumno/update', [AlumnoController::class, 'update']);

Route::get('/car/create', [CarController::class, 'create']);
Route::post('/car/insert', [CarController::class, 'insert']);
Route::get('/car/list', [CarController::class, 'list']);
Route::get('/car/delete/{id}', [CarController::class, 'delete']);
Route::get('/car/edit/{id}', [CarController::class, 'edit']);
Route::post('/car/update', [CarController::class, 'update']);
