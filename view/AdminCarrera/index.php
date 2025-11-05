<?php
/* Llamamos al archivo de conexion.php */
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <?php require_once("../html/MainHead.php"); ?>
    </head>

    <body>
        <?php require_once("../html/MainMenu.php"); ?>

        <?php require_once("../html/MainHeader.php"); ?>

        <div class="br-mainpanel">

            <br>

            <div class="br-pagebody mg-b-25">
                <div class="br-section-wrapper">

                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 tx-20">Pestaña Carrera</h6>
                    <p class="mg-b-25 mg-lg-b-20">Aquí puedes administrar el contenido que se mostrará en la pestaña
                        Carrera.
                    </p>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <button class="btn btn-outline-primary form-control tx-bold" id="add_button"
                                    onclick='editar("#modalDirector")'>
                                    Director de Carrera<i class="fa fa-pencil mg-l-5"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <button class="btn btn-outline-primary form-control tx-bold" id="add_button"
                                    onclick='editar("#modalCoordinador")'>
                                    Coordinadores<i class="fa fa-pencil mg-l-5"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <button class="btn btn-outline-primary form-control tx-bold" id="add_button"
                                    onclick='editar("#modalPrueba")'>
                                    Prueba de Admisión<i class="fa fa-pencil mg-l-5"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <button class="btn btn-outline-primary form-control tx-bold" id="add_button"
                                    onclick='editar("#modalPreUni")'>
                                    Curso Pre-Universitario<i class="fa fa-pencil mg-l-5"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <button class="btn btn-outline-primary form-control tx-bold" id="add_button"
                                    onclick='editar("#modalAfiche")'>
                                    Afiche Publicitario<i class="fa fa-pencil mg-l-5"></i>
                                </button>
                            </div>
                        </div>

                        <div class="br-section-wrapper col-lg-12">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 tx-20">Nuestros Logros</h6>

                            <a href="#" class="btn btn-teal btn-with-icon mg-b-15" onclick="nuevo_logro()">
                                <div class="ht-40">
                                    <span class="icon wd-40"><i class="fa fa-plus"></i></span>
                                    <span class="pd-x-15">Nuevo Logro</span>
                                </div>
                            </a>
                            <div class="table-wrapper">
                                <table id="logros_data" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">Nombre</th>
                                            <th class="wd-15p">Lugar</th>
                                            <th class="wd-15p">Fecha</th>
                                            <th class="wd-10p"> </th>
                                            <th class="wd-10p"> </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div><!-- table-wrapper -->
                        </div>

                        <div class="br-section-wrapper col-lg-12">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 tx-20">Guía Telefónica</h6>
                            <p class="mg-b-25 mg-lg-b-20">Estos números de celular se mostrarán en el Footer de la página
                                web.
                            </p>

                            <a href="#" class="btn btn-danger btn-with-icon mg-b-15" onclick="nuevo_cel()">
                                <div class="ht-40">
                                    <span class="icon wd-40"><i class="fa fa-plus"></i></span>
                                    <span class="pd-x-15">Agregar número de celular</span>
                                </div>
                            </a>
                            <div class="table-wrapper">
                                <table id="cel_data" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">Nombre del Contacto</th>
                                            <th class="wd-15p">Celular</th>
                                            <th class="wd-10p"> </th>
                                            <th class="wd-10p"> </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div><!-- table-wrapper -->
                        </div>
                    </div>


                </div>
            </div><!-- br-pagebody -->

        </div><!-- br-mainpanel -->

        <?php require_once("../html/MainJs.php") ?>

        <?php require_once("modalAfiche.php") ?>
        <?php require_once("modalCel.php") ?>
        <?php require_once("modalLogros.php") ?>
        <?php require_once("modalDirector.php") ?>
        <?php require_once("modalCoordinador.php") ?>
        <?php require_once("modalPrueba.php") ?>
        <?php require_once("modalPreUni.php") ?>

        <script type="text/javascript" src="admincarrera.js"></script>

        <script>
            var baseUrl = "../../";  // Ajusta la ruta según la ubicación de tus controladores
        </script>

    </body>

    </html>
    <?php
} else {
    /* si no ha iniciado sesion se direccionara a la ventana principal */
    header("Location:" . Conectar::ruta() . "view/404/");
}
?>