<?php
// ---------------------------------------------
// Script para actualizar los datos de un cliente existente
// Recibe los datos por POST y actualiza en la base de datos
// ---------------------------------------------

$conexion = new mysqli("localhost", "root", "", "atlantic_city_db"); // Conexión a la base de datos

// Obtiene los datos enviados por el formulario
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$preferencias = $_POST['preferencias'];

// Consulta SQL para actualizar los datos del cliente
$sql = "UPDATE clientes SET 
  nombre='$nombre', apellido='$apellido', dni='$dni',
  email='$email', telefono='$telefono', preferencias='$preferencias'
  WHERE id = $id";

// Ejecuta la consulta y muestra mensaje según el resultado
if ($conexion->query($sql) === TRUE) {
  echo "<script>alert('Cliente actualizado correctamente'); window.location.href='listar_clientes.php';</script>";
} else {
  echo "Error al actualizar: " . $conexion->error;
}
