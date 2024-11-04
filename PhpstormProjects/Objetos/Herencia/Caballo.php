<?php
class Caballo extends Animal{
    public $rareza;

    public function __construct($nombre="Desconocido", $edad=20, $velocidad=50, $rareza="epico")
    {
        parent::__construct($nombre, $edad, $velocidad);
        $this->rareza = $rareza;
    }

    public function saludo(){
        return "Hola soy un caballo";
    }

    public function datos()
    {
        return parent::datos(). "<br> Rareza: ".$this->rareza;
    }
}