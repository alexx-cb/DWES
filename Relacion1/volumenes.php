<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    
        $radio = 5;
        $perimetro = 2 *pi()*$radio;
        $area = pi() * $radio * $radio;
        $volumen = (4/3) * pi() * $radio ** 3;

        $volumen = round($volumen,2);
        $area = round($area,2);
        $perimetro = round($perimetro,2);

        printf("La salida usando printf: volumen: %f.2, area: %f.2, perimetro: %f.2", $volumen, $area, $perimetro);

    
    
    ?>

</body>
</html>