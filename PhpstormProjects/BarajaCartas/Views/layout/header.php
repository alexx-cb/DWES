<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego Cartas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #000;
        }
        a {
            text-decoration: none;
            color: blue;
        }
        a:hover {
            text-decoration: underline;
        }
        ul {
            list-style-type: disc;
        }
    </style>
</head>
<body>
    <h1>Casino la fortuna</h1>
    <ul>
        <li><a href="?controller=Baraja&action=mostrarBaraja">Mostrar las cartas de la baraja española</a></li>
        <li><a href="?controller=Baraja&action=mostrarUnaCarta">Mostrar una carta</a></li>
        <li><a href="?controller=Baraja&action=barajarCartas">Barajar y mostrar el resultado</a></li>
        <li><a href="?controller=Baraja&action=sacarUnaCarta">Sacar una carta de la baraja</a></li>
        <li><a href="?controller=Baraja&action=repartirCartas">Repartir cartas a varios jugadores</a></li>
        <li><a href="?controller=Baraja&action=index"></a>Inicio</li>
    </ul>