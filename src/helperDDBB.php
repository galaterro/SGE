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
            echo "<p>Nombre de la película: " . $peli[1], PHP_EOL;
            echo "Duración de la película: " . $peli[2], PHP_EOL;
            echo "Edad recomendada: " . $peli[3], PHP_EOL;
            echo '<button type="submit" class="reservar" name="id" value="' . $peli[0] .'">Reservar</button>' ;
            echo "</p>";
        }
    }


}

/**
 * @param $mysqli
 * @param $id_pelicula
 */
function getInfoButacas($mysqli, $id_pelicula){
    $salas = $mysqli->query("SELECT * FROM pelicula WHERE id_pelicula = '" . $id_pelicula . "'");
    $sala = $salas->fetch_row();

    $butacas = $mysqli->query("SELECT * FROM butaca WHERE id_sala = " . $sala[4]);
    $_SESSION["sala"] = $sala[4];
    $_SESSION["pelicula"] = $id_pelicula;
    echo "<p>Butacas disponibles para " . $sala[1] . ":</p>";
    while ($butaca = $butacas->fetch_row()) {
        echo '<p>Butaca en la fila: ' . $butaca[1] . ' y en la columna: ' . $butaca[2] . " ";
      if(getUsedButaca($butaca[0], $mysqli)){
          echo '<button type="submit" class="reservar" name="id" value="' . $butaca[0] .'">No Disponible</button></p>';
       }else{
           echo '<button type="submit" class="reservar" name="id" value="' . $butaca[0] .'">Reservar</button></p>';
       }
    }
}

/**
 * @param $id_butaca
 * @param $mysqli
 * @return bool
 */
function getUsedButaca($id_butaca, $mysqli){
    $butacaUsada = false;
    $usadas = $mysqli->query("SELECT id_reserva FROM reserva WHERE id_butaca = '" . $id_butaca . "'");
    while($usada = $usadas->fetch_row()){
        if($usada[0] == null){
            $butacaUsada= false;
        }else{
            $butacaUsada = true;
        }
    }
    return $butacaUsada;
}

function getButaca($mysqli, $id_butaca){
    $butaca = $mysqli->query("SELECT * FROM butaca WHERE id_butaca = " . $id_butaca);
    $butaca->fetch_row();
    return $butaca;
}

function getNombrePelicula($mysqli, $id_pelicula){
    $butaca = $mysqli->query("SELECT nombre_pelicula FROM pelicula WHERE id_pelicula = " . $id_pelicula);
    $nombre = $butaca->fetch_row();
    return $nombre[0];
}
