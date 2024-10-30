<?php
    try{
        if(isset($_GET["id"])){
            echo "el parametro id es: ".$_GET["id"];
        }else{
            echo new Exception("faltan parametros para la URL");
        }
    }catch (Exception $e){
        echo $e->getMessage();
    } finally {
        echo "todo Correcto";
    }
