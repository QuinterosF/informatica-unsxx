var txt1 = "";
var txt2 = "";
var txt3 = "";
var txt4 = "";
var txt5 = "";

function init() {
    if (name_file == "comunicados") {
        setPaginacion(1);
    }
    $('#comunicados_form').on("submit", function (e) {
        guardar_editar(e);
    });
}

function validar_pdf() {
    var input = document.getElementById("doc_com");

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

/* Registrar un nuevo Comunicado o editarlo */
function guardar_editar(e) {
    e.preventDefault();
    var formData = new FormData($('#comunicados_form')[0]);
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
        $('#nom_com').val() != "" &&
        validar_pdf()
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
                    url: '../../controller/comunicados.php?op=guardar_editar',
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $('#comunicados_data').DataTable().ajax.reload();
                        $('#modal').modal('hide');
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
    else if ($('#nom_com').val() == "") {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'El campo "Nombre" es obligatorio'
        })
        return;
    }
    /* FIN DE VALIDACION */
}

/* modificar los txt de los sweet alerts segun sea para nuevo o editar */
function txt_sweet_alert() {
    var lbl = document.getElementById('lbl_titulo').innerHTML;
    if (lbl == "Registrar Nuevo Comunicado") {
        txt1 = '¡Se registrará un nuevo Comunicado!';
        txt2 = 'Si, registrar';
        txt3 = '¡Nuevo registro!';
        txt4 = 'Se registró un nuevo Comunicado';
        txt5 = 'Registro cancelado';
    } else {
        txt1 = '¡Se actualizarán los datos del Comunicado!';
        txt2 = 'Si, actualizar';
        txt3 = '¡Actualizado!';
        txt4 = 'Se actualizaron los datos del Comunicado';
        txt5 = 'Actualización cancelada';
    }
}

$(document).ready(function () {
    init();
    if (baseUrl != "") {
        $('#comunicados_data').DataTable({
            "aProcessing": true,
            "aServerSide": true,
            dom: 'Bfrtip',
            buttons: [

            ],
            "ajax": {
                url: "../../controller/comunicados.php?op=listar",
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
});

function editar(id_com) {
    $.post("../../controller/comunicados.php?op=mostrar_datos", { id_com: id_com }, function (data) {
        /* volvemos json para mostrarlos en la ventana editar */
        data = JSON.parse(data);
        $('#id_com').val(data.id_com);
        $('#nom_com').val(data.nom_com);
        $('#desc_com').val(data.desc_com);
    });
    $('#lbl_titulo').html('Editar Comunicado');
    $('#guardar').html('Editar');
    $('#modal').modal('show');
}

function eliminar(id_com) {
    Swal.fire({
        title: '¿Eliminar?',
        text: '¿Desea eliminar el Comunicado?',
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
                'El Comunicado se eliminó correctamente',
                'success'
            )
            $.post("../../controller/comunicados.php?op=eliminar", { id_com: id_com }, function (data) {
                $('#comunicados_data').DataTable().ajax.reload();
            });
        }
    })
}

function nuevo() {
    $('#id_com').val('');
    $('#lbl_titulo').html('Registrar Nuevo Comunicado');
    $('#guardar').html('Registrar');
    $('#comunicados_form')[0].reset();
    $('#modal').modal('show');
}





/* ############################ INICIO PAGINACON ################################ */

function setPaginacion(op) {
    // Para obtener la cantidad de páginas
    $.post("controller/comunicados.php?op=cant_paginas", function (data) {
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
        setComunicados(offset);
    });
}

function setComunicados(offset) {
    // Enviar la solicitud al servidor
    $.post("controller/comunicados.php?op=paginacion",
        { offset: offset },
        function (data) {
            data = JSON.parse(data);
            var container = $('#comunicados');
            // Limpiar los comunicados existentes
            container.empty();

            // Iterar sobre los comunicados y agregarlos al contenedor
            data.forEach(function (com) {
                var src_foto = com.foto_com == "" ? 'images/infor.png' : 'docs/comunicados/img/' + com.foto_com;
                // Crea un nuevo perfil académico con los datos obtenidos
                var comunicado = `
                    <div class="fila comunicado col-12 col-12-mobile">

                        <div class="col-4 col-12-mobile container-img">
                            <img src="` + src_foto + `" />
                        </div>

                        <div class="col-8 col-12-mobile">

                            <h4><i class="icon ion-calendar"></i>${com.fech_com}</h4>

                            <h3>${com.nom_com}</h3>

                            <a href="docs/comunicados/pdf/${com.doc_com}" target="_blank"><i class="icon ion-pin"></i><i
                                    class="icon ion-document-text"></i>Ver documento</a>
                            
                            <section>
                                <p id="p_${com.id_com}">${com.desc_com}</p>
                                <button id="btn_${com.id_com}" type="submit" class="button"
                                onclick='ver_mas_menos("p_${com.id_com}", "btn_${com.id_com}")'>Ver menos</button>
                            </section>

                        </div>
                    </div>
                `;

                // Agrega el perfil académico al contenedor
                container.append(comunicado);
                ver_mas_menos('p_' + com.id_com, 'btn_' + com.id_com);
            });

        }
    );
}

/* ############################ FIN PAGINACON ################################ */