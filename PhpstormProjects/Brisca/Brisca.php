<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php

/** @var array $palos con cada tipo de palo de la baraja */
$palos = ["oros", "bastos", "espadas", "copas"];

/** @var array $carta con todas las cartas que hay dentro de cada palo*/
$carta = ["1","2","3","4","5","6","7","8","9","10","11","12"];

/** @var array $puntos array asociatico con el valor de cada carta en la brisca*/
$puntos = ['1' => 11, '3' => 10, '12' => 4, '11' => 3, '10' => 2, '2' => 0, '4' => 0, '5' => 0, '6' => 0, '7' => 0];

/** bucle que crea un array nuevo con el palo y el numero de cada carta*/
foreach ($palos as $palo) {
    foreach ($carta as $cartas) {
        $barajaCompleta [] = $palo . "_" .$cartas;
    }
}

/**
 * Funcion que reparte un numero de cartas pasado como parámetro de una baraja pasada como parámetro y evita que
 * las cartas salgan repetidas
 *
 * @param $barajaCompleta array Con la baraja de la que se van a repartir las cartas
 * @param $numCartas Integer Numero de cartas que se van a repartir de la baraja
 * @return mixed
 */
function repartir(array $barajaCompleta, int $numCartas): mixed
{
    for($i=0;$i<$numCartas;$i++){
        $indice = array_rand($barajaCompleta);
        $cartas [] = $barajaCompleta[$indice];
        unset($barajaCompleta[$indice]);
    }
    return $cartas;
}

/** Array que almacena las cartas del jugador*/
$manoJugador = repartir($barajaCompleta, 3);
/** Array que almacena las cartas de la mesa*/
$manoMesa = repartir($barajaCompleta, 10);

/** Bucle que recorre el array de cartas de la mesa, coge el numero del nombre de la carta y lo compara con
 * el array de puntos para posteriormente sumar todos los puntos y almacenarlo en una variable entera.
 */
$puntoSuma = 0;
foreach ($manoMesa as $mano) {
    // Separar palo y número de la carta
    $nombre = explode("_", $mano)[1];
    if (isset($puntos[$nombre])) {
        $puntoSuma += $puntos[$nombre];
    }
}



/** Bucle que recorre el array con las cartas del jugador para coger cada nombre del array y escribirlo en el documento*/
echo "<br>mano del jugador<br>";
foreach ($manoJugador as $carta) {
    echo "<img src='imagenes/$carta.jpg' alt='$carta' style='width:100px;'>";
}

/** Bucle que recorre el array con las cartas de la mesa para coger cada nombre del array y escribirlo en el documento*/
echo "<br>cartas en la mesa<br>";
foreach ($manoMesa as $mano) {
    echo "<img src='imagenes/$mano.jpg' alt='$mano' style='width:100px;'>";
}

/** Escribimos los puntos totales al final del documento*/
echo "<br>Puntos totales del jugador: ".$puntoSuma;


?>

</body>
</html>