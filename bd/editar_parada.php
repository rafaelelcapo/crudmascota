<?php
// Conexión a la base de datos)
//session_start();//para trabajr con sesiones
include 'conexion.php';

// Obtener los datos enviados por AJAX
$id = $_POST['id'];
$nom_pra = $_POST['nom_pra'];
$dir_pra= $_POST['dir_pra'];


// Actualizar los datos en la base de datos
$sql = "UPDATE paradas SET nombre_parada='$nom_pra', direccion_parada='$dir_pra' WHERE id_paradas='$id'";
if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error";
}

// Cerrar la conexión
$conn->close();
?>