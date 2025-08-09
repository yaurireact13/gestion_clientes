<?php
// ---------------------------------------------
// Script para guardar una nueva promoción
// Recibe datos por POST y los inserta en la base de datos
// ---------------------------------------------

$conexion = new mysqli("localhost", "root", "", "atlantic_city_db"); // Conexión a la base de datos

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$segmento_objetivo = $_POST['segmento_objetivo'];

// Inserta la promoción en la base de datos
$sql = "INSERT INTO promociones (titulo, descripcion, fecha_inicio, fecha_fin, segmento_objetivo)
VALUES ('$titulo', '$descripcion', '$fecha_inicio', '$fecha_fin', '$segmento_objetivo')";

if ($conexion->query($sql) === TRUE) {
  echo "<script>alert('Promoción registrada correctamente'); window.location.href='listar_promociones.php';</script>";
} else {
  echo "Error: " . $sql . "<br>" . $conexion->error;
}
