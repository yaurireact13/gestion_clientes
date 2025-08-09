
<?php
// ---------------------------------------------
// Script para mostrar la lista de promociones registradas
// Incluye conexión, consulta y renderizado de la tabla
// ---------------------------------------------

$conexion = new mysqli("localhost", "root", "", "atlantic_city_db"); // Conexión a la base de datos
$resultado = $conexion->query("SELECT * FROM promociones"); // Consulta para obtener todas las promociones
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>🎁 Promociones Registradas</title>
  <link rel="stylesheet" href="../css/estilos_promociones.css">
  <link rel="stylesheet" href="../css/btns.css">
  <link rel="stylesheet" href="../css/footer_sep.css">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container">
    <h1>🎁 Promociones Registradas</h1>
      <a class="btn-nueva" href="asignar_promocion.php">🎯 Asignar Promoción</a>
      <a class="btn-nueva" href="listar_promociones_clientes.php">📋 Ver Asignaciones</a>
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
    <a class="btn-nueva" href="crear_promocion.html">+ Nueva Promoción</a>
  </div>
  
  <!------------------------Boton de whatsapp-------------------->
<a href="https://wa.me/51921876815" class="wsp-btn" target="_blank" title="Contáctanos por WhatsApp">
      <img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp">
    </a>

<!------------------------Boton de whatsapp-------------------->

</body>
</html>
