<?php
    class db{
        private $conn;
        
        public function __construct(){
            $this->conn = new mysqli("Localhost", "root", "", "cookies");
        }

        public function compCrede(String $nom, String $psw){
            $sentencia = "SELECT COUNT(*) FROM usuarios WHERE usuario = ? AND password = ?";
            $consulta = $this->conn->prepare($sentencia);
            $consulta->bind_param("ss", $nom, $psw);
            $consulta->bind_result($count);

            $consulta->execute();
            $consulta->fetch();

            $existe = false;

            if($count == 1) $existe = true;

            $consulta->close();
            return $existe;
        }
    }
?>