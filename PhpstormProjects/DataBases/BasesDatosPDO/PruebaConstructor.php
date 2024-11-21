<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
require_once('PhpstormProjects/BasesDatosMySQLi/autoloader.php');
require_once('PhpstormProjects/BasesDatosMySQLi/configDB.php');

use DataBases\BasesDatosPDO\PDOExtends;

$db = new PDOExtends();

?>
<h2>He conectado con la base de datos</h2>

</body>
</html>