// Variables
// Formulario
//const formulario = document.getElementsByTagName('form')[0];
const formulario1 = document.getElementById('form1');
const formulario2 = document.getElementById('form2');
// DNI
const dni = document.getElementById('dni');
const dniError = document.getElementById('dniError');
// Correo
const mail = document.getElementById('mail');
const mailError = document.getElementById('mailError');
// Password1
const pass1 = document.getElementById('pass1');
const passError1 = document.getElementById('pass1Error');
// Password2
const pass2 = document.getElementById('pass2');
const passError2 = document.getElementById('pass2Error');
// Password iguales
const passError = document.getElementById('passError');

/* ----------- Función para controlar la validación del formulario ---------- */
// Esta función se carga con la página y esta pendiente de informar al
// usuario si hay errores o no mientras interactua con el formulario
function validacion() {

    if (formulario1 != null) {
        // EventListener DNI
        dni.addEventListener('input', function (e) {
            // Si es valido eliminamos el error
            if (dni.validity.valid) {
                dniError.textContent = '';
            } else { // Si tiene un error lo mostramos
                mostrarDniError();
            }
        });

        // EventListener email
        mail.addEventListener('input', function (e) {
            // Si es valido eliminamos el error
            if (mail.validity.valid) {
                mailError.textContent = ' ';
            } else { // Si tiene un error lo mostramos
                mostrarMailError();
            }
        });

        // EvenListener para controlar el envio del formulario
        formulario1.addEventListener('submit', function (event) {
            // Comprobamos que todos los campos son correcto para dejar enviar al formulario
            if (!dni.validity.valid) {
                mostrarDniError();
                event.preventDefault();
            }
            if (!mail.validity.valid) {
                mostrarMailError();
                event.preventDefault();
            }
        });
    }

    if (formulario2 != null) {
        // EventListener password
        pass1.addEventListener('input', function (e) {
            // Si es valido eliminamos el error
            if (pass1.validity.valid) {
                passError1.textContent = ' ';
            } else { // Si tiene un error lo mostramos
                mostrarPass1Error();
            }
        });

        // EventListener password
        pass2.addEventListener('input', function (e) {
            // Si es valido eliminamos el error
            if (pass2.validity.valid) {
                passError2.textContent = ' ';
            } else { // Si tiene un error lo mostramos
                mostrarPass2Error();
            }
        });

        // EvenListener para controlar el envio del formulario
        formulario2.addEventListener('submit', function (event) {
            // Comprobamos que todos los campos son correcto para dejar enviar al formulario
            if (!pass1.validity.valid) {
                mostrarPass1Error();
                event.preventDefault();
            }
            if (!pass2.validity.valid) {
                mostrarPass2Error();
                event.preventDefault();
            }
            if (pass1.value != pass2.value) {
                mostrarPassError();
                event.preventDefault();
            }
        });
    }

}

// Función para mostrar los errores del DNI
function mostrarDniError() {
    if (dni.validity.valueMissing) {
        // Si el campo esta vacio
        dniError.textContent = 'Debe introducir su DNI';
    } else if (dni.validity.patternMismatch) {
        // Si no sigue el patrón
        dniError.textContent = 'El DNI no coincide con lo esperado 00000000X';
    }
}


// Función para mostrar los errores del email
function mostrarMailError() {
    if (mail.validity.valueMissing) {
        // Si el campo está vacío
        mailError.textContent = 'Debe introducir una dirección de correo electrónico.';
    }
}

// Función para mostrar los errores del email
function mostrarPass1Error() {
    if (pass1.validity.valueMissing) {
        // Si el campo está vacío
        pass1.textContent = 'Debe introducir una contraseña.';
    } else if (pass1.validity.tooShort) {
        // Si los datos son demasiado cortos
        passError1.textContent = 'La contraseña debe contener entre 8 -10 crácteres, una mayúscula y un dígito';
    }
}

function mostrarPass2Error() {
    if (pass2.validity.valueMissing) {
        // Si el campo está vacío
        pass2.textContent = 'Debe introducir una contraseña.';
    } else if (pass2.validity.tooShort) {
        // Si los datos son demasiado cortos
        passError2.textContent = 'La contraseña debe contener entre 8 -10 crácteres, una mayúscula y un dígito';
    }
}

function mostrarPassError() {
    if (pass1.value != pass2.value) {
        passError.textContent = 'Las contraseñas no coinciden';
    }else{
        passError.textContent = ' '; 
    }
    
}