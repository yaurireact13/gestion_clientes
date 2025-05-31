<?php
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");
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
          <td><?= $fila['id'] ?></td>
          <td><?= $fila['nombre'] . " " . $fila['apellido'] ?></td>
          <td><?= $fila['tipo'] ?></td>
          <td><?= $fila['descripcion'] ?></td>
          <td><?= $fila['estado'] ?></td>
          <td><?= $fila['fecha_creacion'] ?></td>
          <td>
            <a href="editar_estado.php?id=<?= $fila['id'] ?>">✏️ Cambiar Estado</a> |
            <a href="eliminar_solicitud.php?id=<?= $fila['id'] ?>" onclick="return confirm('¿Eliminar esta solicitud?');">🗑️ Eliminar</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </table>

    <a href="../index.html" class="btn">🏠 Volver al inicio</a>
  </div>
</body>
</html>

<?php $conexion->close(); ?>
