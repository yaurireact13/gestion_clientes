<?php
// Conexión
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener datos
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

// Evitar inyección SQL (opcionalmente puedes usar prepare)
$sql = "INSERT INTO mensajes_contacto (nombre, email, telefono, mensaje)
        VALUES ('$nombre', '$email', '$telefono', '$mensaje')";

if ($conexion->query($sql) === TRUE) {
    echo "<script>alert('Mensaje enviado con éxito.'); window.history.back();</script>";
} else {
    echo "Error: " . $conexion->error;
}

$conexion->close();
?>
