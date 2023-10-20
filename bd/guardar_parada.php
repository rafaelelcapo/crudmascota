<?php
// Conexión a la base de datos)
//session_start();//para trabajr con sesiones
include 'conexion.php';
// Obtén los valores enviados desde JavaScript
$nom_pr = $_POST['nom_pr'];
$dir_pr = $_POST['dir_pr'];

// Prepara la consulta SQL para insertar los datos en la base de datos
$stmt = $conn->prepare("INSERT INTO paradas (nombre_parada,direccion_parada) VALUES (?,?)");
$stmt->bind_param("ss",$nom_pr,$dir_pr);

// Ejecuta la consulta
if ($stmt->execute()) {
    // Si la consulta se ejecuta correctamente, devuelve una respuesta de éxito al JavaScript
    echo "success";
} else {
    // Si hay un error al ejecutar la consulta, devuelve un mensaje de error al JavaScript
    echo "error";
}

// Cierra la conexión a la base de datos y libera los recursos
$stmt->close();
$conn->close();
?>