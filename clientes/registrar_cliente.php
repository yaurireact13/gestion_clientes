<?php
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");

if ($conexion->connect_error) {
  die("Conexión fallida: " . $conexion->connect_error);
}

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$preferencias = $_POST['preferencias'];
$fecha = date("Y-m-d");

$segmento = $_POST['segmento'] ?? 'Regular'; 

$sql = "INSERT INTO clientes (nombre, apellido, dni, email, telefono, preferencias, segmento, fecha_registro)
VALUES ('$nombre', '$apellido', '$dni', '$email', '$telefono', '$preferencias', '$segmento', '$fecha')";


if ($conexion->query($sql) === TRUE) {
  echo "<script>alert('Cliente registrado exitosamente'); window.location.href='listar_clientes.php';</script>";
} else {
  echo "Error: " . $sql . "<br>" . $conexion->error;
}


$conexion->close();
?>
