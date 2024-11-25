<?php

namespace Models;

class Barajaes
{
    private $baraja;
    private $palos = ['oros', 'copas', 'espadas', 'bastos'];
    private $cartas = ['1', '2', '3', '4', '5', '6', '7', '10', '11', '12'];

    public function __construct()
    {
        $this->baraja = [];
        foreach ($this->palos as $palo) {
            foreach ($this->cartas as $carta) {
                $this->baraja[] = "{$palo}_{$carta}";
            }
        }
    }

    public function repartirCartas($numCartas)
    {
        $mano = [];
        for ($i = 0; $i < $numCartas; $i++) {
            $indice = array_rand($this->baraja);
            $mano[] = $this->baraja[$indice];
            array_splice($this->baraja, $indice, 1);
        }
        return $mano;
    }



    public function getBaraja()
    {
        return $this->baraja;
    }
}