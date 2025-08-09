<?php
// ---------------------------------------------
// Script para procesar el formulario de contacto
// Recibe datos por POST y los guarda en la base de datos
// ---------------------------------------------

$conexion = new mysqli("localhost", "root", "", "atlantic_city_db"); // Conexión a la base de datos

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtiene los datos enviados por el formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

// Inserta el mensaje en la base de datos
$sql = "INSERT INTO mensajes_contacto (nombre, email, telefono, mensaje)
        VALUES ('$nombre', '$email', '$telefono', '$mensaje')";

if ($conexion->query($sql) === TRUE) {
    // Muestra alerta y redirige al index, limpio
    echo "<script>alert('Mensaje enviado con éxito, pronto el area de Sistemas se contactara con usted! :)'); window.location.href='../index.html';</script>";
} else {
    echo "Error: " . $conexion->error;
}

$conexion->close(); // Cierra la conexión
?>
