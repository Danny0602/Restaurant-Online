<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Pago;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomeController::class )->name('home');

//RUTAS PARA PRODUCTOS
Route::get('/productos',    [MenuController::class,'index'] )->middleware(['auth', 'verified','rol'])->name('dashboard');
Route::get('/producto/crear',    [MenuController::class,'create'] )->middleware(['auth', 'verified','rol'])->name('productos.create');
Route::get('/productos/{menu:nombre}/edit',[MenuController::class,'edit'] )->middleware(['auth','rol'])->name('productos.edit');



//RUTAS PARA CATEGORIAS
Route::get('/categorias',    [CategoriaController::class,'index'] )->middleware(['auth', 'verified','rol'])->name('categorias.index');
Route::get('/categoria/crear',    [CategoriaController::class,'create'] )->middleware(['auth', 'verified','rol'])->name('categoria.create');


Route::get('/carrito',    [CarritoController::class,'index'] )->middleware(['auth', ])->name('carrito.index');
Route::get('/pagar',    [Pago::class,'index'] )->middleware(['auth', ])->name('pago.index');








require __DIR__.'/auth.php';
