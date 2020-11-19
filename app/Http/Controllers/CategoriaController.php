<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;
use Log;

class CategoriaController extends Controller
{
    public function getAllCategorias(){

        Log::info('test log');
        $categorias = \App\Models\categoria::all();
        Log::info($categorias);

        return view('welcome',compact('categorias'));
    }
}
