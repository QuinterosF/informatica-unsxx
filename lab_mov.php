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
                        <h1>Ingeniería Informática<br>Laboratorio de "Computación Móvil"</h1>
                    </center>
                </header>
                <div class="fila">
                    <!-- ESCUDO DE LA MENCION -->
                    <div class="col-8 col-12-mobile">
                        <i class="image featured"><img src="images/laboratorios/mov.jpg" alt="" /></i>
                    </div>
                    <div id="resp_lab_web" class="perfil-academico col-4 col-12-mobile">
                        <!-- <h2>Responsable del Laboratorio</h2> -->
                    </div>
                </div>
                <hr />
                <div class="fila">
                    <div class="col-8 col-12-mobile">
                        <article id="pdf_lab_web">
                            <!-- HORARIO PDF -->
                        </article>
                    </div>
                    <div class="col-4 col-12-mobile">
                        <header>
                            <center>
                                <h2>Laboratorio de:</h2>
                            </center>
                        </header>
                        <a href="lab_seg.php">
                            <div class="fila comunicado col-12 col-12-mobile">
                                <div class="col-6 container-img">
                                    <img src="images/laboratorios/seg.jpg" />
                                </div>
                                <div class="col-6">
                                    <h4>Seguridad Informática</h4>
                                </div>
                            </div>
                        </a>
                        <a href="lab_hd.php">
                            <div class="fila comunicado col-12 col-12-mobile">
                                <div class="col-6 container-img">
                                    <img src="images/laboratorios/hd.jpg" />
                                </div>
                                <div class="col-6">
                                    <h4>Hardware</h4>
                                </div>
                            </div>
                        </a>
                        <a href="lab_swi.php">
                            <div class="fila comunicado col-12 col-12-mobile">
                                <div class="col-6 container-img">
                                    <img src="images/laboratorios/swi.jpg" />
                                </div>
                                <div class="col-6">
                                    <h4>Software I</h4>
                                </div>
                            </div>
                        </a>
                        <a href="lab_swii.php">
                            <div class="fila comunicado col-12 col-12-mobile">
                                <div class="col-6 container-img">
                                    <img src="images/laboratorios/swii.jpg" />
                                </div>
                                <div class="col-6">
                                    <h4>Software II</h4>
                                </div>
                            </div>
                        </a>
                        <a href="lab_swiii.php">
                            <div class="fila comunicado col-12 col-12-mobile">
                                <div class="col-6 container-img">
                                    <img src="images/laboratorios/swiii.jpg" />
                                </div>
                                <div class="col-6">
                                    <h4>Software III</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php require_once("html/Footer.php"); ?>

    </div>

    <!-- Scripts -->
    <?php require_once("html/MainJs.php"); ?>

    <script type="text/javascript" src="view/AdminLaboratorios/adminlaboratorios.js"></script>

    <script>
        var name_file = "lab_mov";
    </script>

</body>

</html>