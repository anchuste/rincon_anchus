<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cliente;
use Log;

class LoginController extends Controller
{
    //
    public function checkUserInitSession(Request $request){

        $email_user = $request->email; 
        $password_user = $request->password; 

                $clienteRecuperado = \App\Models\Cliente::where('nombre', 'alberto')->get();

        Log::info($clienteRecuperado);

    }
}
