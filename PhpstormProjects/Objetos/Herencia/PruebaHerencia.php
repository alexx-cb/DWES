<?php
require_once ("Oveja.php");
require_once ("Caballo.php");

$oveja = new Oveja();
$caballo = new Caballo();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>


<h1>Habla la oveja</h1>
<?php echo $oveja->saludo();?>
<br>
<?php echo $oveja->datos()?>

<h1>Habla el caballo</h1>
<?php echo $caballo->saludo();?>
<br>
<?php echo $caballo->datos()?>

</body>
</html>