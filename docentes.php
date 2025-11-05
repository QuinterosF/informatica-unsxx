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
            <h1>Ingeniería Informática<br>Plantel Docente</h1>
        </center>
    </header>
    <div class="fila" id="docentes">
        <!-- <div class="perfil-academico col-3 col-12-mobile">
            <div class="perfil-imagen">
                <img src="images/perfil_default.jpg" alt="Imagen del Docente" />
            </div>
            <h3>Nombre completo</h3>
            <p>
                <i class="fa fa-phone"></i> +591 76543210
            </p>
            <p>
                <a href="mailto:ejemplo@gmail.com" target="_blank"><i class="fa fa-envelope-o"></i> email</a>
            </p>
            <p id="p_historia">
                El ingeniero informático transforma y administra la información a través del diseño, desarrollo y
                aplicación de la tecnología. Es quien lidera la innovación tecnológica de las organizaciones. Su
                formación le permite intervenir en el análisis de los datos y en distintas etapas de un proyecto
                informático.
            </p>
            <center><button id="btn_historia" type="submit" class="button"
                    onclick='ver_mas_menos("p_historia", "btn_historia")'>Ver menos</button></center>
        </div> -->
    </div>
    <!-- Footer -->
    <?php require_once("html/Footer.php"); ?>

    <!-- Scripts -->
    <?php require_once("html/MainJs.php"); ?>
    <script type="text/javascript" src="view/AdminDocentes/admindocentes.js"></script>
</body>


</html>