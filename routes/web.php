<?php

use App\Http\Controllers\CoursesController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});

//creando la ruta para ver todos los cursos
Route::get('/cursos', [CoursesController::class, 'index'])->name('cursos');

Route::get('/formulario', [CoursesController::class, 'obtenerForm'])->name('formulario');

Route::post('/guardar', [CoursesController::class, 'store'])->name('guardar');

//utilizando rutas con parametro
Route::get('/editar/{id}', [CoursesController::class, 'editar'])->name('editar');