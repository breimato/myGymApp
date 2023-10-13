<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<body class="text-center">

    <h2 class="h3 mb-3 font-weight-normal" style="margin-top: 150px;">GymApp</h2>

    <img src="{{asset ('img/dumbell.png') }}" alt="Mancuerna" width="200px" height="100px" style="margin-bottom: 50px; margin-top: 10px">



    <form class="form-signin" style="width: 250px; display: block; margin: 0 auto 10px auto;" method="post" accept-charset="UTF-8" action="/buscar_usuario">

        @csrf

        <input class="form-control" style="text-align: center; margin-bottom: 20px" type="text" id="username" name="username" placeholder="Usuario" required autofocus>
        <input class="form-control" style="text-align: center; margin-bottom: 20px" type="password" id="password" name="password" placeholder="Contraseña" required>
        <button class="btn btn-light btn-block" type="submit" id="login-button" style="margin-bottom: 20px; padding-left: 25px; padding-right: 25px">Entrar</button>
        <button class="btn btn-secondary btn-block" type="button" id="register-button" style="margin-bottom: 20px; padding-left: 25px; padding-right: 25px">Registrarse</button>
        <p class="mb-3 text-muted" style="margin-bottom: 1rem; margin-top: 20px;">GymApp Version 0.0.1</p>
        <p class="mb-3 text-muted" style="font-size: small;">Gym App 0.0.1 ©</p>

    </form>

</body>

</html>
