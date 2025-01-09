<?php
    require_once('modelo.php');

    function inicio(){
        if (isset($_POST["fIni"])) {
            $db = new db();
            if($db->compCrede($_POST["nom"], $_POST["psw"])){
                setcookie("usuario", $_POST["nom"], time()+(86400*30));
                $nUsu = $_POST["nom"];
                require_once('bienvenida.php');
            }else{
                require_once('login.html');
            }
        }
    }

    if(isset($_REQUEST["action"])){
        $action = $_REQUEST["action"];

        $action();
    }else{
        if (isset($_COOKIE['usuario'])) {
            $nUsu = $_COOKIE['usuario'];
            require_once('bienvenida.php');
        }else{
            header("Location:login.html");
        }
    }
?>