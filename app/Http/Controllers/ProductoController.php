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

        $productos = $this->getProductosByIdCategoria($idCategoria);

        return view('products', compact('productos'));

    }

    public function getProductosByIdCategoria($idCategoria){

        $productosRecuperados = \App\Models\Producto::where('id_categoria', $idCategoria)
        ->get();

        Log::info($productosRecuperados);
        return $productosRecuperados;
        
    }

    public function getProduct($idProducto){

        $producto = \App\Models\Producto::where('id_producto', $idProducto)
        ->get();

        Log::info($producto);

        $productoAsArray = json_decode($producto, true);

        return view('detalleproducto', compact('productoAsArray'));
    }
}
