<?php

namespace Controllers;

class ErrorController
{
    public static function show_error404()
    {
        require_once './Views/layout/header.php';
        echo "<h1>Error 404: Página no encontrada</h1>";
        require_once './Views/layout/footer.php';
    }
}