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
include 'connection.php';
include 'helperDDBB.php';
$conexion = getCon();
$nombre_pelicula =  getNombrePelicula($conexion, $id_pelicula);

 $subject = "Tus entradas para: " . $nombre_pelicula;
 $body = "Nos ponemos en contacto con usted para entregarle sus entradas para la película: " .  $nombre_pelicula . " que tendrá luagr en la sala";
 if (mail($correo, $subject, $body)) {
     echo("<p>Email successfully sent!</p>");
 } else {
     echo("<p>Email delivery failed…</p>");
 }
 ?>
