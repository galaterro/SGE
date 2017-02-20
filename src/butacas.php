<!DOCTYPE html>
<?php
session_start();
$id_pelicula = $_GET["id"];
include 'connection.php';
include 'helperDDBB.php';
?>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form method="get" action="butacas.php">
    <?php
    $conexion = getCon();
    getInfoButacas($conexion,$id_pelicula);
    ?>
</form>
</body>
</html>
