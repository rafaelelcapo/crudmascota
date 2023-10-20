<?php
// Realizar la conexión a la base de datos (reemplazar los valores con los propios)
include 'conexion.php';

// Obtener el ID del registro a eliminar
$id = $_POST['id'];

// Eliminar el registro de la base de datos
$sql = "DELETE FROM paradas WHERE id_paradas = $id";
if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error";
}

$conn->close();
?>