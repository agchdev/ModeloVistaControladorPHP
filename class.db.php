<?php
    class db{ // Clase db
        private $conn; // Variable de conexion
        
        public function __construct(){ // Constructor
            require_once('../../cred.php');
            $this->conn = new mysqli("Localhost", USU_CONN, PSW_CONN, "cookies"); // Creamos la conexion
        }

        public function compCrede(String $nom, String $psw){ // Esta funcion comprueba las credenciales
            $sentencia = "SELECT COUNT(*) FROM usuarios WHERE usuario = ? AND password = ?"; // Creamos la sentencia
            $consulta = $this->conn->prepare($sentencia); // Creamos la consulta
            $consulta->bind_param("ss", $nom, $psw); // Creamos los parametros
            $consulta->bind_result($count); // Creamos el resultado

            $consulta->execute(); // Ejecutamos la consulta
            $consulta->fetch(); // Obtenemos el resultado

            $existe = false; // Variable para comprobar si el usuario existe

            if($count == 1) $existe = true; // Si el usuario existe

            $consulta->close(); // Cerramos la consulta
            return $existe; // Devolvemos el valor de la variable
        }

        public function checkUsuario(String $nom){ // Esta funcion comprueba si el usuario existe
            $sentencia = "SELECT COUNT(*) FROM usuarios WHERE usuario = ?"; // Creamos la sentencia
            $consulta = $this->conn->prepare($sentencia); // Creamos la consulta
            $consulta->bind_param("s", $nom); // Creamos los parametros
            $consulta->bind_result($count); // Creamos el resultado
    
            $consulta->execute(); // Ejecutamos la consulta
            $consulta->fetch(); // Obtenemos el resultado
    
            $xiste = false; // Variable para comprobar si el usuario existe
    
            if($count == 1) $existe = true; // Si el usuario existe
    
            $consulta->close(); // Cerramos la consulta
            return $existe; // Devolvemos el valor de la variable
        }
    
        public function registrarUsu(String $nom, String $psw){ // Esta funcion registra un usuario
            $sentencia = "INSERT INTO usuarios (usuario, password) VALUES (?, ?)"; // Creamos la sentencia
            $consulta = $this->conn->prepare($sentencia); // Creamos la consulta
            $consulta->bind_param("ss", $nom, $psw); // Creamos los parametros
    
            $consulta->execute(); // Ejecutamos la consulta
    
            $res = false; // Variable para comprobar si se ha registrado el usuario
            if($consulta->affected_rows == 1) $res = true; // Si se ha registrado el usuario
    
            $consulta->close(); // Cerramos la consulta
    
            return $res; // Devolvemos el valor de la variable
        }
    }

    
?>