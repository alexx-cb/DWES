<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
$enviado = false;
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $enviado = true;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    Nombre: <input type="text" name="nombre"><br><br>
    Telefono: <input type="text" name="telefono"><br><br>
    Email: <input type="email" name="correo"><br><br>
    <input type="submit" value="Enviar" name="enviar">


</form>

<?php

if($enviado){
    echo "¡Buenos días,". $_POST["nombre"]."!";
    echo "<br>";
    echo "Te voy a enviar spam a ".$_POST["correo"]." y te llamare de madrugada a " .$_POST["telefono"].".";
    echo "<br>";
    echo "Enviado desde iPhone.";
}

?>



</body>
</html>