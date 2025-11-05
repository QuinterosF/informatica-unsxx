var usu_id = $('#usu_idx').val();
var txt1 = "";
var txt2 = "";
var txt3 = "";
var txt4 = "";
var txt5 = "";

function init() {
    $('#usuarios_form').on("submit", function (e) {
        guardar_editar(e);
    });
}

function validarCheckbox() {
    var checkbox = document.querySelectorAll("input[type='checkbox']");
    for (var i = 0; i < checkbox.length; i++) {
        if (checkbox[i].checked) {
            return true;
        }
    }
    return false;
}

/* Registrar un nuevo usuario o editarlo */
function guardar_editar(e) {
    e.preventDefault();
    var formData = new FormData();
    txt_sweet_alert();

    formData.append('usu_id', $('#usu_id').val());
    formData.append('usu_nom', $('#usu_nom').val());
    formData.append('usu_correo', $('#usu_correo').val());

    // Itera sobre los checkbox del formulario
    var checkbox = document.querySelectorAll("input[type='checkbox']");

    // Comprueba si se ha seleccionado al menos un checkbox
    if (!validarCheckbox()) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Debe seleccionar al menos un permiso'
        })
        return;
    }

    const acercaDeCheckbox = document.querySelector('input[name="acerca_de"]');
    const carreraCheckbox = document.querySelector('input[name="carrera"]');
    const comunicadosCheckbox = document.querySelector('input[name="comunicados"]');
    const laboratoriosCheckbox = document.querySelector('input[name="laboratorios"]');
    const docentesCheckbox = document.querySelector('input[name="docentes"]');
    const extensionCheckbox = document.querySelector('input[name="extension"]');

    if (acercaDeCheckbox.checked) {
        formData.append('acerca_de', 1);
    } else {
        formData.append('acerca_de', 0);
    }

    if (carreraCheckbox.checked) {
        formData.append('carrera', 1);
    } else {
        formData.append('carrera', 0);
    }

    if (comunicadosCheckbox.checked) {
        formData.append('comunicados', 1);
    } else {
        formData.append('comunicados', 0);
    }

    if (laboratoriosCheckbox.checked) {
        formData.append('laboratorios', 1);
    } else {
        formData.append('laboratorios', 0);
    }

    if (docentesCheckbox.checked) {
        formData.append('docentes', 1);
    } else {
        formData.append('docentes', 0);
    }

    if (extensionCheckbox.checked) {
        formData.append('extension', 1);
    } else {
        formData.append('extension', 0);
    }

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
        $('#usu_nom').val() != "" &&
        $('#usu_correo').val() != ""
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
                $.post('../../controller/usuario.php?op=verificar_correo_existente', { usu_correo: $('#usu_correo').val() }, function (data) {
                    data = JSON.parse(data);
                    var cant_correo = data.total;
                    /* Si al registrar un nuevo usuario existe su correo en la base de datos */
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
                        // for (const [key, value] of formData.entries()) {
                        // Imprime el nombre y el valor del campo
                        //     console.log(key, value);
                        // }
                        $.ajax({
                            url: '../../controller/usuario.php?op=guardar_editar',
                            type: "POST",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function (data) {
                                console.log(data);
                                $('#usuario_data').DataTable().ajax.reload();
                                $('#modalmantenimiento').modal('hide');
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
        if ($('#usu_nom').val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El campo "Nombre" es obligatorio'
            })
            return;
        }
        if ($('#usu_correo').val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El campo "Correo electrónico" es obligatorio'
            })
            return;
        }
    }
    /* FIN DE VALIDACION */
}

/* modificar los txt de los sweet alerts segun sea para nuevo o editar */
function txt_sweet_alert() {
    var lbl = document.getElementById('lbl_titulo').innerHTML;
    if (lbl == "Nuevo Registro") {
        txt1 = '¡Se registrará un nuevo usuario!';
        txt2 = 'Si, registrar';
        txt3 = '¡Nuevo registro!';
        txt4 = 'Se registró a "' + $('#usu_nom').val();
        txt5 = 'Registro cancelado';
    } else {
        txt1 = '¡Se actualizarán los datos de este usuario!';
        txt2 = 'Si, actualizar';
        txt3 = '¡Actualizado!';
        txt4 = 'Se actualizaron los datos de este usuario';
        txt5 = 'Actualización cancelada';
    }
}

$(document).ready(function () {
    init();

    $('#usuario_data').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [],
        "ajax": {
            url: "../../controller/usuario.php?op=listar",
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
});

function editar(usu_id) {
    $.post("../../controller/usuario.php?op=show_for_edit", { usu_id: usu_id }, function (data) {
        /* volvemos json para mostrarlos en la ventana editar */
        data = JSON.parse(data);
        $('#usu_id').val(data.usu_id);
        $('#usu_nom').val(data.usu_nom);
        $('#usu_correo').val(data.usu_correo);

        setChecked( document.querySelector('input[name="acerca_de"]') , data.acerca_de );
        setChecked( document.querySelector('input[name="carrera"]') , data.carrera );
        setChecked( document.querySelector('input[name="comunicados"]') , data.comunicados );
        setChecked( document.querySelector('input[name="laboratorios"]') , data.laboratorios );
        setChecked( document.querySelector('input[name="docentes"]') , data.docentes );
        setChecked( document.querySelector('input[name="extension"]') , data.extension );
    });
    $('#psw').html('');
    $('#lbl_titulo').html('Editar Registro');
    $('#guardar').html('Actualizar usuario');
    $('#modalmantenimiento').modal('show');
}

function setChecked (checkbox, val) {
    if (val == 1) {
        checkbox.checked = true;
    }
}

function eliminar(usu_id) {
    Swal.fire({
        title: '¿Eliminar?',
        text: '¿Desea eliminar este usuario?',
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
                'Este usuario se eliminó correctamente',
                'success'
            )
            $.post("../../controller/usuario.php?op=eliminar", { usu_id: usu_id }, function (data) {
                $('#usuario_data').DataTable().ajax.reload();
            });
        }
    })
}

function nuevo_usuario() {
    $('#usu_id').val('');
    $('#lbl_titulo').html('Nuevo Registro');
    $('#psw').html('La contraseña por defecto  es: <label class="tx-danger tx-bold">infor</label>');
    $('#guardar').html('Registrar nuevo usuario');
    $('#usuarios_form')[0].reset();
    $('#modalmantenimiento').modal('show');
}