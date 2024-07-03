<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
    // Datos que se pedira al usuario
    public function rules(){
        return [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'required|string|min:8',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password',
            'rol' => 'sometimes|string|in:usuario,trabajador,gerente'
        ];
    }
}
