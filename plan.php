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
                        <h1>Ingeniería Informática<br>Plan de Estudios</h1>
                    </center>
                </header>
                <div class="row gtr-200">
                    <div class="col-6 col-12-mobile" id="content">
                        <section>
                            <header>
                                <h2>Perfil Profesional</h2>
                            </header>
                            <p id="p_perfil"></p>
                            <button id="btn_perfil" type="submit" class="button"
                                onclick='ver_mas_menos("p_perfil", "btn_perfil")'>Ver menos</button>
                        </section>
                    </div>
                    <div class="col-6 col-12-mobile" id="content">
                        <div class="portada">
                            <img src="images/unsxx.png" class="unsxx" />
                            <img src="images/infor.png" class="carrera" />
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row gtr-200">
                    <div class="col-6 col-12-mobile">
                        <article>
                            <!-- PLAN DE ESTUDIOS -->
                            <header>
                                <h2>Malla Curricular</h2>
                            </header>
                            <iframe class="PDF" src="docs/malla.pdf"></iframe>
                        </article>
                    </div>
                    <div class="col-6 col-12-mobile">
                        <article>
                            <!-- PLAN DE ESTUDIOS -->
                            <header>
                                <h2>Plan de Estudios</h2>
                            </header>
                            <iframe class="PDF" src="docs/plan_estudios.pdf"></iframe>
                        </article>
                    </div>
                </div>
                <hr />
                <div class="row gtr-200">
                    <div class="col-6 col-12-mobile">
                        <article class="col-12 col-12-mobile special">
                            <header>
                                <h2>Nivel de Formación Académica</h2>
                            </header>
                            <i class="image featured"><img src="images/Nivel de Formación.png" alt="" /></i>
                        </article>
                    </div>
                    <div class="col-6 col-12-mobile">
                        <article class="col-12 col-12-mobile special">
                            <div class="fila">
                                <div class="perfil-academico col-6 col-12-mobile">
                                    <a href="seguridad.php">
                                        <div class="perfil-imagen">
                                            <img src="images/seguridad.png" alt="Imagen del Docente" />
                                        </div>
                                        <h3>Mención<br>Seguridad Informática</h3>
                                    </a>
                                </div>
                                <div class="perfil-academico col-6 col-12-mobile">
                                    <a href="movil.php">
                                        <div class="perfil-imagen">
                                            <img src="images/movil.png" alt="Imagen del Docente" />
                                        </div>
                                        <h3>Mención<br>Computación Móvil</h3>
                                    </a>
                                </div>
                            </div>
                        </article>
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
        var name_file = "plan";
    </script>

</body>

</html>