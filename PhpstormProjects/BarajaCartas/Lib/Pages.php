<?php

namespace Lib;

class Pages
{
    public static function redirect($url)
    {
        header("Location: " . BASE_URL . $url);
        exit();
    }

    public static function render(string $pageName, array $params = null){
        if($params != null){
            foreach($params as $name => $value){
                $$name = $value;
            }
        }
        require_once "Views/layout/header.php";
        require_once "Views/$pageName.php";
        require_once "Views/layout/footer.php";
    }
}