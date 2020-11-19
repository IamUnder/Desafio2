<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require_once './MVC/Gestion.php';
require_once './Clases/User.php';

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
                    header('Location: Vista/profesor.php');
                    break;
                case 2:
                    funcAdmin();
//                    $allUser = $_SESSION['allUser'];
//
//                    foreach ($allUser as $v) {
//                        echo $v;
//                    }
                    header('Location: Vista/admin.php');
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
} else {
    echo 'Soy una mierda';
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
} else {
    echo 'Soy otra mierda! :D';
}

if (isset($_REQUEST['Back'])) {
    echo 'Quiero cerrar sesion';
}

//******************************************************************************
//*********************** Ventana Registro *************************************
//******************************************************************************

function funcAdmin() {
    $allUser = Gestion::getAllUser();
    $_SESSION['allUser'] = $allUser;
}
