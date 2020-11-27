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
//****************************** CRUD EXAMEN ***********************************
//******************************************************************************
if (isset($_REQUEST['activar_examen'])) {
    $id = $_REQUEST['id'];
    
    Gestion::examenOn($id);
    funcProfesor();
    
    header('Location: Vista/profesorPrincipal.php');
}

if (isset($_REQUEST['desactivar_examen'])) {
    $id = $_REQUEST['id'];
    
    Gestion::examenOff($id);
    funcProfesor();
    
    header('Location: Vista/profesorPrincipal.php');
}

if (isset($_REQUEST['editar_examen'])) {
    $id = $_REQUEST['id'];
    $titulo = $_REQUEST['titulo'];
    $fecha_inicio = $_REQUEST['fecha_inicio'];
    $fecha_fin = $_REQUEST['fecha_fin'];
    $descripcion = $_REQUEST['descripcion'];
    
    Gestion::editExamen($id,$titulo,$fecha_inicio,$fecha_fin,$descripcion);
    funcProfesor();
    
    header('Location: Vista/profesorPrincipal.php');
}

if (isset($_REQUEST['borrar_examen'])) {
    $id = $_REQUEST['id'];
    
    Gestion::deleteExamen($id);
    funcProfesor();
    
    header('Location: Vista/profesorPrincipal.php');
}

if (isset($_REQUEST['corregir_examen'])) {
    $id = $_REQUEST['id'];
    
    // Falta funcionalidad
    Gestion::checkExamen($id);
    funcProfesor();
    
    header('Location: Vista/profesorPrincipal.php');
}

//******************************************************************************
//**************************** Modificar perfil ********************************
//******************************************************************************
if (isset($_REQUEST['editarPerfil'])) {
    $dni = $_REQUEST['dni'];
    $mail = $_REQUEST['mail'];
//    $pass = $_REQUEST['pass'];
    if ($_REQUEST['pass'] != null) {
        $pass = password_hash($_REQUEST['pass'], PASSWORD_DEFAULT);
    }else{
        $pass = null;
    }
    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];
    $rol = $_REQUEST['rol'];

    Gestion::editUser($dni, $mail, $pass, $nombre, $apellido, $rol);
    
    $login = Gestion::getUser($mail, $pass);
    $_SESSION['user'] = $login;
    header('Location: Vista/profesorPerfil.php');
    
    echo $dni . $mail . $pass . $nombre . $apellido . $rol;
}


//******************************************************************************
//****************************** Funciones *************************************
//******************************************************************************

function funcProfesor(){
    $allExamen = Gestion::getAllExamen();
    $_SESSION['allExamen'] = $allExamen;
}