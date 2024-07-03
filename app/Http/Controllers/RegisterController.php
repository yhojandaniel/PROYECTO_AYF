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
        $user = $this->create($request->validated());
        return redirect('/login')->with('success', 'Cuenta creada correctamente!');
    }

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
