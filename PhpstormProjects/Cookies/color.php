<?php
// Tiempo de expiración de la cookie (1 año)
$cookie_expiration = time() + (365 * 24 * 60 * 60);

// Revisamos si se ha enviado un color desde el formulario
if (isset($_POST['color'])) {
    $color = $_POST['color'];
    setcookie('backgroundColor', $color, $cookie_expiration); // Guardar color en cookie
} elseif (isset($_COOKIE['backgroundColor'])) {
    // Si la cookie ya está establecida, usamos su valor
    $color = $_COOKIE['backgroundColor'];
} else {
    // Color de fondo predeterminado si no hay cookie
    $color = '#ffffff';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selector de Color de Fondo</title>
</head>
<body style="background-color: <?php echo htmlspecialchars($color); ?>;">

<div style="text-align: center; margin-top: 20px;">
    <h2>Selecciona el Color de Fondo</h2>
    <form method="post">
        <label for="color">Elige un color:</label>
        <input type="color" id="color" name="color" value="<?php echo htmlspecialchars($color); ?>">
        <button type="submit">Guardar Color</button>
    </form>
</div>

</body>
</html>