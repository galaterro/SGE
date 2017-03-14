<!DOCTYPE html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="js/vendor/jquery-3.1.1.min.js"></script>
</head>
<body>
<div class="header">
    <header>
        <?php include 'navbar.php'?>
    </header>
</div>
<div class="wrapper">
    <?php
    session_start();
    $nombre = $_POST["nombre"];
    $dni = $_POST["dni"];
    $apellidos = $_POST["apellidos"];
    $telefono = $_POST["telefono"];
    $cp = $_POST["cp"];
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    include 'connection.php';
    include 'helperDDBB.php';

    if($nombre == null){
        include 'formularioRegistro.php';

    }else{

        $sql = "INSERT INTO cliente(dni_cli, nombre_cli, apellidos_cli, telefono_cli, cp, usuario, password) VALUES ('" . $dni . "', '" .
            $nombre . "', '" . $apellidos . "', " . $telefono . ", " . $cp .  ", '" .
            $usuario . "', '" . $password . "');";
        $conexion = getCon();
        if($conexion->query($sql) === TRUE){
            echo 'Registro realizado con éxito';
            http_redirect('index.php');
        }else{
            echo "HA OCURRIDO UN ERROR, POR FAVOR, INTENTELO DE NUEVO";
        }
    }?>
    <?php include 'footer.php' ?>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>

