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

    public function datos(){
        return "Nombre: ". $this->nombre . "<br> Edad: " . $this->edad . "<br> Velocidad: " . $this->velocidad;
    }
}