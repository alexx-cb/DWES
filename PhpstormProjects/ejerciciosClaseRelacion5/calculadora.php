<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
$enviado = false;
function escribeError($error){
    echo "<span style='color: red'>".$error."</span>";

}



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $enviado = true;
    function filtrado($datos)
    {
        $datos = trim($datos); // Elimina espacios antes y después de los datos
        $datos = stripslashes($datos); // Elimina backslashes \
        $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
        return $datos;
    }

    $num1 = $_POST['num1'];
    $num1 = filter_var($num1, FILTER_SANITIZE_NUMBER_FLOAT,);
    if(!filter_var($_POST['num1'], FILTER_VALIDATE_FLOAT) || empty($_POST['num1'])) {
        $errores["num1"] = "El numero 1 es incorrecto";
    }

    $num2 = $_POST['num2'];
    $num2 = filter_var($num2, FILTER_SANITIZE_NUMBER_FLOAT,);
    if(!filter_var($_POST['num2'], FILTER_VALIDATE_FLOAT) || empty($_POST['num2'])) {
        $errores["num2"] = "El numero 2 es incorrecto";
    }




    $operacion = $_POST['operacion'];

    if($operacion === "suma"){
        $resultado = $num1 + $num2;
    }elseif ($operacion === "resta"){
        $resultado = $num1 - $num2;
    }elseif ($operacion === "multiplicacion"){
        $resultado = $num1 * $num2;
    }elseif ($operacion === "division"){
        if($num2!==0){
            $resultado = $num1 / $num2;
        }else{
            echo "Error: no se puede dividir por 0";
        }


    }



}
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Num1: <input type="text" name="num1" <?php if($enviado):?>value="<?php echo $num1;?>" <?php endif;?>><br><br>
    Num2: <input type="text" name="num2" <?php if($enviado):?>value="<?php echo $num2;?>" <?php endif;?>><br><br>
    <input type="submit" value="suma" name="operacion">
    <input type="submit" value="resta" name="operacion">
    <input type="submit" value="division" name="operacion">
    <input type="submit" value="multiplicacion" name="operacion">


    <?php
    if($enviado):?>
        Resultado: <input type="text" name="resultado" value="<?php echo $resultado;?>" readonly><br>

    <?php endif;?>

</form>
</body>
</html>