<?php
// ---------------------------------------------
// Script para registrar un nuevo cliente
// Recibe datos por POST y los inserta en la base de datos
// ---------------------------------------------

$conexion = new mysqli("localhost", "root", "", "atlantic_city_db"); // Conexión a la base de datos

if ($conexion->connect_error) {
  die("Conexión fallida: " . $conexion->connect_error);
}

// Obtiene los datos enviados por el formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$preferencias = $_POST['preferencias'];
$fecha = date("Y-m-d");

$segmento = $_POST['segmento'] ?? 'Regular'; 

// Inserta el cliente en la base de datos
$sql = "INSERT INTO clientes (nombre, apellido, dni, email, telefono, preferencias, segmento, fecha_registro)
VALUES ('$nombre', '$apellido', '$dni', '$email', '$telefono', '$preferencias', '$segmento', '$fecha')";

if ($conexion->query($sql) === TRUE) {
  echo "<script>alert('Cliente registrado exitosamente'); window.location.href='listar_clientes.php';</script>";
} else {
  echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close(); // Cierra la conexión
?>
