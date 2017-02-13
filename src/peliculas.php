<!DOCTYPE html>
<?php
session_start();
$nombre = $_GET["cine"];
include 'connection.php';
include 'helperDDBB.php';
?>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php include ''?>
<?php
$conexion = getCon();
getPeliculas($conexion,$nombre);
?>
</body>
</html>
