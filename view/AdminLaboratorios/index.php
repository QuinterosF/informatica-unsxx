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

                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 tx-20">Laboratorios</h6>
                    <p class="mg-b-25 mg-lg-b-20">Aquí puedes administrar el contenido que se mostrará de cada Laboratorio.
                    </p>
                    <h6 class="tx-gray-800 tx-bold tx-10 mg-b-10 tx-15">Editar Laboratorio de:</h6>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <button class="btn btn-outline-primary form-control tx-bold" id="add_button"
                                    onclick='editar("#modalSeg")'>
                                    Seguridad Informática<i class="fa fa-pencil mg-l-5"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <button class="btn btn-outline-primary form-control tx-bold" id="add_button"
                                    onclick='editar("#modalMov")'>
                                    Computación Móvil<i class="fa fa-pencil mg-l-5"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <button class="btn btn-outline-primary form-control tx-bold" id="add_button"
                                    onclick='editar("#modalHD")'>
                                    Hardware<i class="fa fa-pencil mg-l-5"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <button class="btn btn-outline-primary form-control tx-bold" id="add_button"
                                    onclick='editar("#modalSWI")'>
                                    Software I<i class="fa fa-pencil mg-l-5"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <button class="btn btn-outline-primary form-control tx-bold" id="add_button"
                                    onclick='editar("#modalSWII")'>
                                    Software II<i class="fa fa-pencil mg-l-5"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <button class="btn btn-outline-primary form-control tx-bold" id="add_button"
                                    onclick='editar("#modalSWIII")'>
                                    Software III<i class="fa fa-pencil mg-l-5"></i>
                                </button>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- br-pagebody -->

        </div><!-- br-mainpanel -->

        <?php require_once("../html/MainJs.php") ?>
        <?php require_once("modalSeg.php") ?>
        <?php require_once("modalMov.php") ?>
        <?php require_once("modalHD.php") ?>
        <?php require_once("modalSWI.php") ?>
        <?php require_once("modalSWII.php") ?>
        <?php require_once("modalSWIII.php") ?>
        
        <script type="text/javascript" src="adminlaboratorios.js"></script>

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