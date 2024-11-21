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

    echo "consulta realizada con bindParam: <br>";
    $nom = "Susana";
    $s = $bd->prepare("SELECT * FROM usuarios WHERE nombre = :nombre");
    $s->setFetchMode(PDO::FETCH_ASSOC);
    $s->bindParam(':nombre', $nom);
    $nom = "daniel";

    $s->execute();

    while ($fila = $s->fetch()) {
        echo "Nombre: {$fila["nombre"]} <br>";
        echo "Clave: {$fila["clave"]} <br>";
        echo "Rol: {$fila["rol"]} <br><br>";
    }

    echo "consulta realizada con bindValue: <br>";
    $nom = "Susana";
    $s = $bd->prepare("SELECT * FROM usuarios WHERE nombre = :nombre");
    $s->setFetchMode(PDO::FETCH_OBJ);
    $s->bindValue(':nombre', $nom);
    $nom = "daniel";
    $s->execute();

    while ($fila = $s->fetch(PDO::FETCH_OBJ)) {
        echo "nombre: ". $fila->nombre ." <br>";
        echo "clave: ". $fila->clave ." <br>";
        echo "rol: ". $fila->rol ." <br><br>";
    }


}catch(PDOException $e){
    echo $e->getMessage();
}
?>
</body>
</html>