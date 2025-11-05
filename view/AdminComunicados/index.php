<?php
  /* Llamamos al archivo de conexion.php */
    require_once("../../config/conexion.php");
    if(isset($_SESSION["usu_id"])) {
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
                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 tx-20">Comunicados</h6>
                    <p class="mg-b-25 mg-lg-b-20">Aquí puedes publicar y administrar los Comunicados de la Carrera.</p>

                    <a href="#" class="btn btn-primary btn-with-icon mg-b-15" onclick="nuevo()">
                        <div class="ht-40">
                            <span class="icon wd-40"><i class="fa fa-plus"></i></span>
                            <span class="pd-x-15">Nuevo Comunicado</span>
                        </div>
                    </a>

                    <div class="table-wrapper">
                    <table id="comunicados_data" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-10p">Fecha de publicación</th>
                            <th class="wd-15p">Nombre</th>
                            <th class="wd-15p">Documento adjunto</th>
                            <th class="wd-15p">Afiche publicitario</th>
                            <th class="wd-10p"> </th>
                            <th class="wd-10p"> </th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    </div><!-- table-wrapper -->

                </div>
            </div><!-- br-pagebody -->

        </div><!-- br-mainpanel -->

        <?php require_once("../html/MainJs.php") ?>

        <?php require_once("modal.php") ?>
        <script type="text/javascript" src="admincomunicados.js"></script>
        
        </body>
    </html>
<?php
    } else {
    /* si no ha iniciado sesion se direccionara a la ventana principal */
    header("Location:".Conectar::ruta()."view/404/");
    }
?>