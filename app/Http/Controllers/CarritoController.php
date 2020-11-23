<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\categoria;
use App\Models\Producto;

use Log;

class CarritoController extends Controller
{
    public function agregarProducto($idProducto){

        if(!isset($_SESSION)) { session_start(); } 
        $_SESSION['cart'][] = $idProducto;

        return redirect(route('carrito'));

        //return view('carrito');



        /*
        foreach ($_SESSION['cart'] as $value) {
            Log::info($value);
            //echo "$value <br>";
        }*/

    }

    public function index(){

        if(!isset($_SESSION)) { session_start(); }


        $productsArray = array();

        //Siempre que entramos en la página del carro hacemos una petición por cada idproducto a la base de datos y
        //el resultado lo metemos en un array para tener la info manipulable en la vista.
        foreach ($_SESSION['cart'] as $value) 
        {
            $productoRecuperado = \App\Models\Producto::where('id_producto', $value)
            ->get();
            array_push($productsArray, json_decode($productoRecuperado, true));
        }

        /*
        foreach ($productsArray as $value) 
        {
            Log::info($value[0]['nombre']);
        }*/
            

        return view('carrito')->with('productosCarro', $productsArray);
    }
}
