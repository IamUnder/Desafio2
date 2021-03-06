<?php

/**
 * Description of Usuario
 *
 * @author alejandro
 */
class User {

    //**************************************************************************
    //-----------------------------Atributos------------------------------------
    //**************************************************************************
    private $dni;
    private $mail;
    private $pass;
    private $nombre;
    private $apellido;
    private $activado;
    private $rol;

    //---------------------------Constructor------------------------------------
    function __construct($dni, $mail, $pass, $nombre, $apellido, $activado, $rol) {
        $this->dni = $dni;
        $this->mail = $mail;
        $this->pass = $pass;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        //1 activado, 0 desactivado
        $this->activado = $activado;
        //0 alumno, 1 profesor, 2 admin
        $this->rol = $rol;
    }

    //**************************************************************************
    //--------------------------Getters & Setters-------------------------------
    //**************************************************************************
    function getDni() {
        return $this->dni;
    }

    function getMail() {
        return $this->mail;
    }

    function getPass() {
        return $this->pass;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getActivado() {
        return $this->activado;
    }

    function getRol() {
        return $this->rol;
    }

    function setDni($dni): void {
        $this->dni = $dni;
    }

    function setMail($mail): void {
        $this->mail = $mail;
    }

    function setPass($pass): void {
        $this->pass = $pass;
    }

    function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    function setApellido($apellido): void {
        $this->apellido = $apellido;
    }

    function setActivado($activado): void {
        $this->activado = $activado;
    }

    function setRol($rol): void {
        $this->rol = $rol;
    }

    //**************************************************************************
    //-----------------------------TO STRING------------------------------------
    //**************************************************************************
    public function __toString() {
        return '[USUARIO] Nombre: ' . $this->nombre . ' - DNI: ' . $this->dni . ' - Correo: ' . $this->mail . ' - ROL: ' . $this->rol . ' - ESTADO: ' . $this->activado;
    }

}
