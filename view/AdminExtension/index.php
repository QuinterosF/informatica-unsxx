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
                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 tx-20">Administrar Actividades de Extensión
                    </h6>
                    <p class="mg-b-25 mg-lg-b-20">Aquí puede Administrar las Actividades de Extensión.</p>

                    <p class="mg-b-25 mg-lg-b-20">Puede agregar una Nueva Actividad de Extensión.</p>

                    <p class="mg-b-25 mg-lg-b-20">Para agregar, editar o eliminar Fotos de una Actividad de Extensión
                        primero debe
                        seleccionarla.</p>

                    <a href="#" class="btn btn-success btn-with-icon mg-b-15" onclick="nuevo_ext()">
                        <div class="ht-40">
                            <span class="icon wd-40"><i class="icon ion-plus-circled mg-l-5 tx-20"></i></span>
                            <span class="pd-x-15">Nueva Actividad de Extensión</span>
                        </div>
                    </a>
                    <div class="row">
                        <div class="br-section-wrapper col-lg-6">
                            <a href="#" class="btn btn-primary btn-with-icon mg-b-15" onclick="select_ext()">
                                <div class="ht-40">
                                    <span class="icon wd-40"><i class="icon ion-compose mg-l-5 tx-20"></i></span>
                                    <span class="pd-x-15">Seleccionar actividad</span>
                                </div>
                            </a>
                            <br>
                            <label class="form-control-label tx-primary tx-bold tx-16">
                                Lista de actividades de extensión
                            </label>
                            <div class="table-wrapper">
                                <table id="extension_data" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">Nombre</th>
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
                        <div class="br-section-wrapper col-lg-6">
                            <a href="#" class="btn btn-teal btn-with-icon mg-b-15" onclick="add_fotos()">
                                <div class="ht-40">
                                    <span class="icon wd-40"><i class="icon ion-images mg-l-5 tx-20"></i></span>
                                    <span class="pd-x-15">Agregar fotos</span>
                                </div>
                            </a>
                            <br>
                            <label class="form-control-label tx-teal tx-bold tx-16" id="ext_selec" name="ext_selec">

                            </label>
                            <div class="table-wrapper">
                                <table id="fotos_data" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">Foto</th>
                                            <th class="wd-5p"> </th>
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

        <?php require_once("modalNuevo.php") ?>
        <?php require_once("modalSelectExt.php") ?>
        <?php require_once("modalFotos.php") ?>
        <script type="text/javascript" src="adminextension.js"></script>

    </body>

    </html>
    <?php
} else {
    /* si no ha iniciado sesion se direccionara a la ventana principal */
    header("Location:" . Conectar::ruta() . "view/404/");
}
?>