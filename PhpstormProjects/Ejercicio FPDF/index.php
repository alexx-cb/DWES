<?php
/*Para poder emplear caracteres especiales como tildes o la letra ñ, he tenido que poner esta linea de codigo 
en el archivo de "fpdf.php": "$txt=utf8_decode($txt)". Convierte una cadena de texto que esta en formato UTF-8 
a un formato ISO-8859-1*/

header('Content-Type: text/html; charset=utf-8');
//Con este "require" se incluye la librería FPDF
require('fpdf/fpdf.php');

//Estos son los datos del grupo y del curso
$grupo = "                  DAW Bilingüe";
$curso = "Grado Superior de Desarrollo de Aplicaciones Web (DAW)"; 
$año = "Segundo año (2024/2025)";

//Esta es la lista de alumnos 
$alumnos = [
    ["nombre" => "Jesus Daniel", "apellido" => "Ortiz Reyes"],
    ["nombre" => "Pablo", "apellido" => "Linares López"],
    ["nombre" => "Óscar", "apellido" => "Delgado Huertas"],
    ["nombre" => "Carlos", "apellido" => "Arana Marín"],
    ["nombre" => "Javier", "apellido" => "Ruiz Sánchez"],
    ["nombre" => "Alfonso", "apellido" => "Carrascosa Jiménez"],
    ["nombre" => "Alvaro", "apellido" => "Gomez Moreno"],
    ["nombre" => "Gorka", "apellido" => "Carmona Pino"],
    ["nombre" => "Daniel", "apellido" => "Triviño Marín"],
    ["nombre" => "Pablo", "apellido" => "Rodríguez Heredia"],
    ["nombre" => "Jorge", "apellido" => "Arcoya López"],
    ["nombre" => "Eduardo", "apellido" => "Valero Molina"],
    ["nombre" => "Carlos", "apellido" => "Santander Jiménez"],
    ["nombre" => "Luis", "apellido" => "Calvo Álvarez"],
    ["nombre" => "Pablo", "apellido" => "Rubio Nogales"],
    ["nombre" => "Jesús", "apellido" => "Barrio Guerrero"],
    ["nombre" => "José Juan", "apellido" => "Calvo Martín"],
    ["nombre" => "Pablo", "apellido" => "Peregrina Martín"],
    ["nombre" => "Marta", "apellido" => "Marín Lorente"],
    ["nombre" => "Carlos", "apellido" => "Arana Jiménez"],
    ["nombre" => "Miguel", "apellido" => "Tejero Tejedor"],
    ["nombre" => "Javier", "apellido" => "Amador Ibáñez"],
    ["nombre" => "Alejandro", "apellido" => "Cabrera Barea"],
    ["nombre" => "José Ramón", "apellido" => "Hurtado Mije"],
    ["nombre" => "Mishael", "apellido" => "Bonel Ortiz"],
];

//Con este codigo crear el PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

//Este codigo se emplea para poder centrar el titulo del documento
$pdf->Cell(0, 10, "Listado de Alumnos", 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, "$grupo - $curso", 0, 1, 'C');
$pdf->Cell(0, 5, "- $año", 0, 1, 'C');

//Este codigo sirve para colocar el logotipo de manera que quede en el lado izquierdo del documento
$pdf->Image('logo.png', 10, 10, 30); 

//Esto es el espacio debajo del encabezado
$pdf->Ln(15); 

//Este codigo configura la anchura de las columnas
$columna_nombre = 50;
$columna_apellido = 100;

//Para calcular el ancho total de la tabla empleamos este codigo
$ancho_total = $columna_nombre + $columna_apellido;

//Para poder centrar la tabla utilizaremos este codigo
$margen_izquierdo = ($pdf->GetPageWidth() - $ancho_total) / 2;
$pdf->SetX($margen_izquierdo);

//Estos son los dos encabezados de la tabla
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell($columna_nombre, 10, 'Nombre', 1, 0, 'C');
$pdf->Cell($columna_apellido, 10, 'Apellido', 1, 1, 'C');

//Gracias a este codigo se generan las filas de la tabla con los datos de los alumnos
$pdf->SetFont('Arial', '', 12);
foreach ($alumnos as $alumno) {
    $pdf->SetX($margen_izquierdo); //Este codigo se utiliza para centrar el contenido de cada fila
    $pdf->Cell($columna_nombre, 10, $alumno['nombre'], 1, 0, 'C');
    $pdf->Cell($columna_apellido, 10, $alumno['apellido'], 1, 1, 'C');
}

//Con este codigo se muestra el PDF en el navegador
$pdf->Output('I', 'Listado_Alumnos.pdf');