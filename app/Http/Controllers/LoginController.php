<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Mostrar Login
    public function showLogin(){
        return view('auth.login');
    }

    // Procesar solicitud de login
    public function login(LoginRequest $request){
        // Verifica las credenciales del usuario
        $credentials = $request->getCredentials();

        // Si no se valida, retornar al login con errores
        if(!Auth::validate($credentials)){
            return redirect('/login')->withErrors('Verifique si su correo o contrasena son correctas!');
        }

        // Si se valida, creamos la sesion
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);

        // Se dirige al login
        return $this->authenticated();
    }

    
    public function authenticated(){
        return redirect('/');
    }
}
