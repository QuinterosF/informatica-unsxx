var usu_id = $('#usu_idx').val();

$(document).ready(function(){
    $.post("../../controller/usuario.php?op=mostrar_datos_perfil", { usu_id : usu_id }, function (data) {
        data = JSON.parse(data);
        $('#usu_nom').val(data.usu_nom);
        $('#usu_correo').val(data.usu_correo);
        $('#usu_pass').val(data.usu_pass);
    });
});

$(document).on("click","#btn_actualizar", function(){
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: true
  })

  /* Si todos los campos oblogatorios estan llenados */
  if(
    $('#usu_nom').val() != "" && 
    $('#usu_correo').val() != "" &&
    $('#usu_pass').val() != ""
  ) {
    swalWithBootstrapButtons.fire({
      title: '¿Estás seguro?',
      text: "¡No podrás revertir esto!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, actualizar',
      cancelButtonText: 'No, cancelar',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        swalWithBootstrapButtons.fire(
          '¡Actualizado!',
          'Tus datos han sido actualizados',
          'success'
        )
        $.post("../../controller/usuario.php?op=update_perfil", { 
          usu_id : usu_id,
          usu_nom : $('#usu_nom').val(),
          usu_correo : $('#usu_correo').val(),
          usu_pass : $('#usu_pass').val()
        }, function (data) {
        });
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          '¡Cancelado!',
          'Tus datos están a salvo :)',
          'error'
        )
      }
    })
  }
  else {
    if($('#usu_nom').val() == ""){
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'El campo "Nombre" es obligatorio'
      })
      return;
    }
    if($('#usu_correo').val() == ""){
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'El campo "Correo electrónico" es obligatorio'
      })
      return;
    }
    if($('#usu_pass').val() == ""){
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'El campo "Contraseña" es obligatorio'
      })
      return;
    }
  }
});