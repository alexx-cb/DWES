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
        $preparada = $bd->prepare("SELECT nombre FROM usuarios where rol = :rol");
        $preparada->bindParam(':rol', $rol);
        $rol =2;
        $preparada->execute();

        echo "<p><trong> Numero de usuarios con rol".$rol.": </trong>".$preparada->rowCount()."</p>";

        //leemos los datos del recordset que nos devuleve SELECT en el objeto PDOStatement
        $preparada->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $preparada->fetch()){
            echo "<p>nombre: ".$row['nombre']."</p>";
        }


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