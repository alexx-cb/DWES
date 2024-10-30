<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php echo "<p>prueba con echo"?>
    <?php print("<p>Prueba con print")?>
    <?= "<p>Prueba con tag"?>
    
    <?php

        $numero = 33;
        echo gettype($numero);

        $a =5;
        echo "<p>valor de a: ", $a;
        $b =$a;
        echo "<p>valor de a: ", $a, "valor de b: ", $b;

        $c =&$a;
        echo "<p>valor de c: ", $c;
        $c = 7;
        echo "<p>valor de a: ", $a, ", valor de b: ", $b, ", valor de c: ", $c;
    

        

    ?>

</body>
</html>