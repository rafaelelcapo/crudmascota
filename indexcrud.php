<?php
// Conexión a la base de datos)
//session_start();//para trabajr con sesiones
include 'bd/conexion.php';

// Consulta SQL para obtener los datos de la base de datos
$sql = "SELECT * FROM paradas";
$resultp = $conn->query($sql);

// Cerrar la conexión
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="shortcut icon" href="#" />
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Encontrar Mascota</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
  <!-- -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css" />

</head>

<body>
  <div class="main">
    <div class="container-fluid ">
      <h1 class="mt-4">Mascota</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="">Stray Dogs</a></li>
        <li class="breadcrumb-item active">Gestion de Mascotas</li>
      </ol>
      <div class="my-3"></div>
      <!-- TABLA RUTAS -->
      <div class="container">
        <!-- Espacio entre las tablas -->
        <div class="my-3"></div>

        </div>
        <!-- Espacio entre las tablas 1111111111111111111111111111111111-->
        <div class="my-3"></div>
        <div class="row">
          <div class="col-lg-6">
            <div class="card mb-4">
              </div>
            </div>
          </div>

          <!-- TABLA HORARIO -->
          <div class="col-lg-6">
            <div class="card mb-4">
              <div class="card-header">MAPA</div>
              <div class="card-body">
                <div class="table-responsive">
                  <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d121835.96087136534!2d-66.31153337936259!3d-17.39384097880594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93e373e0d9e4ab27%3A0xa2719ae9532c3e65!2sCochabamba!5e0!3m2!1ses!2sbo!4v1685417137092!5m2!1ses!2sbo"
                    width="500" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Espacio entre las tablas 2222222222222222222222-->
        <div class="row">
          <div class="col-lg-6">
            <div class="card mb-4">
              <div class="card-header">Perros</div>
              <div class="card-body">
                <div class="table-responsive">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paradaModal">
                    Agregar Mascota
                  </button>
                  <div class="my-3"></div>
                  <table class="table table-striped table-sm" id="table6">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Msacota</th>
                        <th>Direccion Encontrado</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      // Verificar si hay datos para mostrar
                      if ($resultp->num_rows > 0) {
                        // Recorrer los datos y mostrarlos en la tabla
                        while ($row = $resultp->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td>" . $row["id_paradas"] . "</td>";
                          echo "<td>" . $row["nombre_parada"] . "</td>";
                          echo "<td>" . $row["direccion_parada"] . "</td>";
                          echo "<td><button class='btn btn-success editaBtn_parada' data-id_paradas='" . $row["id_paradas"] . "' data-nombre_parada='" . $row["nombre_parada"] . "' data-direccion_parada='" . $row["direccion_parada"] . "' >Editar</button>";
                          echo "<td><button class='btn btn-danger eliminarBtn_parada'  data-id_paradas='" . $row["id_paradas"] . "'>Eliminar</button></td>";
                          echo "</tr>";
                        }
                      } else {
                        // Si no hay datos, mostrar un mensaje 
                        echo "<tr><td colspan='3'>No se encontraron datos</td></tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
    <!-- Modal Guardar Parada-->
    <div class="modal fade" id="paradaModal" tabindex="-1" aria-labelledby="paradaModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="paradaModalLabel">AGREGAR PARADA</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="nom_parada">Nombre Parada:</label>
              <input type="text" class="form-control" id="nom_parada" name="nom_parada">
            </div>
            <div class="form-group">
              <label for="dir_parada">Direccion Parada:</label>
              <input type="text" class="form-control" id="dir_parada" name="dir_parada">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="guardarBtnk_parada">Guardar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Editar parada-->
    <div class="modal fade" id="editapraModal" tabindex="-1" aria-labelledby="editapraModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="editapraModalLabel">EDITAR PARADA</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="editarForm">
              <input type="hidden" id="id_parada3" name="id">
              <div class="form-group">
                <label for="nom_parada3">Nombre Parada:</label>
                <input type="text" class="form-control" id="nom_parada3" name="nom_parada3">
              </div>
              <div class="form-group">
                <label for="dir_parada3">Direccion Parada:</label>
                <input type="text" class="form-control" id="dir_parada3" name="dir_parada3">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="guardarCambiosBtnpra">Guardar Cambios</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Guardar Ruta-->
    <div class="modal fade" id="rutaModal" tabindex="-1" aria-labelledby="rutaModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="rutaModalLabel">AGREGAR RUTA</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="nom_ruta">Nombre Ruta:</label>
              <input type="text" class="form-control" id="nom_ruta" name="nom_ruta">
            </div>
            <div class="form-group">
              <label for="des_ruta">Descripcion:</label>
              <input type="text" class="form-control" id="des_ruta" name="des_ruta">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="guardarBtnk_ruta">Guardar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js"></script>
    <!-- jquery -->
    <script src="jquery/jquery-3.7.0.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--  -->
    <script src="js/parada_agregar.js"></script>
    <script src="js/parada_editar.js"></script>
    <script src="js/parada_eliminar.js"></script>

</body>

</html>