/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function vLogin() {
    
    const formulario = document.getElementsByTagName('form')[0];
    
    const email = document.getElementById('defaultSubscriptionFormEmail');
    const emailError = document.getElementById('emailError');

    const pass = document.getElementById('defaultSubscriptionFormPassword');
    const passError = document.getElementById('passError');

    console.log(email);

    // EventListener email
    email.addEventListener('input', function (e) {
        // Si es valido eliminamos el error
        if (email.validity.valid) {
            emailError.textContent = '';
        } else { // Si tiene un error lo mostramos
            mostrarEmailError();
        }
    });

    // EventListener pass
    pass.addEventListener('input', function (e) {
        // Si es valido eliminamos el error
        if (pass.validity.valid) {
            passError.textContent = '';
        } else { // Si tiene un error lo mostramos
            mostrarPassError();
        }
    });




    // Mostrar Errores

    // Prevenir el envio de formulario
    formulario.addEventListener('submit', function (event) {
        // Comprobamos que todos los campos son correcto para dejar enviar al formulario
        if (!email.validity.valid) {
            mostrarEmailError();
            event.preventDefault();
        }
        if (!pass.validity.valid) {
            mostrarPassError();
            event.preventDefault();
        }
    });
    
    // Error email
    function mostrarEmailError() {
        if (email.validity.valueMissing) {
            // Si el campo está vacío
            emailError.textContent = 'Debe introducir una dirección de correo electrónico.';
        } else if (email.validity.typeMismatch) {
            // Si el campo no contiene una dirección de correo electrónico
            emailError.textContent = 'El valor introducido debe ser una dirección de correo electrónico.';
        }
    }
    
    // Error contraseña
    function mostrarPassError() {
        if (pass.validity.valueMissing) {
            // Si el campo está vacío
            passError.textContent = 'Debe introducir una contraseña.';
        } else if (pass.validity.tooShort) {
            // Si los datos son demasiado cortos
            passError.textContent = '8-10 caracteres, debe tener un número, una letra mayuscula y una minuscula.';
        }
    }
}

function vCrud() {
    console.log('Estamos en la validacion del CRUD');
}