<?php
/**
 * Created by IntelliJ IDEA.
 * User: juanxxiii
 * Date: 10/02/2017
 * Time: 16:49
 */
require 'connection.php';
require 'getcines.php';
echo '<select>';

$conexion = getCon();
$cines = getCines($conexion);

while ($cine = $cines->fetch_row()) {
    echo '<option value="' . $cine[1] . '">' . $cine[1] . '</option>';
}
echo "</select>";
closeCon($conexion);
