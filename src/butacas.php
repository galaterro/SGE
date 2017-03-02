<!DOCTYPE html>
<?php
session_start();
$id_pelicula = $_GET["id"];
$_SESSION["id_pelicula"] = $id_pelicula;
include 'connection.php';
include 'helperDDBB.php';
?>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form method="get" action="correoreserva.php">
    <?php
    $conexion = getCon();
    getInfoButacas($conexion,$id_pelicula);
    closeCon($conexion);
    ?>
</form>
</body>
</html>
