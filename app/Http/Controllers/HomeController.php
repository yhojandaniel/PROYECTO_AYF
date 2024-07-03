<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // Mostrar inicio
    public function showHome(){

        // Si no existe usuario logueado, solo retorna al home
        if(is_null(Auth::user())){
            return view('layouts.home');
        }

        //
        $name_array = Auth::user()->name;
        $text = explode(" ", $name_array);
        $name = $text[0];
        return view('layouts.home', compact('name'));
    }
}
