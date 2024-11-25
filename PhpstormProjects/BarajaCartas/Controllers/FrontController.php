<?php

namespace Controllers;
class FrontController
{
    public static function main()
    {
        if(isset($_GET['controller'])) {
            $controlador_nombre = 'Controllers\\' . $_GET['controller'] . 'Controller';
        }else{
            $controlador_nombre = 'Controllers\\'.CONTROLLER_DEFAULT;
        }

        if(class_exists($controlador_nombre)) {
            $controller = new $controlador_nombre();

            if(isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
                $action = $_GET['action'];
                $controller->$action();
            }elseif (!isset($_GET['action']) && !isset($_GET['controller'])) {
                $action_default=ACTION_DEFAULT;
                $controller->$action_default();
            }else{
                echo ErrorController::show_error404();
            }


        }else{
            echo ErrorController::show_error404();
        }
    }
}