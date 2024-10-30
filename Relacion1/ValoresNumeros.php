<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <?php
    
    $num1 = intval($_GET["num1"]);
    $num2 = intval($_GET["num2"]);

    if ($num1 >= $num2) {
        $num1 = $num2;
        $num2 = $num1;
    }
    
    for($i=$num1;$i<$num2;$i++){
        echo $i;
    }

    for($i=$num1;$i<$num2;$i++){
        if(!$i%2== 0){
            echo $i;
        }
    }
    
    
    ?>


</body>
</html>