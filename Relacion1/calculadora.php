<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

    $num1 = $_GET["num1"];
    $num2 = $_GET["num2"];
    $operador = $_GET["operador"];

    if (is_numeric($num1) && is_numeric($num2)) {

        switch ($operacion) {
            case 'suma':
                $resultado = $num1 + $num2;
                echo $resultado;
                break;
            case 'resta':
                $resultado = $num1 - $num2;
                echo $resultado;
                break;
            case 'multiplicacion':
                $resultado = $num1 * $num2;
                echo $resultado;
                break;
            case 'division':
                if ($num2 != 0) {
                    $resultado = $num1 / $num2;
                    echo $resultado;
                } else {
                    $mensaje = "Error: No se puede dividir entre 0";
                }
                break;
            default:
                $mensaje = "Operación no válida. Usa suma, resta, multiplicacion o division.";
        }
    }else {
        $mensaje = "Por favor ingresa valores numéricos válidos.";
    
    }

// Mostramos el mensaje o el resultado
echo $mensaje;

    
    ?>

</body>
</html>