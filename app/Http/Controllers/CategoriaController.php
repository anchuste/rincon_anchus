<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;
use Log;

class CategoriaController extends Controller
{
    public function getAllCategorias(){

        // Recupero todas las categorías del modelo.
        $categorias = \App\Models\categoria::all();

        $imagen_to_front_end = "";

        foreach ($categorias as $p) {
            //Log::info($p->imagen);
            $imagen_to_front_end = $p->imagen_path;
            break;
        }

        Log::info($categorias);

        // Retorno la vista y le paso las categorías.
        return view('welcome',compact('categorias'));

        //return view('welcome')->with($imagen_to_front_end);

    }
}
