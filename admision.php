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
                        <h1>Ingeniería Informática<br>Modalidades de Admisión</h1>
                    </center>
                </header>
                <hr />
                <div class="fila comunicado col-12 col-12-mobile">
                    <div class="col-12">
                        <h3>REGLAMENTO ADMISION ESTUDIANTIL A LA UNIVERSIDAD NACIONAL "SIGLO XX"</h3>
                        <a href="docs/Reglamento_admisión_UNSXX.pdf" target="_blank"><i class="icon ion-pin"></i><i
                                class="icon ion-document-text"></i>Ver documento</a>
                    </div>
                </div>
                <hr />
                <header id="prueba">
                    <center>
                        <h1>Prueba de Adimisión</h1>
                    </center>
                </header>
                <div class="row gtr-200">
                    <div class="col-6 col-12-mobile">
                        <article>
                            <!-- AFICHE PUBLICITARIO -->
                            <p class="image featured" id="p_img_adm_test"></p>
                            <!-- <img src="images/img_default.jpg" class="image featured" /> -->
                        </article>
                    </div>
                    <div class="col-6 col-12-mobile">
                        <section>
                            <header>
                                <h2>Requisitos:</h2>
                            </header>
                            <p id="p_req_adm_test"></p>
                            <button id="btn_req_adm_test" type="submit" class="button"
                                onclick='ver_mas_menos("p_req_adm_test", "btn_req_adm_test")'>Ver menos</button>
                        </section>
                        <section>
                            <header>
                                <h2>Procedimiento:</h2>
                            </header>
                            <p id="p_proc_adm_test"></p>
                            <button id="btn_proc_adm_test" type="submit" class="button"
                                onclick='ver_mas_menos("p_proc_adm_test", "btn_proc_adm_test")'>Ver menos</button>
                        </section>
                    </div>
                </div>
                <hr />
                <header id="pre-universitario">
                    <center>
                        <h1>Curso Pre-Universitario</h1>
                    </center>
                </header>
                <div class="row gtr-200">
                    <div class="col-6 col-12-mobile">
                        <article>
                            <!-- AFICHE PUBLICITARIO -->
                            <p class="image featured" id="p_img_adm_pre"></p>
                            <!-- <img src="images/img_default.jpg" class="image featured" /> -->
                        </article>
                    </div>
                    <div class="col-6 col-12-mobile">
                        <section>
                            <header>
                                <h2>Requisitos:</h2>
                            </header>
                            <p id="p_req_adm_pre"></p>
                            <button id="btn_req_adm_pre" type="submit" class="button"
                                onclick='ver_mas_menos("p_req_adm_pre", "btn_req_adm_pre")'>Ver menos</button>
                        </section>
                        <section>
                            <header>
                                <h2>Procedimiento:</h2>
                            </header>
                            <p id="p_proc_adm_pre"></p>
                            <button id="btn_proc_adm_pre" type="submit" class="button"
                                onclick='ver_mas_menos("p_proc_adm_pre", "btn_proc_adm_pre")'>Ver menos</button>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php require_once("html/Footer.php"); ?>

    </div>

    <!-- Scripts -->
    <?php require_once("html/MainJs.php"); ?>
    <script type="text/javascript" src="view/AdminCarrera/admincarrera.js"></script>

    <script>
        var name_file = "admision";
    </script>
</body>

</html>