<?php

require_once 'PreguntaAux.php';
require_once 'Examen.php';

/**
 * Description of Gestion
 *
 * @author iamunder
 */
class Gestion {

    public static $conexion;

    public static function abrirConex() {
        //Jorge
        self::$conexion = new mysqli('localhost:7007', 'root', 'secret', 'Desafio2');
        //Alejandro
//        self::$conexion = new mysqli('localhost', 'alejandro', 'Chubaca2020', 'Desafio2');

        if (self::$conexion->connect_errno) {
            print "Fallo al conectar a MySQL: " . mysqli_connect_error();
        }
    }

    public static function cerrarConex() {
        //mysqli_close(self::$conexion);
        self::$conexion = NULL;
    }

    public static function getUser($mail, $pass) {

        self::abrirConex();

//        $consulta = 'SELECT * FROM usuarios WHERE mail=? AND pass=?';
        $consulta = 'SELECT * FROM usuarios WHERE mail=?';
        
        $stmt = self::$conexion->prepare($consulta);
//        $stmt->bind_param("ss", $val1, $val2);
        $stmt->bind_param("s", $val1);
        $val1 = $mail;
//        $val2 = $pass;
        $stmt->execute();

        if ($resultado = $stmt->get_result()) {
            while ($row = $resultado->fetch_assoc()) {
                $rol = self::getRol($row['dni']);
                $r = new User($row['dni'], $row['mail'], $row['pass'], $row['nombre'], $row['apellido'], $row['activado'], $rol);
            }
            mysqli_free_result($resultado);
        }

        self::cerrarConex();
        return $r;
    }

    public static function getAllUser() {

        self::abrirConex();

        $consulta = 'SELECT * FROM usuarios';
        $res = array();

        if ($resultado = self::$conexion->query($consulta)) {
            while ($row = $resultado->fetch_assoc()) {
                $rol = self::getRol($row['dni']);
                $r = new User($row['dni'], $row['mail'], $row['pass'], $row['nombre'], $row['apellido'], $row['activado'], $rol);
                $res[] = $r;
            }
        }
        self::cerrarConex();
        return $res;
    }

    public static function existeUsuario($dni) {
        //Abrimos conexion
        self::abrirConex();

        $existe = false;

        //Preparamos la consulta
        $consulta = 'SELECT * FROM usuarios WHERE dni=?';
        $stmt = self::$conexion->prepare($consulta);
        $stmt->bind_param("s", $val1);
        $val1 = $dni;
        $stmt->execute();

        //Ejecutamos la sentencia

        if ($resultado = $stmt->get_result()) {
            if ($row = $resultado->fetch_assoc()) {
                $existe = true;
            }
            mysqli_free_result($resultado);
        }

        //Cerramos conex
        self::cerrarConex();

        return $existe;
    }

    public static function addUser($usuario) {
        //Abrimos conexion
        self::abrirConex();

        $add = false;

        $val1 = $usuario->getDni();
        $val2 = $usuario->getMail();
        $val3 = $usuario->getPass();
        $val4 = $usuario->getNombre();
        $val5 = $usuario->getApellido();
        $val6 = $usuario->getActivado();
        $val7 = $usuario->getRol();

        $sentencia1 = "INSERT INTO usuarios VALUES('" . $val1 . "','" . $val2 . "','" . $val3 . "','" . $val4 . "','" . $val5 . "','" . $val6 . "')";

        //Insertamos el usuario
        if (mysqli_query(self::$conexion, $sentencia1)) {
            //Si conseguimos añadirlo en la tabla usuario, lo añadimos en la tabla AsignacionRol
            //Preparamos la sentencia2
            $sentencia2 = "INSERT INTO asignacion VALUES('" . $val1 . "'," . $val7 . ");";
            //Si conseguimos añadir al usuario
            if (mysqli_query(self::$conexion, $sentencia2)) {
                //Ponemos add a true =  usuario añadido.
                $add = true;
            }
        }

        //Cerramos conexion
        self::cerrarConex();

        return $add;
    }

    public static function getRol($dni) {
        self::abrirConex();

        $consulta = 'SELECT id FROM asignacion WHERE dni=?';

        $stmt = self::$conexion->prepare($consulta);
        $stmt->bind_param('s', $val1);
        $val1 = $dni;
        $stmt->execute();

        if ($resultado = $stmt->get_result()) {
            while ($row = $resultado->fetch_assoc()) {
                $res = $row['id'];
            }
        }
        self::cerrarConex();

        return $res;
    }

    public static function getActivado($dni) {
        self::abrirConex();

        $consulta = 'SELECT activado FROM usuarios WHERE dni=?';

        $stmt = self::$conexion->prepare($consulta);
        $stmt->bind_param('s', $val1);
        $val1 = $dni;
        $stmt->execute();

        if ($resultado = $stmt->get_result()) {
            while ($row = $resultado->fetch_assoc()) {
                $res = $row['activado'];
            }
        }

        self::cerrarConex();
        return $res;
    }

    public static function setRol($dni, $rol) {
        self::abrirConex();

        $consulta = 'UPDATE usuarios set activado=? where dni=?';

        $stmt = self::$conexion->prepare($consulta);
        $stmt->bind_param('is', $val1, $val2);
        $val1 = $rol;
        $val2 = $dni;
        $stmt->execute();
        self::cerrarConex();
    }

    public static function delUser($dni) {
        self::abrirConex();

        $consulta = 'DELETE FROM usuarios WHERE dni=?';

        $stmt = self::$conexion->prepare($consulta);
        $stmt->bind_param('s', $val1);
        $val1 = $dni;
        $stmt->execute();
        self::cerrarConex();
    }

    public static function editUser($dni, $mail, $pass, $nombre, $apellido, $rol) {
        self::abrirConex();

        if ($pass != null) {
            $consulta1 = 'UPDATE usuarios SET mail=? , pass=? , nombre=? , apellido=? WHERE dni=?';
            $stmt1 = self::$conexion->prepare($consulta1);
            $stmt1->bind_param('sssss', $val1, $val2, $val3, $val4, $val5);
            $val1 = $mail;
            $val2 = $pass;
            $val3 = $nombre;
            $val4 = $apellido;
            $val5 = $dni;
            $stmt1->execute();
        }else{
            $consulta1 = 'UPDATE usuarios SET mail=? , nombre=? , apellido=? WHERE dni=?';
            $stmt1 = self::$conexion->prepare($consulta1);
            $stmt1->bind_param('ssss', $val1, $val2, $val3, $val4);
            $val1 = $mail;
            $val2 = $nombre;
            $val3 = $apellido;
            $val4 = $dni;
            $stmt1->execute();
        }

        $consulta2 = 'UPDATE asignacion SET id=? WHERE dni=?';
        $stmt2 = self::$conexion->prepare($consulta2);
        $stmt2->bind_param('is', $val6, $val7);
        $val6 = $rol;
        $val7 = $dni;
        $stmt2->execute();
        self::cerrarConex();
    }

    public static function alterPassword($dni, $pass) {
        self::abrirConex();

        $modified = false;

        $consulta = "UPDATE usuarios SET pass = '" . $pass . "' WHERE dni = '" . $dni . "'";

        if (mysqli_query(self::$conexion, $consulta)) {
            //Ponemos modified a true =  usuario modificado.
            $modified = true;
        }

        self::cerrarConex();
        return $modified;
    }

    public static function addPregunta($pregunta) {
        self::abrirConex();

        $add = false;

        $tipo = $pregunta->getTipo();
        //$idExamen = self::getIdExamen();
        $idExamen = -1;
        $descripcion = $pregunta->getDescripcion();
        $resp1 = $pregunta->getRespuesta1();
        $resp2 = $pregunta->getRespuesta2();
        $resp3 = $pregunta->getRespuesta3();
        $resp4 = $pregunta->getRespuesta4();
        $respCorrecta = $pregunta->getRespuestaCorrecta();

        $sentencia1 = "INSERT INTO preguntas VALUES(NULL, " . $idExamen . ",'" . $descripcion . "')";

        if (mysqli_query(self::$conexion, $sentencia1)) {
            $idPregunta = "SELECT idPregunta FROM preguntas where idExamen = " . $idExamen . " AND pregunta = '" . $descripcion . "'";

            if ($resultado = mysqli_query(self::$conexion, $idPregunta)) {
                if ($fila = mysqli_fetch_array($resultado)) {
                    $idPregunta = $fila[0];
                    $sentencia2 = "INSERT INTO respuestasCorrectas VALUES(" . $idPregunta . ",'" . $tipo . "','" . $resp1 . "','" . $resp2 . "','" . $resp3 . "','" . $resp4 . "','" . $respCorrecta . "')";
                    if (mysqli_query(self::$conexion, $sentencia2)) {
                        $add = true;
                    }
                }
            }
        }

        self::cerrarConex();
        return $add;
    }

    public static function getPreguntas() {
        $preguntasDisponibles = [];

        self::abrirConex();

        $sentencia = "SELECT * FROM preguntas WHERE idExamen = -1";
        if ($resultado = mysqli_query(self::$conexion, $sentencia)) {
            while ($fila = mysqli_fetch_row($resultado)) {
                $idPregunta = $fila[0];
                $idExamen = $fila[1];
                $descripcion = $fila[2];
                $pregunta = new PreguntaAux($idPregunta, $idExamen, $descripcion);
                $preguntasDisponibles[] = $pregunta;
            }
        }

        self::cerrarConex();
        return $preguntasDisponibles;
    }
    
    public static function getAllExamen() {
        self::abrirConex();

        $consulta = 'SELECT * FROM examen ORDER BY estado DESC';
        $res = array();

        if ($resultado = self::$conexion->query($consulta)) {
            while ($row = $resultado->fetch_assoc()) {
                $r = new Examen($row['id'], $row['id_Profesor'] , $row['fecha_Inicio'], $row['fecha_Fin'], $row['estado'], $row['titulo'], $row['descripcion']);
                $res[] = $r;
            }
        }
        self::cerrarConex();
        return $res;
    }

}
