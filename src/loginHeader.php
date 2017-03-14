<?php
/**
 * Created by IntelliJ IDEA.
 * User: juanxxiii
 * Date: 20/02/2017
 * Time: 17:36
 */
session_start();
spl_autoload(Usuario,'.php');
include 'Usuario.php';
if(!isset($_SESSION['user'])){
    echo 'Usted no está registrado ';
    echo "<a href='registro.php'>Regístrese aquí</a>";
    echo '<form method="post" action="login.php"><input type="text" name="usuario" placeholder="Usuario">
    <input type="password" name="password"> <input type="submit" value="Enviar"></form>';
}else{
    echo 'Bienvenido de nuevo ' . $_SESSION['user'];
}
