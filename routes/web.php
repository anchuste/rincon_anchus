<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductoController;



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

/*
Route::get('/login/{from}', function ($from) {
    return view('login')->with('from', $from);
})->name('login');*/


// Con la acción -> name del final, definimos un nombre de ruta que nos servirá para llamarle desde otros puntos (controladores).
Route::get('/welcome', [CategoriaController::class, 'getAllCategorias'])->name('welcome');

Route::post('iniciarSesion/{from}', [LoginController::class, 'checkUserInitSession']);

/*Route::get('/login/{from}', [LoginController::class, 'index'])->name('login');*/

Route::get('/login/{from}', [LoginController::class, 'index'])->name('login');

Route::get('/productosCategoria/{idCategoria}', [ProductoController::class, 'index']);




