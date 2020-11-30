<?php

//******************************************************************************
//************************* Ventana Add Examen *********************************
//******************************************************************************

require_once './Clases/User.php';
require_once './Clases/Pregunta.php';
require_once './MVC/Examen.php';
require_once './MVC/Gestion.php';
session_start();

if (isset($_REQUEST['crearExamen'])) {
    $pregunta = [];
    $idPregunta;
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $dniProfesor = $user->getDni();
    }
    $titulo = $_REQUEST['tituloExamen'];
    $descripcion = $_REQUEST['descripcion'];
    $preguntas = $_REQUEST['pregunta'];
    foreach ($preguntas as $preguntaAux) {
        $pregunta[] = $preguntaAux;
    }

    $examen = new Examen('NULL', $dniProfesor, 'default', 'default', 0, $titulo, $descripcion);
    if (Gestion::addExamen($examen)) {
        $idExamen = Gestion::getIdExamen($dniProfesor, $titulo);
        for ($i = 0; $i < sizeof($pregunta); $i++) {
            $idPregunta = Gestion::getIdPregunta($pregunta[$i]);
            Gestion::asignarPreguntasAExamen($idExamen, $idPregunta);
        }
        //Recogemos las preguntas sin asignar de la BBDD
        $preguntasDisponibles = Gestion::getPreguntas();
        $tipoTexto = [];
        $tipoNumerico = [];
        $tipoUnaOpcion = [];
        $tipoVariasOpciones = [];
        for ($i = 0; $i < sizeof($preguntasDisponibles); $i++) {
            $idPregunta = $preguntasDisponibles[$i]->getIdPregunta();
            $idExamen = $preguntasDisponibles[$i]->getIdExamen();
            $pregunta = $preguntasDisponibles[$i]->getPregunta();
            $tipo = $preguntasDisponibles[$i]->getTipo();
            $preguntaAux = new PreguntaAux($idPregunta, $idExamen, $pregunta, $tipo);
            //Comprobamos el tipo de pregunta para poder filtrar por el tipo de pregunta, así poder 
            //tener una clasificación a la hora de mostrarlas en el HTML
            switch ($tipo) {
                case 'texto':
                    $tipoTexto[] = $preguntaAux;
                    $_SESSION['preguntasDisponiblesTexto'] = $tipoTexto;
                    break;
                case 'numerico':
                    $tipoNumerico[] = $preguntaAux;
                    $_SESSION['preguntasDisponiblesNumerico'] = $tipoNumerico;
                    break;
                case 'unaOpcion':
                    $tipoUnaOpcion[] = $preguntaAux;
                    $_SESSION['preguntasDisponiblesUnaOpcion'] = $tipoUnaOpcion;
                    break;
                case 'variasOpciones':
                    $tipoVariasOpciones[] = $preguntaAux;
                    $_SESSION['preguntasDisponiblesVariasOpciones'] = $tipoVariasOpciones;
                    break;
            }
        }

        if (sizeof($preguntasDisponibles) <= 0) {
            unset($_SESSION['preguntasDisponiblesTexto']);
            unset($_SESSION['preguntasDisponiblesNumerico']);
            unset($_SESSION['preguntasDisponiblesUnaOpcion']);
            unset($_SESSION['preguntasDisponiblesVariasOpciones']);
        }

        $_SESSION['preguntasDisponibles'] = $preguntasDisponibles;
        header('Location: Vista/profesorAddExamen.php');
    }
}


if (isset($_REQUEST['borrar'])) {
    $prueba = $_REQUEST['prueba'];
    foreach ($prueba as $dato) {
        echo $dato . '<br>';
    }
}
