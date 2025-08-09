
<?php
// ---------------------------------------------
// Script para mostrar el historial de actividades de los clientes
// Incluye conexión, consulta y renderizado de la tabla
// ---------------------------------------------

$conexion = new mysqli("localhost", "root", "", "atlantic_city_db"); // Conexión a la base de datos
if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}

// Consulta para obtener el historial de actividades junto con el nombre del cliente
$resultado = $conexion->query("
  SELECT h.id, CONCAT(c.nombre, ' ', c.apellido) AS cliente, h.fecha, h.actividad, h.gasto
  FROM historial h
  JOIN clientes c ON h.cliente_id = c.id
  ORDER BY h.fecha DESC
");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>📜 Historial de Clientes</title>
  <link rel="stylesheet" href="../css/historial.css">

</head>
<body>
  <h1>📜 Historial de Actividades</h1>
  <div><a href="../index.html" class="btn">🏠 Volver al Inicio</a>
  <a href="registrar_historial.php" class="btn">📝 Registrar Nueva Actividad</a></div>
  

  <table class="tabla-historial">
    <thead>
      <tr>
        <th>ID</th>
        <th>Cliente</th>
        <th>Fecha</th>
        <th>Actividad</th>
        <th>Gasto (S/)</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($resultado->num_rows > 0): ?>
        <?php while ($fila = $resultado->fetch_assoc()): ?>
          <tr>
            <td><?= $fila['id'] ?></td>
            <td><?= htmlspecialchars($fila['cliente']) ?></td>
            <td><?= $fila['fecha'] ?></td>
            <td><?= htmlspecialchars($fila['actividad']) ?></td>
            <td>S/ <?= number_format($fila['gasto'], 2) ?></td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="5">No hay registros en el historial.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>

  

</body>
</html>

<?php $conexion->close(); ?>
