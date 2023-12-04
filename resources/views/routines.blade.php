@extends('layout')

@section('title', 'Rutinas - GymApp')

@section('content')


<div class="container">

    <h2 style="padding: 20px">Rutinas de Entrenamiento</h2>

    <!-- Botón para agregar nueva rutina -->
    <a href="/add_routine" class="btn btn-success mb-3">Agregar Nueva Rutina</a>

    <!-- Tabla para mostrar las rutinas -->
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Rutina</th>
            <th>Nombre de la Rutina</th>
            <th>Ejercicios</th>
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
                        <p>{{ $loop->iteration }}. {{ $exercise->name }}</p>
                    @endforeach
                </td>
                <td>
                    <a href="#" class="btn btn-secondary">Editar</a>
                    <form action="{{ route('routines.delete', $routine->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-button">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script src="{{ asset('js/utils.js') }}"></script>


@endsection
