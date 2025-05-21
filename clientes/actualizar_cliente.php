<?php
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$preferencias = $_POST['preferencias'];

$sql = "UPDATE clientes SET 
  nombre='$nombre', apellido='$apellido', dni='$dni',
  email='$email', telefono='$telefono', preferencias='$preferencias'
  WHERE id = $id";

if ($conexion->query($sql) === TRUE) {
  echo "<script>alert('Cliente actualizado correctamente'); window.location.href='listar_clientes.php';</script>";
} else {
  echo "Error al actualizar: " . $conexion->error;
}
