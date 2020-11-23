<?php

require_once './Clases/Pregunta.php';
require_once './MVC/Gestion.php';
if (!isset($_SESSION)) {
    session_start();
} else {
    session_start();
}

//******************************************************************************
//**************** Ventana add Pregunta - Tipo de pregunta *********************
//******************************************************************************
if (isset($_REQUEST['crearPregunta'])) {
    $tipo = $_REQUEST['tipo'];
    switch ($tipo) {
        case 'texto':
            $_SESSION['tipo'] = $tipo;
            header('Location: Vista/profesorAddPreguntas.php');
            break;
        case 'numerico':
            $_SESSION['tipo'] = $tipo;
            header('Location: Vista/profesorAddPreguntas.php');
            break;
        case 'unaOpcion':
            $_SESSION['tipo'] = $tipo;
            header('Location: Vista/profesorAddPreguntas.php');
            break;
        case 'variasOpciones':
            $_SESSION['tipo'] = $tipo;
            header('Location: Vista/profesorAddPreguntas.php');
            break;
    }
}

//******************************************************************************
//**************** Ventana add Pregunta - Form Pregunta ************************
//******************************************************************************

if (isset($_REQUEST['addPregunta'])) {
    if (isset($_SESSION['tipo'])) {
        $tipo = $_SESSION['tipo'];
        switch ($tipo) {
            case 'texto':
                $descripcion = $_REQUEST['descripcion'];
                $respuestaCorrecta = $_REQUEST['ta_resp_correcta_texto'];
                $preguntaNueva = new Pregunta($tipo, $descripcion, $respuestaCorrecta, '', '', '', $respuestaCorrecta);
                if (Gestion::addPregunta($preguntaNueva)) {
                    header('Location: Vista/profesorAddPreguntas.php');
                }
                break;
            case 'numerico':
                $descripcion = $_REQUEST['descripcion'];
                $respuestaCorrecta = $_REQUEST['resp_correcta_numerico'];
                $preguntaNueva = new Pregunta($tipo, $descripcion, $respuestaCorrecta, '', '', '', $respuestaCorrecta);
                if (Gestion::addPregunta($preguntaNueva)) {
                    header('Location: Vista/profesorAddPreguntas.php');
                }
                break;
            case 'unaOpcion':
                $descripcion = $_REQUEST['descripcion'];
                $opcionCorrecta = $_REQUEST['opcion'];
                $respuestaValida_A = $_REQUEST['resp_a'];
                $respuestaValida_B = $_REQUEST['resp_b'];
                $respuestaValida_C = $_REQUEST['resp_c'];
                $respuestaValida_D = $_REQUEST['resp_d'];
                $_SESSION['opcionCorrecta'] = $opcionCorrecta;
                switch ($opcionCorrecta) {
                    case 'opc_a':
                        $preguntaNueva = new Pregunta($tipo, $descripcion, $respuestaValida_A, $respuestaValida_B, $respuestaValida_C, $respuestaValida_D, $respuestaValida_A);
                        $_SESSION['preguntaNueva'] = $preguntaNueva;
                        break;
                    case 'opc_b':
                        $preguntaNueva = new Pregunta($tipo, $descripcion, $respuestaValida_A, $respuestaValida_B, $respuestaValida_C, $respuestaValida_D, $respuestaValida_B);
                        $_SESSION['preguntaNueva'] = $preguntaNueva;
                        break;
                    case 'opc_c':
                        $preguntaNueva = new Pregunta($tipo, $descripcion, $respuestaValida_A, $respuestaValida_B, $respuestaValida_C, $respuestaValida_D, $respuestaValida_C);
                        $_SESSION['preguntaNueva'] = $preguntaNueva;
                        break;
                    case 'opc_d':
                        $preguntaNueva = new Pregunta($tipo, $descripcion, $respuestaValida_A, $respuestaValida_B, $respuestaValida_C, $respuestaValida_D, $respuestaValida_D);
                        $_SESSION['preguntaNueva'] = $preguntaNueva;
                        break;
                }

                if (Gestion::addPregunta($preguntaNueva)) {
                    header('Location: Vista/profesorAddPreguntas.php');
                }
                break;
            case 'variasOpciones':
                //Mirar opciones
                $descripcion = $_REQUEST['descripcion'];
                $respValida_A = $_REQUEST['cboxa'];
                $respValida_B = $_REQUEST['cboxb'];
                $respValida_C = $_REQUEST['cboxc'];
                $respValida_D = $_REQUEST['cboxd'];

                $respuestaValida_A = $_REQUEST['resp_cbox_a'];
                $respuestaValida_B = $_REQUEST['resp_cbox_b'];
                $respuestaValida_C = $_REQUEST['resp_cbox_c'];
                $respuestaValida_D = $_REQUEST['resp_cbox_d'];

                $separador = '###';
                $respuestaCorrecta = '';
                if ($respValida_A == 'on') {
                    $respCorrecta = $respCorrecta . $respuestaValida_A . $separador;
                }

                if ($respValida_B == 'on') {
                    $respCorrecta = $respCorrecta . $respuestaValida_B . $separador;
                }

                if ($respValida_C == 'on') {
                    $respCorrecta = $respCorrecta . $respuestaValida_C . $separador;
                }

                if ($respValida_D == 'on') {
                    $respCorrecta = $respCorrecta . $respuestaValida_D . $separador;
                }

                $preguntaNueva = new Pregunta($tipo, $descripcion, $respuestaValida_A, $respuestaValida_B, $respuestaValida_C, $respuestaValida_D, $respCorrecta);
                $_SESSION['preguntaNueva'] = $preguntaNueva;
                if (Gestion::addPregunta($preguntaNueva)) {
                    header('Location: Vista/profesorAddPreguntas.php');
                }
                break;
        }
    }
}