var txt1 = "";
var txt2 = "";
var txt3 = "";
var txt4 = "";
var txt5 = "";

function init() {
    if (name_file == "director") {
        cargar_director();
    } else if (name_file == "coor_academica") {
        cargar_academico();
    } else if (name_file == "coor_seguridad") {
        cargar_seguridad();
    } else if (name_file == "coor_movil") {
        cargar_movil();
    } else if (name_file == "coor_iidai") {
        cargar_iidai();
    } else if (name_file == "admision") {
        cargar_prueba_cliente();
        cargar_preuni_cliente();
    } else if (name_file == "logros") {
        cargar_logros();
    }
}

$(document).ready(function () {
    init();

    if (baseUrl != "") {
        $('#director').select2({
            dropdownParent: $('#modalDirector')
        });

        $('#academico').select2({
            dropdownParent: $('#modalCoordinador')
        });

        $('#seguridad').select2({
            dropdownParent: $('#modalCoordinador')
        });

        $('#movil').select2({
            dropdownParent: $('#modalCoordinador')
        });

        $('#iidai').select2({
            dropdownParent: $('#modalCoordinador')
        });

        combo_docentes();


        // DATA TABLE DE LOGROS
        set_table("#logros_data", "logros.php");
        set_table("#cel_data", "celulares.php");
    }
});

function set_table(id, file) {
    $(id).DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [

        ],
        "ajax": {
            url: "../../controller/" + file + "?op=listar",
            type: "post"
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]],
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
    });
}

function validar(id) {
    if ($(id).val() != "") {
        return true;
    } else {
        var txt = "";
        switch (id) {
            case "#director":
                txt = "Director"; break;
            case "#academico":
                txt = "Académico"; break;
            case "#seguridad":
                txt = "Seguridad Informática"; break;
            case "#movil":
                txt = "Computación Móvil"; break;
            case "#iidai":
                txt = "IIDAI"; break;
            case "#proc_adm_test":
                txt = "¿Cómo debo inscribirme?"; break;
            case "#req_adm_test":
                txt = "Requisitos"; break;
            case "#proc_adm_pre":
                txt = "¿Cómo debo inscribirme?"; break;
            case "#req_adm_pre":
                txt = "Requisitos"; break;
            case "#nom_log":
                txt = "Nombre"; break;
            case "#lugar_log":
                txt = "Lugar"; break;
            case "#fech_log":
                txt = "Fecha"; break;
            case "#nom_cel":
                txt = "Nombre del Contacto"; break;
        }

        Swal.fire({
            icon: "error",
            title: "Error",
            text: 'El campo "' + txt + '" es obligatorio',
        });
        return false;
    }
}

function validar_afiche(id) {
    var input = document.getElementById(id);

    // Comprobar si se seleccionó un archivo
    if (input.files.length > 0) {
        // Obtener el primer archivo seleccionado
        var file = input.files[0];

        // Comprobar si es una imagen
        if (file.type.includes('image')) {
            return true; // Es una imagen
        }
    }
    Swal.fire({
        icon: "error",
        title: "Error",
        text: 'El campo "Afiche Publicitario" es obligatorio',
    });
    return false; // No se seleccionó una imagen o no es un archivo de imagen
}

function validar_celular() {
    if ($('#num_cel').val() == "") {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'El campo "Número de Celular" es obligatorio'
        })
        return false;
    }
    if (!(/^\d{8}$/.test($('#num_cel').val()))) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'El Número de Celular que ingresó no es válido'
        })
        return false;
    }

    return true;
}

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

function combo_docentes() {
    $.post("../../controller/academico.php?op=combo", function (data) {
        $('#director').html(data);
        $('#academico').html(data);
        $('#seguridad').html(data);
        $('#movil').html(data);
        $('#iidai').html(data);
    });
}

// Funcion para mostrar los modales segun su ID
function editar(id) {
    if (id == "#modalDirector") {
        validar_director_BD();
    }
    else if (id == "#modalCoordinador") {
        validar_academico_BD();
        validar_seguridad_BD();
        validar_movil_BD();
        validar_iidai_BD();
    }
    else if (id == "#modalPrueba") {
        cargar_prueba_servidor();
    }
    else if (id == "#modalPreUni") {
        cargar_preuni_servidor();
    }
    else if (id == "#modalAfiche") {
        cargar_afiche();
    }


    $(id).modal("show");
}

// ############ INICIO DIRECTOR ###############
function cargar_director() {
    if (baseUrl == "") {
        // Realiza una solicitud AJAX para obtener el contenido de historia desde el servidor
        $.post(
            "controller/academico.php?op=cargar_datos_director",
            function (data) {
                data = JSON.parse(data);
                if (data.length > 0) {
                    // Obtén el contenedor donde se agregarán los perfiles académicos
                    var directorContainer = $("#director_carrera");

                    // Recorre los datos y agrega cada perfil académico al contenedor
                    data.forEach(function (director) {
                        // Crea un nuevo perfil académico con los datos obtenidos
                        var perfilAcademico = `
                        <div class="col-3 col-12-mobile"></div>
                        <div class="perfil-academico col-6 col-12-mobile">
                            <div class="perfil-imagen">
                                <img src="images/perfil_academico/${director.foto_acad}" alt="" />
                            </div>

                            <h3>${director.nom_acad}</h3>

                            <p>
                                <i class="fa fa-phone"></i> ${director.cel_acad}
                            </p>

                            <p>
                                <a href="mailto:${director.email_acad}" target="_blank">
                                    <i class="fa fa-envelope-o"></i> email
                                </a>
                            </p>

                            <p id="p_${director.id_acad}">${director.desc_acad}</p>
                            <center><button id="btn_${director.id_acad}" type="submit" class="button"
                            onclick='ver_mas_menos("p_${director.id_acad}", "btn_${director.id_acad}")'>Ver menos</button></center>
                        </div>
                        <div class="col-3 col-12-mobile"></div>
                    `;

                        // Agrega el perfil académico al contenedor
                        directorContainer.append(perfilAcademico);
                        ver_mas_menos('p_' + director.id_acad, 'btn_' + director.id_acad);
                    });
                }
            }
        );
    }
}

function validar_director_BD() {
    // baseUrl almacena la ruta dependiendo de donde se haga la petición
    $.post("../../controller/academico.php?op=cargar_director", function (data) {
        data = JSON.parse(data);
        if (data !== "null" && data !== "") {
            /* CARGAR LOS DATOS DE LA BD EN EL MODAL */
            $('#director').val(data.id_acad).trigger('change');
        } else {
            /* MOSTRAR EL MODAL VACÍO */
            $("#director").attr('data-placeholder', 'Seleccione');
        }
    });
}

function guardar_director() {
    var formData = new FormData($('#director_form')[0]);

    var flag = validar("#director");
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
                text: "Se editará Director de Carrera", // txt1
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
                        "Director de Carrera editado", //txt4
                        "success"
                    );

                    $.ajax({
                        url: "../../controller/academico.php?op=actualizar_director",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            validar_director_BD();
                            $("#modalDirector").modal("hide");
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
}
// ############ FIN DIRECTOR ###############


// ############ FUNCIÓN GENERAL PARA GUARDAR TODOS LOS COORDINADORES ###############
function guardar_coordinador() {
    var formData = new FormData($('#coordinador_form')[0]);

    // VALIDACION
    if (
        validar("#academico") &&
        validar("#seguridad") &&
        validar("#movil") &&
        validar("#iidai")
    ) {
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
                text: "Se editarán los Coordinadores", // txt1
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
                        "Coordinadores editado", //txt4
                        "success"
                    );

                    $.ajax({
                        url: "../../controller/academico.php?op=actualizar_coordinador",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            validar_academico_BD();
                            validar_seguridad_BD();
                            validar_movil_BD();
                            validar_iidai_BD();
                            $("#modalCoordinador").modal("hide");
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
}
// ############ INICIO ACADEMICO #########################################
function cargar_academico() {
    if (baseUrl == "") {
        // Realiza una solicitud AJAX para obtener el contenido de historia desde el servidor
        $.post(
            "controller/academico.php?op=cargar_datos_academico",
            function (data) {
                data = JSON.parse(data);
                if (data.length > 0) {
                    // Obtén el contenedor donde se agregarán los perfiles académicos
                    var container = $("#coor_academica");

                    // Recorre los datos y agrega cada perfil académico al contenedor
                    data.forEach(function (academico) {
                        // Crea un nuevo perfil académico con los datos obtenidos
                        var perfilAcademico = `
                        <div class="col-3 col-12-mobile"></div>
                        <div class="perfil-academico col-6 col-12-mobile">
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

                            <p id="p_${academico.id_acad}">${academico.desc_acad}</p>
                            <center><button id="btn_${academico.id_acad}" type="submit" class="button"
                            onclick='ver_mas_menos("p_${academico.id_acad}", "btn_${academico.id_acad}")'>Ver menos</button></center>
                        </div>
                        <div class="col-3 col-12-mobile"></div>
                    `;

                        // Agrega el perfil académico al contenedor
                        container.append(perfilAcademico);
                        ver_mas_menos('p_' + academico.id_acad, 'btn_' + academico.id_acad);
                    });
                }
            }
        );
    }
}

function validar_academico_BD() {
    // baseUrl almacena la ruta dependiendo de donde se haga la petición
    $.post("../../controller/academico.php?op=cargar_academico", function (data) {
        data = JSON.parse(data);
        if (data !== "null" && data !== "") {
            /* CARGAR LOS DATOS DE LA BD EN EL MODAL */
            $('#academico').val(data.id_acad).trigger('change');
        } else {
            /* MOSTRAR EL MODAL VACÍO */
            $("#academico").attr('data-placeholder', 'Seleccione');
        }
    });
}
// ############ FIN ACADEMICO ###############


// ############ INICIO SEGURIDAD ########################################
function cargar_seguridad() {
    if (baseUrl == "") {
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
                        <div class="col-3 col-12-mobile"></div>
                        <div class="perfil-academico col-6 col-12-mobile">
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

                            <p id="p_${academico.id_acad}">${academico.desc_acad}</p>
                            <center><button id="btn_${academico.id_acad}" type="submit" class="button"
                            onclick='ver_mas_menos("p_${academico.id_acad}", "btn_${academico.id_acad}")'>Ver menos</button></center>
                        </div>
                        <div class="col-3 col-12-mobile"></div>
                    `;

                        // Agrega el perfil académico al contenedor
                        container.append(perfilAcademico);
                        ver_mas_menos('p_' + academico.id_acad, 'btn_' + academico.id_acad);
                    });
                }
            }
        );
    }
}

function validar_seguridad_BD() {
    // baseUrl almacena la ruta dependiendo de donde se haga la petición
    $.post("../../controller/academico.php?op=cargar_seguridad", function (data) {
        data = JSON.parse(data);
        if (data !== "null" && data !== "") {
            /* CARGAR LOS DATOS DE LA BD EN EL MODAL */
            $('#seguridad').val(data.id_acad).trigger('change');
        } else {
            /* MOSTRAR EL MODAL VACÍO */
            $("#seguridad").attr('data-placeholder', 'Seleccione');
        }
    });
}
// ############ FIN SEGURIDAD ###############


// ############ INICIO MOVIL #######################################
function cargar_movil() {
    if (baseUrl == "") {
        // Realiza una solicitud AJAX para obtener el contenido de historia desde el servidor
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
                        <div class="col-3 col-12-mobile"></div>
                        <div class="perfil-academico col-6 col-12-mobile">
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

                            <p id="p_${academico.id_acad}">${academico.desc_acad}</p>
                            <center><button id="btn_${academico.id_acad}" type="submit" class="button"
                            onclick='ver_mas_menos("p_${academico.id_acad}", "btn_${academico.id_acad}")'>Ver menos</button></center>
                        </div>
                        <div class="col-3 col-12-mobile"></div>
                    `;

                        // Agrega el perfil académico al contenedor
                        container.append(perfilAcademico);
                        ver_mas_menos('p_' + academico.id_acad, 'btn_' + academico.id_acad);
                    });
                }
            }
        );
    }
}

function validar_movil_BD() {
    // baseUrl almacena la ruta dependiendo de donde se haga la petición
    $.post("../../controller/academico.php?op=cargar_movil", function (data) {
        data = JSON.parse(data);
        if (data !== "null" && data !== "") {
            /* CARGAR LOS DATOS DE LA BD EN EL MODAL */
            $('#movil').val(data.id_acad).trigger('change');
        } else {
            /* MOSTRAR EL MODAL VACÍO */
            $("#movil").attr('data-placeholder', 'Seleccione');
        }
    });
}
// ############ FIN MOVIL ###############


// ############ INICIO IIDAI #######################################
function cargar_iidai() {
    if (baseUrl == "") {
        // Realiza una solicitud AJAX para obtener el contenido de historia desde el servidor
        $.post(
            "controller/academico.php?op=cargar_datos_iidai",
            function (data) {
                data = JSON.parse(data);
                if (data.length > 0) {
                    // Obtén el contenedor donde se agregarán los perfiles académicos
                    var container = $("#coor_iidai");

                    // Recorre los datos y agrega cada perfil académico al contenedor
                    data.forEach(function (academico) {
                        // Crea un nuevo perfil académico con los datos obtenidos
                        var perfilAcademico = `
                        <div class="col-3 col-12-mobile"></div>
                        <div class="perfil-academico col-6 col-12-mobile">
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

                            <p id="p_${academico.id_acad}">${academico.desc_acad}</p>
                            <center><button id="btn_${academico.id_acad}" type="submit" class="button"
                            onclick='ver_mas_menos("p_${academico.id_acad}", "btn_${academico.id_acad}")'>Ver menos</button></center>
                        </div>
                        <div class="col-3 col-12-mobile"></div>
                    `;

                        // Agrega el perfil académico al contenedor
                        container.append(perfilAcademico);
                        ver_mas_menos('p_' + academico.id_acad, 'btn_' + academico.id_acad);
                    });
                }
            }
        );
    }
}

function validar_iidai_BD() {
    // baseUrl almacena la ruta dependiendo de donde se haga la petición
    $.post("../../controller/academico.php?op=cargar_iidai", function (data) {
        data = JSON.parse(data);
        if (data !== "null" && data !== "") {
            /* CARGAR LOS DATOS DE LA BD EN EL MODAL */
            $('#iidai').val(data.id_acad).trigger('change');
        } else {
            /* MOSTRAR EL MODAL VACÍO */
            $("#iidai").attr('data-placeholder', 'Seleccione');
        }
    });
}
// ############ FIN IIDAI ###############



// ################# INICIO PRUEBA DE ADMISIÓN ################
function cargar_prueba_servidor() {
    // Realiza una solicitud AJAX para obtener el contenido desde el servidor
    $.post(
        baseUrl + "controller/admision.php?op=cargar_prueba",
        function (data) {
            data = JSON.parse(data);
            var nomImagen = data.img_adm;

            if (data !== "null" && data !== "" && nomImagen) {

                // CARGA EN EL MODAL DEL ADMINISTRADOR
                $("#img_adm_test_preview").html('<img src="../../images/' + nomImagen + '" class="img-fluid"/>');

                $("#idx_adm_test").val(data.id_adm);
                $("#proc_adm_test").html(data.proc_adm);
                $("#req_adm_test").html(data.req_adm);

            } else {

                // CARGA EN EL MODAL DEL ADMINISTRADOR
                $("#img_adm_test_preview").html('<img src="../../images/img_default.jpg" class="img-fluid">');

                $("#idx_adm_test").val("");
                $("#proc_adm_test").html("");
                $("#req_adm_test").html("");

            }
        }
    );
}

function guardar_prueba() {
    $("#prueba_form").on("submit", function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        var formData = new FormData(document.getElementById("prueba_form"));

        // VALIDACION
        if (
            validar("#proc_adm_test") &&
            validar("#req_adm_test") &&
            validar_afiche("img_adm_test")
        ) {
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
                    text: "Se editará la Prueba de Admisión", // txt1
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
                            "Prueba de Admisión editada", //txt4
                            "success"
                        );

                        $.ajax({
                            url: "../../controller/admision.php?op=guardar_editar_prueba",
                            type: "POST",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function (data) {
                                cargar_prueba_servidor();
                                $("#modalPrueba").modal("hide");
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

function cargar_prueba_cliente() {
    // Realiza una solicitud AJAX para obtener el contenido desde el servidor
    $.post(
        baseUrl + "controller/admision.php?op=cargar_prueba",
        function (data) {
            data = JSON.parse(data);
            var nomImagen = data.img_adm;

            if (data !== "null" && data !== "" && nomImagen) {

                // CARGA EN LA PAGINA WEB PARA EL CLIENTE
                $("#p_img_adm_test").html('<img src="images/' + nomImagen + '"/>');

                var proceso = data.proc_adm.replace(/\n/g, '<br>');
                $("#p_proc_adm_test").html(proceso);
                ver_mas_menos("p_proc_adm_test", "btn_proc_adm_test");

                var requisitos = data.req_adm.replace(/\n/g, '<br>');
                $("#p_req_adm_test").html(requisitos);
                ver_mas_menos("p_req_adm_test", "btn_req_adm_test");

            } else {

                // CARGA LA IMAGEN EN LA PAGINA WEB PARA EL CLIENTE
                $("#p_img_adm_test").html('<img src="images/img_default.jpg"/>');

            }
        }
    );
}
// ################# FIN PRUEBA DE ADMISIÓN ##################


// ################# INICIO CURSO PRE-UNIVERSITARIO ################
function cargar_preuni_servidor() {
    // Realiza una solicitud AJAX para obtener el contenido desde el servidor
    $.post(
        baseUrl + "controller/admision.php?op=cargar_preuni",
        function (data) {
            data = JSON.parse(data);
            var nomImagen = data.img_adm;

            if (data !== "null" && data !== "" && nomImagen) {

                // CARGA EN EL MODAL DEL ADMINISTRADOR
                $("#img_adm_pre_preview").html('<img src="../../images/' + nomImagen + '" class="img-fluid"/>');

                $("#idx_adm_pre").val(data.id_adm);
                $("#proc_adm_pre").html(data.proc_adm);
                $("#req_adm_pre").html(data.req_adm);

            } else {

                // CARGA EN EL MODAL DEL ADMINISTRADOR
                $("#img_adm_pre_preview").html('<img src="../../images/img_default.jpg" class="img-fluid">');

                $("#idx_adm_pre").val("");
                $("#proc_adm_pre").html("");
                $("#req_adm_pre").html("");

            }
        }
    );
}

function guardar_preuni() {
    $("#preuni_form").on("submit", function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        var formData = new FormData(document.getElementById("preuni_form"));

        // VALIDACION
        if (
            validar("#proc_adm_pre") &&
            validar("#req_adm_pre") &&
            validar_afiche("img_adm_pre")
        ) {
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
                    text: "Se editará el Curso Pre-Universitario", // txt1
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
                            "Curso Pre-Universitario editado", //txt4
                            "success"
                        );

                        $.ajax({
                            url: "../../controller/admision.php?op=guardar_editar_preuni",
                            type: "POST",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function (data) {
                                cargar_preuni_servidor();
                                $("#modalPreUni").modal("hide");
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

function cargar_preuni_cliente() {
    // Realiza una solicitud AJAX para obtener el contenido desde el servidor
    $.post(
        baseUrl + "controller/admision.php?op=cargar_preuni",
        function (data) {
            data = JSON.parse(data);
            var nomImagen = data.img_adm;

            if (data !== "null" && data !== "" && nomImagen) {

                // CARGA EN LA PAGINA WEB PARA EL CLIENTE
                $("#p_img_adm_pre").html('<img src="images/' + nomImagen + '"/>');

                var proceso = data.proc_adm.replace(/\n/g, '<br>');
                $("#p_proc_adm_pre").html(proceso);
                ver_mas_menos("p_proc_adm_pre", "btn_proc_adm_pre");

                var requisitos = data.req_adm.replace(/\n/g, '<br>');
                $("#p_req_adm_pre").html(requisitos);
                ver_mas_menos("p_req_adm_pre", "btn_req_adm_pre");

            } else {

                // CARGA LA IMAGEN EN LA PAGINA WEB PARA EL CLIENTE
                $("#p_img_adm_pre").html('<img src="images/img_default.jpg"/>');

            }
        }
    );
}
// ################# FIN CURSO PRE-UNIVERSITARIO ##################




// ################# INICIO NUESTROS LOGROS ##################
function nuevo_logro() {
    $('#id_log').val('');
    $('#lbl_titulo_logros').html('Registrar Nuevo Logro');
    $('#guardar_logros').html('Registrar Nuevo Logro');
    $('#logros_form')[0].reset();
    $('#modalLogros').modal("show");
}

function guardar_editar_logro() {
    var formData = new FormData($('#logros_form')[0]);
    txt_logros();

    if (validar("#nom_log") &&
        validar("#lugar_log") &&
        validar("#fech_log")
    ) {
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
                text: txt1, // txt1
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: txt2, //txt2
                cancelButtonText: "No, cancelar",
                reverseButtons: true,
            })
            .then((result) => {
                /* Si hace click en [Si, editar] */
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire(
                        txt3, //txt3
                        txt4, //txt4
                        "success"
                    );

                    $.ajax({
                        url: "../../controller/logros.php?op=guardar_editar",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            set_table("#logros_data", "logros.php");
                            $('#modalLogros').modal('hide');
                        },
                    });
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    Swal.fire({
                        icon: "error",
                        title: txt5, //txt5
                        showConfirmButton: false,
                        timer: 2000,
                    });
                }
            });
    }
}

/* modificar los txt de los sweet alerts segun sea para nuevo o editar */
function txt_logros() {
    var lbl = document.getElementById('lbl_titulo_logros').innerHTML;
    if (lbl == "Registrar Nuevo Logro") {
        txt1 = '¡Se registrará un nuevo Logro!';
        txt2 = 'Si, registrar';
        txt3 = '¡Nuevo Logro!';
        txt4 = 'Se registró un nuevo Logro';
        txt5 = 'Registro cancelado';
    } else {
        txt1 = '¡Se actualizarán los datos del Logro!';
        txt2 = 'Si, actualizar';
        txt3 = '¡Actualizado!';
        txt4 = 'Se actualizaron los datos del Logro';
        txt5 = 'Actualización cancelada';
    }
}

function editar_logro(id_log) {
    $.post("../../controller/logros.php?op=mostrar_datos", { id_log: id_log }, function (data) {
        /* volvemos json para mostrarlos en la ventana editar */
        data = JSON.parse(data);
        $('#id_log').val(data.id_log);
        $('#nom_log').val(data.nom_log);
        $('#lugar_log').val(data.lugar_log);
        $('#fech_log').val(data.fech_log);
    });
    $('#lbl_titulo_logros').html('Editar Logro');
    $('#guardar_logros').html('Actualizar Logro');
    $('#modalLogros').modal('show');
}

function eliminar_logro(id_log) {
    Swal.fire({
        title: '¿Eliminar?',
        text: '¿Desea eliminar este Logro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar',
        cancelButtonText: 'No, cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                '¡Eliminado!',
                'El Logro se eliminó correctamente',
                'success'
            )
            $.post("../../controller/logros.php?op=eliminar", { id_log: id_log }, function (data) {
                set_table("#logros_data", "logros.php");
            });
        }
    })
}

function cargar_logros() {
    // Realiza una solicitud AJAX para obtener el contenido de historia desde el servidor
    $.post(
        "controller/logros.php?op=cargar_datos",
        function (data) {
            data = JSON.parse(data);
            if (data.length > 0) {
                // Obtén el contenedor donde se agregarán los perfiles académicos
                var container = $("#logros");

                // Recorre los datos y agrega cada perfil académico al contenedor
                data.forEach(function (logros) {
                    // Crea un nuevo perfil académico con los datos obtenidos
                    var perfilAcademico = `
                        <div class="fila comunicado col-12 col-12-mobile">
                            <div class="col-2 col-6-mobile container-img">
                                <img src="images/infor.png" />
                            </div>
                            <div class="col-10 col-6-mobile">
                                <h3>${logros.nom_log}</h3>
                                <h4><i class="icon ion-location"></i>${logros.lugar_log}</h4>
                                <h4><i class="icon ion-calendar"></i>${logros.fech_log}</h4>
                            </div>
                        </div>
                    `;

                    // Agrega el perfil académico al contenedor
                    container.append(perfilAcademico);
                });
            }
        }
    );
}
// ################# FIN NUESTROS LOGROS ##################



// ################# INICIO NUESTROS Celular ##################
function nuevo_cel() {
    $('#id_cel').val('');
    $('#lbl_titulo_cel').html('Registrar Nuevo Número de Celular');
    $('#guardar_cel').html('Registrar Nuevo Número de Celular');
    $('#cel_form')[0].reset();
    $('#modalCel').modal("show");
}

function guardar_editar_cel() {
    var formData = new FormData($('#cel_form')[0]);
    txt_cel();

    if (validar("#nom_cel") &&
        validar_celular()
    ) {
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
                text: txt1, // txt1
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: txt2, //txt2
                cancelButtonText: "No, cancelar",
                reverseButtons: true,
            })
            .then((result) => {
                /* Si hace click en [Si, editar] */
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire(
                        txt3, //txt3
                        txt4, //txt4
                        "success"
                    );

                    $.ajax({
                        url: "../../controller/celulares.php?op=guardar_editar",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            set_table("#cel_data", "celulares.php");
                            $('#modalCel').modal('hide');
                        },
                    });
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    Swal.fire({
                        icon: "error",
                        title: txt5, //txt5
                        showConfirmButton: false,
                        timer: 2000,
                    });
                }
            });
    }
}

/* modificar los txt de los sweet alerts segun sea para nuevo o editar */
function txt_cel() {
    var lbl = document.getElementById('lbl_titulo_cel').innerHTML;
    if (lbl == "Registrar Nuevo Número de Celular") {
        txt1 = '¡Se registrará un nuevo Número de Celular!';
        txt2 = 'Si, registrar';
        txt3 = '¡Nuevo Número de Celular!';
        txt4 = 'Se registró un nuevo Número de Celular';
        txt5 = 'Registro cancelado';
    } else {
        txt1 = '¡Se actualizarán los datos del Número de Celular!';
        txt2 = 'Si, actualizar';
        txt3 = '¡Actualizado!';
        txt4 = 'Se actualizaron los datos del Número de Celular';
        txt5 = 'Actualización cancelada';
    }
}

function editar_cel(id_cel) {
    $.post("../../controller/celulares.php?op=mostrar_datos", { id_cel: id_cel }, function (data) {
        /* volvemos json para mostrarlos en la ventana editar */
        data = JSON.parse(data);
        $('#id_cel').val(data.id_cel);
        $('#nom_cel').val(data.nom_cel);
        $('#num_cel').val(data.num_cel);
    });
    $('#lbl_titulo_cel').html('Editar Número de Celular');
    $('#guardar_cel').html('Actualizar Número de Celular');
    $('#modalCel').modal('show');
}

function eliminar_cel(id_cel) {
    Swal.fire({
        title: '¿Eliminar?',
        text: '¿Desea eliminar este Número de Celular?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar',
        cancelButtonText: 'No, cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                '¡Eliminado!',
                'El Número de Celular se eliminó correctamente',
                'success'
            )
            $.post("../../controller/celulares.php?op=eliminar", { id_cel: id_cel }, function (data) {
                set_table("#cel_data", "celulares.php");
            });
        }
    })
}

// LA FUNCIÓN SE LLAMA DESDE EL MAIN.JS PARA QUE CARGUE EN TODAS LAS PÁGINAS
// function cargar_cel()

// ################# FIN NUESTROS Celular ##################



// ################# INICIO AFICHE ################## 
function guardar_afiche() {
    $("#afiche_form").on("submit", function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        var formData = new FormData(document.getElementById("afiche_form"));

        var flag = validar_afiche("nom_afiche");
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
                    text: "Se editará el Afiche Publicitario", // txt1
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
                            "Afiche Publicitario editado", //txt4
                            "success"
                        );

                        $.ajax({
                            url: "../../controller/inicio.php?op=guardar_editar_afiche",
                            type: "POST",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function (data) {
                                $("#modalAfiche").modal("hide");
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

function cargar_afiche() {
    $.post(
        baseUrl + "controller/inicio.php?op=cargar_inicio",
        function (data) {
            data = JSON.parse(data);
            var nomImagen = data.afiche;
            if (nomImagen) {
                // CARGA LA IMAGEN EN EL MODAL DEL ADMINISTRADOR
                $("#afiche").html('<img src="../../images/' + nomImagen + '" class="img-fluid"/>');
            } else {
                // CARGA LA IMAGEN EN EL MODAL DEL ADMINISTRADOR
                $("#afiche").html('<img src="../../images/img_default.jpg" class="img-fluid">');
            }

            if (data !== "null" && data !== "") {
                /* CARGAR LOS DATOS DE LA BD EN EL MODAL */
                $(".id_inc").val(data.id_inc);
            } else {
                /* MOSTRAR EL MODAL VACÍO */
                $("#id_inc").val("");
            }
        }
    );
}
// ################# FIN AFICHE ##################