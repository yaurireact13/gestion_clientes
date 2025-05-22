<?php
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");

$id = $_GET['id'];

$sql = "DELETE FROM promociones WHERE id = $id";

if ($conexion->query($sql) === TRUE) {
  echo "<script>alert('Promoción eliminada'); window.location.href='listar_promociones.php';</script>";
} else {
  echo "Error al eliminar: " . $conexion->error;
}
