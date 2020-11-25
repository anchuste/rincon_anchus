<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\LineaPedido;
use App\Models\LineasTotalesPedido;
use App\Models\User;

use Log;

class PedidoController extends Controller
{
    public function index()
    {
        if(!isset($_SESSION)) { session_start(); } 
        // si el cliente está registrado recuperamos sus datos y los ponemos
        // en sus correspondientes cajas.
        if(isset($_SESSION["idSession"])){
            $idClienteConSesion = $_SESSION["idSession"];
            $clienteRecuperado = \App\Models\Cliente::where('id_cliente', $idClienteConSesion)
            ->get();
            $clienteRecuperadoAsArray = json_decode($clienteRecuperado, true);
            return view('realizarpedido')->with('clienteRecuperado', $clienteRecuperadoAsArray);
        }

        return view('realizarpedido');
    }

    public function procesarPedido(Request $request){

        Log::info("procesarPedido -> Entra en procesar pedido");
        Log::info($request);

        if(!isset($_SESSION)) { session_start(); } 

        $idClienteTemporal = "";
        $idClienteConSesion = "";

        //Si no hemos iniciado sesión, creamos un cliente temporaal
        if(!isset($_SESSION["userSession"])){
            $clienteTemporal = new Cliente;
            $clienteTemporal->nombre = $request->nombre;
            $clienteTemporal->apellidos = $request->apellidos;
            $clienteTemporal->mail = $request->email;
            $clienteTemporal->password = 'tiendecita' .date('Y-m-d H:i:s');          
            $clienteTemporal->fecha_alta = date('Y-m-d H:i:s');
            $clienteTemporal->save();
            $idClienteTemporal = $clienteTemporal->id; // Obtenemos el id del cliente temporal  
        }

        // Creamos el pedido
        $pedido = new Pedido;

        // Si tenemos iniciada sesión establecemos ese id, si no, establecemos el del cliente temporal
        if(isset($_SESSION["idSession"])){
            $pedido->id_cliente = $_SESSION["idSession"];
        }
        else{
            $pedido->id_cliente = $idClienteTemporal;
        }
        
        $pedido->id_estado_pedido = 1; // 1 = PROCESADO
        $pedido->fecha_pedido = date('Y-m-d H:i:s');
        $pedido->save();
        $pedidoRecienCreado = $pedido->id;

        // Según vamos recorriendo el carro con los productos vamos creando:
        // las líneas del pedido y los registros que relacionan estas lineas con el pedido (lineas totales del pedido).
        foreach ($_SESSION['cart'] as $value) 
        {
            $lineaPedido = new LineaPedido;
            $lineaPedido->id_producto = $value;
            $lineaPedido->save();
            $lineaPedidoRecienCreada = $lineaPedido->id;

            $lineasTotalesPedido = new LineasTotalesPedido;
            $lineasTotalesPedido->id_linea_pedido = $lineaPedidoRecienCreada;
            $lineasTotalesPedido->id_pedido = $pedidoRecienCreado;
            $lineasTotalesPedido->save();
        }

        // Borramos el carrito de la sesión.
        unset($_SESSION['cart']);

        return view('pedido_realizado');

    }

    public function listarPedidos()
    {
        if(!isset($_SESSION)) { session_start(); } 
        // Recuperamos todos los pedidos de la tienda
        if(isset($_SESSION["idSession"])){
            $idClienteConSesion = $_SESSION["idSession"];
            $clienteRecuperado = \App\Models\Cliente::where('id_cliente', $idClienteConSesion)
            ->get();
            $clienteRecuperadoAsArray = json_decode($clienteRecuperado, true);
            return view('realizarpedido')->with('clienteRecuperado', $clienteRecuperadoAsArray);
        }

        return view('realizarpedido');
    }
}
