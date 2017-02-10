
/**
 * Created by IntelliJ IDEA.
 * User: juanxxiii
 * Date: 10/02/2017
 * Time: 19:22
 */
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
?>
</body>
</html>
