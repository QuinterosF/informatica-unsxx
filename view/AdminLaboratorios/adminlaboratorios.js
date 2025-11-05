function init() {
    if (name_file == "lab_seg") {
        set_lab_seg_web_client();
    }
    if (name_file == "lab_mov") {
        set_lab_mov_web_client();
    }
    if (name_file == "lab_hd") {
        set_lab_hd_web_client();
    }
    if (name_file == "lab_swi") {
        set_lab_swi_web_client();
    }
    if (name_file == "lab_swii") {
        set_lab_swii_web_client();
    }
    if (name_file == "lab_swiii") {
        set_lab_swiii_web_client();
    }
}

$(document).ready(function () {
    init();
});

function combo_docentes(id) {
    $('.combo_resp').select2({
        dropdownParent: $(id)
    });

    $.post("../../controller/academico.php?op=combo", function (data) {
        $('.combo_resp').html(data);
    });
}

function validar(id) {
    if ($(id).val() != "") {
        return true;
    } else {
        var txt = "";
        if (id == "#resp_lab_seg" ||
            id == "#resp_lab_mov" ||
            id == "#resp_lab_hd" ||
            id == "#resp_lab_swi" ||
            id == "#resp_lab_swii" ||
            id == "#resp_lab_swiii"
        ) {
            txt = "Responsable de Laboratorio";
        }

        Swal.fire({
            icon: "error",
            title: "Error",
            text: 'El campo "' + txt + '" es obligatorio',
        });
        return false;
    }
}

function validar_pdf(id) {
    var input = document.getElementById(id);

    // Comprobar si se seleccionó un archivo
    if (input.files.length > 0) {
        // Obtener el primer archivo seleccionado
        var file = input.files[0];

        // Comprobar si es un archivo PDF
        if (file.type === 'application/pdf') {
            return true; // Es un archivo PDF
        }
    }

    Swal.fire({
        icon: "error",
        title: "Error",
        text: 'El campo "Horario (PDF)" es obligatorio',
    });
    return false; // No se seleccionó un archivo PDF o no se seleccionó ningún archivo
}


// Funcion para mostrar los modales segun su ID
function editar(id) {
    if (id == "#modalSeg") {
        validar_resp_lab_seg_BD();
    }
    if (id == "#modalMov") {
        validar_resp_lab_mov_BD();
    }
    if (id == "#modalHD") {
        validar_resp_lab_hd_BD();
    }
    if (id == "#modalSWI") {
        validar_resp_lab_swi_BD();
    }
    if (id == "#modalSWII") {
        validar_resp_lab_swii_BD();
    }
    if (id == "#modalSWIII") {
        validar_resp_lab_swiii_BD();
    }

    combo_docentes(id);
    $(id).modal("show");
}



// ############ INICIO lab_seg ##############
function set_lab_seg_web_client() {
    // Realiza una solicitud AJAX para obtener el contenido de historia desde el servidor
    $.post(
        "controller/laboratorios.php?op=cargar_lab_seg",
        function (data) {
            data = JSON.parse(data);
            if (data.length > 0) {
                var respContainer = $("#resp_lab_web");
                var pdfContainer = $("#pdf_lab_web");

                // Recorre los datos y agrega cada perfil académico al contenedor
                data.forEach(function (lab) {
                    // Crea un nuevo perfil académico con los datos obtenidos
                    var resp_lab_web = `
                        <header>
                            <br>
                            <center>
                                <h2>Responsable del Laboratorio</h2>
                            </center>
                        </header>
                        <div class="perfil-imagen">
                            <img src="images/perfil_academico/${lab.foto_acad}" alt="" />
                        </div>
                        <h3>${lab.nom_acad}</h3>
                        <p>
                            <i class="fa fa-phone"></i> ${lab.cel_acad}
                        </p>
                        <p>
                            <a href="mailto:${lab.email_acad}" target="_blank">
                                <i class="fa fa-envelope-o"></i> email
                            </a>
                        </p>
                    `;

                    var pdf_lab_web = `
                        <header>
                            <center>
                                <h2>Horario</h2>
                            </center>
                        </header>
                        <iframe class="PDF-horario" src="docs/horarios/${lab.horario_lab}"></iframe>
                    `;

                    respContainer.append(resp_lab_web);
                    pdfContainer.append(pdf_lab_web);
                });
            }
        }
    );
}

function validar_resp_lab_seg_BD() {
    $.post("../../controller/laboratorios.php?op=cargar_resp_lab_seg", function (data) {
        data = JSON.parse(data);
        if (data !== "null" && data !== "") {
            /* CARGAR LOS DATOS DE LA BD EN EL MODAL */
            $('#id_lab_seg').val(data.id_lab);
            $('#resp_lab_seg').val(data.resp_lab).trigger('change');
        } else {
            /* MOSTRAR EL MODAL VACÍO */
            $('#id_lab_seg').val('');
            $("#resp_lab_seg").attr('data-placeholder', 'Seleccione');
        }
    });
}

function guardar_lab_seg() {
    var formData = new FormData($('#lab_seg_form')[0]);

    if (validar("#resp_lab_seg") &&
        validar_pdf("horario_lab_seg")
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
                text: "Se editarán los datos del laboratorio", // txt1
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
                        "Datos del laboratorio editados", //txt4
                        "success"
                    );

                    $.ajax({
                        url: "../../controller/laboratorios.php?op=guardar_editar_lab_seg",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            $("#modalSeg").modal("hide");
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
// ############ FIN lab_seg ###############



// ############ INICIO lab_mov ###############
function set_lab_mov_web_client() {
    // Realiza una solicitud AJAX para obtener el contenido de historia desde el servidor
    $.post(
        "controller/laboratorios.php?op=cargar_lab_mov",
        function (data) {
            data = JSON.parse(data);
            if (data.length > 0) {
                var respContainer = $("#resp_lab_web");
                var pdfContainer = $("#pdf_lab_web");

                // Recorre los datos y agrega cada perfil académico al contenedor
                data.forEach(function (lab) {
                    // Crea un nuevo perfil académico con los datos obtenidos
                    var resp_lab_web = `
                        <header>
                            <br>
                            <center>
                                <h2>Responsable del Laboratorio</h2>
                            </center>
                        </header>
                        <div class="perfil-imagen">
                            <img src="images/perfil_academico/${lab.foto_acad}" alt="" />
                        </div>
                        <h3>${lab.nom_acad}</h3>
                        <p>
                            <i class="fa fa-phone"></i> ${lab.cel_acad}
                        </p>
                        <p>
                            <a href="mailto:${lab.email_acad}" target="_blank">
                                <i class="fa fa-envelope-o"></i> email
                            </a>
                        </p>
                    `;

                    var pdf_lab_web = `
                        <header>
                            <center>
                                <h2>Horario</h2>
                            </center>
                        </header>
                        <iframe class="PDF-horario" src="docs/horarios/${lab.horario_lab}"></iframe>
                    `;

                    respContainer.append(resp_lab_web);
                    pdfContainer.append(pdf_lab_web);
                });
            }
        }
    );
}

function validar_resp_lab_mov_BD() {
    $.post("../../controller/laboratorios.php?op=cargar_resp_lab_mov", function (data) {
        data = JSON.parse(data);
        if (data !== "null" && data !== "") {
            /* CARGAR LOS DATOS DE LA BD EN EL MODAL */
            $('#id_lab_mov').val(data.id_lab);
            $('#resp_lab_mov').val(data.resp_lab).trigger('change');
        } else {
            /* MOSTRAR EL MODAL VACÍO */
            $('#id_lab_mov').val('');
            $("#resp_lab_mov").attr('data-placeholder', 'Seleccione');
        }
    });
}

function guardar_lab_mov() {
    var formData = new FormData($('#lab_mov_form')[0]);

    if (validar("#resp_lab_mov") &&
        validar_pdf("horario_lab_mov")
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
                text: "Se editarán los datos del laboratorio", // txt1
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
                        "Datos del laboratorio editados", //txt4
                        "success"
                    );

                    $.ajax({
                        url: "../../controller/laboratorios.php?op=guardar_editar_lab_mov",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            $("#modalMov").modal("hide");
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
// ############ FIN lab_mov ###############



// ############ INICIO lab_hd ###############
function set_lab_hd_web_client() {
    // Realiza una solicitud AJAX para obtener el contenido de historia desde el servidor
    $.post(
        "controller/laboratorios.php?op=cargar_lab_hd",
        function (data) {
            data = JSON.parse(data);
            if (data.length > 0) {
                var respContainer = $("#resp_lab_web");
                var pdfContainer = $("#pdf_lab_web");

                // Recorre los datos y agrega cada perfil académico al contenedor
                data.forEach(function (lab) {
                    // Crea un nuevo perfil académico con los datos obtenidos
                    var resp_lab_web = `
                        <header>
                            <br>
                            <center>
                                <h2>Responsable del Laboratorio</h2>
                            </center>
                        </header>
                        <div class="perfil-imagen">
                            <img src="images/perfil_academico/${lab.foto_acad}" alt="" />
                        </div>
                        <h3>${lab.nom_acad}</h3>
                        <p>
                            <i class="fa fa-phone"></i> ${lab.cel_acad}
                        </p>
                        <p>
                            <a href="mailto:${lab.email_acad}" target="_blank">
                                <i class="fa fa-envelope-o"></i> email
                            </a>
                        </p>
                    `;

                    var pdf_lab_web = `
                        <header>
                            <center>
                                <h2>Horario</h2>
                            </center>
                        </header>
                        <iframe class="PDF-horario" src="docs/horarios/${lab.horario_lab}"></iframe>
                    `;

                    respContainer.append(resp_lab_web);
                    pdfContainer.append(pdf_lab_web);
                });
            }
        }
    );
}

function validar_resp_lab_hd_BD() {
    $.post("../../controller/laboratorios.php?op=cargar_resp_lab_hd", function (data) {
        data = JSON.parse(data);
        if (data !== "null" && data !== "") {
            /* CARGAR LOS DATOS DE LA BD EN EL MODAL */
            $('#id_lab_hd').val(data.id_lab);
            $('#resp_lab_hd').val(data.resp_lab).trigger('change');
        } else {
            /* MOSTRAR EL MODAL VACÍO */
            $('#id_lab_hd').val('');
            $("#resp_lab_hd").attr('data-placeholder', 'Seleccione');
        }
    });
}

function guardar_lab_hd() {
    var formData = new FormData($('#lab_hd_form')[0]);

    if (validar("#resp_lab_hd") &&
        validar_pdf("horario_lab_hd")
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
                text: "Se editarán los datos del laboratorio", // txt1
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
                        "Datos del laboratorio editados", //txt4
                        "success"
                    );

                    $.ajax({
                        url: "../../controller/laboratorios.php?op=guardar_editar_lab_hd",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            $("#modalHD").modal("hide");
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
// ############ FIN lab_hd ###############



// ############ INICIO lab_swi ##############
function set_lab_swi_web_client() {
    // Realiza una solicitud AJAX para obtener el contenido de historia desde el servidor
    $.post(
        "controller/laboratorios.php?op=cargar_lab_swi",
        function (data) {
            data = JSON.parse(data);
            if (data.length > 0) {
                var respContainer = $("#resp_lab_web");
                var pdfContainer = $("#pdf_lab_web");

                // Recorre los datos y agrega cada perfil académico al contenedor
                data.forEach(function (lab) {
                    // Crea un nuevo perfil académico con los datos obtenidos
                    var resp_lab_web = `
                        <header>
                            <br>
                            <center>
                                <h2>Responsable del Laboratorio</h2>
                            </center>
                        </header>
                        <div class="perfil-imagen">
                            <img src="images/perfil_academico/${lab.foto_acad}" alt="" />
                        </div>
                        <h3>${lab.nom_acad}</h3>
                        <p>
                            <i class="fa fa-phone"></i> ${lab.cel_acad}
                        </p>
                        <p>
                            <a href="mailto:${lab.email_acad}" target="_blank">
                                <i class="fa fa-envelope-o"></i> email
                            </a>
                        </p>
                    `;

                    var pdf_lab_web = `
                        <header>
                            <center>
                                <h2>Horario</h2>
                            </center>
                        </header>
                        <iframe class="PDF-horario" src="docs/horarios/${lab.horario_lab}"></iframe>
                    `;

                    respContainer.append(resp_lab_web);
                    pdfContainer.append(pdf_lab_web);
                });
            }
        }
    );
}

function validar_resp_lab_swi_BD() {
    $.post("../../controller/laboratorios.php?op=cargar_resp_lab_swi", function (data) {
        data = JSON.parse(data);
        if (data !== "null" && data !== "") {
            /* CARGAR LOS DATOS DE LA BD EN EL MODAL */
            $('#id_lab_swi').val(data.id_lab);
            $('#resp_lab_swi').val(data.resp_lab).trigger('change');
        } else {
            /* MOSTRAR EL MODAL VACÍO */
            $('#id_lab_swi').val('');
            $("#resp_lab_swi").attr('data-placeholder', 'Seleccione');
        }
    });
}

function guardar_lab_swi() {
    var formData = new FormData($('#lab_swi_form')[0]);

    if (validar("#resp_lab_swi") &&
        validar_pdf("horario_lab_swi")
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
                text: "Se editarán los datos del laboratorio", // txt1
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
                        "Datos del laboratorio editados", //txt4
                        "success"
                    );

                    $.ajax({
                        url: "../../controller/laboratorios.php?op=guardar_editar_lab_swi",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            $("#modalSWI").modal("hide");
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
// ############ FIN lab_swi ###############



// ############ INICIO lab_swii ###############
function set_lab_swii_web_client() {
    // Realiza una solicitud AJAX para obtener el contenido de historia desde el servidor
    $.post(
        "controller/laboratorios.php?op=cargar_lab_swii",
        function (data) {
            data = JSON.parse(data);
            if (data.length > 0) {
                var respContainer = $("#resp_lab_web");
                var pdfContainer = $("#pdf_lab_web");

                // Recorre los datos y agrega cada perfil académico al contenedor
                data.forEach(function (lab) {
                    // Crea un nuevo perfil académico con los datos obtenidos
                    var resp_lab_web = `
                        <header>
                            <br>
                            <center>
                                <h2>Responsable del Laboratorio</h2>
                            </center>
                        </header>
                        <div class="perfil-imagen">
                            <img src="images/perfil_academico/${lab.foto_acad}" alt="" />
                        </div>
                        <h3>${lab.nom_acad}</h3>
                        <p>
                            <i class="fa fa-phone"></i> ${lab.cel_acad}
                        </p>
                        <p>
                            <a href="mailto:${lab.email_acad}" target="_blank">
                                <i class="fa fa-envelope-o"></i> email
                            </a>
                        </p>
                    `;

                    var pdf_lab_web = `
                        <header>
                            <center>
                                <h2>Horario</h2>
                            </center>
                        </header>
                        <iframe class="PDF-horario" src="docs/horarios/${lab.horario_lab}"></iframe>
                    `;

                    respContainer.append(resp_lab_web);
                    pdfContainer.append(pdf_lab_web);
                });
            }
        }
    );
}

function validar_resp_lab_swii_BD() {
    $.post("../../controller/laboratorios.php?op=cargar_resp_lab_swii", function (data) {
        data = JSON.parse(data);
        if (data !== "null" && data !== "") {
            /* CARGAR LOS DATOS DE LA BD EN EL MODAL */
            $('#id_lab_swii').val(data.id_lab);
            $('#resp_lab_swii').val(data.resp_lab).trigger('change');
        } else {
            /* MOSTRAR EL MODAL VACÍO */
            $('#id_lab_swii').val('');
            $("#resp_lab_swii").attr('data-placeholder', 'Seleccione');
        }
    });
}

function guardar_lab_swii() {
    var formData = new FormData($('#lab_swii_form')[0]);

    if (validar("#resp_lab_swii") &&
        validar_pdf("horario_lab_swii")
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
                text: "Se editarán los datos del laboratorio", // txt1
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
                        "Datos del laboratorio editados", //txt4
                        "success"
                    );

                    $.ajax({
                        url: "../../controller/laboratorios.php?op=guardar_editar_lab_swii",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            $("#modalSWII").modal("hide");
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
// ############ FIN lab_swii ###############


// ############ INICIO lab_swiii ###############
function set_lab_swiii_web_client() {
    // Realiza una solicitud AJAX para obtener el contenido de historia desde el servidor
    $.post(
        "controller/laboratorios.php?op=cargar_lab_swiii",
        function (data) {
            data = JSON.parse(data);
            if (data.length > 0) {
                var respContainer = $("#resp_lab_web");
                var pdfContainer = $("#pdf_lab_web");

                // Recorre los datos y agrega cada perfil académico al contenedor
                data.forEach(function (lab) {
                    // Crea un nuevo perfil académico con los datos obtenidos
                    var resp_lab_web = `
                        <header>
                            <br>
                            <center>
                                <h2>Responsable del Laboratorio</h2>
                            </center>
                        </header>
                        <div class="perfil-imagen">
                            <img src="images/perfil_academico/${lab.foto_acad}" alt="" />
                        </div>
                        <h3>${lab.nom_acad}</h3>
                        <p>
                            <i class="fa fa-phone"></i> ${lab.cel_acad}
                        </p>
                        <p>
                            <a href="mailto:${lab.email_acad}" target="_blank">
                                <i class="fa fa-envelope-o"></i> email
                            </a>
                        </p>
                    `;

                    var pdf_lab_web = `
                        <header>
                            <center>
                                <h2>Horario</h2>
                            </center>
                        </header>
                        <iframe class="PDF-horario" src="docs/horarios/${lab.horario_lab}"></iframe>
                    `;

                    respContainer.append(resp_lab_web);
                    pdfContainer.append(pdf_lab_web);
                });
            }
        }
    );
}

function validar_resp_lab_swiii_BD() {
    $.post("../../controller/laboratorios.php?op=cargar_resp_lab_swiii", function (data) {
        data = JSON.parse(data);
        if (data !== "null" && data !== "") {
            /* CARGAR LOS DATOS DE LA BD EN EL MODAL */
            $('#id_lab_swiii').val(data.id_lab);
            $('#resp_lab_swiii').val(data.resp_lab).trigger('change');
        } else {
            /* MOSTRAR EL MODAL VACÍO */
            $('#id_lab_swiii').val('');
            $("#resp_lab_swiii").attr('data-placeholder', 'Seleccione');
        }
    });
}

function guardar_lab_swiii() {
    var formData = new FormData($('#lab_swiii_form')[0]);

    if (validar("#resp_lab_swiii") &&
        validar_pdf("horario_lab_swiii")
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
                text: "Se editarán los datos del laboratorio", // txt1
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
                        "Datos del laboratorio editados", //txt4
                        "success"
                    );

                    $.ajax({
                        url: "../../controller/laboratorios.php?op=guardar_editar_lab_swiii",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            $("#modalSWIII").modal("hide");
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
// ############ FIN lab_swiii ###############