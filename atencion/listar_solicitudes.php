<?php
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$mensaje = "";
if (isset($_GET['mensaje'])) {
    if ($_GET['mensaje'] == 1) {
        $mensaje = "<p style='color:green;'>✅ Solicitud registrada correctamente.</p>";
    } elseif ($_GET['mensaje'] == 2) {
        $mensaje = "<p style='color:green;'>✅ Estado actualizado correctamente.</p>";
    } elseif ($_GET['mensaje'] == 3) {
        $mensaje = "<p style='color:green;'>✅ Solicitud eliminada correctamente.</p>";
    }
}

// Proceso para eliminar solicitud
if (isset($_GET['eliminar_id'])) {
    $eliminar_id = (int)$_GET['eliminar_id'];
    if ($eliminar_id > 0) {
        $stmt = $conexion->prepare("DELETE FROM solicitudes_atencion WHERE id = ?");
        $stmt->bind_param("i", $eliminar_id);
        if ($stmt->execute()) {
            $stmt->close();
            header("Location: listar_solicitudes.php?mensaje=3");
            exit;
        } else {
            echo "<p style='color:red;'>❌ Error al eliminar: " . htmlspecialchars($conexion->error) . "</p>";
        }
        $stmt->close();
    } else {
        echo "<p style='color:red;'>ID inválido para eliminar.</p>";
    }
}


$resultado = $conexion->query("SELECT sa.id, c.nombre, c.apellido, sa.tipo, sa.descripcion, sa.estado, sa.fecha_creacion 
                               FROM solicitudes_atencion sa 
                               JOIN clientes c ON sa.cliente_id = c.id");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Solicitudes de Atención</title>
  <link rel="stylesheet" href="../css/atencion.css">
  <link rel="stylesheet" href="../css/btns.css">
</head>
<body>
  <div class="container">
    <h1>📋 Lista de Solicitudes</h1>
    <a href="registrar_solicitud.php" class="btn">➕ Nueva Solicitud</a><br><br>

    <table>
      <tr>
        <th>ID</th>
        <th>Cliente</th>
        <th>Tipo</th>
        <th>Descripción</th>
        <th>Estado</th>
        <th>Fecha</th>
        <th>Acciones</th>
      </tr>

      <?php while ($fila = $resultado->fetch_assoc()): ?>
        <tr>
          <td><?= htmlspecialchars($fila['id']) ?></td>
          <td><?= htmlspecialchars($fila['nombre'] . " " . $fila['apellido']) ?></td>
          <td><?= htmlspecialchars($fila['tipo']) ?></td>
          <td><?= htmlspecialchars($fila['descripcion']) ?></td>
          <td><?= htmlspecialchars($fila['estado']) ?></td>
          <td><?= htmlspecialchars($fila['fecha_creacion']) ?></td>
          <td>
            <a href="editar_estado.php?id=<?= htmlspecialchars($fila['id']) ?>">✏️ Cambiar Estado</a> |
            <a href="listar_solicitudes.php?eliminar_id=<?= htmlspecialchars($fila['id']) ?>" onclick="return confirm('¿Eliminar esta solicitud?');">🗑️ Eliminar</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </table>

    <a href="../index.html" class="btn">🏠 Volver al inicio</a>
  </div>
</body>
</html>

<?php $conexion->close(); ?>
