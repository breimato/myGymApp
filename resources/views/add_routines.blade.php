@extends('layout')

@section('title', 'Agregar Rutina - GymApp')

@section('content')

    <div class="container mt-4">
        <h2>Crear Rutina</h2>
        <form id="routineForm">

            <!-- Fila para el nombre y descripción de la rutina -->
            <div class="row mb-3">
                <div class="col">
                    <select class="form-control" id="routineSelect">
                        <option value="0" selected>-- Elegir Tipo de Rutina --</option>
                        <!-- Opciones de tipos de rutina aquí -->
                        <option value="1">Rutina de Pecho</option>
                        <option value="2">Rutina de Espalda</option>
                        <option value="3">Rutina de Piernas</option>
                        <option value="4">Rutina de Hombros</option>
                        <option value="5">Rutina de Brazos</option>
                        <option value="6">Rutina de Abdomen</option>
                        <option value="7">Rutina de Empujes</option>
                        <option value="8">Rutina de Jalones</option>
                    </select>
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="routineName" placeholder="Nombre de la Rutina">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="routineDescription" placeholder="Descripción">
                </div>
            </div>

            <!-- Fila para añadir ejercicios -->
            <div class="row mb-3">

                <div class="col">
                    <h4>1</h4>
                </div>
                <div class="col">
                    <select class="form-control exercise-select" id="exerciseSelect">
                        <option value="0" selected>-- Elegir Ejercicio --</option>
                        <!-- Opciones de ejercicios aquí -->
                    </select>
                </div>
            </div>
            <div id="exerciseSection"></div>

            <!-- Botón para añadir más ejercicios -->
            <div class="row mb-3">
                <div class="col">
                    <button type="button" id="addExerciseButton" class="btn btn-secondary btn-block">Añadir Ejercicio</button>
                </div>
            </div>

            <!-- Botón para enviar el formulario -->
            <div class="row">
                <div class="col">
                    <button type="submit" id="createRoutine" class="btn btn-primary btn-block">Crear Rutina</button>
                </div>
            </div>


        </form>
    </div>

    <script src="{{ asset('js/add_routines.js') }}"></script>
@endsection
