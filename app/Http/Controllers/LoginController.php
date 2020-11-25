<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cliente;
use App\Models\categoria;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Log;

class LoginController extends Controller
{
    //
    public function checkUserInitSession(Request $request, $from){

        $email_user = $request->email; 
        $password_user = $request->password; 

        $clienteRecuperado = \App\Models\Cliente::where('mail', $email_user)
        ->where('password', $password_user)
        ->get();

        // No se ha recuperado el cliente, se traslada el mensaje al usuario
        if ($clienteRecuperado->isEmpty()){
            if(!isset($_SESSION)) { session_start(); } 
            $_SESSION["errorLogin"]="Error al iniciar sesión, usuario o contraseña incorrecta";
            return redirect(route('login', $from));
        }

        $clienteRecuperadoAsArray = json_decode($clienteRecuperado, true);
        
        if (empty($clienteRecuperadoAsArray) || !isset($clienteRecuperadoAsArray[0]['nombre'])) {
            if(!isset($_SESSION)) { session_start(); } 
            $_SESSION["errorLogin"]="Error al iniciar sesión, usuario o contraseña incorrecta";
            return redirect(route('login/'. $from));
        }

        // Esta parte solo la hace si se ha recuperado un cliente:
        if(!isset($_SESSION)) { session_start(); } 
        $_SESSION["userSession"]=$clienteRecuperadoAsArray[0]['nombre'];
        $_SESSION["idSession"]=$clienteRecuperadoAsArray[0]['id_cliente'];
        Log::info($_SESSION["userSession"]);

        // Existe el cliente y venimos desde la página welcome (la inicial)
        if ($from == 'welcome'){
            return redirect(route('welcome'));
        }
    }

    public function index($from)
    {
        return view('login')->with('from', $from);
    }

    public function salirSesion()
    {
        if(!isset($_SESSION)) { session_start(); } 
        unset($_SESSION['idSession']);
        unset($_SESSION['userSession']);
        return redirect(route('welcome'));
    }

    
}
