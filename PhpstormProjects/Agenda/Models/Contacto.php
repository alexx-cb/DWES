<?php

namespace Models;
use Lib\BaseDatosAgenda;
use PDO;
use PDOException;

    class Contacto{
        private BaseDatosAgenda $conexion;
        private mixed $stmt;

        function __construct(
            private string|null $id=null,
            private string $nombre='',
            private string $apellidos='',
            private string $correo='',
            private string $direccion='',
            private string $telefono='',
            private string $fechaNacimiento=''
        ) {
            $this->conexion = new BaseDatosAgenda();
        }

            /**
             * Get the value of nombre
             */ 
            public function getNombre()
            {
                        return $this->nombre;
            }

            /**
             * Set the value of nombre
             *
             * @return  self
             */ 
            public function setNombre($nombre)
            {
                        $this->nombre = $nombre;

                        return $this;
            }

            /**
             * Get the value of apellidos
             */ 
            public function getApellidos()
            {
                        return $this->apellidos;
            }

            /**
             * Set the value of apellidos
             *
             * @return  self
             */ 
            public function setApellidos($apellidos)
            {
                        $this->apellidos = $apellidos;

                        return $this;
            }

            /**
             * Get the value of correo
             */ 
            public function getCorreo()
            {
                        return $this->correo;
            }

            /**
             * Set the value of correo
             *
             * @return  self
             */ 
            public function setCorreo($correo)
            {
                        $this->correo = $correo;

                        return $this;
            }

            /**
             * Get the value of direccion
             */ 
            public function getDireccion()
            {
                        return $this->direccion;
            }

            /**
             * Set the value of direccion
             *
             * @return  self
             */ 
            public function setDireccion($direccion)
            {
                        $this->direccion = $direccion;

                        return $this;
            }

            /**
             * Get the value of telefono
             */ 
            public function getTelefono()
            {
                        return $this->telefono;
            }

            /**
             * Set the value of telefono
             *
             * @return  self
             */ 
            public function setTelefono($telefono)
            {
                        $this->telefono = $telefono;

                        return $this;
            }

            /**
             * Get the value of fechaNacimiento
             */ 
            public function getFechaNacimiento()
            {
                        return $this->fechaNacimiento;
            }

            /**
             * Set the value of fechaNacimiento
             *
             * @return  self
             */ 
            public function setFechaNacimiento($fechaNacimiento)
            {
                        $this->fechaNacimiento = $fechaNacimiento;

                        return $this;
            }

            public function getAll(): array {
                try {
                    $this->stmt = $this->conexion->consulta("SELECT * FROM CONTACTOS");
                    $resultados = $this->conexion->extraer_todos();
                    
                    return $resultados;
                } catch (PDOException $e) {
                    echo "Error al obtener los contactos: " . $e->getMessage();
                    return [];
                }
            }

            public static function fromArray(array $data): Contacto{
                return new Contacto(
                    $data['id']?? '',
                    $data['nombre']?? '',
                    $data['apellidos']?? '',
                    $data['correo']?? '',
                    $data['telefono']?? '',
                    $data['fecha_nacimiento']?? ''
                );
            }
    }
?>