<?php

/**
 * Description of Pregunta
 *
 * @author alejandro
 */
class Pregunta {

    private $tipo;
    private $descripcion;
    private $respuesta1;
    private $respuesta2;
    private $respuesta3;
    private $respuesta4;
    private $respuestaCorrecta;

    function __construct($tipo, $descripcion, $respuesta1, $respuesta2, $respuesta3, $respuesta4, $respuestaCorrecta) {
        $this->tipo = $tipo;
        $this->descripcion = $descripcion;
        $this->respuesta1 = $respuesta1;
        $this->respuesta2 = $respuesta2;
        $this->respuesta3 = $respuesta3;
        $this->respuesta4 = $respuesta4;
        $this->respuestaCorrecta = $respuestaCorrecta;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getRespuesta1() {
        return $this->respuesta1;
    }

    function getRespuesta2() {
        return $this->respuesta2;
    }

    function getRespuesta3() {
        return $this->respuesta3;
    }

    function getRespuesta4() {
        return $this->respuesta4;
    }

    function getRespuestaCorrecta() {
        return $this->respuestaCorrecta;
    }

    function setDescripcion($descripcion): void {
        $this->descripcion = $descripcion;
    }

    function setRespuesta1($respuesta1): void {
        $this->respuesta1 = $respuesta1;
    }

    function setRespuesta2($respuesta2): void {
        $this->respuesta2 = $respuesta2;
    }

    function setRespuesta3($respuesta3): void {
        $this->respuesta3 = $respuesta3;
    }

    function setRespuesta4($respuesta4): void {
        $this->respuesta4 = $respuesta4;
    }

    function setRespuestaCorrecta($respuestaCorrecta): void {
        $this->respuestaCorrecta = $respuestaCorrecta;
    }

}
