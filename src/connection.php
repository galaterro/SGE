<?php
/**
 * Created by IntelliJ IDEA.
 * User: juanxxiii
 * Date: 10/02/2017
 * Time: 16:51
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

function closeCon($mysqli){
    $result = mysqli_close($mysqli);
    return $result;
}
