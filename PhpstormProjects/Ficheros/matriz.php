<?php
/** Abrimos fichero*/
$fich = fopen("matriz.txt", "r");
/** Si no existe*/
if ($fich === False){
    echo "No se encuentra el fichero o no se pudo leer<br>";
}else{
    /** Mientras no sea el final del fichero*/
    while( !feof($fich) ){
        /** leer el fichero por cada 4 numeros enteros y lo guarda en $num como un array*/
        $num = fscanf($fich, "%d %d %d %d");
        /** Mostramos cada indice del array*/
        echo "$num[0] $num[1] $num[2] $num[3] <br>";
    }
}
/** Volvemos al inicio del fichero y lo realizamos de nuevo añadiendo nuevas variables a la lectura del fichero*/
rewind($fich);
while( !feof($fich) ){
    $num = fscanf($fich, "%d %d %d %d", $num1, $num2, $num3, $num4 );
    echo "$num1 $num2 $num3 $num4 <br>";
}
fclose($fich);