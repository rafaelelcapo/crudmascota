$(document).ready(function() {
    // Evento de clic en el botón "Eliminar"
    $(".eliminarBtn_parada").click(function() {
      // Obtener los datos del botón
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      });
      
      swalWithBootstrapButtons.fire({
        title: 'Estas seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: '¡Sí, bórralo!',
        cancelButtonText: '¡No, cancela!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          // Obtener el ID del registro a eliminar
          var id = $(this).data("id_paradas"); // Aquí deberías obtener el ID del registro que deseas eliminar
      
          // Enviar la solicitud AJAX al archivo PHP para eliminar los datos
          $.ajax({
            type: "POST",
            url: "bd/eliminar_parada.php", // Archivo PHP que procesará la eliminación en la base de datos
            data: {
              id: id
            },
            success: function(response) {
              if (response == "success") {
                swalWithBootstrapButtons.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                ).then(function() {
                  // Recarga la página o realiza alguna otra acción después de mostrar el mensaje de éxito
                  location.reload();
                });
              } else {
                swalWithBootstrapButtons.fire(
                  'Error',
                  'Failed to delete the file.',
                  'error'
                );
              }
            },
            error: function(xhr, status, error) {
              swalWithBootstrapButtons.fire(
                'Error',
                'An error occurred while processing the request.',
                'error'
              );
            }
          });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
          );
        }
      });      
    });
  });