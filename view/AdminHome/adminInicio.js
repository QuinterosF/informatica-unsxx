function init() {
  cargar_presentacion();
  cargar_perfil();
  cargar_mision();
  cargar_vision();
  cargar_objetivo();
  cargar_historia();
  cargar_afiche();
}

$(document).ready(function () {
  init();
});

// Funcion para mostrar los modales segun su ID
function editar(id) {
  validar_existe_BD();
  $(id).modal("show");
}

function validar(id) {
  if ($(id).val() != "") {
    return true;
  } else {
    var txt = "";
    switch (id) {
      case "#presentacion":
        txt = "Presentación"; break;
      case "#perfil":
        txt = "Perfil Profesional"; break;
      case "#mision":
        txt = "Misión"; break;
      case "#vision":
        txt = "Visión"; break;
      case "#objetivo":
        txt = "Objetivo General"; break;
      case "#historia":
        txt = "Reseña Histórica"; break;
    }

    Swal.fire({
      icon: "error",
      title: "Error",
      text: 'El campo "' + txt + '" es obligatorio',
    });
    return false;
  }
}


// ################# INICIO PRESENTACION ################
function guardar_presentacion() {
  $("#presentacion_form").on("submit", function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    /* var formData = new FormData($('#presentacion_form')[0]); */
    var formData = new FormData(document.getElementById("presentacion_form"));

    var flag = validar("#presentacion");
    if (flag) {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success",
          cancelButton: "btn btn-danger",
        },
        buttonsStyling: true,
      });
      swalWithBootstrapButtons
        .fire({
          title: "¿Estás seguro?",
          text: "Se editará la presentcaión", // txt1
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Si, editar", //txt2
          cancelButtonText: "No, cancelar",
          reverseButtons: true,
        })
        .then((result) => {
          /* Si hace click en [Si, editar] */
          if (result.isConfirmed) {
            swalWithBootstrapButtons.fire(
              "¡Correcto!", //txt3
              "Presentación editada", //txt4
              "success"
            );

            $.ajax({
              url: "../../controller/inicio.php?op=guardar_editar_presentacion",
              type: "POST",
              data: formData,
              contentType: false,
              processData: false,
              success: function (data) {
                validar_existe_BD();
                $("#modalPresentacion").modal("hide");
              },
            });
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            Swal.fire({
              icon: "error",
              title: "Edición cancelada", //txt5
              showConfirmButton: false,
              timer: 2000,
            });
          }
        });
    }
  });
}

function cargar_presentacion() {
  // Realiza una solicitud AJAX para obtener el contenido de presentación desde el servidor
  $.post(
    baseUrl + "controller/inicio.php?op=cargar_inicio",
    function (data) {
      data = JSON.parse(data);
      if (data !== "null" && data !== "") {
        var texto = data.presentacion.replace(/\n/g, '<br>');
        $("#p_presentacion").html(texto);
        ver_mas_menos("p_presentacion", "btn_presentacion");
      } else {
        $("#p_presentacion").html("");
      }
    }
  );
}
// ################# FIN PRESENTACION ##################



// ################# INICIO PERFIL ##################
function guardar_perfil() {
  $("#perfil_form").on("submit", function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    var formData = new FormData(document.getElementById("perfil_form"));

    var flag = validar("#perfil");
    if (flag) {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success",
          cancelButton: "btn btn-danger",
        },
        buttonsStyling: true,
      });
      swalWithBootstrapButtons
        .fire({
          title: "¿Estás seguro?",
          text: "Se editará el Perfil Profesional", // txt1
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Si, editar", //txt2
          cancelButtonText: "No, cancelar",
          reverseButtons: true,
        })
        .then((result) => {
          /* Si hace click en [Si, editar] */
          if (result.isConfirmed) {
            swalWithBootstrapButtons.fire(
              "¡Correcto!", //txt3
              "Perfil Profesional editado", //txt4
              "success"
            );

            $.ajax({
              url: "../../controller/inicio.php?op=guardar_editar_perfil",
              type: "POST",
              data: formData,
              contentType: false,
              processData: false,
              success: function (data) {
                validar_existe_BD();
                $("#modalPerfil").modal("hide");
              },
            });
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            Swal.fire({
              icon: "error",
              title: "Edición cancelada", //txt5
              showConfirmButton: false,
              timer: 2000,
            });
          }
        });
    }
  });
}

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



// ################# INICIO MISION ##################
function guardar_mision() {
  $("#mision_form").on("submit", function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    var formData = new FormData(document.getElementById("mision_form"));

    var flag = validar("#mision");
    if (flag) {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success",
          cancelButton: "btn btn-danger",
        },
        buttonsStyling: true,
      });
      swalWithBootstrapButtons
        .fire({
          title: "¿Estás seguro?",
          text: "Se editará la Misión", // txt1
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Si, editar", //txt2
          cancelButtonText: "No, cancelar",
          reverseButtons: true,
        })
        .then((result) => {
          /* Si hace click en [Si, editar] */
          if (result.isConfirmed) {
            swalWithBootstrapButtons.fire(
              "¡Correcto!", //txt3
              "Misión editada", //txt4
              "success"
            );

            $.ajax({
              url: "../../controller/inicio.php?op=guardar_editar_mision",
              type: "POST",
              data: formData,
              contentType: false,
              processData: false,
              success: function (data) {
                validar_existe_BD();
                $("#modalMision").modal("hide");
              },
            });
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            Swal.fire({
              icon: "error",
              title: "Edición cancelada", //txt5
              showConfirmButton: false,
              timer: 2000,
            });
          }
        });
    }
  });
}

function cargar_mision() {
  // Realiza una solicitud AJAX para obtener el contenido de mision desde el servidor
  $.post(
    baseUrl + "controller/inicio.php?op=cargar_inicio",
    function (data) {
      data = JSON.parse(data);
      if (data !== "null" && data !== "") {
        var texto = data.mision.replace(/\n/g, '<br>');
        $("#p_mision").html(texto);
        ver_mas_menos("p_mision", "btn_mision");
      } else {
        $("#p_mision").html("");
      }
    }
  );
}
// ################# FIN MISION ##################



// ################# INICIO VISION ##################
function guardar_vision() {
  $("#vision_form").on("submit", function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    var formData = new FormData(document.getElementById("vision_form"));

    var flag = validar("#vision");
    if (flag) {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success",
          cancelButton: "btn btn-danger",
        },
        buttonsStyling: true,
      });
      swalWithBootstrapButtons
        .fire({
          title: "¿Estás seguro?",
          text: "Se editará la Visión", // txt1
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Si, editar", //txt2
          cancelButtonText: "No, cancelar",
          reverseButtons: true,
        })
        .then((result) => {
          /* Si hace click en [Si, editar] */
          if (result.isConfirmed) {
            swalWithBootstrapButtons.fire(
              "¡Correcto!", //txt3
              "Visión editada", //txt4
              "success"
            );

            $.ajax({
              url: "../../controller/inicio.php?op=guardar_editar_vision",
              type: "POST",
              data: formData,
              contentType: false,
              processData: false,
              success: function (data) {
                validar_existe_BD();
                $("#modalVision").modal("hide");
              },
            });
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            Swal.fire({
              icon: "error",
              title: "Edición cancelada", //txt5
              showConfirmButton: false,
              timer: 2000,
            });
          }
        });
    }
  });
}

function cargar_vision() {
  // Realiza una solicitud AJAX para obtener el contenido de vision desde el servidor
  $.post(
    baseUrl + "controller/inicio.php?op=cargar_inicio",
    function (data) {
      data = JSON.parse(data);
      if (data !== "null" && data !== "") {
        var texto = data.vision.replace(/\n/g, '<br>');
        $("#p_vision").html(texto);
        ver_mas_menos("p_vision", "btn_vision");
      } else {
        $("#p_vision").html("");
      }
    }
  );
}
// ################# FIN VISION ##################



// ################# INICIO OBJETIVO ##################
function guardar_objetivo() {
  $("#objetivo_form").on("submit", function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    var formData = new FormData(document.getElementById("objetivo_form"));

    var flag = validar("#objetivo");
    if (flag) {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success",
          cancelButton: "btn btn-danger",
        },
        buttonsStyling: true,
      });
      swalWithBootstrapButtons
        .fire({
          title: "¿Estás seguro?",
          text: "Se editará el Objetivo General", // txt1
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Si, editar", //txt2
          cancelButtonText: "No, cancelar",
          reverseButtons: true,
        })
        .then((result) => {
          /* Si hace click en [Si, editar] */
          if (result.isConfirmed) {
            swalWithBootstrapButtons.fire(
              "¡Correcto!", //txt3
              "Objetivo General editado", //txt4
              "success"
            );

            $.ajax({
              url: "../../controller/inicio.php?op=guardar_editar_objetivo",
              type: "POST",
              data: formData,
              contentType: false,
              processData: false,
              success: function (data) {
                validar_existe_BD();
                $("#modalObjetivo").modal("hide");
              },
            });
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            Swal.fire({
              icon: "error",
              title: "Edición cancelada", //txt5
              showConfirmButton: false,
              timer: 2000,
            });
          }
        });
    }
  });
}

function cargar_objetivo() {
  // Realiza una solicitud AJAX para obtener el contenido de objetivo desde el servidor
  $.post(
    baseUrl + "controller/inicio.php?op=cargar_inicio",
    function (data) {
      data = JSON.parse(data);
      if (data !== "null" && data !== "") {
        var texto = data.objetivo.replace(/\n/g, '<br>');
        $("#p_objetivo").html(texto);
        ver_mas_menos("p_objetivo", "btn_objetivo");
      } else {
        $("#p_objetivo").html("");
      }
    }
  );
}
// ################# FIN OBJETIVO ##################



// ################# INICIO HISTORIA ##################
function guardar_historia() {
  $("#historia_form").on("submit", function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    var formData = new FormData(document.getElementById("historia_form"));

    var flag = validar("#historia");
    if (flag) {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success",
          cancelButton: "btn btn-danger",
        },
        buttonsStyling: true,
      });
      swalWithBootstrapButtons
        .fire({
          title: "¿Estás seguro?",
          text: "Se editará la Reseña Histórica", // txt1
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Si, editar", //txt2
          cancelButtonText: "No, cancelar",
          reverseButtons: true,
        })
        .then((result) => {
          /* Si hace click en [Si, editar] */
          if (result.isConfirmed) {
            swalWithBootstrapButtons.fire(
              "¡Correcto!", //txt3
              "Reseña Histórica editada", //txt4
              "success"
            );

            $.ajax({
              url: "../../controller/inicio.php?op=guardar_editar_historia",
              type: "POST",
              data: formData,
              contentType: false,
              processData: false,
              success: function (data) {
                validar_existe_BD();
                $("#modalHistoria").modal("hide");
              },
            });
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            Swal.fire({
              icon: "error",
              title: "Edición cancelada", //txt5
              showConfirmButton: false,
              timer: 2000,
            });
          }
        });
    }
  });
}

function cargar_historia() {
  // Realiza una solicitud AJAX para obtener el contenido de historia desde el servidor
  $.post(
    baseUrl + "controller/inicio.php?op=cargar_inicio",
    function (data) {
      data = JSON.parse(data);
      if (data !== "null" && data !== "") {
        var texto = data.historia.replace(/\n/g, '<br>');
        $("#p_historia").html(texto);
        ver_mas_menos("p_historia", "btn_historia");
      } else {
        $("#p_historia").html("");
      }
    }
  );
}
// ################# FIN HISTORIA ##################



// ################# INICIO AFICHE (solo cargará en la página del cliente) ##################
function cargar_afiche() {
  $.post(
    baseUrl + "controller/inicio.php?op=cargar_inicio",
    function (data) {
      data = JSON.parse(data);
      var nomImagen = data.afiche;
      if (nomImagen) {
        // CARGA LA IMAGEN EN LA PAGINA WEB PARA EL CLIENTE
        $("#p_afiche").html('<img src="images/' + nomImagen + '"/>');
      } else {
        // CARGA LA IMAGEN EN LA PAGINA WEB PARA EL CLIENTE
        $("#p_afiche").html('<img src="images/img_default.jpg"/>');
      }
    }
  );
}
// ################# FIN AFICHE ##################



function ver_mas_menos(id_p, id_btn) {
  var textoParrafo = document.getElementById(id_p);
  var botonVerMas = document.getElementById(id_btn);

  var palabrasIniciales = 20;

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

/* VALIDAR QUE TIENE CONTENIDO LA BASE DE DATOS
        Esto me sirve ya que según la lógica del programa, los datos de la pestaña inicio
        sólo serán uno, es decir la Base de Datos almacenará un solo registro, y la función
        me sirve para saber si se debe hacer un insert (si es el primer registro) o 
        un update(si ya había un registro en la BD)
*/
function validar_existe_BD() {
  // baseUrl almacena la ruta dependiendo de donde se haga la petición
  $.post(baseUrl + "controller/inicio.php?op=cargar_inicio", function (data) {
    data = JSON.parse(data);
    if (data !== "null" && data !== "") {
      /* CARGAR LOS DATOS DE LA BD EN EL MODAL */
      $(".id_inc").val(data.id_inc);
      $("#presentacion").val(data.presentacion);
      $("#perfil").val(data.perfil);
      $("#mision").val(data.mision);
      $("#vision").val(data.vision);
      $("#objetivo").val(data.objetivo);
      $("#historia").val(data.historia);
    } else {
      /* MOSTRAR EL MODAL VACÍO */
      $("#id_inc").val("");
      $("#presentacion").val("");
      $("#perfil").val("");
      $("#mision").val("");
      $("#vision").val("");
      $("#objetivo").val("");
      $("#historia").val("");
    }
  });
}
