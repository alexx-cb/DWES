<?php

namespace Controllers;

use Models\Barajaes;

class BarajaController
{
    public function mostrarBaraja()
    {
        $baraja = new Barajaes();
        require_once 'Views/layout/header.php';
        require_once 'Views/baraja/muestraBaraja.php';
        require_once 'Views/layout/footer.php';
    }

    public function repartirCartas():void
    {
        $baraja = new Barajaes();
        $cartas = $baraja->repartirCartas(3);

        require_once 'Views/layout/header.php';
        echo "<h2>Cartas Repartidas:</h2>";
        foreach ($cartas as $carta) {
            echo "<img src='Imagenes/$carta.jpg' alt='$carta' style='width:100px;'>";
        }
        require_once 'Views/layout/footer.php';
    }
}