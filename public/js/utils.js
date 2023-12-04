function isEmpty(input) {
    return $.trim(input) === '';
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

function confirmDelete(buttonSelector) {
    document.querySelectorAll(buttonSelector).forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: "No podrás revertir esta acción",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    button.parentElement.submit();
                }
            });
        });
    });
}

// Como ya contiene un addEventListener, no es necesario agregarle un onclick al boton.
// Cualquier boton de la clase .delete-button activará la funcion.
confirmDelete('.delete-button');

