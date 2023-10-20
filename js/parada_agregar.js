$(document).ready(function () {
    $("#guardarBtnk_parada").click(function () {
      // Obtén los valores del formulario
      var nom_pr = $("#nom_parada").val();
      var dir_pr = $("#dir_parada").val();                  
  
      // Envía los datos al servidor mediante AJAX
      $.ajax({
        type: "POST",
        url: "bd/guardar_parada.php", // Archivo PHP que procesará los datos y los guardará en la base de datos
        data: {          
          nom_pr:nom_pr,
          dir_pr:dir_pr
        },
        success: function (response) {
          if (response == "success") {
            Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Datos guardados correctamente',
              showConfirmButton: false,
              timer: 1500
            }).then(function () {
              // Recarga la página o realiza alguna otra acción después de mostrar el mensaje de éxito
              location.reload();
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error al guardar los datos',
              text: 'Ocurrió un error al intentar guardar los datos en la base de datos.'
            });
          }
        },
        error: function (xhr, status, error) {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Ocurrió un error al procesar la solicitud.'
          });
        }
      });
    })
  });