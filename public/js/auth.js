$(document).ready(function () {

    const MIN_PASSWORD_LENGTH = 8;

    const height = $("#height");
    const weight = $("#weight");
    const registerButton = $("#register-button");
    const username = $("#username");
    const email = $("#email");
    const password = $("#password");
    const birthdate = $("#birthdate");

    let prevWeightValue = '';

    function isEmpty(input) {
        return $.trim(input.val()) === '';
    }

    function isFirstDigitLessThanFour(value) {
        const firstDigit = value.charAt(0);
        return firstDigit && firstDigit < '4';
    }

    function limitLength(element, maxLength) {
        const value = $(element).val();
        if (value.toString().split('.')[0].length > maxLength) {
            $(element).val(value.slice(0, maxLength));
        }
    }

    function isValidEmail(email) {
        const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        return regex.test(email);
    }

    function validateFields() {
        const trimmedPassword = $.trim(password.val());

        if (isEmpty(username)) {
            Swal.fire('Error', 'El campo de Usuario no puede estar vacío.', 'error');
            return false;
        }
        if (isEmpty(email) || !isValidEmail(email.val())) {
            Swal.fire('Error', 'Debes ingresar un Email válido.', 'error');
            return false;
        }
        if (isEmpty(password) || trimmedPassword.length < MIN_PASSWORD_LENGTH || trimmedPassword !== password.val()) {
            Swal.fire('Error', 'La contraseña debe tener al menos ' + MIN_PASSWORD_LENGTH + ' caracteres.', 'error');
            return false;
        }
        if (!birthdate.val()) {
            Swal.fire('Error', 'Debes seleccionar una fecha de nacimiento.', 'error');
            return false;
        }
        if (isEmpty(weight) || parseFloat(weight.val()) < 40 || parseFloat(weight.val()) > 200) {
            Swal.fire('Error', 'Debes ingresar un peso válido entre 40 y 200 kg.', 'error');
            return false;
        }
        if (!height.val() || parseInt(height.val()) < 120 || parseInt(height.val()) > 230) {
            Swal.fire('Error', 'Debes seleccionar una estatura válida entre 100 y 250 cm.', 'error');
            return false;
        }
        return true;
    }

    height.on('input', function () {
        const heightValue = $(this).val();
        $('#heightLabel').text('Estatura (' + heightValue + ' cm)');
    });

    weight.on('input', function () {
        const currentValue = $(this).val();

        if (isFirstDigitLessThanFour(currentValue)) {
            $(this).val(prevWeightValue);
            return;
        }

        limitLength(this, 3);
        prevWeightValue = $(this).val();
    });

    registerButton.on('click', function (e) {
        e.preventDefault();

        if (validateFields()) {
            $.ajax({
                type: "POST",
                url: "/auth/register",
                data: {
                    name: username.val(),
                    email: email.val(),
                    password: password.val(),
                    birthdate: birthdate.val(),
                    weight: weight.val(),
                    height: height.val(),
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success){
                        Swal.fire('Éxito', response.message, 'success').then(() => {
                            $(location).attr('href', '/');
                        });
                    }

                },
                error: function (error) {
                    if (error.status === 422) {
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
                }
            });
        }
    });


});

