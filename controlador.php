<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once './MVC/Gestion.php';
require_once './Clases/User.php';
require_once './phpmailer/src/Exception.php';
require_once './phpmailer/src/PHPMailer.php';
require_once './phpmailer/src/SMTP.php';

//******************************************************************************
//*********************** Ventana Login ****************************************
//******************************************************************************
if (isset($_REQUEST['LogIn'])) {
    $mail = $_REQUEST['mail'];
    $pass = $_REQUEST['pass'];

    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6Lft9OMZAAAAAKX9KvyCQVyhuchB0UqDsbwsPO5d';
    $recaptcha_response = $_POST['recaptcha_response'];
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);

    if ($recaptcha->score >= 0.7) {
        $login = Gestion::getUser($mail, $pass);
//        echo $login;
        if ($login != null) {
            $_SESSION['user'] = $login;
            $rol = $login->getRol();
            switch ($rol) {
                case 0:
                    header('Location: Vista/usuario.php');
                    break;
                case 1:
                    header('Location: Vista/profesorPrincipal.php');
                    break;
                case 2:
                    funcAdmin();
//                    $allUser = $_SESSION['allUser'];
//
//                    foreach ($allUser as $v) {
//                        echo $v;
//                    }
                    header('Location: Vista/admin.php?rol=0');
                    break;
                default:
                    $_SESSION['mensaje'] = 'Error de rol';
                    header('Location: index.php');
                    break;
            }
        } else {
            $_SESSION['mensaje'] = 'Usuario incorrecto';
            header('Location: index.php');
        }
    } else {
        $_SESSION['mensaje'] = 'Captcha incorrecto';
        header('Location: index.php');
    }
}

//******************************************************************************
//*********************** Ventana Registro *************************************
//******************************************************************************

if (isset($_REQUEST['form_registrar'])) {

    $dni = $_REQUEST['registro_dni'];
    $nombre = $_REQUEST['registro_nombre'];
    $apellido = $_REQUEST['registro_apellido'];
    $mail = $_REQUEST['registro_mail'];
    $pass = $_REQUEST['registro_pass'];
    $activado = 1;
    $rol = 0;

    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6Led9OMZAAAAAE1ZLj7ZVjxVS2AJPAmyK4uo3gjf';
    $recaptcha_response = $_POST['recaptcha_response'];
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);

    //Si ponemos 0, confiamos 100% en el usuario
    if ($recaptcha->score >= 0) {
        if (!Gestion::existeUsuario($dni)) {
            $nuevo = new User($dni, $mail, $pass, $nombre, $apellido, $activado, $rol);
            if (Gestion::addUser($nuevo)) {
                $_SESSION['user'] = $nuevo;
                header('Location: Vista/usuario.php');
            }
        } else {
            $_SESSION['mensaje'] = 'Ya existe el usuario.';
            header('Location: Vista/panelRegistro.php');
        }
    } else {
        $_SESSION['mensaje'] = 'Captcha incorrecto';
        header('Location: Vista/panelRegistro.php');
    }
}

//******************************************************************************
//*********************** Ventana Recuperar password ***************************
//******************************************************************************
if (isset($_REQUEST['form_recuperar_next'])) {
    $cambios = [];
    $dni = $_REQUEST['recuperar_dni'];
    $mail = $_REQUEST['recuperar_mail'];
    $cambios[] = $dni;
    $cambios[] = $mail;
    $_SESSION['cambioPassword'] = $cambios;
    $paso = $_SESSION['recuperarPass'];
    if ($paso == 1) {
        $paso = 2;
        $_SESSION['recuperarPass'] = $paso;
    }
    header('Location: Vista/panelRecuperar.php');
}

if (isset($_REQUEST['form_recuperar_end'])) {
    $pass1 = $_REQUEST['recuperar_pass1'];
    $pass2 = $_REQUEST['recuperar_pass2'];
    $cambios = $_SESSION['cambioPassword'];
    $dni = $cambios[0];
    //En mail siempre pongo el mio, para que minetras haga pruebas, los correos me lleguen a mi
    $mail = 'alejandro.martin.perez.99@gmail.com';
    if (Gestion::alterPassword($dni, $pass2)) {
        //Enviar el correo

        $emailDestino = $mail;

        $mail = new PHPMailer();
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // Host de conexión SMTP
            $mail->SMTPAuth = true;
            $mail->Username = 'AuxiliarDAW2@gmail.com';                 // Usuario SMTP
            $mail->Password = 'Chubaca20';                           // Password SMTP
            $mail->SMTPSecure = 'ssl';                            // Activar seguridad TLS
            $mail->Port = 465;                                    // Puerto SMTP

            $mail->setFrom('AuxiliarDAW2@gmail.com');  // Mail del remitente
            $mail->addAddress($emailDestino);     // Mail del destinatario

            $mail->isHTML(true);
            $mail->Subject = 'Cambio de contraseña';  // Asunto del mensaje
            $mail->Body = 'Se ha actualizado tu contraseña';    // Contenido del mensaje (acepta HTML)

            $mail->send();
        } catch (Exception $e) {
            echo 'El mensaje no se ha podido enviar, error: ', $mail->ErrorInfo;
        }
        //Quito la variable de sesión para que se reinicie el paso por el cual vamos
        unset($_SESSION['recuperarPass']);
        header('Location: index.php');
    }
}

if (isset($_REQUEST['Back'])) {
    session_unset();
    session_start();
    $_SESSION['mensaje'] = 'Sesion cerrada con exito';
    header('Location: index.php');
}

if (isset($_REQUEST['Estado'])) {
    $rol = $_REQUEST['Estado'];
    if ($rol == 'Admin') {
        header('Location: Vista/profesorPrincipal.php');
    }else{
        header('Location: Vista/admin.php?rol=0');
    }
}
//******************************************************************************
//*********************** Ventana CRUD *************************************
//******************************************************************************
// BORRAR
if (isset($_REQUEST['borrar'])) {
    $dni = $_REQUEST['dni'];
    echo $dni;
    Gestion::delUser($dni);

    funcAdmin();
    header('Location: Vista/admin.php?rol=' . $_REQUEST['rol']);
}


// CAMBIAR DE ROL
if (isset($_REQUEST['cambiar'])) {
    $dni = $_REQUEST['dni'];
    echo $dni;
    if (Gestion::getActivado($dni) == 0) {
        Gestion::setRol($dni, 1);
    } else {
        Gestion::setRol($dni, 0);
    }
    funcAdmin();
    header('Location: Vista/admin.php?rol=' . $_REQUEST['rol']);
}


// EDITAR SUS ROLES
if (isset($_REQUEST['editar'])) {
    $dni = $_REQUEST['dni'];
    $mail = $_REQUEST['mail'];
    $pass = $_REQUEST['pass'];
    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];
    $rol = $_REQUEST['rol'];

    Gestion::editUser($dni, $mail, $pass, $nombre, $apellido, $rol);

    funcAdmin();
    header('Location: Vista/admin.php?rol=' . $_REQUEST['rol']);

    echo $dni . $mail . $pass . $nombre . $apellido . $rol;
}

// Añadir usuario
if (isset($_REQUEST['crud_registrar'])) {

    $dni = $_REQUEST['registro_dni'];
    $nombre = $_REQUEST['registro_nombre'];
    $apellido = $_REQUEST['registro_apellido'];
    $mail = $_REQUEST['registro_mail'];
    $pass = $_REQUEST['registro_pass'];
    $activado = 1;
    $rol = $_REQUEST['registro_rol'];

    if (!Gestion::existeUsuario($dni)) {
        $nuevo = new User($dni, $mail, $pass, $nombre, $apellido, $activado, $rol);
        if (Gestion::addUser($nuevo)) {
            funcAdmin();
            header('Location: Vista/admin.php?rol=' . $rol);
        }
    } else {
        $_SESSION['mensaje'] = 'Ya existe el usuario.';
        header('Location: Vista/admin.php?rol=' . $rol);
    }
}

//******************************************************************************
//*********************** Botones Vistas del menu ******************************
//******************************************************************************

if (isset($_REQUEST['vistaExamenesActivados'])) {
    $ventanaSeleccionada = $_REQUEST['vistaExamenesActivados'];
    $_SESSION['vistaMenu'] = $ventanaSeleccionada;
    header('Location: Vista/profesorPrincipal.php?estado=1');
    die();
}

if (isset($_REQUEST['vistaExamenesDesactivados'])) {
    $ventanaSeleccionada = $_REQUEST['vistaExamenesDesactivados'];
    $_SESSION['vistaMenu'] = $ventanaSeleccionada;
    header('Location: Vista/profesorPrincipal.php?estado=0');
    die();
}

if (isset($_REQUEST['vistaExamenesRealizados'])) {
    $ventanaSeleccionada = $_REQUEST['vistaExamenesRealizados'];
    $_SESSION['vistaMenu'] = $ventanaSeleccionada;
    header('Location: Vista/profesorPrincipal.php?estado=2');
    die();
}

if (isset($_REQUEST['vistaAddPreguntas'])) {
    $ventanaSeleccionada = $_REQUEST['vistaAddPreguntas'];
    $_SESSION['vistaMenu'] = $ventanaSeleccionada;
    header('Location: Vista/profesorAddPreguntas.php');
    die();
}

if (isset($_REQUEST['vistaAddExamen'])) {
    $ventanaSeleccionada = $_REQUEST['vistaAddExamen'];
    $preguntasDisponibles = Gestion::getPreguntas();
    $_SESSION['preguntasDisponibles'] = $preguntasDisponibles;
    $_SESSION['vistaMenu'] = $ventanaSeleccionada;
    header('Location: Vista/profesorAddExamen.php');
    die();
}

//******************************************************************************
//****************************** Funciones *************************************
//******************************************************************************

function funcAdmin() {
    $allUser = Gestion::getAllUser();
    $_SESSION['allUser'] = $allUser;
}
