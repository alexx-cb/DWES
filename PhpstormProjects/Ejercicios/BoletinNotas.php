<?php
$mostrarNotas = array("matematicas"=>array("1"=>3,"2"=>10,"3"=>7),
    "lengua"=>array("1"=>8,"2"=>5,"3"=>3),
    "Física"=>array("1"=>7,"2"=>2,"3"=>1),
    "Latín"=>array("1"=>4,"2"=>7,"3"=>8),
    "Ingles"=>array("1"=>6,"2"=>2,"3"=>3)
    );


function crearTabla($mostrarNotas):void{
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th> Asignatura </th>";
    echo "<th> Trimestre1 </th>";
    echo "<th> Trimestre2 </th>";
    echo "<th> Trimestre3 </th>";
    echo "<th> Media </th>";
    echo "</tr>";

    foreach($mostrarNotas as $mostrar){
        echo "<td>".$mostrar["Asignatura"]."</td>";
        echo "<td>".$mostrar["Trimestre1"]."</td>";
        echo "<td>".$mostrar["Trimestre2"]."</td>";
        echo "<td>".$mostrar["Trimestre3"]."</td>";

    }

    echo "</table>";
}