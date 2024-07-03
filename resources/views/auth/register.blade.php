@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>¿Eres nuevo? ¡Registrate!</h1>
        <div>
        @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <form method="POST" action="/register">
            @csrf
            <div class="form-group p-2">
                <label for="name">Nombres</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>

            <div class="form-group p-2">
                <label for="lastname">Apellidos</label>
                <input type="text" class="form-control" name="lastname" id="lastname" required>
            </div>

            <div class="form-group p-2">
                <label for="email">Correo electrónico</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>

            <div class="form-group p-2">
                <label for="phone">Celular</label>
                <input type="text" class="form-control" name="phone" id="phone" required>
            </div>

            <div class="form-group p-2">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>

            <div class="form-group p-2">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
            </div>
            <div class="form-group p-2">
                <input class="form-check-input" type="checkbox" value="trabajador" name="rol" id="rol">
                <label class="form-check-label" for="rol">Soy parte de la empresa!</label>
              </div>
        
            <button type="submit" class="btn btn-primary m-2">Registrarse</button>
        </form>

        <form action="/login" class="p-2">
                <button type="submit" class="btn btn-warning">¿Tienes una cuenta?</button>
        </form>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        </div>
    </div>
@endsection
