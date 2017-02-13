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


function getPeliculas($mysqli,$nombre){
    $cine = $mysqli->query("SELECT id_cine FROM cine WHERE nombre_cine = " . $nombre );
    $salas = $mysqli->query("SELECT id_sala FROM sala WHERE id_cine = " . $cine);
    $peliculas[] = null;
    $contador = 0;
    while ($sala = $salas->fetch_row()) {
        echo $sala[0] . " " . $sala[1];
        $peliculas[$contador] = $mysqli->query("SELECT * FROM pelicula WHERE id_sala = " . $sala[0]);
        $contador++;
    }
    for($i = 0;$i < count($peliculas);$i++){
        echo $peliculas[$i][2];
    }
}
