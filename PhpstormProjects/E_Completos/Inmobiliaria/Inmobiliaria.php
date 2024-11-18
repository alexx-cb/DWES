<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insertar Vivienda</title>
</head>
<body>

<h1>Insertar Vivienda</h1>



<?php

function escribeError($error) {
    return "<span style='color: red'>".$error."</span>";
}

// Función para calcular el beneficio
function calculaBeneficio($zona, $precio, $dimension) {
    $beneficio = 0;
    if ($zona === "Centro") {
        $beneficio = $dimension < 100 ? $precio * 0.30 : $precio * 0.35;
    } elseif ($zona === "Zaidin") {
        $beneficio = $dimension < 100 ? $precio * 0.25 : $precio * 0.28;
    } elseif ($zona === "Chana") {
        $beneficio = $dimension < 100 ? $precio * 0.22 : $precio * 0.25;
    } elseif ($zona === "Albaicin") {
        $beneficio = $dimension < 100 ? $precio * 0.20 : $precio * 0.35;
    } elseif ($zona === "Sacromonte") {
        $beneficio = $dimension < 100 ? $precio * 0.22 : $precio * 0.25;
    } elseif ($zona === "Realejo") {
        $beneficio = $dimension < 100 ? $precio * 0.25 : $precio * 0.28;
    }
    return $beneficio;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    function filtrado($datos) {
        $datos = trim($datos);
        $datos = stripslashes($datos);
        $datos = htmlspecialchars($datos);
        return $datos;
    }

    $pisos_permitidos = array('Piso', 'Adosado', 'Chalet', 'Casa');
    $zonas_permitidas = array('Centro', 'Zaidin', 'Chana', 'Albaicin', 'Sacromonte', 'Realejo');
    $dormitorios_permitidos = array('uno', 'dos', 'tres', 'cuatro', 'cinco');
    $extras_permitidos = array('piscina', 'jardin', 'garaje');
    $errores = [];

    // Validación de campos
    if (empty($_POST["piso"])) {
        $errores["piso"] = "El tipo de vivienda es requerido";
    } else {
        $tipo_vivienda = filtrado($_POST["piso"]);
        if (!in_array($tipo_vivienda, $pisos_permitidos)) {
            $errores["piso"] = "El tipo de vivienda no es válido";
        }
    }

    if (empty($_POST["zona"])) {
        $errores["zona"] = "La zona es requerida";
    } else {
        $zona = filtrado($_POST["zona"]);
        if (!in_array($zona, $zonas_permitidas)) {
            $errores["zona"] = "La zona seleccionada no es válida";
        }
    }

    if (empty($_POST["dormitorios"])) {
        $errores["dormitorios"] = "El número de dormitorios es requerido";
    } else {
        $dormitorios = filtrado($_POST["dormitorios"]);
        if (!in_array($dormitorios, $dormitorios_permitidos)) {
            $errores["dormitorios"] = "El número de dormitorios seleccionado no es válido";
        }
    }

    if (empty($_POST["direccion"])) {
        $errores["direccion"] = "La dirección es requerida";
    } else {
        $direccion = filtrado($_POST["direccion"]);
        if (!preg_match("/^[a-zA-Z0-9., ]+$/", $direccion)) {
            $errores["direccion"] = "La dirección solo ha de estar compuesta por letras y números.";
        }
    }

    if (empty($_POST["precio"])) {
        $errores["precio"] = "El precio es requerido";
    } else {
        $precio = filter_var($_POST["precio"], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        if (!filter_var($precio, FILTER_VALIDATE_FLOAT)) {
            $errores["precio"] = "El precio debe ser un número válido";
        }
    }

    if (empty($_POST["dimension"])) {
        $errores["dimension"] = "El tamaño es requerido";
    } else {
        $dimension = filter_var($_POST["dimension"], FILTER_SANITIZE_NUMBER_INT);
        if (!filter_var($dimension, FILTER_VALIDATE_INT)) {
            $errores["dimension"] = "El tamaño debe ser un número entero";
        }
    }

    if (isset($_POST["extras"])) {
        $extras = $_POST["extras"];
        foreach ($extras as $extra) {
            if (!in_array($extra, $extras_permitidos)) {
                $errores["extras"] = "Algunos extras seleccionados no son válidos";
                break;
            }
        }
    }

    $observaciones = isset($_POST["observaciones"]) ? filtrado($_POST["observaciones"]) : "";

    $carpetaFotos = "./fotos/"; // Ruta de la carpeta fotos
    $carpetaXml = "./data/";
    if (!is_dir($carpetaXml)) {
        if (!mkdir($carpetaXml, 0755, true) && !is_dir($carpetaXml)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $carpetaXml));
        }
    }

    // Validación y movimiento de la foto (no obligatoria)
    $foto_destino = "";
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
        $foto_tmp = $_FILES['foto']['tmp_name'];
        $foto_nombre = $_FILES['foto']['name'];
        $foto_tamano = $_FILES['foto']['size'];

        // Comprobar el tamaño del archivo (si es mayor o menor que 100 KB)
        if ($foto_tamano > 100 * 1024) {
            $errores['foto'] = "¡El tamaño del archivo debe ser menor de 100 KB!";
        } else {
            $foto_destino = $carpetaFotos . basename($foto_nombre);
            // Mover el archivo subido a la carpeta 'fotos'
            if (!move_uploaded_file($foto_tmp, $foto_destino)) {
                $errores['foto'] = "Error al mover la foto a la carpeta de destino.";
            }
        }
    }

    if (empty($errores)) {
        $file_path = $carpetaXml . "viviendas.xml";
        $xml = file_exists($file_path) ? simplexml_load_file($file_path) : new SimpleXMLElement("<viviendas></viviendas>");

        // Añadir vivienda al XML
        $nueva_vivienda = $xml->addChild('vivienda');
        $nueva_vivienda->addChild('tipo_vivienda', $tipo_vivienda);
        $nueva_vivienda->addChild('zona', $zona);
        $nueva_vivienda->addChild('direccion', $direccion);
        $nueva_vivienda->addChild('dormitorios', $dormitorios);
        $nueva_vivienda->addChild('precio', $precio);
        $nueva_vivienda->addChild('dimension', $dimension);
        $nueva_vivienda->addChild('observaciones', $observaciones);
        $nueva_vivienda->addChild('foto', $foto_destino ? basename($foto_destino) : ''); // Guarda la foto solo si se ha subido

        // Calcular beneficio
        $beneficio = calculaBeneficio($zona, $precio, $dimension);
        $nueva_vivienda->addChild('beneficio', $beneficio);

        // Guardar el XML con DOMDocument
        $xml_file = $carpetaXml . "viviendas.xml"; // Ruta del archivo XML
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        $dom->save($xml_file);

        // Mostrar información
        echo "<h2>Información de la vivienda</h2>";
        echo "<ul>";
        echo "<li><strong>Tipo de vivienda:</strong> $tipo_vivienda</li>";
        echo "<li><strong>Zona:</strong> $zona</li>";
        echo "<li><strong>Dirección:</strong> $direccion</li>";
        echo "<li><strong>Dormitorios:</strong> $dormitorios</li>";
        echo "<li><strong>Precio:</strong> €" . number_format($precio, 2) . "</li>";
        echo "<li><strong>Tamaño:</strong> $dimension m²</li>";
        echo "<li><strong>Beneficio calculado:</strong> €" . number_format($beneficio, 2) . "</li>";
        echo "<li><strong>Extras:</strong> " . (isset($extras) ? implode(", ", $extras) : "Ninguno") . "</li>";
        echo "<li><strong>Observaciones:</strong> $observaciones</li>";
        echo "<li><strong>Foto:</strong> <a href='$foto_destino' target='_blank'>" . ($foto_destino ? basename($foto_destino) : "Ninguna foto subida") . "</a></li>";
        echo "</ul>";
    }
}
?>





<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <table>
        <tr>
            <td>
                <label>Tipo de Vivienda: </label>
            </td>
            <td>
                <select name="piso"> <!-- Agregado el atributo name aquí -->
                    <option value="">Seleccione...</option> <!-- Opción vacía para requerir selección -->
                    <option value="Piso">Piso</option>
                    <option value="Adosado">Adosado</option>
                    <option value="Chalet">Chalet</option>
                    <option value="Casa">Casa</option>
                </select>
                <?php echo isset($errores["piso"]) ? escribeError($errores["piso"]) : ''; ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Zona:</label>
            </td>
            <td>
                <select name="zona"> <!-- Agregado el atributo name aquí -->
                    <option value="">Seleccione...</option> <!-- Opción vacía para requerir selección -->
                    <option value="Centro">Centro</option>
                    <option value="Zaidin">Zaidín</option>
                    <option value="Chana">Chana</option>
                    <option value="Albaicin">Albaicín</option>
                    <option value="Sacromonte">Sacromonte</option>
                    <option value="Realejo">Realejo</option>
                </select>
                <?php echo isset($errores["zona"]) ? escribeError($errores["zona"]) : ''; ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Dirección:</label>
            </td>
            <td>
                <input type="text" name="direccion"> <!-- Asegúrate que el name está aquí -->
                <?php echo isset($errores["direccion"]) ? escribeError($errores["direccion"]) : ''; ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Número de dormitorios: </label>
            </td>
            <td>
                1<input type="radio" name="dormitorios" value="uno">
                2<input type="radio" name="dormitorios" value="dos">
                3<input type="radio" name="dormitorios" value="tres">
                4<input type="radio" name="dormitorios" value="cuatro">
                5<input type="radio" name="dormitorios" value="cinco">
                <?php echo isset($errores["dormitorios"]) ? escribeError($errores["dormitorios"]) : ''; ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Precio (€):</label>
            </td>
            <td>
                <input type="text" name="precio"> <!-- Asegúrate que el name está aquí -->
                <?php echo isset($errores["precio"]) ? escribeError($errores["precio"]) : ''; ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Tamaño:</label>
            </td>
            <td>
                <input type="text" name="dimension"> m<sup>2</sup>
                <?php echo isset($errores["dimension"]) ? escribeError($errores["dimension"]) : ''; ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Extras: </label>
            </td>
            <td>
                <input type="checkbox" name="extras[]" value="piscina"> Piscina
                <input type="checkbox" name="extras[]" value="jardin"> Jardín
                <input type="checkbox" name="extras[]" value="garaje"> Garaje
                <?php echo isset($errores["extras"]) ? escribeError($errores["extras"]) : ''; ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Foto: </label>
            </td>
            <td>
                <input type="file" name="foto"> <!-- Asegúrate que el name está aquí -->
                <?php echo isset($errores["foto"]) ? escribeError($errores["foto"]) : ''; ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Observaciones: </label>
            </td>
            <td>
                <textarea name="observaciones"></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Insertar Vivienda">
            </td>
        </tr>
    </table>
</form>

</body>
</html>