// Variables
// Formulario
const formulario = document.getElementById('registro');
// Nombre
const nombre = document.getElementById('nombre');
const nombreError = document.getElementById('nombreError');
// Apellidos
const apellido = document.getElementById('apellido');
const apellidoError = document.getElementById('apellidoError');
// Correo
const mail = document.getElementById('mail');
const mailError = document.getElementById('mailError');
// Password
const pass = document.getElementById('pass');
const passError = document.getElementById('passError');

/* ----------- Función para controlar la validación del formulario ---------- */
// Esta función se carga con la página y esta pendiente de informar al
// usuario si hay errores o no mientras interactua con el formulario
function validacion() {


    // EventListener nombre
    nombre.addEventListener('input', function (e) {
        // Si es valido eliminamos el error
        if (nombre.validity.valid) {
            nombreError.textContent = ' ';
        } else {
            mostrarNombreError();
        }
    });

    // EventListener apellido
    apellido.addEventListener('input', function (e) {
        // Si es valido eliminamos el error
        if (apellido.validity.valid) {
            apellidoError.textContent = ' ';
        } else {
            mostrarApellidoError();
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

    // EventListener password
    pass.addEventListener('input', function (e) {
        // Si es valido eliminamos el error
        if (pass.validity.valid) {
            passError.textContent = ' ';
        } else { // Si tiene un error lo mostramos
            mostrarPassError();
        }
    });

    // EvenListener para controlar el envio del formulario
    formulario.addEventListener('submit', function (event) {
        // Comprobamos que todos los campos son correcto para dejar enviar al formulario
        if (!nombre.validity.valid) {
            mostrarNombreError();
            event.preventDefault();
        }
        if (!apellido.validity.valid) {
            mostrarapellidoError();
            event.preventDefault();
        }
        if (!mail.validity.valid) {
            mostrarmailError();
            event.preventDefault();
        }
        if (!pass.validity.valid) {
            mostrarPassError();
            event.preventDefault();
        }
    });

}

// Función para mostrar los errores del nombre
function mostrarNombreError() {
    if (nombre.validity.valueMissing) {
        // Si el campo esta vacio
        nombreError.textContent = 'Debe introducir un nombre';
    } else if (nombre.validity.typeMismatch) {
        // Si el campo no contiene un nombre
        nombreError.textContent = 'Debe intoducir un nombre obligatoriamente';
    }
}

// Función para mostrar los errores del apellido
function mostrarApellidoError() {
    if (nombre.validity.valueMissing) {
        // Si el campo esta vacio
        apellidoError.textContent = 'Debe introducir los apellidos';
    } else if (nombre.validity.typeMismatch) {
        // Si el campo no contiene un nombre
        apellidoError.textContent = 'Debe intoducir los apellidos obligatoriamente';
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
function mostrarPassError() {
    if (pass.validity.valueMissing) {
        // Si el campo está vacío
        pass.textContent = 'Debe introducir una contraseña.';
    } else if (pass.validity.tooShort) {
        // Si los datos son demasiado cortos
        passError.textContent = 'La contraseña debe contener entre 8 -10 crácteres, una mayúscula y un dígito';
    }
}