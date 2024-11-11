<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ej9Validacion1</title>
</head>
<body>
<?php
function escribeError($error){
    echo "<span style='color: red'>".$error."</span>";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    function filtrado($datos) {
        $datos = trim($datos); // Elimina espacios antes y después de los datos
        $datos = stripslashes($datos); // Elimina backslashes \
        $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
        return $datos;
    }

    // Verificamos los datos
    $errores = []; // Aseguramos que $errores esté inicializado

    // Nombre ==========================================
    if(empty($_POST["nombre"])){
        $errores["nombre"] = "El nombre es requerido";
    } else {
        $nombre_usuario = filtrado($_POST["nombre"]);
        if (!preg_match("/^[a-zA-Z]+$/", $nombre_usuario)){
            $errores["nombre"] = "El nombre solo ha de estar compuesto por letras.";
        }
    }

    // Apellido ========================================
    if(empty($_POST["apellido"])){
        $errores["apellido"] = "El apellido es requerido";
    } else {
        $apellido = filtrado($_POST["apellido"]);
        if (!preg_match("/^[a-zA-Z]+$/", $apellido)){
            $errores["apellido"] = "El apellido solo ha de estar compuesto por letras.";
        }
    }

    // Teléfono ========================================
    $telefono_usuario = filter_var($_POST["telefono"], FILTER_SANITIZE_NUMBER_INT);
    if(strlen($telefono_usuario) != 9 || !preg_match("/^[0-9]+$/", $telefono_usuario)){
        $errores["telefono"] = "El teléfono debe tener 9 números";
    }

    // Email ==========================================
    $email_usuario = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email_usuario, FILTER_VALIDATE_EMAIL) || empty($email_usuario)){
        $errores["email"] = "No se ha indicado email o el formato no es correcto";
    }

    // Empleo ==========================================
    if(empty($_POST["empleo"])){
        $errores["empleo"] = "El empleo es requerido";
    } else {
        $empleo = filtrado($_POST["empleo"]);
    }

    // Lenguaje ========================================
    if(empty($_POST["lenguajes"])){
        $errores["lenguaje"] = "El lenguaje es requerido";
    } else {
        $lenguaje = $_POST["lenguajes"];
    }

    // Si no hay errores, redirigir a otra página
    if (empty($errores)) {
        header("Location: Ej9_validacion1_todo_ok.html");
        exit();
    } else {
        echo "<h2>FORMULARIO CON ERRORES:</h2>";
    }
} else {
    echo "<h2>FORMULARIO Y RESULTADO EN UN ÚNICO ARCHIVO</h2>";
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <p>Escriba los datos siguientes:</p>

    <!-- Nombre -->
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo isset($nombre_usuario) ? $nombre_usuario : ''; ?>"/>
    <?php echo isset($errores["nombre"]) ? escribeError($errores["nombre"]) : ''; ?> <br/>

    <!-- Apellido -->
    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" value="<?php echo isset($apellido) ? $apellido : ''; ?>"/>
    <?php echo isset($errores["apellido"]) ? escribeError($errores["apellido"]) : ''; ?> <br/>

    <!-- Teléfono -->
    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono" value="<?php echo isset($telefono_usuario) ? $telefono_usuario : ''; ?>"/>
    <?php echo isset($errores["telefono"]) ? escribeError($errores["telefono"]) : ''; ?><br/>

    <!-- Email -->
    <label for="email">Correo:</label>
    <input type="text" id="email" name="email" value="<?php echo isset($email_usuario) ? $email_usuario : ''; ?>"/>
    <?php echo isset($errores["email"]) ? escribeError($errores["email"]) : ''; ?> <br/>

    <!-- Empleo -->
    <label for="empleo">Empleo:</label>
    <input type="radio" id="empleo" name="empleo" value="sin empleo" <?php echo (isset($empleo) && $empleo === "sin empleo") ? 'checked' : ''; ?>/>Sin empleo
    <input type="radio" id="empleo" name="empleo" value="media jornada" <?php echo (isset($empleo) && $empleo === "media jornada") ? 'checked' : ''; ?>/>Media Jornada
    <input type="radio" id="empleo" name="empleo" value="jornada completa" <?php echo (isset($empleo) && $empleo === "jornada completa") ? 'checked' : ''; ?>/>Jornada completa<br>
    <?php echo isset($errores["empleo"]) ? escribeError($errores["empleo"]) : ''; ?> <br/>

    <!-- Lenguajes -->
    <label for="lenguajes[]">Lenguajes:</label>
    <input type="checkbox" name="lenguajes[]" value="python" <?php echo (isset($lenguaje) && in_array("python", $lenguaje)) ? 'checked' : ''; ?> /> Python
    <input type="checkbox" name="lenguajes[]" value="php" <?php echo (isset($lenguaje) && in_array("php", $lenguaje)) ? 'checked' : ''; ?> /> PHP
    <input type="checkbox" name="lenguajes[]" value="js" <?php echo (isset($lenguaje) && in_array("js", $lenguaje)) ? 'checked' : ''; ?> /> JavaScript
    <input type="checkbox" name="lenguajes[]" value="java" <?php echo (isset($lenguaje) && in_array("java", $lenguaje)) ? 'checked' : ''; ?> /> Java
    <input type="checkbox" name="lenguajes[]" value="cpp" <?php echo (isset($lenguaje) && in_array("cpp", $lenguaje)) ? 'checked' : ''; ?> /> C++ <br>
    <?php echo isset($errores["lenguaje"]) ? escribeError($errores["lenguaje"]) : ''; ?> <br/>

    <input type="submit" value="Enviar">
</form>

</body>
</html>