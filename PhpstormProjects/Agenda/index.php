<?php 
    require_once 'config/config.php';
    require 'Lib/autoloader.php';
    require_once 'Views/Layout/header.php';

    use Controllers\ContactoController;
    use Models\Contacto;
?>

<?php if((!empty($_GET))):
    $controlador = new ContactoController();

    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
        $action = $_GET['action'];
        $controlador->$action();
    } else{
        echo "La pagina que buscas no existe";
    }
?>
<?php else: ?>
    <a href="http://localhost/63342DWES/PhpstormProyects/Agenda/index.php?action=mostrar_todos">Mostrar todos</a>
<?php endif; ?>
<?php
    require_once 'views/layout/footer.php';
?>