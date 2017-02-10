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
/*    $peliculas = $mysqli->query("Select * FROM pelicula WHERE id_sala = (
SELECT id_sala from sala WHERE id_cine =
(SELECT id_cine WHERE nombre_cine = " . $nombre . "))");*/
    $salas = $mysqli->query("SELECT id_cine FROM cine WHERE nombre_cine = " . $nombre );

}
