$(document).ready(function() {
    // Evento de clic en el botón "Editar"
    $(".editaBtn_parada").click(function() {
        // Obtener los datos del botón        
        var id_parada3 = $(this).data("id_paradas");
        var  nom_parada3 = $(this).data("nombre_parada");
        var dir_parada3 = $(this).data("direccion_parada");
     // Establecer los valores en el formulario del modal
        $("#id_parada3").val(id_parada3); 
        $("#nom_parada3").val(nom_parada3);        
        $("#dir_parada3").val(dir_parada3);                      

        // Abrir el modal
        $("#editapraModal").modal("show");
    });

    // Evento de clic en el botón "Guardar Cambios"
    $("#guardarCambiosBtnpra").click(function() {

        // Obtener los valores del formulario del modal
        var id = $("#id_parada3").val();
        var nom_pra = $("#nom_parada3").val();
        var dir_pra = $("#dir_parada3").val();                    

        // Enviar los datos al servidor mediante AJAX
        $.ajax({
            type: "POST",
            url: "bd/editar_parada.php", // Archivo PHP que procesará los datos y actualizará la base de datos
            data: {
                
                id: id,                
                nom_pra: nom_pra,
                dir_pra: dir_pra                              
            },            
            
            success: function(response) {
                if (response === "success") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos Editados correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        // Recargar la página después de guardar los cambios
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error al Editar los datos',
                        text: 'Ocurrió un error al intentar Editar los datos en la base de datos.'
                    });
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error al procesar la solicitud.'
                });
            }
        });
    });
});