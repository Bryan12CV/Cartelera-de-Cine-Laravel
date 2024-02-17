<?php

use App\Http\Controllers\TblOpePeliculaController;
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


Route::get('/', [TblOpePeliculaController::class, 'index'])->name('pelicula.index');
Route::post('/store', [TblOpePeliculaController::class, 'store'])->name('pelicula.store');
Route::get('/create', [TblOpePeliculaController::class, 'create'])->name('pelicula.create');
Route::get('/edit', [TblOpePeliculaController::class, 'edit'])->name('pelicula.edit');