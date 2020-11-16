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
    
    $login = Gestion::getUser($mail, $pass);
    echo $login;
    if ($login != null) {
        $_SESSION['user'] = $login;
        header('Location: Vista/usuario.php');
    }else{
        header('Location: Vista/profesor.php');
    }
} else{
    echo 'Soy una mierda';
}