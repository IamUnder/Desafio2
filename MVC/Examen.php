<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Examen
 *
 * @author iamunder
 */
class Examen {
    //**************************************************************************
    //-----------------------------Atributos------------------------------------
    //**************************************************************************
    private $id;
    private $id_Profesor;
    private $fecha_Inicio;
    private $fecha_Fin;
    private $estado;
    private $titulo;
    private $descripcion;
    
    //---------------------------Constructor------------------------------------
    function __construct($id, $id_Profesor, $fecha_Inicio, $fecha_Fin, $estado, $titulo, $descripcion) {
        $this->id = $id;
        $this->id_Profesor = $id_Profesor;
        $this->fecha_Inicio = $fecha_Inicio;
        $this->fecha_Fin = $fecha_Fin;
        $this->estado = $estado;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
    }
    
    //**************************************************************************
    //--------------------------Getters & Setters-------------------------------
    //**************************************************************************
    
    function getId() {
        return $this->id;
    }

    function getId_Profesor() {
        return $this->id_Profesor;
    }

    function getFecha_Inicio() {
        return $this->fecha_Inicio;
    }

    function getFecha_Fin() {
        return $this->fecha_Fin;
    }

    function getEstado() {
        return $this->estado;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setId_Profesor($id_Profesor): void {
        $this->id_Profesor = $id_Profesor;
    }

    function setFecha_Inicio($fecha_Inicio): void {
        $this->fecha_Inicio = $fecha_Inicio;
    }

    function setFecha_Fin($fecha_Fin): void {
        $this->fecha_Fin = $fecha_Fin;
    }

    function setEstado($estado): void {
        $this->estado = $estado;
    }

    function setTitulo($titulo): void {
        $this->titulo = $titulo;
    }

    function setDescripcion($descripcion): void {
        $this->descripcion = $descripcion;
    }



}
