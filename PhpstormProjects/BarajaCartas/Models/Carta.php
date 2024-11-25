<?php
namespace Models;

class Carta {
    private $valor;
    private $palo;

    public function __construct($valor, $palo) {
        $this->valor = $valor;
        $this->palo = $palo;
    }

    public function getValor() {
        return $this->valor;
    }

    public function getPalo() {
        return $this->palo;
    }
}
?>