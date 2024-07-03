<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'email' => 'required',
            'password' => 'required'
        ];
    }

    public function getCredentials(){
        // Falta incluir la verificacion de si es usuario, trabajador o gerente 
        //y en base a eso formatear el id que se muestra en pantalla

        /* 
        
            1. Buscar si es gerente.
            2. Buscar si es trabajador.
            3. Buscar si es usuario.
            4. En caso de encontrar al usuario en cualquiera de los pasos
                    no buscar más y obtener su id
            5. En base a esto mostrar los datos:
                    id de gerente: 1-1-1, 
                    id de trabajador: 1-1, 
                    id de usuario: 1

        */
        $email = $this->get('email');

        return $this->only('email', 'password');
    }

}
