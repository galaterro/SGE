<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="js/vendor/jquery-3.1.1.min.js"></script>
</head>
<body>
<div class="header">
    <header>
        <ul>
            <li>
                <a href="index.php"> Inicio </a>
            </li>
            <li>
                <a href="cines.php"> Cines </a>
            </li>
            <li>
                <a href="cartelera.php"> Cartelera </a>
            </li>
            <li>
                Reservar
            </li>
        </ul>
    </header>
</div>
<div class="wrapper">
    <form method="get" action="peliculas.php">
        <?php include 'selectorCines.php'?>
    </form>

    <section>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, consequatur dolorum, eius enim error facere fugit in, maiores maxime molestiae molestias necessitatibus nesciunt perferendis quaerat similique veritatis vitae voluptas voluptatem.
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquam aliquid, dignissimos dolor dolores doloribus earum ex ipsum itaque magnam, minima modi nobis odit ratione rerum unde vel velit. Non.
        </p>
    </section>
    <?php include 'footer.php'?>
</div>
</body>
</html>
