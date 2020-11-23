<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PedidoController;



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

Route::get('/', [CategoriaController::class, 'getAllCategorias']);


// Con la acción -> name del final, definimos un nombre de ruta que nos servirá para llamarle desde otros puntos (controladores).
Route::get('/welcome', [CategoriaController::class, 'getAllCategorias'])->name('welcome');

Route::post('iniciarSesion/{from}', [LoginController::class, 'checkUserInitSession']);

/*Route::get('/login/{from}', [LoginController::class, 'index'])->name('login');*/

Route::get('/login/{from}', [LoginController::class, 'index'])->name('login');

Route::get('/productoscategoria/{idCategoria}', [ProductoController::class, 'index']);

Route::get('/detalleproducto/{idProducto}', [ProductoController::class, 'getProduct']);

Route::get('agregarCarrito/{idProducto}', [CarritoController::class, 'agregarProducto']);

Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito');

Route::get('/realizarPedido', [PedidoController::class, 'index'])->name('realizarpedido');

/*
Route::get('carrito', function () {
    return view('carrito');
})->name('carrito');*/







