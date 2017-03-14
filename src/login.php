<?php
/**
 * Created by IntelliJ IDEA.
 * User: juanxxiii
 * Date: 20/02/2017
 * Time: 17:48
 */
session_start();
$user = $_POST["usuario"];
$pass = $_POST["password"];
include 'connection.php';
include 'helperDDBB.php';

spl_autoload_register(function ($nombre_clase) {
    include $nombre_clase . '.php';
});

$sql = "SELECT id_cliente FROM cliente WHERE usuario = '" . $user . "' && password = '" . $pass . "';";
$conexion = getCon();
    $usuario = $conexion->query($sql);
    $cliente = $usuario->fetch_row();
    $id_cliente = $cliente[0];

    $_SESSION['user'] = $id_cliente;
closeCon($conexion);
http_redirect('index.php');
