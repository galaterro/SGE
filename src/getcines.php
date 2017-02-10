<?php
/**
 * Created by IntelliJ IDEA.
 * User: juanxxiii
 * Date: 10/02/2017
 * Time: 16:56
 */
function getCines($mysqli) {
    $cines = $mysqli->query("SELECT * FROM cine");
    return $cines;
}
