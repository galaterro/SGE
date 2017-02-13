<!DOCTYPE html>
<?php
session_start();
$nombre = $_GET["cine"];
require 'connection.php';
require 'helperDDBB.php';
?>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
$conexion = getCon();
getPeliculas($conexion,$nombre);
?>
</body>
</html>
