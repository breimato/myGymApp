@extends('layout')

@section('title', 'Registro')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <h2 class="h3 mb-3 font-weight-normal" style="margin-top: 150px;">GymApp</h2>
    <img src="{{asset ('img/dumbell.png') }}" alt="Mancuerna" width="200px" height="100px"
         style="margin-bottom: 50px; margin-top: 10px">

    <form class="form-signin" style="width: 250px; display: block; margin: 0 auto 10px auto;" method="post"
          accept-charset="UTF-8" action="/buscar_usuario">
        @csrf
        <input class="form-control" style="text-align: center; margin-bottom: 20px" type="text" id="username"
               placeholder="Usuario" required autofocus>
        <input class="form-control" style="text-align: center; margin-bottom: 20px" type="text" id="email"
               placeholder="Email" required autofocus>
        <input class="form-control" style="text-align: center; margin-bottom: 20px" type="password" id="password"
               placeholder="Contraseña" required>
        <input class="form-control" style="text-align: center; margin-bottom: 20px" type="date" id="birthdate"
               placeholder="Fecha de Nacimiento" required>
        <input class="form-control weight-input" style="text-align: center; margin-bottom: 20px" min="40" max="200"
               type="number"
               id="weight" placeholder="Peso (kg)" step="0.5" required autofocus>

        <div>
            <label for="height" id="heightLabel">Estatura (170 cm)</label>
            <div>
                <input type="range" id="height" min="120" max="230" value="170">
            </div>
        </div>



        <button class="btn btn-secondary btn-block" type="button" id="register-button"
                style="margin-bottom: 20px; padding-left: 25px; padding-right: 25px">Registrarse
        </button>

    </form>
    <script src="{{ asset('js/auth.js') }}"></script>
@endsection
