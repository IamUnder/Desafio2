<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RespuestasAlumno
 *
 * @author iamunder
 */
class RespuestasAlumno {
    //put your code here
    
    private $id_Examen;
    private $id_Alumno;
    private $id_Pregunta;
    private $respuesta;
    
    function __construct($id_Examen, $id_Alumno, $id_Pregunta, $respuesta) {
        $this->id_Examen = $id_Examen;
        $this->id_Alumno = $id_Alumno;
        $this->id_Pregunta = $id_Pregunta;
        $this->respuesta = $respuesta;
    }

    function getId_Examen() {
        return $this->id_Examen;
    }

    function getId_Alumno() {
        return $this->id_Alumno;
    }

    function getId_Pregunta() {
        return $this->id_Pregunta;
    }

    function getRespuesta() {
        return $this->respuesta;
    }

    function setId_Examen($id_Examen): void {
        $this->id_Examen = $id_Examen;
    }

    function setId_Alumno($id_Alumno): void {
        $this->id_Alumno = $id_Alumno;
    }

    function setId_Pregunta($id_Pregunta): void {
        $this->id_Pregunta = $id_Pregunta;
    }

    function setRespuesta($respuesta): void {
        $this->respuesta = $respuesta;
    }

    function __toString() {
        return 'El alumno ' . $this->id_Alumno . ' en el examen con id ' . $this->id_Examen . ' ha respondido ' . $this->respuesta . ' en la pregunta con id ' . $this->id_Pregunta;
    }
    
}
