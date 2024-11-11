<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
function comprobarUsuario($usuario, $pass){
    if($usuario === "usuario" && $pass === "1234"){
        $usu["nombre"] = "usuario";
        $usu["rol"] = 0;
        return $usu;
    }else if($usuario === "admin" && $pass === "1234"){
        $usu["nombre"] = "admin";
        $usu["rol"] = 1;
        return $usu;
    }
    return null;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usu = comprobarUsuario($_POST["usuario"], $_POST["pass"]);
    if($usu === false){
        $errores = true;
        $usuario = $_POST["usuario"];
    }else{
        session_start();
        $_SESSION["usuario"] = $usu['nombre'];
    }
}




?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="Usuario">Usuario</label>
    <input type="text" name="usuario" id="usuario">
    <br>

    <label for="pass">Constrañesa</label>
    <input type="password" name="pass" id="pass">



</form>

</body>
</html>