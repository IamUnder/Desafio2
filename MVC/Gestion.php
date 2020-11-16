<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Gestion
 *
 * @author iamunder
 */




class Gestion {
    
    public static $conexion;
    
    public static function abrirConex() {
        self::$conexion = new mysqli('192.168.64.2', 'jorge', 'chubaca2020', 'Desafio2');
        
        if (self::$conexion->connect_errno) {
            print "Fallo al conectar a MySQL: " . mysqli_connect_error();
        }
    }
    
    public static function cerrarConex() {
        mysqli_close(self::$conexion);
    }
    
    public static function getUser($mail, $pass) {
        
        self::abrirConex();
        
        $consulta = 'SELECT * FROM usuarios WHERE mail=? AND pass=?';
        
        $stmt = self::$conexion->prepare($consulta);
        $stmt->bind_param("ss",$val1,$val2);
        $val1 = $mail;
        $val2 = $pass;
        $stmt->execute();
        
        if ($resultado = $stmt->get_result()) {
            while ($row = $resultado->fetch_assoc()) {
                $r = new User($row['dni'], $row['mail'], $row['pass'], $row['nombre'], $row['apellido'], $row['activado'], 1);
            }
            mysqli_free_result($resultado);
        }
        
        self::cerrarConex();
        return $r;
    }
}
