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
                        <h1>Ingeniería Informática<br>Mención "Seguridad Informática"</h1>
                    </center>
                </header>
                <div class="row gtr-200">
                    <div class="col-4 col-12-mobile">
                        <header>
                            <center>
                                <h2>Perfil Profesional</h2>
                            </center>
                        </header>
                        <p id="p_perfil_seguridad">- Diseña e implementa sistemas de criptografía y esteganografía, para dotar seguridad a las comunicaciones y la información.<br><br>- Mantiene la Integridad, disponibilidad, privacidad, control y autenticidad de la información.<br><br>- Aplica técnicas de protección frente a ataques y amenazas en los sistemas operativos, las redes, el software de aplicación, los sistemas Web y las bases de datos<br><br>- Aplica diferentes métodos, técnicas y herramientas para la prevención y detección de intrusiones para la seguridad en la web.<br><br>- Aplica técnicas, métodos y herramientas de la informática forense para la obtención de evidencia digital.<br><br>- Realiza auditorias informáticas aplicando estándares y normas establecidas.<br><br>- Será un líder con capacidad crítica y ética en el manejo de los aspectos legales de la seguridad informática.<br><br>- Diseña políticas de seguridad informática en interconexión de redes de comunicación y transmisión de datos.</p>
                        <button id="btn_perfil_seguridad" type="submit" class="button"
                            onclick='ver_mas_menos("p_perfil_seguridad", "btn_perfil_seguridad")'>Ver menos</button>
                    </div>
                    <div class="col-4 col-12-mobile">
                        <i class="image featured"><img src="images/seguridad.png" alt="" /></i>
                    </div>
                    <div class="col-4">
                        <div class="fila">
                            <div id="coor_seguridad" class="perfil-academico col-12 col-12-mobile">

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
        var name_file = "seguridad";
    </script>

</body>

</html>