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

    <div class="br-mainpanel br-profile-page">
      <!-- ENCABEZADO DEL PERFIL -->
      <div class="card shadow-base bd-0 rounded-0 widget-4">
        <div class="card-header ht-75">
          <div class="hidden-xs-down">
            <h4 class="tx-gray-100 mg-b-5">Perfil</h4>
          </div>
        </div><!-- card-header -->
        <div class="card-body">
          <div class="card-profile-img">
            <img src="../../public/img/logo.png" alt="">
          </div><!-- card-profile-img -->
          <h4 class="tx-normal tx-roboto tx-white">
            <?php echo $_SESSION["usu_nom"] ?>
          </h4>
        </div><!-- card-body -->
      </div><!-- card -->

      <br>
      <div class="br-pagebody mg-t-5 pd-x-30  mg-b-25">
        <!-- FORMULARIO DE AJUSTES DE PERFIL -->
        <div class="br-section-wrapper">
          <p class="mg-b-15 tx-15">Aquí puede actualizar sus datos.</p>
          <p class="form-control-label tx-12">&nbsp;&nbsp;&nbsp;Obligatorio ( <span class="tx-danger">*</span> )</p>

          <div class="form-layout form-layout-1">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="usu_nom" id="usu_nom">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Correo electrónico: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="email" name="usu_correo" id="usu_correo">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Contraseña: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="usu_pass" id="usu_pass">
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->

            <div class="form-layout-footer">
              <button class="btn btn-info" id="btn_actualizar">Actualizar</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div>
      </div>
      <!-- FIN FORMULARIO DE AJUSTES DE PERFIL -->

    </div><!-- br-mainpanel -->

    <?php require_once("../html/MainJs.php") ?>
    <script type="text/javascript" src="usuperfil.js"></script>
  </body>

  </html>
  <?php
} else {
  /* si no ha iniciado sesion se direccionara a la ventana principal */
  header("Location:" . Conectar::ruta() . "view/404/");
}
?>