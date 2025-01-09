<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php?action=inicio" method="post">
        <label for="nom">Nombre de usuario:</label>
        <input type="text" name="nom" value="<?php 
        if(isset($_COOKIE["usuario"])) echo $_COOKIE["usuario"];
        ?>">
        <br>
        <label for="psw">Contraseña:</label>
        <input type="text" name="psw">
        <br>
        <input type="checkbox" name="rec">
        <label for="rec">Recordar usuario</label>
        <input type="submit" value="Enviar" name="fIni">
    </form>
</body>
</html>