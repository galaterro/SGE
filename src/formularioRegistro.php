<?php
/**
 * Created by IntelliJ IDEA.
 * User: juanxxiii
 * Date: 13/02/2017
 * Time: 19:11
 */

echo '<form method="post" action="registro.php">';
echo '<input type="text" name="dni" placeholder="DNI"/>';
echo '<input type="text" name="nombre" placeholder="Nombre"/>';
echo '<input type="text" name="apellidos" placeholder="Apellidos"/>';
echo '<input type="text" name="telefono" placeholder="Num.Teléfono"/>';
echo '<input type="text" name="cp" placeholder="Código Postal"/>';
echo '<input type="text" name="usuario" placeholder="Nombre de Usuario"/>';
echo '<input type="password" name="password" placeholder="pass"/>';
echo '<input type="submit" value="Enviar">';
echo '<input type="reset" value="Resetear">';
echo '</form>';
