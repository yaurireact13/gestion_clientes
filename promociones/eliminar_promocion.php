<?php
// ---------------------------------------------
// Script para eliminar una promoción
// Recibe el ID por GET y elimina la promoción
// ---------------------------------------------

$conexion = new mysqli("localhost", "root", "", "atlantic_city_db"); // Conexión a la base de datos

$id = $_GET['id']; // ID de la promoción a eliminar

// Elimina la promoción de la base de datos
$sql = "DELETE FROM promociones WHERE id = $id";

if ($conexion->query($sql) === TRUE) {
  echo "<script>alert('Promoción eliminada'); window.location.href='listar_promociones.php';</script>";
} else {
  echo "Error al eliminar: " . $conexion->error;
}
