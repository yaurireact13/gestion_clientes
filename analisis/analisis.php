
<?php
if (!isset($totalClientes)) {
  include '../conexion.php';
  $totalClientes = $conn->query("SELECT COUNT(*) as total FROM clientes")->fetch_assoc()['total'];
  $clientesVIP = $conn->query("SELECT COUNT(*) as total FROM clientes WHERE segmento = 'VIP'")->fetch_assoc()['total'];
  $promocionesActivas = $conn->query("SELECT COUNT(*) as total FROM promociones WHERE estado = 'Activa'")->fetch_assoc()['total'];
  $topCliente = $conn->query("SELECT nombre FROM clientes ORDER BY gasto_total DESC LIMIT 1")->fetch_assoc()['nombre'] ?? 'Sin datos';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>📊 Análisis - Atlantic City</title>
  <link rel="stylesheet" href="../css/analisis.css">
  <link rel="stylesheet" href="../css/btns.css">
  <link rel="stylesheet" href="../css/footer_sep.css">
</head>
<body>

  <h1>📊 Análisis de Clientes</h1>
    <a href="../index.html" class="btn">🏠 Volver al inicio</a>
  <div class="analisis-cards">
    <div class="card">
      <h3><a href="../clientes/listar_clientes.php">Total de Clientes</a></h3>
      <p><?= $totalClientes ?></p>
    </div>
    <div class="card">
      <h3>Clientes VIP</h3>
      <p><?= $clientesVIP ?></p>
    </div>
    <div class="card">
      <h3>Promociones Activas</h3>
      <p><?= $promocionesActivas ?></p>
    </div>
    <div class="card">
      <h3>Top Gastador</h3>
      <p><?= $topCliente ?></p>
    </div>
  </div>

  <!------------------------Boton de whatsapp-------------------->
<a href="https://wa.me/51921876815" class="wsp-btn" target="_blank" title="Contáctanos por WhatsApp">
      <img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp">
    </a>

<!------------------------Boton de whatsapp-------------------->



</body>
</html>
