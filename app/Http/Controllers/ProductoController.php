<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Log;

class ProductoController extends Controller
{
    public function index($idCategoria)
    {
        Log::info($idCategoria);
        return view('productosCategoria')->with('productosRecuperadosAsArray', $this->getProductosByIdCategoria($idCategoria));
        
    }

    public function getProductosByIdCategoria($idCategoria){

        $productosRecuperados = \App\Models\Producto::where('id_categoria', $idCategoria)
        ->get();

        $productosRecuperadosAsArray = json_decode($productosRecuperados, true);

        Log::info($productosRecuperadosAsArray);
        return $productosRecuperadosAsArray;
        
        
        /*
        ->where('password', $password_user)
        ->get();*/
    }
}
