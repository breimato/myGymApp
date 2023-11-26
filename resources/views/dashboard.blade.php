@extends('layout')

@section('title', 'Dashboard - GymApp')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">FitnessApp</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/routines">Mis Rutinas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Récords</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Dieta</a>
                </li>

            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
                <button class="btn btn-outline-light" type="submit">Buscar</button>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> Perfil
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Ajustes</a>
                        <a class="dropdown-item" href="#">Otra acción</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Cerrar sesión</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="container mt-4">
    <!-- Widget de Bienvenida -->
    <div class="row">
        <div class="col-12">
            <div class="alert alert-info" role="alert">
                <h4 class="alert-heading">¡Bienvenido de nuevo, {{ $user->name }} !</h4>
                <p>Aquí tienes un resumen rápido de tu actividad de hoy. ¡Sigue así!</p>
                <hr>
                <p class="mb-0">Sugerencia del día: "Recuerda hidratarte adecuadamente durante tus entrenamientos."</p>
            </div>
        </div>
    </div>

    <!-- Tarjetas de Resumen de Actividades Recientes -->
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Último Entrenamiento</h5>
                    <p class="card-text">Piernas y glúteos - 45 min</p>
                    <p class="card-text"><small class="text-muted">3 días atrás</small></p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">Ver detalles</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Progreso de Peso</h5>
                    <p class="card-text">Último registro: 70 kg</p>
                    <p class="card-text"><small class="text-muted">1 semana atrás</small></p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">Ver detalles</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Calendario de Rutinas</h5>
                    <p class="card-text">Rutina de hoy: Empujes</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">Ver detalles</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container my-4">
    <!-- Panel de Control y Configuración -->
    <div class="row mb-4">
        <div class="col-lg-4 mb-3">
            <div class="card">
                <div class="card-header">
                    Panel de Control
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Perfil</li>
                    <li class="list-group-item">Configuración de la cuenta</li>
                    <li class="list-group-item">Privacidad</li>
                    <!-- Agrega más opciones según sea necesario -->
                </ul>
            </div>
        </div>

        <!-- Widgets de Resumen Nutricional -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    Resumen Nutricional
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Ejemplo de widget de nutrición -->
                        <div class="col-md-6 mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="m-0">Calorías Consumidas</h6>
                                    <small class="text-muted">Objetivo: 2500 kcal</small>
                                </div>
                                <span class="badge bg-primary rounded-pill">2200 kcal</span>
                            </div>
                            <div class="progress my-2">
                                <div class="progress-bar" role="progressbar" style="width: 88%;" aria-valuenow="2200" aria-valuemin="0" aria-valuemax="2500"></div>
                            </div>
                        </div>
                        <!-- Puedes agregar más widgets de nutrición aquí -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

