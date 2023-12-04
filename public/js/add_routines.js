

$(document).ready(function () {
    let cont = 1;
    let routineSelect = $('#routineSelect');
    let addExerciseButton = $('#addExerciseButton');
    let exerciseSection = $('#exerciseSection');
    let createRoutineButton = $('#createRoutine');
    let routineName = $('#routineName')
    let routineDescription = $('#routineDescription');
    const URL_EXERCISES = "/getExercises";
    const URL_ROUTINE = "/addRoutine";

    routineSelect.change(function () {
        let selectedRoutineType = routineSelect.val();

        // Actualizar todos los selects de ejercicios existentes cuando se cambia el tipo de rutina

        $('.exercise-select').each(function () {
            handleAjaxRequest(selectedRoutineType, $(this), URL_EXERCISES);
        });
    });

    addExerciseButton.click(function () {
        cont++;

        const newSelect = $(`<select class="form-control exercise-select"><option value="0" selected>-- Elegir Ejercicio --</option></select>`);
        const newRow = $(`<div class="row mb-3"><div class="col"><h4>${cont}</h4></div><div class="col"></div></div>`);

        newRow.find('.col').eq(1).append(newSelect);

        exerciseSection.append(newRow);

        handleAjaxRequest(routineSelect.val(), newSelect, URL_EXERCISES);
    });

    createRoutineButton.click(function (e) {
        e.preventDefault();
        let exercises = [];


        $('.exercise-select').each(function () {
            exercises.push($(this).val());
        });

        if (validateFields(getRoutineRules())) {
            $.ajax({
                url: URL_ROUTINE,
                method: 'POST',
                data:
                    {
                        exercises: exercises,
                        routineName: routineName.val(),
                        routineDescription: routineDescription.val(),
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                success: function (data) {
                    Swal.fire
                    ({
                        icon: 'success',
                        title: 'Éxito',
                        text: data.message,
                    }).then(() => {
                        window.location.href = '/routines';
                    });
                },
                error: function (error) {
                    if (error.status !== 422) {
                        return Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Ocurrió un error inesperado.',
                        });
                    }
                    const errors = error.responseJSON.errors;
                    for (const key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: errors[key][0],
                            });
                        }
                    }

                }
            });
        }
    });

    function isEmpty(input) {
        return $.trim(input) === '';
    }

    function handleAjaxRequest(routineValue, exerciseSelectElement, URL) {
        $.ajax({
            url: URL,
            method: 'POST',
            data: {routineSelect: routineValue, _token: $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                exerciseSelectElement.empty();
                exerciseSelectElement.append('<option value="0" selected>-- Elegir Ejercicio --</option>');
                data.forEach(function (exercise) {
                    exerciseSelectElement.append(`<option value="${exercise.id}">${exercise.name}</option>`);
                });
            },
            error: function (err) {
                console.log(err);
            }
        });
    }

    function validateFields(rules) {
        for (const rule of rules) {
            if (!rule.check()) {
                Swal.fire('Error', rule.message, 'error');
                return false;
            }
        }
        return true;
    }

    function getRoutineRules() {
        return [
            {
                check: () => !isEmpty(routineName.val()),
                message: 'El nombre de la rutina no puede estar vacío.'
            },
            {
                check: () => !isEmpty(routineDescription.val()),
                message: 'La descripción de la rutina no puede estar vacía.'
            },
            {
                check: () => routineSelect.val() !== null,
                message: 'Debes seleccionar un tipo de rutina.'
            },
            {
                check: () => $('.exercise-select').length > 0,
                message: 'Debes agregar al menos un ejercicio.'
            },
            {
                check: () => {
                    let isValid = true;
                    $('.exercise-select').each(function () {
                        if ($(this).val() === null || $(this).val() === "0") isValid = false;
                    });
                    return isValid;
                },
                message: 'Debes seleccionar un ejercicio para cada ejercicio agregado.'
            }
        ];
    }

    function getRoutineCreationRules() {
        return [
            {
                check: () => !isEmpty(routineName.val()),
                message: 'El nombre de la rutina no puede estar vacío.',
            },
            {
                check: () => !isEmpty(routineDescription.val()),
                message: 'La descripcion de la rutina no puede estar vacía.',
            }
        ];
    }

});
