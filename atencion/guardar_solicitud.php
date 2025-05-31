<?php
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");

$cliente_id = $_POST['cliente_id'];
$tipo = $_POST['tipo'];
$descripcion = $_POST['descripcion'];

$sql = "INSERT INTO solicitudes_atencion (cliente_id, tipo, descripcion) VALUES ('$cliente_id', '$tipo', '$descripcion')";

if ($conexion->query($sql) === TRUE) {
  echo "✅ Solicitud registrada correctamente. <a href='listar_solicitudes.php'>Ver todas</a>";
} else {
  echo "❌ Error: " . $conexion->error;
}

$conexion->close();
?>
