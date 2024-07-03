<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // Mostrar inicio
    public function showHome(){

        // Si no hay nigun usuario, mostrar el inicio como invitado
        if(is_null(Auth::user())){
            return view('layouts.home');
        }

        // Caso contrario
        $name_array = Auth::user()->name;             //Obtenemos datos del usuario
        $text = explode(" ", $name_array);            //Separamos el array
        $name = $text[0];                             //Obtenemos el nombre
        return view('layouts.home', compact('name')); //Cargamos el inicio con la variable
    }
}
