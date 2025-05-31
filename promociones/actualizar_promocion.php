<?php
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$segmento_objetivo = $_POST['segmento_objetivo'];

$sql = "UPDATE promociones SET 
  titulo='$titulo', descripcion='$descripcion', fecha_inicio='$fecha_inicio', fecha_fin='$fecha_fin', segmento_objetivo='$segmento_objetivo' 
  WHERE id = $id";

if ($conexion->query($sql) === TRUE) {
  echo "<script>alert('Promoción actualizada correctamente'); window.location.href='listar_promociones.php';</script>";
} else {
  echo "Error al actualizar: " . $conexion->error;
}
