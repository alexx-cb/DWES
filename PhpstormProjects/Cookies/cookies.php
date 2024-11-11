<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
</head>
<body>

<?php
session_start();


if (isset($_SESSION['visitas'])) {

    $_SESSION['visitas']++;
} else {

    $_SESSION['visitas'] = 1;
}


echo "Has visitado esta página " . $_SESSION['visitas'] . " veces en esta sesión.";
?>

</body>
</html>