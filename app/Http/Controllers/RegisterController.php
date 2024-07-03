<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    // Mostrar registro
    public function showRegister(){
        return view('auth.register');
    }

    // Procesa la solicitud de registro
    public function register(RegisterRequest $request){
        // Se crea al usuario
        $user = $this->create($request->validated());
        // Una vez creado el usuario, retornamos a Login para que el usuario acceda a su cuenta
        return redirect('/login')->with('success', 'Cuenta creada correctamente!');
    }

    // Envia los siguientes datos a la base de datos para registrar al usuario
    protected function create(array $data){
        return User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => $data['password'],
            'rol' => isset($data['rol']) ? 'trabajador' : 'usuario', //Si esta activo, se selecciona trabajador
        ]);
    }

}
