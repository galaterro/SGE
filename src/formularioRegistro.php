<?php
/**
 * Created by IntelliJ IDEA.
 * User: juanxxiii
 * Date: 13/02/2017
 * Time: 19:11
 */
echo '<table>';
echo '<form method="post" action="registro.php">';
echo '<tr>';
echo '<td rowspan="1">';
echo '<input type="text" name="dni" placeholder="DNI"/>';
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>';
echo '<input type="text" name="nombre" placeholder="Nombre"/>';
echo '</td>';
echo '<td>';
echo '<input type="text" name="apellidos" placeholder="Apellidos"/>';
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>';
echo '<input type="text" name="telefono" placeholder="Num.Teléfono"/>';
echo '</td>';
echo '<td>';
echo '<input type="text" name="cp" placeholder="Código Postal"/>';
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>';
echo '<input type="text" name="usuario" placeholder="Nombre de Usuario"/>';
echo '</td>';
echo '<td>';
echo '<input type="password" name="password" placeholder="Password"/>';
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>';
echo '<input type="submit" value="Enviar">';
echo '<input type="reset" value="Resetear">';
echo '</form>';
echo '<table>';
