@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Accede a tu cuenta!</h1>
        <div>
            @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
            @endif

            <form action="/login" method="POST">
            {{-- Token --}}
            @csrf
                <div class="form-group">
                    <label for="email">Correo</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
        
                <button type="submit" class="btn btn-primary">Ingresar</button>
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