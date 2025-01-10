<?php
    function _setcookie(String $nom, $val) { // Esta funcion establece una cookie
        setcookie($nom, $val, time()+(86400*30)); // Esta funcion establece una cookie con un tiempo de vida de 30 dias
    }

    function unset_cookie(String $nom) { // Esta funcion elimina una cookie
        $comp = false; // Variable para comprobar si la cookie existe
        if(isset($_COOKIE[$nom])) { // Si la cookie existe
            setcookie($nom, "", time()-30); // Eliminamos la cookie
        }else{
            $comp = true; // La cookie no existe
        }
        return $comp; // Devolvemos el valor de la variable
    }

    function start_session() { // Esta funcion inicia una sesion
        if(session_status() == PHP_SESSION_NONE) { // Si la sesion no esta iniciada
            session_start(); // Iniciamos la sesion
        }    
    }

    function set_session(String $nom, $val) { // Esta funcion establece una sesion
        start_session();
        $_SESSION[$nom] = $val; // Esta funcion establece una sesion
    }

    function get_session(String $nom){ // Esta funcion obtiene una sesion
        start_session();
        return $_SESSION[$nom]; // Esta funcion obtiene una sesion
    }

    function unset_session(String $nom) { // Esta funcion elimina una sesion
        start_session(); // Iniciamos la sesion
        session_unset(); // Esta funcion elimina una sesion
        session_destroy(); // Esta funcion destruye una sesion
    }

    function is_session(String $nom){ // Esta funcion comprueba si hay una sesion
        start_session();
        $isset = isset($_SESSION[$nom]); // Esta funcion comprueba si hay una sesion
        return $isset; // Devolvemos el valor de la variable
    }
?>