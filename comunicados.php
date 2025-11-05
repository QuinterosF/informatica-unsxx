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
            <h1>Ingeniería Informática<br>Comunicados y Eventos</h1>
        </center>
    </header>

    <div class="row">
        <div id="comunicados" class="col-12">
            <!-- DIV DE LOS COMUNICADOS -->
            <!-- <div class="fila comunicado col-12 col-12-mobile">
                <div class="col-4 container-img">
                    <img src="images/infor.png" />
                </div>
                <div class="col-8">
                    <h4><i class="icon ion-calendar"></i>04 - Julio - 1998</h4>
                    <h3>XIII Congreso Nacional de Informática - Convocatoria Expositores</h3>
                    <a href="docs/Horario.pdf" target="_blank"><i class="icon ion-pin"></i><i
                            class="icon ion-document-text"></i>Ver documento</a>
                    <section>
                        <p id="p_mision"></p>
                        <button id="btn_mision" type="submit" class="button"
                            onclick='ver_mas_menos("p_mision", "btn_mision")'>Ver menos</button>
                    </section>
                </div>
            </div> -->
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
    <script type="text/javascript" src="view/AdminComunicados/admincomunicados.js"></script>
    <script>
        var name_file = "comunicados";
    </script>
</body>


</html>