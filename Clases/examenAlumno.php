<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of examenAlumno
 *
 * @author iamunder
 */
class examenAlumno {
    
    private $id_Examen;
    private $id_Alumno;
    private $nota;
    
    function __construct($id_Examen, $id_Alumno, $nota) {
        $this->id_Examen = $id_Examen;
        $this->id_Alumno = $id_Alumno;
        $this->nota = $nota;
    }
    
    function getId_Examen() {
        return $this->id_Examen;
    }

    function getId_Alumno() {
        return $this->id_Alumno;
    }

    function getNota() {
        return $this->nota;
    }

    function setId_Examen($id_Examen): void {
        $this->id_Examen = $id_Examen;
    }

    function setId_Alumno($id_Alumno): void {
        $this->id_Alumno = $id_Alumno;
    }

    function setNota($nota): void {
        $this->nota = $nota;
    }



}
