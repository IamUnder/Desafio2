<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require_once './MVC/Gestion.php';
require_once './Clases/User.php';


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
        echo $login;
        if ($login != null) {
            $_SESSION['user'] = $login;
            header('Location: Vista/usuario.php');
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