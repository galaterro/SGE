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


/**
 * @param $mysqli
 * @param $nombre
 */
function getPeliculas($mysqli, $nombre){
    echo "<p>Peliculas que hay disponibles en " . $nombre . ":</p>";
    $cine = $mysqli->query("SELECT id_cine FROM cine WHERE nombre_cine = '" . $nombre . "'");
    $cine = $cine->fetch_row();
    $salas = $mysqli->query("SELECT id_sala FROM sala WHERE id_cine = " . $cine[0] );

    while ($sala = $salas->fetch_row()) {
        $peliculas = $mysqli->query("SELECT * FROM pelicula WHERE id_sala = " . $sala[0]);
        while($peli = $peliculas->fetch_row()){
            echo "<p>Nombre de la película: " . $peli[2], PHP_EOL;
            echo "Duración de la película: " . $peli[3], PHP_EOL;
            echo "Edad recomendada: " . $peli[4], PHP_EOL;
            echo "</p>";
        }
    }


}
