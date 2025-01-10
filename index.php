<?php

function inicio(){ // Funcion de inicio
    if (isset($_POST["fIni"])) { // Si se ha pulsado el boton de enviar
        require_once('modelo.php'); // Incluimos el modelo
        require_once('class.db.php');
        $db = new db(); // Creamos un objeto de la clase db

        if(!isset($_POST["rec"]) && isset($_COOKIE["usuario"])){ // Si no se ha pulsado el checkbox de recordar y la cookie de usuario existe
            unset_cookie("usuario"); // Eliminamos la cookie
        } 

        if($db->compCrede($_POST["nom"], $_POST["psw"])){ // Si el usuario y la contraseña son correctos
            if(isset($_POST["rec"])){ // Si se ha pulsado el checkbox de recordar
                _setcookie("usuario", $_POST["nom"]); // Creamos la cookie
            }
            set_session("usu", $_POST["nom"]); // Creamos la sesion
            $nUsu = $_POST["nom"]; // Creamos la variable de sesion
            require_once('bienvenida.php'); // Incluimos el archivo de bienvenida
        }else{
            require_once('login.php'); // Incluimos el archivo de login
        }
    }
}

    function cerrar(){ // Funcion de cerrar
        require_once('modelo.php'); // Incluimos el modelo

        unset_session("usu"); // Eliminamos la sesion

        header("Location: index.php"); // Redirigimos al index
    }

    if(isset($_REQUEST["action"])){ // Si se ha pulsado un boton
        $action = $_REQUEST["action"]; // Creamos la variable de accion

        $action(); // Ejecutamos la accion
    }else{
        if (isset($_SESSION['usu'])) { // Si la sesion de usuario existe
            $nUsu = $_SESSION['usu']; // Creamos la variable de sesion
            require_once('bienvenida.php'); // Incluimos el archivo de bienvenida
        }else{
            header("Location:login.php"); // Redirigimos al login
        }
    }
?>