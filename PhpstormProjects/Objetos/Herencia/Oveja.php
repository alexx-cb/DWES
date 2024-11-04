<?php
require_once "Animal.php";
class Oveja extends Animal{
    public $tipoLana;
    public function __construct($nombre = "Desconocido", $edad = 18, $velocidad = "20", $tipoLana = "blanca"){
        parent::__construct($nombre, $edad, $velocidad);
        $this->tipoLana = $tipoLana;
    }

    public function saludo(): string{
        return "Hola soy una oveja";
    }

    public function datos(): string{
        return  parent::datos(). " <br> Tipo de lana: ".$this->tipoLana;
    }
}