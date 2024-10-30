<?php
$us="usuario";
$pass="1234";

if($_POST["usuario"]===$us&&$_POST["pass"]===$pass){
    header("Location: entrar.html");
    exit();
}else{
    header("Location: error.html");
    exit();
}