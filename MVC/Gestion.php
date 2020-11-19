<?php
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
        mysqli_close(self::$conexion);
    }

    public static function getUser($mail, $pass) {

        self::abrirConex();

        $consulta = 'SELECT * FROM usuarios WHERE mail=? AND pass=?';

        $stmt = self::$conexion->prepare($consulta);
        $stmt->bind_param("ss", $val1, $val2);
        $val1 = $mail;
        $val2 = $pass;
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

        $sentencia1 = "INSERT INTO usuarios VALUES('" . $val1 . "','" . $val2 . "','" . $val3 . "','" . $val4 . "','" . $val5 . "','" . $val6 . "')";

        //Insertamos el usuario
        if (mysqli_query(self::$conexion, $sentencia1)) {
            //Si conseguimos añadirlo en la tabla usuario, lo añadimos en la tabla AsignacionRol
            //Preparamos la sentencia2
            $sentencia2 = "INSERT INTO asignacion VALUES('" . $val1 . "'," . 0 . ");";
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
        $stmt->bind_param('s',$val1);
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
        $stmt->bind_param('s',$val1);
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
        $stmt->bind_param('is',$val1,$val2);
        $val1 = $rol;
        $val2 = $dni;
        $stmt->execute();
        self::cerrarConex();
    }
    
    public static function delUser($dni) {
        self::abrirConex();
        
        $consulta = 'DELETE FROM usuarios WHERE dni=?';
        
        $stmt = self::$conexion->prepare($consulta);
        $stmt->bind_param('s',$val1);
        $val1 = $dni;
        $stmt->execute();
        self::cerrarConex();
    }
}
