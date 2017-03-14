<?php
/**
 * Created by IntelliJ IDEA.
 * User: Adri
 * Date: 02/03/2017
 * Time: 13:16
 */
echo '<div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
    <span class="sr-only" id="barra">0% Complete</span>
  </div>
</div>';
session_start();
$correo = $_GET["correo"];
$id_pelicula = $_SESSION["id_pelicula"];
$id_butaca = $_SESSION["id_butaca"];
$id_sesion = $_SESSION["id_sesion"];
include 'connection.php';
include 'helperDDBB.php';
include "utils/qrlib/qrlib.php";
require_once('utils/phpmailer/class.phpmailer.php');

$nombre_imagen = rand(1,99999999);
$conexion = getCon();
$nombre_pelicula =  getNombrePelicula($conexion, $id_pelicula);
$id_reserva = crearReserva($conexion, $id_pelicula, $id_butaca, $id_sesion);

QRcode::png('id_reserva: ' . $id_reserva . " Tonto el que lo lea", $nombre_imagen . '.png', 'H', 7, 2);

$from="From: TEST\r\nMIME-Version: 1.0\r\nContent-type: text/html; charset=iso-8859-1";
$subject = "Tus entradas para: " . $nombre_pelicula;
 $body = "Nos ponemos en contacto con usted para entregarle sus entradas para la película: " . $nombre_pelicula . " que tendrá luagar a las: " . getSesion($conexion, $id_sesion)
 . '. Por favor, presente la siguiente imagen en la entrada para poder acceder a la sala. Un saludo.';

$email = new PHPMailer();
$email->From      = 'adrix1992@gmail.com';
$email->FromName  = 'Cines Aztec';
$email->Subject   = 'Tus entradas para ' . $nombre_pelicula;
$email->Body      = $body;
$email->AddAddress( $correo );

$file_to_attach = $nombre_imagen . '.png';


$email->AddAttachment( $file_to_attach , $nombre_imagen . '.png' );



if($email->Send()){
    echo("<div class='alert alert-success' role='alert'>Su correo ha sido enviado con éxito, redirigiendo...</div>");
    sleep(5);
    unlink($nombre_imagen . '.png');
    header("Location: http://146.185.160.131/index.php");
    exit();
} else {
    echo("<div class='alert alert-danger' role='alert'>Error al enviar el correo, por favor, recargue la página.</div>");
}

 $conexion->close();
