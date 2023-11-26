
    $(document).ready(function() {
        var cont = 1;
    $('#addExerciseButton').click(function() {
        cont++;
        var newRow = `
            <div class="row mb-3">
                <div class="col">
                    <h4>${cont}</h4>
                </div>
                <div class="col">
                    <select class="form-control">
                        <option selected>-- Elegir Ejercicio --</option>
                        <!-- Opciones de ejercicios aquí -->
                    </select>
                </div>
            </div>
        `;
        $('#exerciseSection').append(newRow);
    });
});

