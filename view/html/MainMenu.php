<div class="br-logo tx-bold"><a href="../UsuPerfil"><span>Ing. Informática</span></a></div>
<div class="br-sideleft overflow-y-auto">
  <label class="sidebar-label pd-x-10 mg-t-20 tx-15">MENÚ</label>
  <div class="br-sideleft-menu">

    <a href="../UsuPerfil" class="br-menu-link">
      <div class="br-menu-item">
        <i class="menu-item-icon icon ion-ios-person tx-26"></i>
        <span class="menu-item-label">Perfil</span>
      </div>
    </a>

    <?php
    /* Si tiene permiso de administrar USUARIOS */
    if ($_SESSION["usuarios"] == 1) {
      ?>
      <a href="../AdminUsuario" class="br-menu-link">
        <div class="br-menu-item">
        <i class="menu-item-icon icon ion-person-stalker tx-22"></i>
          <span class="menu-item-label">Usuarios</span>
        </div>
      </a>
      <?php
    }

    /* Si tiene permiso de administrar ACERCA DE */
    if ($_SESSION["acerca_de"] == 1) {
      ?>
      <a href="../AdminHome" class="br-menu-link">
        <div class="br-menu-item">
          <i class="menu-item-icon icon ion-document-text tx-22"></i>
          <span class="menu-item-label">Acerca de</span>
        </div>
      </a>
      <?php
    }

    /* Si tiene permiso de administrar CARRERA */
    if ($_SESSION["carrera"] == 1) {
      ?>
      <a href="../AdminCarrera" class="br-menu-link">
        <div class="br-menu-item">
          <i class="menu-item-icon icon ion-filing tx-22"></i>
          <span class="menu-item-label">Carrera</span>
        </div>
      </a>

      <?php
    }

    /* Si tiene permiso de administrar COMUNICADOS */
    if ($_SESSION["comunicados"] == 1) {
      ?>
      <a href="../AdminComunicados" class="br-menu-link">
        <div class="br-menu-item">
          <i class="menu-item-icon icon ion-pin tx-22"></i>
          <span class="menu-item-label">Comunicados</span>
        </div>
      </a>

      <?php
    }

    /* Si tiene permiso de administrar LABORATORIOS */
    if ($_SESSION["laboratorios"] == 1) {
      ?>
      <a href="../AdminLaboratorios" class="br-menu-link">
        <div class="br-menu-item">
          <i class="menu-item-icon fa fa-desktop tx-18"></i>
          <span class="menu-item-label">Laboratorios</span>
        </div>
      </a>

      <?php
    }

    /* Si tiene permiso de administrar DOCENTES */
    if ($_SESSION["docentes"] == 1) {
      ?>
      <a href="../AdminDocentes" class="br-menu-link">
        <div class="br-menu-item">
          <i class="menu-item-icon icon ion-person-stalker tx-22"></i>
          <span class="menu-item-label">Plantel Docente</span>
        </div>
      </a>

      <?php
    }

    /* Si tiene permiso de administrar EXTENSION */
    if ($_SESSION["extension"] == 1) {
      ?>
      <a href="../AdminExtension" class="br-menu-link">
        <div class="br-menu-item">
          <i class="menu-item-icon fa fa-globe tx-22"></i>
          <span class="menu-item-label">Extensión</span>
        </div>
      </a>
      <?php
    }
    ?>


    <a href="../html/Logout.php" class="br-menu-link">
      <div class="br-menu-item">
        <i class="menu-item-icon icon ion-power tx-20"></i>
        <span class="menu-item-label">Cerrar Sesión</span>
      </div>
    </a>

  </div>
</div>