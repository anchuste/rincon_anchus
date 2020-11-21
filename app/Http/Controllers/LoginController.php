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

        Log::info($clienteRecuperado);

        if ($clienteRecuperado->isEmpty()){
            return view('login',compact('categorias'));
        }
        else{
            // Existe el cliente
            if ($from == 'welcome'){
                return redirect(route('welcome'));
            }

        
        }

    }
}
