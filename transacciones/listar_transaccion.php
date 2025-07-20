<?php
$conn = new mysqli("localhost", "root", "", "atlantic_city_db");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener datos del formulario de filtro
$cliente = $_GET['cliente'] ?? '';
$tipo = $_GET['tipo'] ?? '';
$fecha = $_GET['fecha'] ?? '';

// Crear consulta con filtros
$sql = "SELECT t.id, c.nombre AS cliente, t.tipo, t.gasto, t.fecha 
        FROM transacciones t 
        JOIN clientes c ON t.cliente_id = c.id 
        WHERE 1=1";

if (!empty($cliente)) {
    $sql .= " AND c.nombre LIKE '%" . $conn->real_escape_string($cliente) . "%'";
}
if (!empty($tipo)) {
    $sql .= " AND t.tipo = '" . $conn->real_escape_string($tipo) . "'";
}
if (!empty($fecha)) {
    $sql .= " AND DATE(t.fecha) = '" . $conn->real_escape_string($fecha) . "'";
}

$sql .= " ORDER BY t.fecha DESC";

$resultado = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Listado de Transacciones</title>
  <link rel="stylesheet" href="../css/transaccion.css">
  <link rel="stylesheet" href="../css/btns.css">
  <link rel="stylesheet" href="../css/footer_sep.css">
</head>
<body>
  <div class="contenedor">
    <h2>Listado de Transacciones</h2>

    <!-- Filtro -->
    <form method="get" class="filtro-form">
      <input type="text" name="cliente" placeholder="Buscar cliente" value="<?= htmlspecialchars($cliente) ?>">
      <select name="tipo">
        <option value="">-- Tipo --</option>
        <option value="Compra" <?= $tipo == 'Compra' ? 'selected' : '' ?>>Compra</option>
        <option value="Juego" <?= $tipo == 'Juego' ? 'selected' : '' ?>>Juego</option>
        <option value="Otro" <?= $tipo == 'Otro' ? 'selected' : '' ?>>Otro</option>
      </select>
      <input type="date" name="fecha" value="<?= htmlspecialchars($fecha) ?>">
      <button type="submit">Filtrar</button>
      <a href="listar_transaccion.php" class="reset-btn">Reset</a>
    </form>

    <!-- Tabla de resultados -->
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Cliente</th>
          <th>Tipo</th>
          <th>Gasto (S/)</th>
          <th>Fecha</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($resultado->num_rows > 0): ?>
          <?php while($fila = $resultado->fetch_assoc()): ?>
            <tr>
              <td><?= $fila['id'] ?></td>
              <td><?= $fila['cliente'] ?></td>
              <td><?= $fila['tipo'] ?></td>
              <td>S/ <?= number_format($fila['gasto'], 2) ?></td>
              <td><?= date('d/m/Y H:i', strtotime($fila['fecha'])) ?></td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="5">No se encontraron resultados.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
        <!--volver a home-->
  <div class="volver">
    <a href="../index.html" class="btn">🏠 Volver al inicio</a>
  </div>
  <!------------------------Boton de whatsapp-------------------->
  <a href="https://wa.me/51921876815" class="wsp-btn" target="_blank" title="Contáctanos por WhatsApp">
      <img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp">
    </a>
  <!------------------------Boton de whatsapp-------------------->

</body>
</html>
<?php $conn->close(); ?>
