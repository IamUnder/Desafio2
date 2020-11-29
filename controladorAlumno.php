<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './MVC/Gestion.php';
require_once './MVC/PreguntaAux.php';
require_once './Clases/Pregunta.php';

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
    
    $respuesta = $_REQUEST['respuesta'];
    
    foreach ($respuesta as $v) {
        if ($v == null) {
            echo 'null <br>';
        }else{
            echo $v.'<br>';
        }
        
    }
}

if (isset($_REQUEST['vistaEditProfile'])) {
    header('Location: Vista/alumnoEditarPerfil.php');
}