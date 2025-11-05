var txt1 = "";
var txt2 = "";
var txt3 = "";
var txt4 = "";
var txt5 = "";

$(document).ready(function () {
    init();
    if (baseUrl != "") {
        set_table("#extension_data", "listar_ext");
    }
});

function set_table(id, op) {
    $(id).DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [

        ],
        "ajax": {
            url: "../../controller/extension.php?op=" + op,
            type: "post"
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength": 5,
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

function init() {
    if (name_file == "extension") {
        setPaginacion(1);
    }
    $('#extension_form').on("submit", function (e) {
        guardar_editar_ext(e);
    });
    $('#ext_select_form').on("submit", function (e) {
        e.preventDefault();
        var value = $("input[type=radio][name=select_ext]:checked").val();
        if (value) {
            $('#id_ext_select').val(value);
            set_nom_ext(value);
            set_table_fotos(value);
            $('#modalSelectExt').modal('hide');
        }
        else {
            Swal.fire({
                icon: 'error',
                title: 'Seleccione una Actividad de Extensión',
                showConfirmButton: false,
                timer: 3000
            })
        }
    });
    $('#fotos_form').on("submit", function (e) {
        guardar_fotos(e);
    });
}

function set_nom_ext(id_ext) {
    $.post("../../controller/extension.php?op=get_nom_ext", { id_ext: id_ext }, function (data) {
        data = JSON.parse(data);
        $('#nom_ext_select').val(data.nom_ext);
        $('#ext_selec').html('Fotos de "' + data.nom_ext + '"');
    });
}

function set_table_fotos(id_ext) {
    $("#fotos_data").DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [],
        "ajax": {
            url: "../../controller/extension.php?op=listar_fotos_ext",
            type: "post",
            data: { id_ext: id_ext }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength": 5,
        "order": [[0, "desc"]],
        "searching": false, // Desactivar la búsqueda
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

function validar_pdf() {
    var input = document.getElementById("doc_ext");

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
        text: 'El campo "Documento Adjunto (PDF)" es obligatorio',
    });
    return false; // No se seleccionó un archivo PDF o no se seleccionó ningún archivo
}

function ver_mas_menos(id_p, id_btn) {
    var textoParrafo = document.getElementById(id_p);
    var botonVerMas = document.getElementById(id_btn);

    var palabrasIniciales = 10;

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

/* Registrar una nueva Actividad de Extensión o editarlo */
function guardar_editar_ext(e) {
    e.preventDefault();
    var formData = new FormData($('#extension_form')[0]);
    txt_sweet_alert();

    /* ######################### VALIDACION ##################### */
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: true
    })

    /* Si todos los campos oblogatorios estan llenados */
    if (
        $('#nom_ext').val() != "" &&
        $('#fech_ext').val() != ""
    ) {
        swalWithBootstrapButtons.fire({
            title: '¿Estás seguro?',
            text: txt1, // txt1
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: txt2, //txt2
            cancelButtonText: 'No, cancelar',
            reverseButtons: true
        }).then((result) => {
            /* Si hace click en registrar */
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire(
                    txt3, //txt3
                    txt4, //txt4
                    'success'
                )

                $.ajax({
                    url: '../../controller/extension.php?op=guardar_editar_ext',
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        set_table("#extension_data", "listar_ext");
                        $('#modalNuevo').modal('hide');
                    }
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire({
                    icon: 'error',
                    title: txt5, //txt5
                    showConfirmButton: false,
                    timer: 2000
                })
            }
        })
    }
    else {
        if ($('#nom_ext').val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El campo "Nombre" es obligatorio'
            })
            return;
        }
        if ($('#fech_ext').val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El campo "Fecha de la Actividad" es obligatorio'
            })
            return;
        }
    }
    /* FIN DE VALIDACION */
}

/* modificar los txt de los sweet alerts segun sea para nuevo o editar */
function txt_sweet_alert() {
    var lbl = document.getElementById('lbl_titulo').innerHTML;
    if (lbl == "Nueva Actividad de Extensión") {
        txt1 = '¡Se registrará una nueva Actividad de Extensión!';
        txt2 = 'Si, registrar';
        txt3 = '¡Nuevo registro!';
        txt4 = 'Se registró una nueva Actividad de Extensión';
        txt5 = 'Registro cancelado';
    } else {
        txt1 = '¡Se actualizarán los datos de la Actividad de Extensión!';
        txt2 = 'Si, actualizar';
        txt3 = '¡Actualizado!';
        txt4 = 'Se actualizaron los datos de la Actividad de Extensión';
        txt5 = 'Actualización cancelada';
    }
}

function editar_ext(id_ext) {
    $.post("../../controller/extension.php?op=mostrar_datos", { id_ext: id_ext }, function (data) {
        /* volvemos json para mostrarlos en la ventana editar */
        data = JSON.parse(data);
        $('#id_ext').val(data.id_ext);
        $('#nom_ext').val(data.nom_ext);
        $('#fech_ext').val(data.fech_ext);
        $('#desc_ext').val(data.desc_ext);
    });
    $('#lbl_titulo').html('Editar Actividad de Extensión');
    $('#guardar').html('Editar');
    $('#modalNuevo').modal('show');
}

function eliminar_ext(id_ext) {
    Swal.fire({
        title: '¿Eliminar?',
        text: '¿Desea eliminar la Actividad de Extensión?',
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
                'La Actividad de Extensión se eliminó correctamente',
                'success'
            )
            $.post("../../controller/extension.php?op=eliminar_ext", { id_ext: id_ext }, function (data) {
                set_table("#extension_data", "listar_ext");
            });
        }
    })
}

function nuevo_ext() {
    $('#id_ext').val('');
    $('#lbl_titulo').html('Nueva Actividad de Extensión');
    $('#guardar').html('Registrar');
    $('#extension_form')[0].reset();
    $('#modalNuevo').modal('show');
}

function select_ext() {
    set_table("#ext_select_data", "listar_select_ext");
    $('#modalSelectExt').modal('show');
}

function add_fotos() {
    if ($('#id_ext_select').val() != "") {
        $("#id_ext_fotos").val($("#id_ext_select").val());
        $("#title").html('Agragar fotos a la actividad<br>"' + $("#nom_ext_select").val() + '"   ');
        $('#modalFotos').modal('show');
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Seleccione una Actividad de Extensión',
            showConfirmButton: false,
            timer: 2000
        })
    }
}

function eliminar_foto(id_foto) {
    Swal.fire({
        title: '¿Eliminar?',
        text: '¿Desea eliminar la Foto?',
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
                'La Foto se eliminó correctamente',
                'success'
            )
            $.post("../../controller/extension.php?op=eliminar_foto", { id_foto: id_foto }, function (data) {
                set_table_fotos($("#id_ext_select").val());
                console.log("id = " + $("#id_ext_select").val());
            });
        }
    })
}

function validar_fotos() {
    var input = document.getElementById("fotos");

    // Comprobar si se seleccionó al menos un archivo
    if (input.files.length > 0) {
        // Iterar sobre cada archivo seleccionado
        for (var i = 0; i < input.files.length; i++) {
            var file = input.files[i];

            // Comprobar si es una imagen
            if (!file.type.includes('image')) {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: 'Por favor, selecciona solo archivos de imagen (PNG, JPG, JPEG).',
                });
                return false; // Al menos un archivo no es una imagen
            }
        }

        // Todos los archivos son imágenes
        return true;
    }

    // No se seleccionó ningún archivo
    Swal.fire({
        icon: "error",
        title: "Error",
        text: 'No seleccionó ninguna foto',
    });
    return false;
}

function guardar_fotos(e) {
    e.preventDefault();
    var formData = new FormData($('#fotos_form')[0]);
    txt1 = '¡Se agregarán fotos a la Actividad de Extensión!';
    txt2 = 'Si, agregar fotos';
    txt3 = '¡Correcto!';
    txt4 = 'Se agregaron fotos a "' + $("#nom_ext_select").val() + '"';
    txt5 = 'Registro cancelado';

    /* ######################### VALIDACION ##################### */
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: true
    })

    /* Si todos los campos oblogatorios estan llenados */
    if (
        validar_fotos()
    ) {
        swalWithBootstrapButtons.fire({
            title: '¿Estás seguro?',
            text: txt1, // txt1
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: txt2, //txt2
            cancelButtonText: 'No, cancelar',
            reverseButtons: true
        }).then((result) => {
            /* Si hace click en registrar */
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire(
                    txt3, //txt3
                    txt4, //txt4
                    'success'
                )

                $.ajax({
                    url: '../../controller/extension.php?op=guardar_foto',
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        set_table_fotos($("#id_ext_fotos").val());
                        $('#modalFotos').modal('hide');
                    }
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire({
                    icon: 'error',
                    title: txt5, //txt5
                    showConfirmButton: false,
                    timer: 2000
                })
            }
        })
    }
}

/* ############################ INICIO PAGINACON ################################ */

function setPaginacion(op) {
    // Para obtener la cantidad de páginas
    $.post("controller/extension.php?op=cant_paginas", function (data) {
        // Procesar la respuesta del servidor
        data = JSON.parse(data);
        var cant_paginas = data.total;
        cant_paginas = Math.ceil(cant_paginas / 5);

        // Obtener la página actual
        var paginaActual = parseInt($('.pagina-actual').text());

        // Validar la operación y ajustar la página actual
        if (op === 'anterior' && paginaActual > 1) {
            paginaActual--;
        } else if (op === 'siguiente' && paginaActual < cant_paginas) {
            paginaActual++;
        } else if (Number.isInteger(op)) {
            paginaActual = op;
        } else {
            return; // Si no es una operación válida o un número de página, salir
        }

        // Limpiar los botones de paginación existentes
        $('#paginacion').html('');

        // Agregar nuevos botones de paginación
        for (let i = 1; i <= cant_paginas; i++) {
            $('#paginacion').append(`<button onclick="setPaginacion(${i})">${i}</button>`);
        }

        // Actualizar la clase 'pagina-actual' para el botón seleccionado
        $(`#paginacion button:contains(${paginaActual})`).addClass('pagina-actual');

        offset = 5 * (paginaActual - 1);
        setDatosExt(offset);
    });
}

function setDatosExt(offset) {
    // Enviar la solicitud al servidor
    $.post("controller/extension.php?op=paginacion_datos_ext",
        { offset: offset },
        function (data) {
            data = JSON.parse(data);
            var container = $('#extension');
            // Limpiar las extensiones existentes
            container.empty();

            // Iterar sobre las extensiones y agregarlos al contenedor
            data.forEach(function (ext) {
                var datos_ext = `
                    <div class="fila comunicado col-12 col-12-mobile">
                        <div class="col-5 col-12-mobile">
                            <div id="foto_id_ext_${ext.id_ext}" class="slider">
                            </div>
                        </div>
                        <div class="col-7 col-12-mobile">
                            <h4><i class="icon ion-calendar"> ${ext.fech_ext}</i></h4>
                            <h3>${ext.nom_ext}</h3>
                            <section>
                                <p id="p_${ext.id_ext}">${ext.desc_ext}</p>
                                <button id="btn_${ext.id_ext}" type="submit" class="button"
                                onclick='ver_mas_menos("p_${ext.id_ext}", "btn_${ext.id_ext}")'>Ver menos</button>
                            </section>
                        </div>
                    </div>
                `;

                container.append(datos_ext);
                ver_mas_menos('p_' + ext.id_ext, 'btn_' + ext.id_ext);
                setFotosExt(ext.id_ext);
            });

        }
    );
}

function setFotosExt(id_ext) {
    // Enviar la solicitud al servidor
    $.post("controller/extension.php?op=paginacion_fotos_ext",
        { id_ext: id_ext },
        function (data) {
            data = JSON.parse(data);
            var container = $('#foto_id_ext_' + id_ext);
            // Limpiar las extensiones existentes
            container.empty();

            var cantidadDatos = data.length;
            var fotos_ext = '';

            if (cantidadDatos === 0) {
                fotos_ext = `
                    <div>
                        <img src="images/infor.png" />
                    </div>
                `;
                container.append(fotos_ext);
            } else if (cantidadDatos === 1) {
                fotos_ext = `
                    <div>
                        <img src="images/extension/` + decodeURI(data[0].nom_foto) + `" />
                    </div>
                `;
                container.append(fotos_ext);
                return;
            }
            else {
                // Iterar sobre las extensiones y agregarlos al contenedor
                data.forEach(function (foto) {
                    fotos_ext += `
                        <li>
                            <img src="images/extension/${foto.nom_foto}" />
                        </li>
                    `;
                });
                container.append('<ul>' + fotos_ext + '</ul>');
            }
        }
    );
}

/* ############################ FIN PAGINACON ################################ */