<!DOCTYPE HTML>

<html lang="es">

<head>
    <title>Informática UNSXX</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link href="public/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="public/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link rel="icon" href="images/infor.ico">
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" />
    </noscript>
</head>

<body class="body-perfil">
    <!-- Nav -->
    <?php require_once("html/Nav.php"); ?>

    <!-- Main -->
    <header id="header-perfil">
        <center>
            <h1>Ingeniería Informática<br>Nuestras Fotos</h1>
        </center>
    </header>

    <div class="row">
        <div id="extension" class="col-12">
            <!-- DIV DE LOS EVENTOS -->
        </div>
        <!-- Contenedor para los botones de paginación -->
        <div id="container-paginacion" class="row col-12">
            <div id="left" class="col-1 col-2-mobile">
                <button onclick="setPaginacion('anterior')"><i class="fa fa-angle-left"></i></button>
            </div>
            <div id="paginacion" class="col-10 col-8-mobile">
                <!-- Botones de paginación se generarán dinámicamente aquí -->
            </div>
            <div id="right" class="col-1 col-2-mobile">
                <button onclick="setPaginacion('siguiente')"><i class="fa fa-angle-right"></i></button>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php require_once("html/Footer.php"); ?>

    <!-- Scripts -->
    <?php require_once("html/MainJs.php"); ?>

    <script type="text/javascript" src="view/AdminExtension/adminextension.js"></script>
    <script>
        var name_file = "extension";
    </script>
</body>


</html>