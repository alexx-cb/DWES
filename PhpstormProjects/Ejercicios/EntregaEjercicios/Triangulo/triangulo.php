<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>


<?php
$enviado = false;
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $base = $_POST["base"];
    $altura = $_POST["altura"];
    $resultado = ($base * $altura)/2;
    $enviado = true;
}


?>



<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Base: <input type="text" name="base" <?php if($enviado):?>value="<?php echo $base;?>" <?php endif;?>><br><br>
    Altura: <input type="text" name="altura" <?php if($enviado):?>value="<?php echo $altura;?>" <?php endif;?>><br><br>
    <?php
        if($enviado):?>
            Resultado: <input type="text" name="resultado" value="<?php echo $resultado;?>" readonly><br>

    <?php endif;?>

    <input type="submit" value="Calcular" name="calcular">
</form>




</body>
</html>