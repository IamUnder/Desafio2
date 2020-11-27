<?php

/*
 * Clase pensada para recoger las preguntas sin asignar de la BBDD
 * 
 * ¿Posible ñapa?
 */

/**
 * Description of PreguntaAux
 *
 * @author alejandro
 */
class PreguntaAux {

    private $idPregunta;
    private $idExamen;
    private $pregunta;
    private $tipo;

    function __construct($idPregunta, $idExamen, $pregunta, $tipo) {
        $this->idPregunta = $idPregunta;
        $this->idExamen = $idExamen;
        $this->pregunta = $pregunta;
        $this->tipo = $tipo;
    }

    function getIdPregunta() {
        return $this->idPregunta;
    }

    function getIdExamen() {
        return $this->idExamen;
    }

    function getPregunta() {
        return $this->pregunta;
    }

    function setIdPregunta($idPregunta): void {
        $this->idPregunta = $idPregunta;
    }

    function setIdExamen($idExamen): void {
        $this->idExamen = $idExamen;
    }

    function setPregunta($pregunta): void {
        $this->pregunta = $pregunta;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

}
