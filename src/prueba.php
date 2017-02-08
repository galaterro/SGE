<?php
/**
 * Created by PhpStorm.
 * User: juanxxiii
 * Date: 08/02/2017
 * Time: 15:59
 */
            function getCon() {
                $mysqli = mysqli_connect(
                    "146.185.160.131",
                    "usuario",
                    "usuario",
                    "cinema",
                    3306);
                if ($mysqli->connect_errno) {
                    echo "Error:" . $mysqli->connect_error;
                }
                return $mysqli;
            }
            function getCines($mysqli) {
                $cines = $mysqli->query("SELECT * FROM cine");
    return $cines;
    }

    $conexion = getCon();
    $cines = getCines($conexion);

    while ($cine = $cines->fetch_row()) {
        echo '<tr>';
        echo '<td>' . $cine[0] . '</td>';
        echo '<td>' . $cine[1] . '</td>';
        echo "</tr>";
    }
