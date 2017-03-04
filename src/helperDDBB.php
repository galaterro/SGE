<?php
/**
 * Created by IntelliJ IDEA.
 * User: juanxxiii
 * Date: 10/02/2017
 * Time: 16:56
 */
/**
 * @param $mysqli
 * @return mixed
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
    $cine = $mysqli->query("SELECT id_cine FROM cine WHERE nombre_cine = '" . $nombre . "'");
    $cine = $cine->fetch_row();
    $salas = $mysqli->query("SELECT id_sala FROM sala WHERE id_cine = " . $cine[0] );
    echo '<table class="table table-hover">';
    echo "<caption>Peliculas que hay disponibles en " . $nombre . ":</caption>";
    echo '<th>Nombre de la película</th><th>Duración de la película</th><th>Edad recomendada</th><th>Reservar Entradas</th>';
    while ($sala = $salas->fetch_row()) {
        $peliculas = $mysqli->query("SELECT * FROM pelicula WHERE id_sala = " . $sala[0]);
        while($peli = $peliculas->fetch_row()){
            echo "<tr><td>" . $peli[1] . '</td>';
            echo "<td>" . $peli[2] . ' minutos</td>';
            echo "<td>" . $peli[3] . ' años</td>';
            echo '<td><button type="submit" class="reservar" name="id" value="' . $peli[0] .'">Reservar</button> </td>';
            echo "</tr>";
        }
    }
    echo '</table>';
}

/**
 * @param $mysqli
 * @param $id_pelicula
 */
function getInfoButacas($mysqli, $id_pelicula){
    $salas = $mysqli->query("SELECT * FROM pelicula WHERE id_pelicula = '" . $id_pelicula . "'");
    $sala = $salas->fetch_row();

    $_SESSION["sala"] = $sala[4];
    $_SESSION["pelicula"] = $id_pelicula;
    echo "<div class='col-md-4 col-md-offset-4'><h4>Butacas que hay disonibles para "  . $sala[1] . "</h4></div>";
    $sesiones = $mysqli->query('SELECT * FROM sesion WHERE id_pelicula = ' . $id_pelicula . ' ORDER BY hora_sesion');
    while ($sesion = $sesiones->fetch_row()){
        echo '<div class="col-md-6"><table class="table table-hover">';
        echo '<caption>Sesion de la hora: ' . $sesion[1] . '"</caption>';
        echo '<th>Fila de la butaca</th><th>Columna de la butaca</th><th>Disponibilidad</th>';

        $butacas = $mysqli->query("SELECT * FROM butaca WHERE id_sala = " . $sala[4]);
        while ($butaca = $butacas->fetch_row()) {

            if(getUsedButaca($butaca[0], $mysqli, $sesion[0])){
                echo '<tr class="danger"><td>' . $butaca[1] . '</td><td>' . $butaca[2] . '</td><td><button type="submit" class="reservar" name="id" value="' . $butaca[0] . '"disabled>No Disponible</button></td></tr>';
            }else{
                echo '<tr class="success"><td>' . $butaca[1] . '</td><td>' . $butaca[2] . '</td><td class="active"><button type="submit" class="reservar" name="id" value="' . $butaca[0] . '|' . $sesion[0] . '">Reservar</button></td>';
            }
            echo '</tr>';
        }
        echo '</table></div>';
    }
}

/**
 * @param $id_butaca
 * @param $mysqli
 * @return bool
 */
function getUsedButaca($id_butaca, $mysqli, $id_sesion){
    $butacaUsada = false;
    $usadas = $mysqli->query("SELECT id_reserva FROM reserva WHERE id_butaca = '" . $id_butaca . "' AND id_sesion = " . $id_sesion);
    while($usada = $usadas->fetch_row()){
        if($usada[0] == null){
            $butacaUsada= false;
        }else{
            $butacaUsada = true;
        }
    }
    return $butacaUsada;
}

/**
 * @param $mysqli
 * @param $id_butaca
 * @return mixed
 */
function getButaca($mysqli, $id_butaca){
    $butaca = $mysqli->query("SELECT * FROM butaca WHERE id_butaca = " . $id_butaca);
    $butaca->fetch_row();
    return $butaca;
}

/**
 * @param $mysqli
 * @param $id_pelicula
 * @return mixed
 */
function getNombrePelicula($mysqli, $id_pelicula){
    $butaca = $mysqli->query("SELECT nombre_pelicula FROM pelicula WHERE id_pelicula = " . $id_pelicula);
    $nombre = $butaca->fetch_row();
    return $nombre[0];
}

/**
 * @param $mysqli
 * @param $id_sesion
 * @return mixed
 */
function getSesion($mysqli, $id_sesion){
    $pelicula = $mysqli->query('SELECT hora_sesion FROM sesion WHERE id_sesion = ' . $id_sesion);
    $sesion = $pelicula->fetch_row();
    return $sesion[0];
}

/**
 * @param $mysqli
 * @param $id_pelicula
 * @param $id_butaca
 * @param $id_sesion
 * @return mixed
 */
function crearReserva($mysqli, $id_pelicula, $id_butaca, $id_sesion){
    $sql = 'INSERT INTO reserva (id_pelicula, id_sesion, id_butaca, id_cliente) VALUES (' . $id_pelicula . ', ' . $id_sesion . ', ' . $id_butaca . ", null" .")";
    if ($mysqli->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $sql = 'SELECT id_reserva FROM reserva WHERE id_pelicula = ' . $id_pelicula . ' AND id_butaca = ' . $id_butaca . ' AND id_sesion = ' . $id_sesion;
    $sesion = $mysqli->query($sql);
    $id_reserva = $sesion->fetch_row();
    return $id_reserva[0];
}
