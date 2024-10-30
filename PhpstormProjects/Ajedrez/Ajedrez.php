<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        table, td {border: 2px solid blue; border-collapse: collapse;}
        td {width: 50px; height: 50px; margin: 0 auto;padding: 0px;}
        td.blanca {background-color: white;}
        td.gris {background-color: #EEEEEE;}
        img {opacity: 0.3;width: 100%;height: 100%;margin: 0px;}
    </style>

</head>
<body>
<?php

// Incluimos el archivo php con todas las funciones
include "CrearTabla.php";
// declaramos las variables que contienen los array con los nombres de las fichas
global $negras;
global $blancas;
// Llamamos a la funcion tablero la cual nos creará el tablero de ajedrez pasandole las dos variables con los array
tablero($negras, $blancas);

?>
</body>
</html>