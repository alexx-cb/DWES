<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "empresa";

try {
    $bd = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sentencia = $bd->prepare("DELETE FROM usuarios WHERE nombre = :nombre");
    $sentencia->bindParam(':nombre', $nombre);
    $nombre = "Angelines";

    $sentencia->execute();
    echo "Borrado exitoso ".$sentencia->rowCount();


}catch (PDOException $e){
    echo "Error: " . $e->getMessage();
}



?>



</body>
</html>