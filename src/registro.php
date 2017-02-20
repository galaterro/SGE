<?php
session_start();
$nombre = $_POST["nombre"];
$dni = $_POST["dni"];
$apellidos = $_POST["apellidos"];
$telefono = $_POST["telefono"];
$cp = $_POST["cp"];
$usuario = $_POST["usuario"];
$password = $_POST["password"];
include 'connection.php';
include 'helperDDBB.php';

if($nombre == null){
include 'formularioRegistro.php';

}else{

    $sql = "INSERT INTO cliente(dni_cli, nombre_cli, apellidos_cli, telefono_cli, cp, usuario, password) VALUES ('" . $dni . "', '" .
        $nombre . "', '" . $apellidos . "', " . $telefono . ", " . $cp .  ", '" .
        $usuario . "', '" . $password . "');";
    $conexion = getCon();
    if($conexion->query($sql) === TRUE){
        echo 'Registro realizado con éxito';
    }else{
        echo "HA OCURRIDO UN ERROR, POR FAVOR, INTENTELO DE NUEVO";
    }
}
