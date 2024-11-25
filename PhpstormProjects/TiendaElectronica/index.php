<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tienda Electrónica</title>
</head>
<body>

<?php
require_once('autoloader.php');
require_once('config/config.php');

use PhpstormProjects\Agenda\Lib\BaseDatos;

try {
    $bd = new BaseDatos();
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("No se pudo conectar: " . $e->getMessage());
}
?>

<h1>Tienda Electrónica</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="sel">Selecciona un producto:</label>
    <select id="sel" name="producto_corto">
        <?php
        try {
            // Obtener todos los productos
            $preparada = $bd->query("SELECT cod, nombre_corto FROM productos");
            $preparada->setFetchMode(PDO::FETCH_ASSOC);

            // Mostrar los productos en el select
            foreach ($preparada->fetchAll() as $producto) {
                echo "<option value='" . htmlspecialchars($producto['cod']) . "'>" . htmlspecialchars($producto['nombre_corto']) . "</option>";
            }
        } catch (Exception $e) {
            echo "<p>Error al cargar los productos: " . $e->getMessage() . "</p>";
        }
        ?>
    </select>
    <button type="submit">Buscar</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['producto_corto'])) {
        $producto = $_POST['producto_corto'];

        try {
            // Preparar y ejecutar la consulta
            $stmt = $bd->prepare("SELECT t.nombre, s.unidades 
                                   FROM stock s
                                   INNER JOIN tiendas t ON s.tienda = t.cod
                                   WHERE s.producto = :producto");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->bindParam(':producto', $producto, PDO::PARAM_STR);
            $stmt->execute();

            // Obtener los resultados
            $resultados = $stmt->fetchAll();

            if ($resultados) {
                echo "<h2>Stock del Producto en las Tiendas:</h2>";
                echo "<ul>";
                foreach ($resultados as $fila) {
                    echo "<li>" . htmlspecialchars($fila["nombre"]) . ": " . htmlspecialchars($fila["unidades"]) . " unidades</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No se encontró información de stock para este producto.</p>";
            }
        } catch (Exception $e) {
            echo "<p>Error en la consulta: " . $e->getMessage() . "</p>";
        }
    } else {
        echo "<p>Por favor, selecciona un producto.</p>";
    }
}


?>

<?php
// Cerrar conexiones
$preparada = null;
$bd = null;
?>
</body>
</html>
