<?php
  /* Llamamos al archivo de conexion.php */
    require_once("../../config/conexion.php");
    if(isset($_SESSION["usu_id"])) {
?>
    <!DOCTYPE html>
    <html lang="es">
        <head>
        <?php require_once("../html/MainHead.php"); ?>
        <title>SOCE-II::Admin</title>
        </head>

        <body>
        <?php require_once("../html/MainMenu.php"); ?>

        <?php require_once("../html/MainHeader.php"); ?>

        <div class="br-mainpanel">
            <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
                <h4 class="tx-gray-800 mg-b-5 tx-uppercase tx-bold">Administrar usuarios</h4>
            </div>
            
            <div class="br-pagebody mg-b-25">
                <div class="br-section-wrapper">
                    <!-- <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 tx-20">Administrar cursos</h6> -->
                    <p class="mg-b-25 mg-lg-b-20">Aquí puedes administrar y hacer mantenimiento a los usuarios</p>

                    <a href="#" class="btn btn-info btn-with-icon mg-b-15" onclick="nuevo_usuario()">
                        <div class="ht-40">
                            <span class="icon wd-40"><i class="icon ion-person-add tx-20"></i></span>
                            <span class="pd-x-15">Nuevo usuario</span>
                        </div>
                    </a>

                    <div class="table-wrapper">
                    <table id="usuario_data" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">Nombre</th>
                            <th class="wd-15p">Permisos</th>
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

        <?php require_once("modalmantenimiento.php") ?>
        <?php require_once("../html/MainJs.php") ?>
        <script type="text/javascript" src="adminmntusuario.js"></script>
        </body>
    </html>
<?php
    } else {
    /* si no ha iniciado sesion se direccionara a la ventana principal */
    header("Location:".Conectar::ruta()."view/404/");
    }
?>