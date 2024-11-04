<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
require_once("Ejercicio1.php");

$Coche = new Coche();
?>

<h1>Datos del coche</h1>

<?php $Coche->mostrarValoresCoche($Coche);?>

<h2>Cambiamos el color del coche a amarillo</h2>
<?php $Coche->setColor("Amarillo");?>
<ul>
    <li>El nuevo color del coche es:  <?= $Coche->getColor();?></li>
</ul>

<h2>El coche va a acelerar 4 veces y frenar 1</h2>
<?php $Coche->acelerar();?>
<?php $Coche->acelerar();?>
<?php $Coche->acelerar();?>
<?php $Coche->acelerar();?>
<?php $Coche->frenar();?>

<p>La velocidad del coche es: <?= $Coche->getVelocidad();?></p>

<h2>Creamos un nuevo coche verde y modelo gallardo</h2>
<?php
$Coche2 = new Coche();
$Coche2->setColor("Verde");
$Coche2->setModelo("Gallardo");
?>

<h1>Mostramos los valores del nuevo Coche</h1>
<?php $Coche2->mostrarValoresCoche($Coche2);?>


</body>
</html>