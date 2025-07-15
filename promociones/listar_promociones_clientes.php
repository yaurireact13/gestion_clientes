<?php
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");

// Obtener segmentos únicos
$segmentos_result = $conexion->query("SELECT DISTINCT segmento FROM clientes");

// Capturar filtros
$fecha_inicio = $_POST['fecha_inicio'] ?? '';
$fecha_fin = $_POST['fecha_fin'] ?? '';
$segmento_filtro = $_POST['segmento_objetivo'] ?? '';

// Construir consulta con filtros dinámicos
$query = "SELECT c.nombre, c.apellido, p.titulo AS promocion, p.fecha_inicio, p.fecha_fin
          FROM clientes c
          JOIN promociones_clientes pc ON c.id = pc.cliente_id
          JOIN promociones p ON pc.promocion_id = p.id";

$condiciones = [];

if (!empty($segmento_filtro)) {
    $condiciones[] = "c.segmento = '$segmento_filtro'";
}

if (!empty($fecha_inicio) && !empty($fecha_fin)) {
    $condiciones[] = "p.fecha_inicio >= '$fecha_inicio' AND p.fecha_fin <= '$fecha_fin'";
}

if (!empty($condiciones)) {
    $query .= " WHERE " . implode(' AND ', $condiciones);
}

$resultado = $conexion->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>📋 Promociones Asignadas</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/btns.css">
  <link rel="stylesheet" href="../css/footer_sep.css">
  <link rel="stylesheet" href="../css/tables.css">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
</head>
<body>

<header>
  <h1>📋 Promociones Asignadas a Clientes</h1>
  <a href="asignar_promocion.php" class="btn">🎯 Asignar Nueva</a>
  <a href="../index.html" class="btn">🏠 Volver al Inicio</a>
</header>

<main>
  <form method="POST" action="listar_promociones_clientes.php" class="formulario">
    <label for="segmento_objetivo">Segmento:</label>
    <select name="segmento_objetivo" id="segmento_objetivo">
      <option value="">-- Todos los segmentos --</option>
      <?php while ($seg = $segmentos_result->fetch_assoc()): ?>
        <option value="<?= $seg['segmento'] ?>" <?= ($segmento_filtro == $seg['segmento']) ? 'selected' : '' ?>>
          <?= $seg['segmento'] ?>
        </option>
      <?php endwhile; ?>
    </select>

    <label for="fecha_inicio">Desde:</label>
    <input type="date" name="fecha_inicio" value="<?= $fecha_inicio ?>">

    <label for="fecha_fin">Hasta:</label>
    <input type="date" name="fecha_fin" value="<?= $fecha_fin ?>">

    <button type="submit">🔍 Filtrar</button>
  </form>

  <h2>📑 Resultados</h2>
  <table class="tabla-estilizada">
    <thead>
      <tr>
        <th>Cliente</th>
        <th>Promoción</th>
        <th>Inicio</th>
        <th>Fin</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($resultado->num_rows > 0): ?>
        <?php while ($fila = $resultado->fetch_assoc()): ?>
          <tr>
            <td><?= $fila['nombre'] . ' ' . $fila['apellido'] ?></td>
            <td><?= $fila['promocion'] ?></td>
            <td><?= $fila['fecha_inicio'] ?></td>
            <td><?= $fila['fecha_fin'] ?></td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="4">No se encontraron promociones asignadas con estos filtros.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</main>

<a href="https://wa.me/51921876815" class="wsp-btn" target="_blank" title="Contáctanos por WhatsApp">
  <img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp">
</a>

</body>
</html>
