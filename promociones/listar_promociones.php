<?php
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");
$resultado = $conexion->query("SELECT * FROM promociones");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>🎁 Promociones Registradas</title>
  <link rel="stylesheet" href="../css/estilos_promociones.css">
</head>
<body>
  <div class="container">
    <h1>🎁 Promociones Registradas</h1>
    <a class="btn-nueva" href="crear_promocion.html">+ Nueva Promoción</a>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Título</th>
          <th>Segmento</th>
          <th>Inicio</th>
          <th>Fin</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($fila = $resultado->fetch_assoc()) : ?>
          <tr>
            <td><?= $fila['id'] ?></td>
            <td><?= $fila['titulo'] ?></td>
            <td><?= $fila['segmento_objetivo'] ?></td>
            <td><?= $fila['fecha_inicio'] ?></td>
            <td><?= $fila['fecha_fin'] ?></td>
            <td>
              <a class="editar" href="editar_promocion.php?id=<?= $fila['id'] ?>">✏️</a>
              <a class="eliminar" href="eliminar_promocion.php?id=<?= $fila['id'] ?>" onclick="return confirm('¿Eliminar esta promoción?')">🗑️</a>
            </td>
          </tr>
          
        <?php endwhile; ?>
      </tbody>
    </table>
    <a class="btn-volver" href="../index.html">🏠 Volver al inicio</a>
  </div>
  
</body>
</html>
