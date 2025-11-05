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

                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 tx-20">Acerca De Ingeniería Informática</h6>
                    </p>


                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <button class="btn btn-outline-primary form-control tx-bold" id="add_button"
                                    onclick='editar("#modalPresentacion")'>
                                    Presentación<i class="fa fa-pencil mg-l-5"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <button class="btn btn-outline-primary form-control tx-bold" id="add_button"
                                    onclick='editar("#modalPerfil")'>
                                    Perfil Profesional<i class="fa fa-pencil mg-l-5"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <button class="btn btn-outline-primary form-control tx-bold" id="add_button"
                                    onclick='editar("#modalMision")'>
                                    Misión<i class="fa fa-pencil mg-l-5"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <button class="btn btn-outline-primary form-control tx-bold" id="add_button"
                                    onclick='editar("#modalVision")'>
                                    Visión<i class="fa fa-pencil mg-l-5"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <button class="btn btn-outline-primary form-control tx-bold" id="add_button"
                                    onclick='editar("#modalObjetivo")'>
                                    Objetivo General<i class="fa fa-pencil mg-l-5"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <button class="btn btn-outline-primary form-control tx-bold" id="add_button"
                                    onclick='editar("#modalHistoria")'>
                                    Reseña Histórica<i class="fa fa-pencil mg-l-5"></i>
                                </button>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- br-pagebody -->

        </div><!-- br-mainpanel -->

        <?php require_once("modalPresentacion.php") ?>
        <?php require_once("modalPerfil.php") ?>
        <?php require_once("modalMision.php") ?>
        <?php require_once("modalVision.php") ?>
        <?php require_once("modalObjetivo.php") ?>
        <?php require_once("modalHistoria.php") ?>
        <?php require_once("../html/MainJs.php") ?>

        <script type="text/javascript" src="adminInicio.js"></script>
    </body>

    </html>
    <?php
} else {
    /* si no ha iniciado sesion se direccionara a la ventana principal */
    header("Location:" . Conectar::ruta() . "view/404/");
}
?>