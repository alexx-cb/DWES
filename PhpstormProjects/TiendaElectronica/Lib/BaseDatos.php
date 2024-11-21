<?php

namespace Lib;
use PDO;
use PDOException;

class BaseDatos extends PDO {

    private PDO $conexion;
    public function __construct(
        private $tipo_de_base ="mysql",
        private string $servidor = SERVIDOR,
        private string $usuario = USUARIO,
        private string $pass = PASSWORD,
        private string $base_datos = DB) {

        try {

            $opciones = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::MYSQL_ATTR_FOUND_ROWS => true
            );
            parent::__construct("{$this->tipo_de_base}:dbname={$this->base_datos};host={$this->servidor}", $this->usuario, $this->pass, $opciones);
        }catch (PDOException $e){
            echo "Ha surgido un error y no se puede conectar con la base de datos ". $e->getMessage();
        }

    }
}