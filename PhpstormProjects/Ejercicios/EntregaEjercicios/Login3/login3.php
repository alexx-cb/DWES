<?php
/** Inicializamos las variables que contienen los datos de autentificación*/
$us="usuario";
$pass="1234";

/** Recogemos los datos que ha introducido el usuario ya que con POST primero se va a mostrar el formulario y lo validamos*/
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST['usuario'] === $us && $_POST['pass'] === $pass) {
        header("Location: entrar.html");
        exit();
    } else {
        header("Location: error.html");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Login</title>
</head>
<body>

<?php

/** Mostramos el formulario si se reciben los datos por GET*/
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    ?>


    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Usuario: <input type="text" name="usuario"><br>
        Contraseña: <input type="password" name="pass"><br>
        <input type="submit" value="Entrar" name="entrar">
    </form>

    <?php
}
?>

</body>
</html>