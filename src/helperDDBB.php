<?php
/**
 * Created by IntelliJ IDEA.
 * User: juanxxiii
 * Date: 10/02/2017
 * Time: 16:56
 */
session_start();
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
            echo '<button type="submit" class="reservar" name="id" value="' . $peli[0] .'">Reservar</button>' ;
            echo "</p>";
        }
    }


}

function getInfoButacas($mysqli, $id_pelicula){
    $salas = $mysqli->query("SELECT id_sala FROM pelicula WHERE id_pelicula = '" . $id_pelicula . "'");
    $sala = $salas->fetch_row();
    $butacas = $mysqli->query("SELECT * FROM butaca WHERE id_sala = " . $sala[0] );
    $_SESSION["sala"] = $sala[0];;
    $_SESSION["pelicula"] = $id_pelicula;
    echo "<p>Butacas disponibles para " . $sala[1] . ":</p>";
    while ($butaca = $butacas->fetch_row()) {
       if(getUsedButaca($butaca[0], $mysqli)){
           echo '<button type="submit" class="reservar" name="id" value="' . $butaca[0] .'">No Disponible</button>';
       }else{
           echo '<button type="submit" class="reservar" name="id" value="' . $butaca[0] .'">Reservar</button>';
       }
    }
}

function getUsedButaca($id_butaca, $mysqli){
    $usadas = $mysqli->query("SELECT * FROM reserva WHERE id_butaca = " . $id_butaca);
    $usada = $usadas.fetch_row();
    if(!$usada[0]){
        return true;
    }else{
        return false;
    }
}
