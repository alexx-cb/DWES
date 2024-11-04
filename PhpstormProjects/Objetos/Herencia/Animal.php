<?php
class Animal{
    public $nombre;
    public $edad;
    public $velocidad;

    public function __construct($nombre, $edad, $velocidad){
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->velocidad = $velocidad;
    }
}