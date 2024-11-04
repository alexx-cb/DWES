<?php
class Oveja extends Animal{
    public $tipoLana;
    public function __construct($nombre = "desconocido", $edad = 18, $velocidad = "20", $tipoLana = "blanca"){
        parent::__construct($nombre, $edad, $velocidad);
        $this->tipoLana = $tipoLana;
    }

    public function saludo(){
        echo "Hola soy una oveja";
    }
}