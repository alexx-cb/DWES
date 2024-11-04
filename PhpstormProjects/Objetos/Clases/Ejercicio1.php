<?php
class Coche
{
    private $color = "Rojo";
    private $marca = "Ferrari";
    private $modelo = "Aventador";
    private $velocidad = "300";
    private $caballos = "500";
    private $plazas = "2";


    /*
     /**
     * Constructor de la clase Coche tipo PHP7
     * @param String $color color del coche
     * @param String $marca marca del coche
     * @param String $modelo modelo del coche
     * @param int $velocidad velocidad del coche
     * @param int $caballos caballos del coche
     * @param int $plazas plazas del coche

    public function __construct(string $color, string $marca, string $modelo, int $velocidad, int $caballos, int $plazas){
        $this->color = $color;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->velocidad = $velocidad;
        $this->caballos = $caballos;
        $this->plazas = $plazas;
    }

    */

    /*
     * Constructor de la clase coche tipo PHP8 (da error)
     * @param string $color
     * @param string $marca
     * @param string $modelo
     * @param int $velocidad
     * @param int $caballos
     * @param int $plazas

    public function __construct(private string $color, private string $marca, private string $modelo,
                                private int    $velocidad, private int $caballos, private int $plazas){
        $this->color = $color;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->velocidad = $velocidad;
        $this->caballos = $caballos;
        $this->plazas = $plazas;
    }
    */
    public function getColor(): string
    {
        return $this->color;
    }

    public function getMarca(): string
    {
        return $this->marca;
    }

    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function getVelocidad(): int
    {
        return $this->velocidad;
    }

    public function getCaballos(): int
    {
        return $this->caballos;
    }

    public function getPlazas(): int
    {
        return $this->plazas;
    }

    public function setColor($color): void
    {
        $this->color = $color;
    }

    public function setMarca($marca): void
    {
        $this->marca = $marca;
    }

    public function setModelo($modelo): void
    {
        $this->modelo = $modelo;
    }

    public function setVelocidad($velocidad): void
    {
        $this->velocidad = $velocidad;
    }

    public function setCaballos($caballos): void
    {
        $this->caballos = $caballos;
    }

    public function setPlazas($plazas): void
    {
        $this->plazas = $plazas;
    }

    public function acelerar(): void
    {
        $this->velocidad++;
    }

    public function frenar(): void
    {
        $this->velocidad--;
    }


    function mostrarValoresCoche(Coche $coche): void{
        echo "<ul>";
        echo " <li>Color: " . $coche->getColor() . "</li>";
        echo "<li>Marca: " . $coche->getMarca() . "</li>";
        echo "<li>Modelo: " . $coche->getModelo() . "</li>";
        echo "<li>Velocidad: " . $coche->getVelocidad() . " km/h</li>";
        echo "<li>Caballos: " . $coche->getCaballos() . "</li>";
        echo "<li>Plazas: " . $coche->getPlazas() . "</li>";
        echo "</ul>";
    }
}



