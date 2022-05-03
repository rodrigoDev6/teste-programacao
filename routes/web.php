<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArtigoController;
use App\Http\Controllers\CategoriaController;


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
    return view('welcome');
});


//--------------- ARTIGOS ------------//
Route::get('/artigo', [ArtigoController::class, 'index'])->name('artigo.index');

Route::get('/artigo/create', [ArtigoController::class, 'create'])->name('artigo.create');
Route::post('/artigo/create', [ArtigoController::class, 'store'])->name('artigo.store');

Route::get('/artigo/{id}', [ArtigoController::class, 'show'])->name('artigo.show');

Route::get('/artigo/{id}/edit', [ArtigoController::class, 'edit'])->name('artigo.edit');
Route::put('/artigo/{id}', [ArtigoController::class, 'update'])->name('artigo.update');

Route::delete('/artigo/{id}', [ArtigoController::class, 'destroy'])->name('artigo.destroy');

//--------------- CATEGORIA ------------//
Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');

Route::get('/categoria/create', [CategoriaController::class, 'create'])->name('categoria.create');
Route::post('/categoria/create', [CategoriaController::class, 'store'])->name('categoria.store');

Route::get('/categoria/{id}', [CategoriaController::class, 'show'])->name('categoria.show');

Route::get('/categoria/{id}/edit', [CategoriaController::class, 'edit'])->name('categoria.edit');
Route::put('/categoria/{id}', [CategoriaController::class, 'update'])->name('categoria.update');

Route::delete('/categoria/{id}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');


