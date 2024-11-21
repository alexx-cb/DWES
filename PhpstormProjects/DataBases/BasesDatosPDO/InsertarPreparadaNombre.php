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

try{
    $bd = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try{
        $preparada = $bd->prepare("INSERT INTO usuarios(nombre, clave, rol) values (:nombre,:clave,:rol)");
        $preparada->bindParam(':rol', $rol);


        $preparada->bindParam(':nombre', $nombre);
        $preparada->bindParam(':clave', $clave);
        $preparada->bindParam(':clave', $clave);

        $nombre = "Carmen";
        $clave = "25252525";
        $rol = "1";

        $preparada->execute();

        $nombre = "Angelines";
        $clave = "12543";
        $rol = "2";

        $preparada->execute();




    }catch (PDOException $err){
        echo "error: " . $err->getMessage();
    }

}catch(PDOException $e){
    echo "Error: ".$e->getMessage();
}

$preparada = null;


?>


</body>
</html>
