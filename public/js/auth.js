$(document).ready(function () {

    const MIN_PASSWORD_LENGTH = 8;

    const height = $("#height");
    const weight = $("#weight");
    const registerButton = $("#register-button");
    const loginButton = $('#login-button')
    const username = $("#username");
    const loginUser = $("#name");
    const email = $("#email");
    const password = $("#password");
    const loginPassword = $("#login-password");
    const birthdate = $("#birthdate");

    let prevWeightValue = '';

    function isEmpty(input) {
        return $.trim(input) === '';
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

    function validateFields(rules) {
        for (const rule of rules) {
            if (!rule.check()) {
                Swal.fire('Error', rule.message, 'error');
                return false;
            }
        }
        return true;
    }

    function getRegistrationRules() {
        return [
            {
                check: () => !isEmpty(username.val()),
                message: 'El campo de Usuario no puede estar vacío.',
            },
            {
                check: () => !isEmpty(email.val()) && isValidEmail(email.val()),
                message: 'Debes ingresar un Email válido.',
            },
            {
                check: () => {
                    const trimmedPassword = $.trim(password.val());
                    return !isEmpty(trimmedPassword) && trimmedPassword.length >= MIN_PASSWORD_LENGTH;
                },
                message: 'La contraseña debe tener al menos ' + MIN_PASSWORD_LENGTH + ' caracteres.',
            },
            {
                check: () => birthdate.val() !== '',
                message: 'Debes seleccionar una fecha de nacimiento.',
            },
            {
                check: () => {
                    const validationWeight = parseFloat(weight.val());
                    return !isNaN(validationWeight) && validationWeight >= 40 && validationWeight <= 200;
                },
                message: 'Debes ingresar un peso válido entre 40 y 200 kg.',
            },
            {
                check: () => {
                    const validationHeight = parseInt(height.val(), 10);
                    return !isNaN(validationHeight) && validationHeight >= 120 && validationHeight <= 230;
                },
                message: 'Debes seleccionar una estatura válida entre 120 y 230 cm.',
            },
        ];
    }

    function getLoginRules() {
        return [
            {
                check: () => !isEmpty(loginUser.val()),
                message: 'El campo de Usuario no puede estar vacío.',
            },
            {
                check: () => {
                    const trimmedPassword = $.trim(loginPassword.val());
                    return !isEmpty(trimmedPassword) && trimmedPassword.length >= MIN_PASSWORD_LENGTH;
                },
                message: 'La contraseña debe tener al menos ' + MIN_PASSWORD_LENGTH + ' caracteres.',
            },
        ];
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

    function handleAjaxRequest(type, url, data, successUrl) {
        $.ajax({
            type: type,
            url: url,
            data: data,
            success: function (response) {
                if (!response.success) Swal.fire('Información', response.message, 'info');
                if (response.operation === 'login') window.location.href = successUrl;
                if (response.operation === 'register') return Swal.fire('Éxito', response.message, 'success').then(() => {window.location.href = successUrl;});
            },
            error: handleAjaxError
        });
    }

    function handleAjaxError(error) {
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

    registerButton.on('click', function (e) {
        const TYPE = "POST";
        const URL = "/auth/register";
        e.preventDefault();
        if (validateFields(getRegistrationRules())) {
            handleAjaxRequest(TYPE, URL, {
                name: username.val(),
                email: email.val(),
                password: password.val(),
                birthdate: birthdate.val(),
                weight: weight.val(),
                height: height.val(),
                _token: $('meta[name="csrf-token"]').attr('content')
            }, '/');
        }
    });

    loginButton.on('click', function (e) {
        const TYPE = "POST";
        const URL = "/auth/login";
        e.preventDefault();
        if (validateFields(getLoginRules())) {
            handleAjaxRequest(TYPE, URL, {
                name: loginUser.val(),
                password: loginPassword.val(),
                _token: $('meta[name="csrf-token"]').attr('content')
            }, '/dashboard');
        }
    });

});

