<?php

    function esPrimo($num){
        for($i = 2; $i < $num; $i++){
            if($num % $i === 0){
                return false;
            }
        }
        return true;
    }
    if(isset($_GET['num'])){
        $num = $_GET['num'];
        if(esPrimo($num)){
            echo "El numero $num es primo";
        }else{
            echo "El numero $num no es primo";
        }
    }
