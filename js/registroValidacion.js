// Variables
// Formulario
const formulario = document.getElementsByTagName('form')[0];
// DNI
const dni = document.getElementById('dni');
const dniError = document.getElementById('dniError');
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


    // EventListener DNI
    dni.addEventListener('input', function (e) {
        // Si es valido eliminamos el error
        if (dni.validity.valid) {
            dniError.innerHTML = 'Ok';
            dniError.className = 'bg-success';
        } else { // Si tiene un error lo mostramos
            mostrarDniError();
        }
    });

    // EventListener nombre
    nombre.addEventListener('input', function (e) {
        // Si es valido eliminamos el error
        if (nombre.validity.valid) {
            nombreError.innerHTML = "Ok";
            nombreError.className = "bg-success";
        } else {
            mostrarNombreError();
        }
    });

    // EventListener apellido
    apellido.addEventListener('input', function (e) {
        // Si es valido eliminamos el error
        if (apellido.validity.valid) {
            apellidoError.innerHTML = "Ok";
            apellidoError.className = "bg-success";
        } else {
            mostrarApellidoError();
        }
    });

    // EventListener email
    mail.addEventListener('input', function (e) {
        // Si es valido eliminamos el error
        if (mail.validity.valid) {
            mailError.innerHTML = 'Ok';
            mailError.className = 'bg-success';
        } else { // Si tiene un error lo mostramos
            mostrarMailError();
        }
    });

    // EventListener password
    pass.addEventListener('input', function (e) {
        // Si es valido eliminamos el error
        if (pass.validity.valid) {
            passError.innerHTML = 'Ok';
            passError.className = 'bg-success';
        } else { // Si tiene un error lo mostramos
            mostrarPassError();
        }
    });

    // EvenListener para controlar el envio del formulario
    formulario.addEventListener('submit', function (event) {
        // Comprobamos que todos los campos son correcto para dejar enviar al formulario
        if (!dni.validity.valid) {
            mostrarDniError();
            event.preventDefault();
        }
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

// Función para mostrar los errores del DNI
function mostrarDniError() {
    if (dni.validity.valueMissing) {
        // Si el campo esta vacio
        dniError.textContent = 'Debe introducir su DNI';
    } else if (dni.validity.patternMismatch) {
        // Si no sigue el patrón
        dniError.textContent = 'El DNI no coincide con lo esperado 00000000X';
    }
    // Establece el estilo apropiado
    dniError.className = 'bg-danger';
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
    // Establece el estilo apropiado
    nombreError.className = 'bg-danger';
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
    // Establece el estilo apropiado
    apellidoError.className = 'bg-danger';
}

// Función para mostrar los errores del email
function mostrarMailError() {
    if (mail.validity.valueMissing) {
        // Si el campo está vacío
        mailError.textContent = 'Debe introducir una dirección de correo electrónico.';
    }

    // Establece el estilo apropiado
    mailError.className = 'bg-danger';
}

// Función para mostrar los errores del email
function mostrarPassError() {
    if (pass.validity.valueMissing) {
        // Si el campo está vacío
        pass.textContent = 'Debe introducir una contraseña.';
    } else if (pass.validity.tooShort) {
        // Si los datos son demasiado cortos
        passError.textContent = 'La contraseña debe contener almenos 8 carácteres y 1 dígito';
    }
    // Establece el estilo apropiado
    passError.className = 'bg-danger';
}