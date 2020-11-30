<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './MVC/Gestion.php';
require_once './MVC/PreguntaAux.php';
require_once './Clases/Pregunta.php';
require_once './Clases/User.php';
require_once './Clases/examenAlumno.php';

session_start();

if (isset($_REQUEST['realizar_examen'])) {
    echo ' esto funciona y el codigo del examen es: ' . $_REQUEST['id'];
    $id = $_REQUEST['id'].'<br>';
    
    $examen = Gestion::getExamen($id);
    $preguntasExamen = Gestion::getPreguntasExamen($id);
   
    $respuestasExamen = [];
    
    echo $examen->getTitulo();
    foreach ($preguntasExamen as $v) {
        echo $v->getPregunta().'<br>';
        $id2 = $v->getIdPregunta();
        $respuestasExamen[] = Gestion::getRespuestas($id2);
    }
    
    $_SESSION['examen'] = $examen;
    $_SESSION['preguntasExamen'] = $preguntasExamen;
    $_SESSION['respuestasExamen'] = $respuestasExamen;
    
    header('Location: Vista/alumnoExamen.php');
    
    
//    foreach ($respuestasExamen as $v) {
//        echo $v->getTipo().'<br>';
//    }
//    
//    echo '-----------------------------------'.'<br>';
//    
//    foreach ($preguntasExamen as $k => $v) {
//        echo 'La pregunta es: ' . $v->getPregunta() . ' y la respuesta correcta es: ' . $respuestasExamen[$k]->getRespuestaCorrecta().'<br>';
//    }
}

if (isset($_REQUEST['send_examen'])) {
    
    $user = $_SESSION['user'];
    $examen = $_SESSION['examen'];
    $respuestasExamen = $_SESSION['respuestasExamen'];
    $preguntasExamen = $_SESSION['preguntasExamen'];
    
    // Variables locales para el examen
    $id_Examen = $examen->getId();
    $id_Alumno = $user->getDni();
    
    echo 'El id del examen es: ' . $id_Examen . ' y el dni del alumno es: ' . $id_Alumno . '<br>';
    
    $respuestas = $_REQUEST['respuesta'];
    
    foreach ($respuestas as $k => $v) {
        if ($v == null) {
            echo 'La respuesta: ' . $k . ' vale null' . $v . '<br>';
        }else{
            echo 'La respuesta: ' . $k . ' vale ' . $v . '<br>';
        }
    }
    
    if (Gestion::isExamen($id_Examen, $id_Alumno)) {
        Gestion::deleteRespuestas($id_Examen, $id_Alumno);
    }
    
    foreach ($preguntasExamen as $k => $v) {
        $id_Pregunta = $v->getIdPregunta();
        switch ($v->getTipo()) {
            case 'texto':
                echo $k . ': ' . $v->getPregunta() . ' la respuesta es ' . $respuestas[$k] . '<br>';
                //Introducir base de datos
                Gestion::addRespuesta($id_Examen, $id_Alumno, $id_Pregunta, $respuestas[$k]);
                break;
            case 'numerico':
                echo $k . ': ' . $v->getPregunta() . ' la respuesta es ' . $respuestas[$k] . '<br>';
                // Introducir base de datos
                Gestion::addRespuesta($id_Examen, $id_Alumno, $id_Pregunta, $respuestas[$k]);
                break;
            case 'unaOpcion':
                $resCorrecta = '';
                $respuestaUna = $_REQUEST['respuesta'.$k];
                echo $k . ': ' . $v->getPregunta() . ' la respuesta es ';
                foreach ($respuestaUna as $w) {
                    echo $w . ' ';
                    $resCorrecta = $w;
                }
                //Introducir base de datos
                Gestion::addRespuesta($id_Examen, $id_Alumno, $id_Pregunta, $resCorrecta);
                echo '<br>';
                break;
            case 'variasOpciones':
                $resCorrecta = '';
                $respuestaVarias = $_REQUEST['respuesta'.$k];
                echo $k . ': ' . $v->getPregunta() . ' la respuesta es ';
                foreach ($respuestaVarias as $w) {
                    $resCorrecta = $resCorrecta . $w . '###';
                    echo $w . ' ';
                }
                echo '<br>';
                // Introducir base de datos
                Gestion::addRespuesta($id_Examen, $id_Alumno, $id_Pregunta, $resCorrecta);
                break;

            default:
                echo 'Hay un error <br>';
                break;
        }
        
        header('Location: Vista/usuario.php');
    }
    
}

// EDITAR SUS DATOS
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
    
    $_SESSION['user'] = Gestion::getUser($mail, $pass);
    header('Location: Vista/alumnoEditarPerfil.php');
    
    echo $dni . $mail . $pass . $nombre . $apellido . $rol;
}

if (isset($_REQUEST['vistaEditProfile'])) {
    header('Location: Vista/alumnoEditarPerfil.php');
}

if (isset($_REQUEST['vistaPrincipal'])) {
    header('Location: Vista/usuario.php');
}


function funcAdmin() {
    $allUser = Gestion::getAllUser();
    $_SESSION['allUser'] = $allUser;
}