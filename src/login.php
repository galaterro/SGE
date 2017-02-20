<?php
/**
 * Created by IntelliJ IDEA.
 * User: juanxxiii
 * Date: 20/02/2017
 * Time: 17:48
 */
session_start();
$user = $_GET["usuario"];
$pass = $_GET["password"];
include 'connection.php';
include 'helperDDBB.php';

spl_autoload(Usuario,'.php');

$sql = "SELECT * FROM cliente WHERE usuario = " . $user . "AND password = " . $pass . ";";
$conexion = getCon();
    $usuario = $conexion->query($sql);
    $cliente = $usuario->fetch_row();
    $caca = new Usuario($cliente[1],$cliente[2],$cliente[3],$cliente[4],$cliente[5],
        $cliente[6], $cliente[7], $cliente[8]);

    $_SESSION['user'] = $caca;

http_redirect('index.php');
