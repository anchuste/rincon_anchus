<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LoginController;


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

Route::get('/login', function () {
    return view('login');
});

Route::get('/welcome', [CategoriaController::class, 'getAllCategorias']);


Route::post('iniciarSesion', [LoginController::class, 'checkUserInitSession']);




//Route::get('/', 'YourControllerName@functionName')

/*
Route::get('/', function () {
    return view('welcome');
});
*/

//Route::get('/problems/{problem-id}/edit', 'AdminController@editProblem');

