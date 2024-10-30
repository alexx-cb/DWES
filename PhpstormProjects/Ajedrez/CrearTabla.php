<?php

/** @var array $blancas */
$blancas = array("torreb","caballob","alfilb","reinab","reyb","alfilb","caballob","torreb");
/** @var array $negras */
$negras = array("torren","caballon","alfiln","reinan","reyn","alfiln","caballon","torren");


/**
 * Funcion que dibuja el tablero que integra la funcion de "color" y "ponerFicha"
 * @param $negras
 * @param $blancas
 * @return void
 */
function tablero($negras, $blancas){
    echo "<table>";
    for ($i = 0; $i < 8; $i++) {
        echo "<tr>";

        for ($j = 0; $j < 8; $j++) {

            if ($i === 0) {
                echo "<td class='" . color($i, $j) . "'>";
                echo ponerFicha($negras[$j]);
                echo "</td>";
            } else if ($i === 7) {
                echo "<td class='" . color($i, $j) . "'>";
                echo ponerFicha($blancas[$j]);
                echo "</td>";
            }else if ($i === 1) {
                echo "<td class='" . color($i, $j) . "'>";
                echo "<img src='peon-negro.png' alt='peon-negro'>";
                echo "</td>";

            }else if ($i === 6) {
                echo "<td class='" . color($i, $j) . "'>";
                echo "<img src='peon-blanco.png' alt='peon-blanco'>";
                echo "</td>";
            }else{
                echo "<td class='" . color($i, $j) . "'>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
}

/**
 * Funcion que devuelve un String segun la fila y la columna el color de la casilla
 * @param $filas
 * @param $columnas
 * @return string
 */
function color($filas, $columnas){
    if(($filas + $columnas)%2===0 ){
        return "gris";
    }else{
        return "blanco";
    }
}

/**
 * Funcion que pone la pieza que toque según la casilla del tablero y la posicion del array
 * @param $pieza
 * @return string
 */
function ponerFicha($pieza) {
    return "<img src='" . $pieza . ".png' alt='" . $pieza . "'>";
}