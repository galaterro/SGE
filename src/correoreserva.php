<!DOCTYPE html>
<?php
session_start();
$id = explode('|',$_GET["id"]);
include 'connection.php';
include 'helperDDBB.php';
$_SESSION["id_butaca"] = $id[0];
$_SESSION["id_sesion"] = $id[1];
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Introduzca su correo</title>
</head>
<body>
<form method="get" action="enviar.php">
    <p>Intruduzca su dirección de correo electrónico</p>
    <input type="email" class="correo" name="correo" title="Correo"/>
    <input type="submit" class="enviar" title="Enviar">
    <?php
    $conexion = getCon();
    $butaca = getButaca($conexion, $id[0]);
    closeCon($conexion);
    ?>
</form>
</body>
</html>
