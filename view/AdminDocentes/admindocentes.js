var txt1 = "";
var txt2 = "";
var txt3 = "";
var txt4 = "";
var txt5 = "";

function init() {
    cargar_datos();
    $('#docentes_form').on("submit", function (e) {
        guardar_editar(e);
    });
}

function validar_foto() {
    var input = document.getElementById('foto_acad');

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
        text: 'El campo "Foto de Perfil" es obligatorio',
    });
    return false; // No se seleccionó una imagen o no es un archivo de imagen
}

function cargar_datos() {
    if (baseUrl == "") {
        // Realiza una solicitud AJAX para obtener el contenido de historia desde el servidor
        $.post(
            "controller/academico.php?op=cargar_datos",
            function (data) {
                data = JSON.parse(data);
                if (data.length > 0) {
                    // Obtén el contenedor donde se agregarán los perfiles académicos
                    var docentesContainer = $("#docentes");

                    // Recorre los datos y agrega cada perfil académico al contenedor
                    data.forEach(function (docente) {
                        // Crea un nuevo perfil académico con los datos obtenidos
                        var perfilAcademico = `
                        <div class="perfil-academico col-3 col-12-mobile">
                            <div class="perfil-imagen">
                                <img src="images/perfil_academico/${docente.foto_acad}" alt="" />
                            </div>

                            <h3>${docente.nom_acad}</h3>

                            <p>
                                <i class="fa fa-phone"></i> ${docente.cel_acad}
                            </p>

                            <p>
                                <a href="mailto:${docente.email_acad}" target="_blank">
                                    <i class="fa fa-envelope-o"></i> email
                                </a>
                            </p>

                            <p id="p_${docente.id_acad}">${docente.desc_acad}</p>
                            <center><button id="btn_${docente.id_acad}" type="submit" class="button"
                            onclick='ver_mas_menos("p_${docente.id_acad}", "btn_${docente.id_acad}")'>Ver menos</button></center>
                        </div>
                    `;

                        // Agrega el perfil académico al contenedor
                        docentesContainer.append(perfilAcademico);
                        ver_mas_menos('p_' + docente.id_acad, 'btn_' + docente.id_acad);
                    });
                }
            }
        );
    }
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

/* Registrar un nuevo docente o editarlo */
function guardar_editar(e) {
    e.preventDefault();
    var formData = new FormData($('#docentes_form')[0]);
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
        $('#nom_acad').val() != "" &&
        /^\d{8}$/.test($('#cel_acad').val()) &&
        $('#email_acad').val() != "" &&
        $('#rol_id').val() != "" &&
        validar_foto()
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
                /* VERIFICAR SI EL CORREO EXISTE EN LA BASE DE DATOS PARA NO DUPLICARLO */
                $.post('../../controller/academico.php?op=verificar_correo_existente', { email_acad: $('#email_acad').val() }, function (data) {
                    data = JSON.parse(data);
                    var cant_correo = data.total;
                    /* Si al registrar un nuevo academico existe su correo en la base de datos */
                    if (cant_correo == 1 && $('#usu_id').val() == "") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'El correo electrónico que ingresaste ya está registrado'
                        })
                    }
                    /* No existe el correo en la BD */
                    else {
                        swalWithBootstrapButtons.fire(
                            txt3, //txt3
                            txt4, //txt4
                            'success'
                        )

                        $.ajax({
                            url: '../../controller/academico.php?op=guardar_editar',
                            type: "POST",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function (data) {
                                $('#docente_data').DataTable().ajax.reload();
                                $('#modal').modal('hide');
                            }
                        });
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
        if ($('#nom_acad').val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El campo "Nombre" es obligatorio'
            })
            return;
        }
        if ($('#cel_acad').val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El campo "Celular" es obligatorio'
            })
            return;
        }
        if ($('#email_acad').val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El campo "Correo electrónico" es obligatorio'
            })
            return;
        }
        if (!(/^\d{8}$/.test($('#cel_acad').val()))) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El número de celular que ingresó no es válido'
            })
            return;
        }
    }
    /* FIN DE VALIDACION */
}

/* modificar los txt de los sweet alerts segun sea para nuevo o editar */
function txt_sweet_alert() {
    var lbl = document.getElementById('lbl_titulo').innerHTML;
    if (lbl == "Registrar Nuevo Docente") {
        txt1 = '¡Se registrará un nuevo Docente!';
        txt2 = 'Si, registrar';
        txt3 = '¡Nuevo registro!';
        txt4 = 'Se registró a "' + $('#nom_acad').val() + '"';
        txt5 = 'Registro cancelado';
    } else {
        txt1 = '¡Se actualizarán los datos del Docente!';
        txt2 = 'Si, actualizar';
        txt3 = '¡Actualizado!';
        txt4 = 'Se actualizaron los datos del Docente';
        txt5 = 'Actualización cancelada';
    }
}

$(document).ready(function () {
    if (baseUrl != "") {
        $('#docente_data').DataTable({
            "aProcessing": true,
            "aServerSide": true,
            dom: 'Bfrtip',
            buttons: [

            ],
            "ajax": {
                url: "../../controller/academico.php?op=listar",
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

function editar(id_acad) {
    $.post("../../controller/academico.php?op=mostrar_datos_perfil", { id_acad: id_acad }, function (data) {
        /* volvemos json para mostrarlos en la ventana editar */
        data = JSON.parse(data);
        $('#id_acad').val(data.id_acad);
        $('#nom_acad').val(data.nom_acad);
        $('#cel_acad').val(data.cel_acad);
        $('#email_acad').val(data.email_acad);
        $('#desc_acad').val(data.desc_acad);
    });
    $('#lbl_titulo').html('Editar Registro');
    $('#guardar').html('Actualizar Docente');
    $('#modal').modal('show');
}

function eliminar(id_acad) {
    Swal.fire({
        title: '¿Eliminar?',
        text: '¿Desea eliminar al Docente?',
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
                'El Docente se eliminó correctamente',
                'success'
            )
            $.post("../../controller/academico.php?op=eliminar", { id_acad: id_acad }, function (data) {
                $('#docente_data').DataTable().ajax.reload();
            });
        }
    })
}

function nuevo() {
    $('#id_acad').val('');
    $('#lbl_titulo').html('Registrar Nuevo Docente');
    $('#guardar').html('Registrar nuevo Docente');
    $('#docentes_form')[0].reset();
    $('#modal').modal('show');
}

init();