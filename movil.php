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

<body class="no-sidebar is-preload">
    <div id="page-wrapper">

        <!-- Nav -->
        <?php require_once("html/Nav.php"); ?>

        <!-- Main -->
        <div class="wrapper style1">
            <div class="container">
                <header>
                    <center>
                        <h1>Ingeniería Informática<br>Mención "Computación Móvil"</h1>
                    </center>
                </header>
                <div class="row gtr-200">
                    <div class="col-4 col-12-mobile">
                        <header>
                            <center>
                                <h2>Perfil Profesional</h2>
                            </center>
                        </header>
                        <p id="p_perfil_movil">- Desarrolla aplicaciones para dispositivos móviles.<br><br>- Desarrolla videojuegos.<br><br>- Gestiona y administra redes móviles y almacenamiento de datos.<br><br>- Desarrolla aplicaciones para SIG en entornos móviles.<br><br>- Desarrolla aplicaciones de realidad virtual y aumentada.<br><br>- Desarrolla aplicaciones para internet de las cosas.<br><br>- Desarrolla aplicaciones móviles basadas en visión artificial.</p>
                        <button id="btn_perfil_movil" type="submit" class="button"
                            onclick='ver_mas_menos("p_perfil_movil", "btn_perfil_movil")'>Ver menos</button>
                    </div>
                    <div class="col-4 col-12-mobile">
                        <i class="image featured"><img src="images/movil.png" alt="" /></i>
                    </div>
                    <div class="col-4">
                        <div class="fila">
                            <div id="coor_movil" class="perfil-academico col-12 col-12-mobile">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php require_once("html/Footer.php"); ?>

    </div>

    <!-- Scripts -->
    <?php require_once("html/MainJs.php"); ?>

    <script type="text/javascript" src="view/AdminMenciones/adminmenciones.js"></script>

    <script>
        var name_file = "movil";
    </script>

</body>

</html>