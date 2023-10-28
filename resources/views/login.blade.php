@extends('layout')

@section('title', 'Login - GymApp')

@section('content')

    <h2 class="h3 mb-3 font-weight-normal" style="margin-top: 150px;">GymApp</h2>
    <img src="{{asset ('img/dumbell.png') }}" alt="Mancuerna" width="200px" height="100px" style="margin-bottom: 50px; margin-top: 10px">

    <form class="form-signin" style="width: 250px; display: block; margin: 0 auto 10px auto;" method="post" accept-charset="UTF-8" action="/buscar_usuario">
        @csrf
        <input class="form-control" style="text-align: center; margin-bottom: 20px" type="text" id="username" name="username" placeholder="Usuario" required autofocus>
        <input class="form-control" style="text-align: center; margin-bottom: 20px" type="password" id="password" name="password" placeholder="Contraseña" required>
        <button class="btn btn-light btn-block" type="submit" id="login-button" style="margin-bottom: 20px; padding-left: 25px; padding-right: 25px">Entrar</button>
        <a href="{{ route('register') }}" class="btn btn-secondary btn-block" style="margin-bottom: 20px; padding-left: 25px; padding-right: 25px">Registrate!</a>
        <p class="mb-3 text-muted" style="margin-bottom: 1rem; margin-top: 20px;">GymApp Version 0.0.1</p>
        <p class="mb-3 text-muted" style="font-size: small;">Gym App 0.0.1 ©</p>
    </form>
    <script src="{{asset('js/login')}}"></script>
@endsection
