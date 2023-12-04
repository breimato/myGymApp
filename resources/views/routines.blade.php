@extends('layout');

@section('title', 'Rutinas - GymApp');

@section('content');


<div class="container">
    <h2>Rutinas de Entrenamiento</h2>

    <!-- Botón para agregar nueva rutina -->
    <a href="/add_routine" class="btn btn-primary mb-3">Agregar Nueva Rutina</a>

    <!-- Tabla para mostrar las rutinas -->
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Rutina</th>
            <th>Nombre del Ejercicio</th>
            <th>Ejercicio</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($routines as $routine)
            <tr>
                <td>{{ $routine->name }}</td>
                <td>{{ $routine->description }}</td>
                <td>
                    @foreach ($routine->exercises as $exercise)
                        <p>{{ $exercise->name }}</p>
                    @endforeach
                </td>
                <td>
                    <a href="#" class="btn btn-secondary">Editar</a>
                    <form action="#" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>



@endsection;
