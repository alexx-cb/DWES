<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    
        $altura = 5;

        for($i =1;$i<=$altura;$i++){
            for($j = 1;$j<=$altura-$i;$j++){
                echo " &nbsp ";
            }
            for($k = 1;$k <= (2* $i -1);$k++){
                if($k ==1 || $k == (2* $i-1) || $i == $altura){
                    echo "*";
                }else{
                    echo "&nbsp;&nbsp";
                }    
            }
            echo "<br>";
        }
    
    ?>

</body>
</html>