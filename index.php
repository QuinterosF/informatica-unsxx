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

<body class="homepage is-preload">
    <div id="page-wrapper">

        <!-- Header -->
        <div id="header">

            <!-- Inner -->
            <div class="inner">
                <header>
                    <h1 style="font-size: 4.5em;"><a href="index.php" id="logo">Ingeniería Informática</a></h1>
                    <h1 style="font-family: Gabriola; font-size: 3.5em;">25 años de Vida Institucional</h1>
                    <h1 style="font-family: Gabriola; font-size: 3em;">Rumbo a la Acreditación</h1>
                    <hr />
                    <h2 style="font-family: Gabriola; font-size: 2.5em;"><a href=" http://unsxx.edu.bo/"
                            target="_blank">Universidad Nacional "Siglo XX"</a></h2>
                    <!-- <br>
                    <h2 style="font-family: Gabriola; font-size: 2em;">Formando Profesionales Orgánicos con
                        Compromiso Social</h2> -->
                    <div class="portada">
                        <img src="images/unsxx.png" class="unsxx" />
                        <img src="images/infor.png" class="carrera" />
                    </div>
                </header>
            </div>

            <!-- Nav -->
            <?php require_once("html/Nav.php"); ?>

        </div>

        <!-- Main -->
        <div class="wrapper style1" id="acerca_de">

            <center>
                <h1>Acerca de Nosotros</h1>
            </center><br>

            <div class="container">
                <div class="row gtr-200">
                    <div class="col-8 col-12-mobile" id="content">
                        <article id="main">

                            <!-- AFICHE PUBLICITARIO -->
                            <p class="image featured" id="p_afiche"></p>

                            <hr />

                            <center>
                                <h2>Contamos con dos Menciones y un Instituto de Investigación</h2>
                            </center><br>
                            <div class="fila">
                                <div class="perfil-academico col-4 col-12-mobile">
                                    <a href="movil.php">
                                        <div class="perfil-imagen">
                                            <img src="images/movil.png" alt="Imagen del Docente" />
                                        </div>
                                        <h3>Mención<br>Computación Móvil</h3>
                                    </a>
                                </div>
                                <div class="perfil-academico col-4 col-12-mobile">
                                    <a href="seguridad.php">
                                        <div class="perfil-imagen">
                                            <img src="images/seguridad.png" alt="Imagen del Docente" />
                                        </div>
                                        <h3>Mención<br>Seguridad Informática</h3>
                                    </a>
                                </div>
                                <div class="perfil-academico col-4 col-12-mobile">
                                    <a href="https://sites.google.com/view/iidai/inicio" target="_blank"
                                        rel="noopener noreferrer">
                                        <div class="perfil-imagen">
                                            <img src="images/iidai.png" alt="Imagen del Docente" />
                                        </div>
                                        <h3>Instituto de Investigación y Desarrollo de Aplicaciones Informáticas (IIDAI)
                                        </h3>
                                    </a>
                                </div>
                            </div>

                            <hr />

                            <center>
                                <h2>Contamos con 6 laboratorios</h2>
                            </center><br>
                            <div class="fila">
                                <div class="perfil-academico col-4 col-12-mobile">
                                    <a href="lab_mov.php">
                                        <div class="perfil-imagen">
                                            <img src="images/laboratorios/mov.jpg" alt="Imagen del Docente" />
                                        </div>
                                        <h3>Laboratorio de<br>Computación Móvil</h3>
                                    </a>
                                </div>
                                <div class="perfil-academico col-4 col-12-mobile">
                                    <a href="lab_seg.php">
                                        <div class="perfil-imagen">
                                            <img src="images/laboratorios/seg.jpg" alt="Imagen del Docente" />
                                        </div>
                                        <h3>Laboratorio de<br>Seguridad Informática</h3>
                                    </a>
                                </div>
                                <div class="perfil-academico col-4 col-12-mobile">
                                    <a href="lab_hd.php">
                                        <div class="perfil-imagen">
                                            <img src="images/laboratorios/hd.jpg" alt="Imagen del Docente" />
                                        </div>
                                        <h3>Laboratorio de<br>Hardware</h3>
                                    </a>
                                </div>
                                <div class="perfil-academico col-4 col-12-mobile">
                                    <a href="lab_swi.php">
                                        <div class="perfil-imagen">
                                            <img src="images/laboratorios/swi.jpg" alt="Imagen del Docente" />
                                        </div>
                                        <h3>Laboratorio de<br>Software I</h3>
                                    </a>
                                </div>
                                <div class="perfil-academico col-4 col-12-mobile">
                                    <a href="lab_swii.php">
                                        <div class="perfil-imagen">
                                            <img src="images/laboratorios/swii.jpg" alt="Imagen del Docente" />
                                        </div>
                                        <h3>Laboratorio de<br>Software II</h3>
                                    </a>
                                </div>
                                <div class="perfil-academico col-4 col-12-mobile">
                                    <a href="lab_swiii.php">
                                        <div class="perfil-imagen">
                                            <img src="images/laboratorios/swiii.jpg" alt="Imagen del Docente" />
                                        </div>
                                        <h3>Laboratorio de<br>Software III</h3>
                                    </a>
                                </div>
                            </div>

                        </article>
                    </div>
                    <div class="col-4 col-12-mobile" id="sidebar">
                        <hr class="first" />
                        <section>
                            <header>
                                <h3>Presentación</h3>
                            </header>
                            <p id="p_presentacion"></p>
                            <button id="btn_presentacion" type="submit" class="button"
                                onclick='ver_mas_menos("p_presentacion", "btn_presentacion")'>Ver menos</button>
                        </section><br>

                        <section>
                            <header>
                                <h3>Perfil Profesional</h3>
                            </header>
                            <p id="p_perfil"></p>
                            <button id="btn_perfil" type="submit" class="button"
                                onclick='ver_mas_menos("p_perfil", "btn_perfil")'>Ver menos</button>
                        </section><br>

                        <section>
                            <header>
                                <h3>Misión</h3>
                            </header>
                            <p id="p_mision"></p>
                            <button id="btn_mision" type="submit" class="button"
                                onclick='ver_mas_menos("p_mision", "btn_mision")'>Ver menos</button>
                        </section><br>

                        <section>
                            <header>
                                <h3>Visión</h3>
                            </header>
                            <p id="p_vision"></p>
                            <button id="btn_vision" type="submit" class="button"
                                onclick='ver_mas_menos("p_vision", "btn_vision")'>Ver menos</button>
                        </section><br>

                        <section>
                            <header>
                                <h3>Objetivo General</h3>
                            </header>
                            <p id="p_objetivo"></p>
                            <button id="btn_objetivo" type="submit" class="button"
                                onclick='ver_mas_menos("p_objetivo", "btn_objetivo")'>Ver menos</button>
                        </section><br>

                        <section>
                            <header>
                                <h3>Reseña Histórica</h3>
                            </header>
                            <p id="p_historia"></p>
                            <button id="btn_historia" type="submit" class="button"
                                onclick='ver_mas_menos("p_historia", "btn_historia")'>Ver menos</button>
                        </section>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-6 col-12-mobile">
                        <iframe width="100%" height="300px"
                            src="https://www.youtube.com/embed/XDcbq-cWNAg?si=siucjict9d08Hcxi"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                    <div class="col-6 col-12-mobile">
                        <iframe width="100%" height="300px"
                            src="https://www.youtube.com/embed/YqThsdr49AU?si=jACTc5DFOatXc27f"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php require_once("html/Footer.php"); ?>

    </div>

    <!-- Scripts -->
    <?php require_once("html/MainJs.php"); ?>

    <script type="text/javascript" src="view/AdminHome/adminInicio.js"></script>
</body>

</html>