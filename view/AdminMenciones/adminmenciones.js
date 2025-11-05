function init() {
  if (name_file == "plan") {
    cargar_perfil();
  }
  if (name_file == "seguridad") {
    ver_mas_menos("p_perfil_seguridad", "btn_perfil_seguridad");
    cargar_seguridad();
  }
  if (name_file == "movil") {
    ver_mas_menos("p_perfil_movil", "btn_perfil_movil");
    cargar_movil();
  }
}

$(document).ready(function () {
  init();
});

function ver_mas_menos(id_p, id_btn) {
  var textoParrafo = document.getElementById(id_p);
  var botonVerMas = document.getElementById(id_btn);

  var palabrasIniciales = 30;

  if (textoParrafo) {
    if (!textoParrafo.getAttribute("data-original-text")) {
      textoParrafo.setAttribute("data-original-text", textoParrafo.innerHTML);
    }

    var textoOriginal = textoParrafo.getAttribute("data-original-text");
    var palabras = textoOriginal.split(" ");

    if (palabras.length <= palabrasIniciales) {
      botonVerMas.style.display = "none";
    } else {
      if (botonVerMas.textContent === "Ver más") {
        textoParrafo.innerHTML = textoOriginal;
        botonVerMas.textContent = "Ver menos";
      } else {
        textoParrafo.innerHTML = palabras.slice(0, palabrasIniciales).join(" ") + "... ";
        botonVerMas.textContent = "Ver más";
      }
    }
  }
}

// ################# INICIO PERFIL ##################
function cargar_perfil() {
  // Realiza una solicitud AJAX para obtener el contenido de perfil desde el servidor
  $.post(
    baseUrl + "controller/inicio.php?op=cargar_inicio",
    function (data) {
      data = JSON.parse(data);
      if (data !== "null" && data !== "") {
        var texto = data.perfil.replace(/\n/g, '<br>');
        $("#p_perfil").html(texto);
        ver_mas_menos("p_perfil", "btn_perfil");
      } else {
        $("#p_perfil").html("");
      }
    }
  );
}
// ################# FIN PERFIL ##################


// ############ INICIO SEGURIDAD ########################################
function cargar_seguridad() {
  // Realiza una solicitud AJAX para obtener el contenido de historia desde el servidor
  $.post(
    "controller/academico.php?op=cargar_datos_seguridad",
    function (data) {
      data = JSON.parse(data);
      if (data.length > 0) {
        // Obtén el contenedor donde se agregarán los perfiles académicos
        var container = $("#coor_seguridad");

        // Recorre los datos y agrega cada perfil académico al contenedor
        data.forEach(function (academico) {
          // Crea un nuevo perfil académico con los datos obtenidos
          var perfilAcademico = `
                          <header>
                              <br>
                              <center>
                                  <h2>Coordinador</h2>
                              </center>
                          </header>
                          <div class="perfil-imagen">
                              <img src="images/perfil_academico/${academico.foto_acad}" alt="" />
                          </div>

                          <h3>${academico.nom_acad}</h3>

                          <p>
                              <i class="fa fa-phone"></i> ${academico.cel_acad}
                          </p>

                          <p>
                              <a href="mailto:${academico.email_acad}" target="_blank">
                                  <i class="fa fa-envelope-o"></i> email
                              </a>
                          </p>
                  `;

          // Agrega el perfil académico al contenedor
          container.append(perfilAcademico);
        });
      }
    }
  );
}
// ############ FIN SEGURIDAD ###############


// ############ INICIO MOVIL #######################################
function cargar_movil() {
  /// Realiza una solicitud AJAX para obtener el contenido de historia desde el servidor
  $.post(
    "controller/academico.php?op=cargar_datos_movil",
    function (data) {
      data = JSON.parse(data);
      if (data.length > 0) {
        // Obtén el contenedor donde se agregarán los perfiles académicos
        var container = $("#coor_movil");

        // Recorre los datos y agrega cada perfil académico al contenedor
        data.forEach(function (academico) {
          // Crea un nuevo perfil académico con los datos obtenidos
          var perfilAcademico = `
                          <header>
                              <br>
                              <center>
                                  <h2>Coordinador</h2>
                              </center>
                          </header>
                          <div class="perfil-imagen">
                              <img src="images/perfil_academico/${academico.foto_acad}" alt="" />
                          </div>

                          <h3>${academico.nom_acad}</h3>

                          <p>
                              <i class="fa fa-phone"></i> ${academico.cel_acad}
                          </p>

                          <p>
                              <a href="mailto:${academico.email_acad}" target="_blank">
                                  <i class="fa fa-envelope-o"></i> email
                              </a>
                          </p>
                  `;

          // Agrega el perfil académico al contenedor
          container.append(perfilAcademico);
        });
      }
    }
  );
}
// ############ FIN MOVIL ###############