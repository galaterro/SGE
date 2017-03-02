<?php
/**
 * Created by IntelliJ IDEA.
 * User: Adri
 * Date: 02/03/2017
 * Time: 13:16
 */
session_start();
$correo = $_GET["correo"];
$id_pelicula = $_SESSION["id_pelicula"];
$id_butaca = $_SESSION["id_butaca"];
$id_sesion = $_SESSION["id_sesion"];
include 'connection.php';
include 'helperDDBB.php';
include "qrlib.php";
$nombre_imagen = rand(1,99999999);
$conexion = getCon();
$nombre_pelicula =  getNombrePelicula($conexion, $id_pelicula);
$id_reserva = crearReserva($conexion, $id_pelicula, $id_butaca, $id_sesion);

QRcode::png('id_reserva: ' . $id_reserva, $nombre_imagen . '.png', 'L', 4, 2);

$from="From: TEST\r\nMIME-Version: 1.0\r\nContent-type: text/html; charset=iso-8859-1";
$subject = "Tus entradas para: " . $nombre_pelicula;
 $body = "Nos ponemos en contacto con usted para entregarle sus entradas para la película: " . $nombre_pelicula . " que tendrá luagar a las: " . getSesion($conexion, $id_sesion)
 . '. Por favor, presente la siguiente imagen en la entrada para poder acceder a la sala. Un saludo. <img src="http://146.185.160.131/' . $nombre_imagen . '.png">';
 if (mail($correo, $subject, $body, $from)) {
     echo("<p>Su correo ha sido enviado con éxito, redirigiendo...</p>");
     http_redirect("index.php");
 } else {
     echo("<p>Email delivery failed…</p>");
 }

 $conexion->close();
