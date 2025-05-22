<?php
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");

$id = $_GET['id'];

if ($conexion->query("DELETE FROM solicitudes_atencion WHERE id = $id") === TRUE) {
  echo "🗑️ Solicitud eliminada correctamente. <a href='listar_solicitudes.php'>Volver a la lista</a>";
} else {
  echo "❌ Error al eliminar: " . $conexion->error;
}

$conexion->close();
?>
